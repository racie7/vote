<?php

namespace App\Http\Controllers;

use App\Election;
use App\Nomination;
use App\Team;
use App\User;
use App\Vote;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show the index page
     * @return Factory|View
     */
    public function index()
    {
        return view('welcome')->with('success', 'Welcome to the nominations of the QUARTER ONE AWARDS');
    }

    /**
     * Show the app faqs
     * @return Factory|View
     */
    public function showFAQsPage()
    {
        return view('faqs');
    }

    /**
     * Show the form for searching an employee name
     * @param Request $request
     * @return Factory|View
     */
    public function searchNominee(Request $request)
    {

        // Extract the request data
        $name = $request->get('name');
        $nextRoute = $request->get('_next');

        $users = User::query()->where('name', 'like', "%${name}%")
            ->where('appointed_at', '<', today()->subYear())
            ->where('campus_id', '=', $request->user()->campus_id)
            ->paginate(50, [
                'id', 'name', 'staff_no',
            ]);

        // Check if we have any users
        if ($users->total() == 0) {
            return redirect()->back()->with('error', 'No user was found. Please try again.');
        }

        return view('nominations.search-results', compact('users', 'nextRoute'));
    }

    /**
     * Show the form for processing the nominations
     * @param string $slug
     * @return Factory|View
     */
    public function showNominationsForm(string $slug)
    {
        try {
            // Find the election using the election type slug
            $election = Election::with('type:id,type,slug')->whereHas('type', function ($query) use ($slug) {
                $query->where('election_types.slug', $slug)->where('election_types.slug', '!=', 'team-awards');
            })->where('is_completed', false)->where('is_upcoming', false)->first([
                'id', 'period', 'election_type_id',
            ]);

            // Check if we have the selected election, if not, get the next available election
            if (!$election) {
                $election = Election::with('type')->where('is_completed', false)
                    ->where('is_upcoming', false)
                    ->first([
                        'id', 'period', 'election_type_id',
                    ]);

                // Check if we have any available election
                if (!$election) {
                    return redirect()->route('home');
                }
            }

            // Load the ratings from the config
            $ratings = config('system.ratings');

            return view(sprintf('nominations.%s', $slug), compact('ratings', 'election', 'slug'));
        } catch (Exception $exception) {
            return redirect()->route('home')->with('error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Process the nomination request
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function processNominationsForm(Request $request)
    {
        // Get the election id
        $electionID = $request->get('election');

        // Check if the user had voted
        $hadVoted = $this->checkIfUserHadVoted($electionID);

        // Find the next election in the DB
        $election = $this->getElection($electionID);

        if (!$election) {
            // Store the data in the session
            $request->session()->put($request->get('slug'), $request->except('_token'));

            return $this->processNominations($request);
        }

        if ($hadVoted == 0) {
            // Store the data in the session
            $request->session()->put($request->get('slug'), $request->except('_token'));

            return redirect()->route('nominations', $election->type->slug);
        }

        return redirect()->route('nominations', $election->type->slug)
            ->with('error', 'You had already voted. Please wait for the next Quarter nominations.');
    }

    /**
     * Find the next election to process
     * @param $electionID
     * @return Builder|Model|object|null
     */
    private function getElection($electionID)
    {
        // Get the next election
        return Election::whereHas('type', function ($query) {
            $query->where('election_types.slug', '!=', 'team-awards');
        })->with('type:id,slug')->where('id', '>', $electionID)->where('is_completed', false)
            ->where('is_upcoming', false)->first([
                'id', 'period', 'election_type_id',
            ]);
    }

    /**
     * Process the nominations data
     * @param Request $request
     * @return RedirectResponse
     */
    private function processNominations(Request $request)
    {
        // Load the available elections that have not been completed
        $elections = Election::whereHas('type', function ($query) {
            $query->where('election_types.slug', '!=', 'team-awards');
        })->with('type:id,slug')->where('is_completed', false)
            ->where('is_upcoming', false)->get([
                'id', 'period', 'election_type_id',
            ]);

        // Get the session data
        $session = $request->session();

        foreach ($elections as $election) {
            // Check if we have the data in the session, we will use the election slug as the session key
            $slug = $election->type->slug;

            if ($session->has($slug)) {
                // Get the election data from the session, we use slug as the key
                $nominationData = $session->get($slug);

                $this->createNominations($nominationData, 'Individual', true);
            }
        }
        return redirect()->route('team-awards')
            ->with('success', 'Nominations submitted successfully. Please do the team nominations.');
    }

    /**
     * Check if the user had casted a voted on this election
     * @param int $electionID
     * @return int
     */
    private function checkIfUserHadVoted(int $electionID)
    {
        return Nomination::where('nominated_by', auth()->id())
            ->where('election_id', $electionID)
            ->count(['id']);
    }

    /**
     * Process the nominations, we store the data in the DB
     * @param array $nominationData
     * @param string $type
     * @param bool $isIndividual
     */
    private function createNominations(array $nominationData, string $type, bool $isIndividual)
    {
        $electionID = $nominationData['election'];
        $nominee = $nominationData['user'];

        $hadVoted = $this->checkIfUserHadVoted($electionID);

        if ($hadVoted == 0) {
            Nomination::insert([
                'type' => ucwords($type),
                'nominee' => $nominee,
                'nominated_by' => auth()->id(),
                'election_id' => $electionID,
                'results' => json_encode($nominationData),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Handle votes
            $this->updateOrCreateVotes($electionID, $nominee, $isIndividual);

            return;
        }
    }

    /**
     * Handle the votes for easy tracking
     * @param int $electionID
     * @param int $nominee
     * @param bool $isIndividual
     */
    private function updateOrCreateVotes(int $electionID, int $nominee, bool $isIndividual)
    {
        // Find the election and nominee votes
        $vote = Vote::where('election_id', $electionID)->where('nominee', $nominee);

        // Check if the votes exist, if it does not, we will create an entry
        if (!$vote->first()) {
            if ($isIndividual) {
                Vote::create([
                    'count' => 1,
                    'election_id' => $electionID,
                    'nominee' => $nominee,
                ]);

                return;
            }

            Vote::create([
                'count' => 1,
                'election_id' => $electionID,
                'team_id' => $nominee,
            ]);

            return;
        }

        // Increment the votes count by 1
        $vote->increment('count');

        return;
    }

    /**
     * Show the view for the elections that are upcoming.
     * @return Factory|RedirectResponse|View
     */
    public function showTheUpcomingElections()
    {
        // Get the elections that are upcoming and have to been completed
        $elections = Election::with('type:id,type,slug')->where('is_upcoming', true)
            ->where('is_completed', false)->get([
                'id', 'period', 'election_type_id',
            ]);

        // Check if we have any elections
        if (!count($elections)) {
            return redirect()->route('home')->with('info', 'Sorry. We don\'t have any upcoming elections');
        }

        return view('nominations.upcoming-nominations', compact('elections'));
    }

    /**
     * Show the form for getting the team award nominations
     * @return Factory|View
     */
    public function showTeamAwardForm(Request $request)
    {
        $user = $request->user()->load('department:id,team_id');

        // Get the teams we have from the DB
        $teams = Team::query()->whereNotIn('id',[ $user->department->team_id])->get([
            'id', 'name',
        ]);

        // Load the ratings from the config
        $ratings = config('system.ratings');

        return view('nominations.team-award', compact('teams', 'ratings'));
    }

    /**
     * Process the team nominations
     * @param Request $request
     * @return RedirectResponse
     */
    public function processTeamNominations(Request $request)
    {
        // Extract the request data
        $team = (int)$request->get('_team');
        $user = $request->user()->load('department:id,team_id');


        // Check if the user belongs in that department
        if ($user->department->team_id == $team) {
            return redirect()->back()->with('error', 'You cannot nominate your team.')->withInput($request->all());
        }
        // Get the election from the DB
        $election = Election::whereHas('type', function ($query) {
            $query->where('election_types.slug', 'team-awards');
        })->where('is_completed', false)->where('is_upcoming', false)->first(['id']);

        // Check if the user had votes
        $votes = Nomination::where('election_id', $election->id)
            ->where('nominated_by', $user->id)->first(['id']);

        if ($votes) {
            return redirect()->back()
                ->with('error', 'You had participated in this nomination. No other action is required.');

        }

        // Get the nomination data from the request, append the election
        $nominationData = array_merge(['election' => $election->id], $request->except('_token'));

        // Process the votes
        $this->createNominations($nominationData, 'Team', false);

        return redirect()->route('team-awards.results')->with('success', 'Nomination successfully submitted.');
    }

    public function showTeamAwardsResults(Request $request)
    {
        // Get the auth user
        $user = $request->user();

        // Get the nominations for the current elections, check if there are any votes casted by the user
        $votes = Nomination::whereHas('election', function ($query) {
            $query->where('elections.is_completed', false)->where('elections.is_upcoming', false);
        })->where('nominated_by', $user->id)->where('type', 'Team')->count(['id']);

        if ($votes == 0) {
            return redirect()->route('team-awards');
        }

        // Get the individual election votes
        $votes = Election::whereHas('votes')->with([
            'votes' => function ($query) {
                $query->where('team_id', '!=', null)->orderByDesc('count')->select([
                    'id', 'count', 'election_id', 'team_id',
                ])->take(10);
            }, 'votes.team:id,name', 'type:id,type,slug',
        ])->whereHas('type', function ($query) {
            $query->where('election_types.slug', 'team-awards');
        })->where('is_completed', false)->where('is_upcoming', false)->get([
            'id', 'election_type_id',
        ]);

        return view('home', compact('votes'));
    }

    public function loadDesignationsForm()
    {
        return \view('loading.designations');
    }

    public function loadDesignations(Request $request)
    {
        $contents = $this->processCSVFiles($request->file('csv'));

        // return count($contents);

        foreach ($contents as $content) {
            try {
                DB::table('designations')->insert([
                    'name' => ucwords($content[0]),
                    'job_group' => strtoupper($content[1])
                ]);
            } catch (Exception $exception) {
                continue;
            }
        }

        return 200;
    }

    private function processCSVFiles(object $file)
    {
        return mb_convert_encoding(array_map('str_getcsv', file($file->getRealPath())), 'UTF-8', 'UTF-8');
    }
}
