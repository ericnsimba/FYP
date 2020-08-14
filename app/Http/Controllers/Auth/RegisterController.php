<?php

namespace App\Http\Controllers\Auth;

use App\Designation;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserDepartments;
use App\UserDesignations;
use App\UserSalaryGrades;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;



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
    // protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)


    {
        // $langs = DB::table('lang')->get();
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'employmentNumber'=> ['required','numeric:4','unique:users'],
            'department'=>['required','numeric'],  //'exists:departments,name'
            'designation'=>['required','numeric'],    //,'exists:designations,name'
            'salarygrade'=>['required','numeric'],
            'role'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $registeredUser = User::create([
            'name' => $data['name'],
            'employmentNumber'=>$data['employmentNumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
        // dd($registeredUser);
        UserDepartments::create([
            'departmentId'=>$data['department'],
            'employmentNumber'=>$data['employmentNumber']

            ]);
        UserDesignations::create([
                'designationId'=>$data['department'],
                'employmentNumber'=>$data['employmentNumber']

                ]);
        UserSalaryGrades::create([
             'gradeId'=>$data['salarygrade'],
             'employmentNumber'=>$data['employmentNumber']
        ]);

        $user = User::latest()->first();
        $user->assignRole($data['role']);
        Session('message','USER REGISTERED SUCCESSFUL');

          return $registeredUser;
    }
}
