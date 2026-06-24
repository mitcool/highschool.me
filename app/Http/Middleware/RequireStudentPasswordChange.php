<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireStudentPasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && (int) $user->role_id === 4 && (int) $user->must_change_password === 1) {
            return redirect()
                ->route('student.reset.password.page')
                ->with('error', 'For security reasons, please change your password before accessing the student dashboard.');
        }

        return $next($request);
    }
}
