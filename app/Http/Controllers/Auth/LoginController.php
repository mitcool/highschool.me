<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\LoginVerification;
use App\Mail\LoginPinCode;
use Validator;

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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
            'login_pin' => 'nullable|digits:6',
            'verification_token' => 'nullable|string|max:64',
        ], [
            'g-recaptcha-response.required' => 'Invalid Captcha',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($request, $validator->errors()->toArray());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->validationErrorResponse($request, [
                'email' => ['Invalid credentials.'],
            ]);
        }

        $current_ip = $request->ip();
        $user_agent = substr((string) $request->userAgent(), 0, 65535);
        $remember = $request->filled('remember');
        if (!$request->filled('verification_token') || !$request->filled('login_pin')) {
            LoginVerification::where('user_id', $user->id)
                ->where('status', 'pending')
                ->update(['status' => 'expired']);

            $pin_code = (string) random_int(100000, 999999);
            $verification = LoginVerification::create([
                'user_id' => $user->id,
                'verification_token' => Str::random(64),
                'ip_address' => $current_ip,
                'user_agent' => $user_agent,
                'pin_code' => $pin_code,
                'attempts' => 0,
                'status' => 'pending',
                'expires_at' => Carbon::now()->addMinutes(10),
            ]);

            try {
                Mail::to($user->email)->send(new LoginPinCode($user, $pin_code));
            } catch (\Exception $e) {
                info($e->getMessage());
            }

            return $this->pinRequiredResponse(
                $request,
                'We sent a PIN code to your email.',
                $verification->verification_token
            );
        }

        $verification = LoginVerification::where('user_id', $user->id)
            ->where('verification_token', $request->verification_token)
            ->where('status', 'pending')
            ->first();

        if (!$verification) {
            return $this->validationErrorResponse($request, [
                'login_pin' => ['This verification request was not found. Please try logging in again.'],
            ], true);
        }

        if ($verification->ip_address !== $current_ip) {
            $verification->update(['status' => 'failed']);

            return $this->validationErrorResponse($request, [
                'login_pin' => ['The verification request does not match this IP address. Please try again.'],
            ], true);
        }

        if ($verification->expires_at && Carbon::now()->gt($verification->expires_at)) {
            $verification->update(['status' => 'expired']);

            return $this->validationErrorResponse($request, [
                'login_pin' => ['This PIN has expired. Please try logging in again.'],
            ], true);
        }

        if ($verification->pin_code !== $request->login_pin) {
            $attempts = $verification->attempts + 1;
            $verification->update([
                'attempts' => $attempts,
                'status' => $attempts >= 5 ? 'failed' : 'pending',
            ]);

            return $this->validationErrorResponse($request, [
                'login_pin' => [$attempts >= 5 ? 'Too many invalid PIN attempts. Please try logging in again.' : 'Invalid PIN code.'],
            ], $attempts < 5, $verification->verification_token);
        }

        $verification->update([
            'status' => 'approved',
            'verified_at' => Carbon::now(),
        ]);

        Auth::login($user, $remember);
        $request->session()->regenerate();

        $redirect_url = $this->redirectUrlByRole($user->role_id);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'redirect' => $redirect_url,
            ]);
        }

        return redirect()->to($redirect_url);
    }

    private function redirectUrlByRole($role)
    {
        if ($role == 1) {
            return route('admin-dashboard');
        }

        if ($role == 2) {
            return route('parent.dashboard');
        }

        if ($role == 4) {
            return route('student.dashboard');
        }

        if ($role == 5) {
            return route('educator.dashboard');
        }

        abort(403);
    }

    private function pinRequiredResponse(Request $request, $message, $verification_token)
    {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'pin_required',
                'message' => $message,
                'verification_token' => $verification_token,
            ]);
        }

        return back()->withErrors([
            'login_pin' => $message,
        ]);
    }

    private function validationErrorResponse(Request $request, array $errors, $pin_required = false, $verification_token = null)
    {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'errors' => $errors,
                'pin_required' => $pin_required,
                'verification_token' => $verification_token,
            ], 422);
        }

        return back()->withErrors($errors)->withInput();
    }
}
