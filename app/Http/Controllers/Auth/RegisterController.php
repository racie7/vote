<?php

namespace App\Http\Controllers\Auth;

use App\Campus;
use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'staff_no' => ['required', 'string', 'max:255', 'unique:users'],
            'national_id' => ['required', 'string', 'numeric', 'digits_between:7,8', 'unique:users'],
            'department' => ['required',],
            'campus' => ['required'],
//			'job_description' => ['required', 'max:250'],
//			'job' => ['required'],
            'gender' => ['required'],
            'designation' => ['required'],
            'appointed_at' => 'date_format:Y-m-d|before:today',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'staff_no' => $data['staff_no'],
            'national_id' => $data['national_id'],
            'department_id' => $data['department'],
            'campus_id' => $data['campus'],
//			'job_description' => $data['job_description'],
            'designation' => $data['designation'],
//			'job_group_id' => $data['job'],
            'appointed_at' => $data['appointed_at'],
            'gender' => ucwords($data['gender']),
        ]);
    }


    public function showRegistrationForm()
    {
        // Get the departments name and id only
        $departments = Department::get(['id', 'name']);

        // Get the campuses name and id only
        $campuses = Campus::get(['id', 'name']);

        // Get the designations
        $designations = Designation::get(['id', 'name', 'job_group']);

//		// Get the job groups
//		$jobGroups = JobGroup::get(['id', 'name']);

        // Render the register view, pass the departments data to the , 'view
        return view('auth.register', compact('departments', 'campuses', 'designations'));
    }

    /**
     * Register the user
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the request
        $this->validator($request->all());

        // Get the email from the request
        $email = $request->input('email');

        // Create an array of all the accepted domains
        $acceptedDomains = [
            'ksg.ac.ke'
        ];

        // Check if the email is a valid ksg email
        if(!in_array(substr($email, strrpos($email, '@') + 1), $acceptedDomains))
        {
            return redirect()->back()->with('error', 'The email be a valid KSG email.')->withInput($request->all());
        }

        // Create the user
        $user = $this->create($request->all());

        // Login the user using the id
        auth()->loginUsingId($user->id);

        return redirect()->to($this->redirectTo);
    }

}
