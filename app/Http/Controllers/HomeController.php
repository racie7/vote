<?php

namespace App\Http\Controllers;

use App\Election;
use App\Nomination;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
       // return view('home')->with('info', 'Registration completed successfully. Nominations will take place soon');

        // Get the auth user
        $user = $request->user();

        // Get the nominations for the current elections, check if there are any votes casted by the user
        $votes = Nomination::whereHas('election', function ($query) {
            $query->where('elections.is_completed', false)->where('elections.is_upcoming', false);
        })->where('nominated_by', $user->id)->where('type', '!=', 'team')->count(['id']);

        if ($votes == 0) {
            // Find the next available election
            $election = Election::with('type:id,slug', 'votes')->where('is_completed', false)
                ->where('is_upcoming', false)->first([
                    'id', 'period', 'election_type_id',
                ]);

            // Check if we have any available election
            if (!$election) {
                return view('home')->with('info', 'We have no elections available at the moment.');
            }

            return redirect()->route('nominations', $election->type->slug);
        }

        // Get the individual election votes
        $votes = Election::whereHas('votes')->with([
            'votes' => function ($query) {
                $query->where('nominee', '!=', null)->orderByDesc('count')->select([
                    'id', 'count', 'election_id', 'nominee',
                ])->take(10);
            }, 'votes.candidate:id,name', 'type:id,type,slug',
        ])->whereHas('type', function ($query) {
            $query->where('election_types.slug', '!=', 'team-awards');
        })->where('is_completed', false)->where('is_upcoming', false)->get([
            'id', 'election_type_id',
        ]);

        return view('home', compact('votes'));
    }

    /**
     * Show the form for updating the user password
     * @return Factory|View
     */
    public function changePasswordView()
    {
        return \view('update-user-password');
    }

    /**
     * Reset the user password
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateUserPassword(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
           'staff_number' => ['required', 'string'],
            'password' => ['required', 'confirmed']
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('error', 'Sorry. The entered passwords do not match.');
        }

        // Extract the request data
        $staffNumber = $request->input('staff_number');

        // Find the user
        $user = User::query()->where('staff_no', $staffNumber);

        // Check if they exists
        if (!$user->first('id')) {
            return redirect()->back()->withInput($request->all())->with('error', 'Sorry. No employee was found.');
        }

        $user->update([
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()->back()->with('success', 'User password updated successfully.');
    }
}
