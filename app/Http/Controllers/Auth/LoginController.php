<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
{
    // Validate request
     $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        "g-recaptcha-response" => 'required'
    ],[
        'g-recaptcha-response.required' => 'Invalid Captcha'
    ]);

    $credentials = $request->only('email','password');

    // Attempt login
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        $role = auth()->user()->role_id;
        if( $role == 1){
            return redirect()->route('admin-dashboard');
        }
        elseif($role == 2){
            return redirect()->route('parent.dashboard');
        }
        elseif($role == 4){
            return redirect()->route('student.dashboard');
        }
        elseif($role == 5){
            return redirect()->route('educator.dashboard');
        }
        else{
            abort(403); 
        }
        
    }
    return back()->withErrors([
        'email' => 'Invalid credentials.',
        'g-recaptcha-response' => 'Invalid captcha'
    ]);
}
}
