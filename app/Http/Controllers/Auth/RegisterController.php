<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationProfile;
use Session;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'middlename' => ['string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                    'required',
                    'string',
                    'min:10',
                    'confirmed',
                    'regex:/[a-z]/',      
                    'regex:/[A-Z]/',      
                    'regex:/[0-9]/',      
                    'regex:/[@$!%*#?&]/'
            ],
            'g-recaptcha-response' => 'required|recaptcha',
            'terms' => 'required|accepted'
        ]);
    }
    public function showRegistrationForm()
    {
        $user_roles = UserRole::where('order', '!=', 0)->orderBy('order', 'asc')->get();
        return view('auth.register')
            ->with('user_roles',$user_roles);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /**
        * NOTE ONLY PARENTS CAN REGISTER 
        */
        $parent_role = 2;
        $confirmation_code = Str::random(30);
        $data['confirmation_code'] = $confirmation_code;

        $success_message  = 'Your account has been successfully registered. Check your e-mail!';
        try{
            Mail::to($data['email'])->send(new VerificationProfile($data));
        }catch(\Exception $e) {
            Log::info($e);
        }

        Session::flash('success_message', $success_message);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'middlename' => $data['middlename'],
            'surname' => $data['surname'],
            'password' => Hash::make($data['password']),
            'role_id' => $parent_role,
            'confirmation_code' => $confirmation_code,
            'is_verified' => 0,
        ]);
    }
}
