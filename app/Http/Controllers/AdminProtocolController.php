<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LoginVerification;
use App\User;

class AdminProtocolController extends Controller
{
    public function index(Request $request)
    {
        $available_years = LoginVerification::where('status', 'approved')
            ->whereNotNull('verified_at')
            ->selectRaw('YEAR(verified_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->filter()
            ->values();

        if ($available_years->isEmpty()) {
            $available_years = collect([(int) now()->format('Y')]);
        }

        $selected_year = (int) $request->get('year', $available_years->first());
        if (!$available_years->contains($selected_year)) {
            $selected_year = (int) $available_years->first();
        }

        $search = trim((string) $request->get('search', ''));

        $students = User::with('student_details')
            ->where('role_id', 4)
            ->whereHas('login_verifications', function ($query) use ($selected_year) {
                $query->where('status', 'approved')
                    ->whereYear('verified_at', $selected_year);
            })
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('name', 'like', '%' . $search . '%')
                        ->orWhere('middlename', 'like', '%' . $search . '%')
                        ->orWhere('surname', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('name')
            ->orderBy('surname')
            ->get();

        return view('admin.protocols.index')
            ->with('available_years', $available_years)
            ->with('selected_year', $selected_year)
            ->with('search', $search)
            ->with('students', $students);
    }

    public function show(Request $request, $student_id)
    {
        $student = User::with('student_details')
            ->where('role_id', 4)
            ->findOrFail($student_id);

        $available_years = LoginVerification::where('user_id', $student->id)
            ->where('status', 'approved')
            ->whereNotNull('verified_at')
            ->selectRaw('YEAR(verified_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->filter()
            ->values();

        if ($available_years->isEmpty()) {
            $available_years = collect([(int) now()->format('Y')]);
        }

        $selected_year = (int) $request->get('year', $available_years->first());
        if (!$available_years->contains($selected_year)) {
            $selected_year = (int) $available_years->first();
        }

        $login_attempts = LoginVerification::where('user_id', $student->id)
            ->where('status', 'approved')
            ->whereYear('verified_at', $selected_year)
            ->orderByDesc('verified_at')
            ->get();

        return view('admin.protocols.show')
            ->with('student', $student)
            ->with('available_years', $available_years)
            ->with('selected_year', $selected_year)
            ->with('login_attempts', $login_attempts)
            ->with('search', trim((string) $request->get('search', '')));
    }
}
