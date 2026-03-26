<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

    public function reset(Request $request){
        $request->validate([
            "token" => "required",
            "email" => "required|email",
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
            'password_confirmation' => 'required|same:password'
        ]);
        $password = Hash::make($request->password);
        $user = User::where('email',$request->email)->first() ?? abort(404);

        $user->update(['password' => $password]);

        return redirect()->back()->with('success_message','Your password has been successfully reset.Thank you for keeping your account secure.');

    }

}
