<?php

namespace App\Http\Middleware;

use App\LeaveRequest;
use Closure;
use Illuminate\Http\Request;

class RestrictStudentPagesDuringLongLeave
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
        $student = auth()->user();

        if (!$student) {
            return $next($request);
        }

        if (LeaveRequest::studentHasActiveLongApprovedLeaveRestriction($student->id)) {
            return redirect()
                ->route('student.dashboard')
                ->with(
                    'error',
                    'Access to this page is temporarily restricted during an approved long-term leave.'
                );
        }

        return $next($request);
    }
}
