<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

use App\Application;
use App\Ethnicity;
use App\Exam;
use App\Invoice;
use App\ParentStudent;
use App\StudentDocument;
use App\StudentLocation;
use App\StudentPlan;
use App\User;

class AdminStatisticsController extends Controller
{
    public function statistiscPage() {
        $available_years = User::where('role_id', 4)
            ->whereNotNull('created_at')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year')
            ->filter()
            ->values();

        if ($available_years->isEmpty()) {
            $available_years = collect([(int) now()->format('Y')]);
        }

        $selected_year = (int) request('year', $available_years->first());
        if (!$available_years->contains($selected_year)) {
            $selected_year = (int) $available_years->first();
        }

        $active_students_query = ParentStudent::where('status', ParentStudent::ACTIVE)
            ->whereHas('student', function ($query) use ($selected_year) {
                $query->where('role_id', 4)
                    ->whereYear('created_at', $selected_year);
            });

        $total_active_students = (clone $active_students_query)->count();

        $florida_location_ids = StudentLocation::whereRaw('LOWER(name) = ?', ['florida'])->pluck('id');
        $other_us_location_ids = StudentLocation::whereRaw('LOWER(name) LIKE ?', ['other%u.s.%state%'])->pluck('id');
        $international_location_ids = StudentLocation::whereRaw('LOWER(name) LIKE ?', ['outside%united%states%'])->pluck('id');

        $florida_students = (clone $active_students_query)
            ->whereIn('student_location_id', $florida_location_ids)
            ->count();

        $other_us_students = (clone $active_students_query)
            ->whereIn('student_location_id', $other_us_location_ids)
            ->count();

        $international_students = (clone $active_students_query)
            ->whereIn('student_location_id', $international_location_ids)
            ->count();

        $format_percentage = function ($value) use ($total_active_students) {
            if ($total_active_students === 0) {
                return '0.00%';
            }

            return number_format(($value / $total_active_students) * 100, 2) . '%';
        };

        $active_students_rows = [
            [
                'label' => 'Total Students',
                'value' => $total_active_students,
                'percentage' => $format_percentage($total_active_students),
            ],
            [
                'label' => 'of which: Florida Students',
                'value' => $florida_students,
                'percentage' => $format_percentage($florida_students),
            ],
            [
                'label' => 'of which: Other U.S. State Students',
                'value' => $other_us_students,
                'percentage' => $format_percentage($other_us_students),
            ],
            [
                'label' => 'of which: International Students',
                'value' => $international_students,
                'percentage' => $format_percentage($international_students),
            ],
        ];

        $ethnicity_rows = Ethnicity::orderBy('id')
            ->get()
            ->map(function ($ethnicity) use ($active_students_query, $format_percentage) {
                $count = (clone $active_students_query)
                    ->where('ethnicity_id', $ethnicity->id)
                    ->count();

                return [
                    'label' => $ethnicity->name,
                    'value' => $count,
                    'percentage' => $format_percentage($count),
                ];
            });

        $gender_rows = collect([
            'male' => 'Male',
            'female' => 'Female',
        ])->map(function ($label, $gender) use ($active_students_query, $format_percentage) {
            $count = (clone $active_students_query)
                ->where('gender', $gender)
                ->count();

            return [
                'label' => $label,
                'value' => $count,
                'percentage' => $format_percentage($count),
            ];
        })->values();

        $program_rows = collect([
            1 => '24-Credit Graduation Track',
            2 => '18-Credit ACCEL Track',
            3 => 'International Transfer Program',
            4 => 'Module, Honors & Prep-Courses',
            5 => 'Live Sessions & Coaching',
        ])->map(function ($label, $track) use ($active_students_query, $format_percentage) {
            $count = (clone $active_students_query)
                ->where('track', $track)
                ->count();

            return [
                'label' => $label,
                'value' => $count,
                'percentage' => $format_percentage($count),
            ];
        })->values();

        $graduates_query = ParentStudent::where('status', ParentStudent::GRADUATED)
            ->whereHas('student', function ($query) use ($selected_year) {
                $query->where('role_id', 4)
                    ->whereYear('created_at', $selected_year);
            });

        $total_graduates = (clone $graduates_query)->count();

        $format_graduate_percentage = function ($value) use ($total_graduates) {
            if ($total_graduates === 0) {
                return '0.00%';
            }

            return number_format(($value / $total_graduates) * 100, 2) . '%';
        };

        $graduate_florida_students = (clone $graduates_query)
            ->whereIn('student_location_id', $florida_location_ids)
            ->count();

        $graduate_other_us_students = (clone $graduates_query)
            ->whereIn('student_location_id', $other_us_location_ids)
            ->count();

        $graduate_international_students = (clone $graduates_query)
            ->whereIn('student_location_id', $international_location_ids)
            ->count();

        $graduate_rows = [
            [
                'label' => 'Total Students',
                'value' => $total_graduates,
                'percentage' => $format_graduate_percentage($total_graduates),
            ],
            [
                'label' => 'of which: Florida Students',
                'value' => $graduate_florida_students,
                'percentage' => $format_graduate_percentage($graduate_florida_students),
            ],
            [
                'label' => 'of which: Other U.S. State Students',
                'value' => $graduate_other_us_students,
                'percentage' => $format_graduate_percentage($graduate_other_us_students),
            ],
            [
                'label' => 'of which: International Students',
                'value' => $graduate_international_students,
                'percentage' => $format_graduate_percentage($graduate_international_students),
            ],
        ];

        $graduate_ethnicity_rows = Ethnicity::orderBy('id')
            ->get()
            ->map(function ($ethnicity) use ($graduates_query, $format_graduate_percentage) {
                $count = (clone $graduates_query)
                    ->where('ethnicity_id', $ethnicity->id)
                    ->count();

                return [
                    'label' => $ethnicity->name,
                    'value' => $count,
                    'percentage' => $format_graduate_percentage($count),
                ];
            });

        $graduate_gender_rows = collect([
            'male' => 'Male',
            'female' => 'Female',
        ])->map(function ($label, $gender) use ($graduates_query, $format_graduate_percentage) {
            $count = (clone $graduates_query)
                ->where('gender', $gender)
                ->count();

            return [
                'label' => $label,
                'value' => $count,
                'percentage' => $format_graduate_percentage($count),
            ];
        })->values();

        $graduate_program_rows = collect([
            1 => '24-Credit Graduation Track',
            2 => '18-Credit ACCEL Track',
            3 => 'International Transfer Program',
            4 => 'Module, Honors & Prep-Courses',
            5 => 'Live Sessions & Coaching',
        ])->map(function ($label, $track) use ($graduates_query, $format_graduate_percentage) {
            $count = (clone $graduates_query)
                ->where('track', $track)
                ->count();

            return [
                'label' => $label,
                'value' => $count,
                'percentage' => $format_graduate_percentage($count),
            ];
        })->values();

        $graduate_student_ids = (clone $graduates_query)->pluck('student_id');
        $latest_graduate_plans = StudentPlan::whereIn('student_id', $graduate_student_ids)
            ->orderByDesc('id')
            ->get()
            ->unique('student_id');

        $graduate_track_rows = collect([
            1 => 'Core',
            2 => 'Pro',
            3 => 'Elite',
        ])->map(function ($label, $plan_id) use ($latest_graduate_plans, $format_graduate_percentage) {
            $count = $latest_graduate_plans->where('plan_id', $plan_id)->count();

            return [
                'label' => $label,
                'value' => $count,
                'percentage' => $format_graduate_percentage($count),
            ];
        })->values();

        $applications_count = 0;
        if (Schema::hasTable('applications')) {
            $applications_query = Application::query();

            if (Schema::hasColumn('applications', 'created_at')) {
                $applications_query->whereYear('created_at', $selected_year);
            }

            $applications_count = $applications_query->count();
        }

        $enrollments_count = ParentStudent::whereIn('status', [ParentStudent::ACTIVE, ParentStudent::GRADUATED])
            ->whereHas('student', function ($query) use ($selected_year) {
                $query->where('role_id', 4)
                    ->whereYear('created_at', $selected_year);
            })
            ->count();

        $conversion_rate = $applications_count > 0
            ? number_format(($enrollments_count / $applications_count) * 100, 2) . '%'
            : '0.00%';

        $new_enrollments_count = ParentStudent::whereIn('status', [ParentStudent::ACTIVE, ParentStudent::GRADUATED])
            ->whereHas('student', function ($query) use ($selected_year) {
                $query->where('role_id', 4)
                    ->whereYear('created_at', $selected_year);
            })
            ->count();

        $withdrawals_count = 0;
        if (Schema::hasColumn('student_documents', 'created_at')) {
            $withdrawals_count = StudentDocument::where('type', 7)
                ->whereYear('created_at', $selected_year)
                ->count();
        }

        $net_growth_count = $new_enrollments_count - $withdrawals_count - $total_graduates;

        $twelfth_grade_students_query = ParentStudent::where('grade', 12)
            ->whereHas('student', function ($query) use ($selected_year) {
                $query->where('role_id', 4)
                    ->whereYear('created_at', $selected_year);
            });

        $twelfth_grade_student_ids = (clone $twelfth_grade_students_query)->pluck('student_id');
        $twelfth_grade_graduates_count = ParentStudent::where('status', ParentStudent::GRADUATED)
            ->whereIn('student_id', $twelfth_grade_student_ids)
            ->count();

        $twelfth_grade_total_count = $twelfth_grade_student_ids->count();

        $graduation_rate = $twelfth_grade_total_count > 0
            ? number_format(($twelfth_grade_graduates_count / $twelfth_grade_total_count) * 100, 2) . '%'
            : '0.00%';

        $graduate_student_ids_for_gpa = (clone $graduates_query)->pluck('student_id');
        $average_gpa = Exam::whereIn('student_id', $graduate_student_ids_for_gpa)
            ->where('status', Exam::STATUS_EVALUATED)
            ->whereNotNull('grade')
            ->avg('grade');

        $average_gpa = number_format((float) ($average_gpa ?? 0), 2);

        $revenue_query = Invoice::query()
            ->where(function ($query) {
                $query->whereNull('is_memo')
                    ->orWhere('is_memo', 0);
            });
        if (Schema::hasColumn('invoices', 'created_at')) {
            $revenue_query->whereYear('created_at', $selected_year);
        }

        $total_revenue = (float) (clone $revenue_query)->sum('price');

        $format_revenue_percentage = function ($value) use ($total_revenue) {
            if ($total_revenue <= 0) {
                return '0.00%';
            }

            return number_format(($value / $total_revenue) * 100, 2) . '%';
        };

        $track_24_revenue = (float) (clone $revenue_query)
            ->where('description', 'like', 'Enrollment fee and %')
            ->whereIn('user_id', ParentStudent::where('track', 1)->pluck('parent_id'))
            ->sum('price');

        $track_18_revenue = (float) (clone $revenue_query)
            ->where('description', 'like', 'Enrollment fee and %')
            ->whereIn('user_id', ParentStudent::where('track', 2)->pluck('parent_id'))
            ->sum('price');

        $transfer_revenue = (float) (clone $revenue_query)
            ->where('description', 'Transfer program enrollment')
            ->sum('price');

        $module_revenue = (float) (clone $revenue_query)
            ->where('description', 'Single course service')
            ->sum('price');

        $live_sessions_revenue = (float) (clone $revenue_query)
            ->where('description', 'Services for group/mentoring/coaching sessions')
            ->sum('price');

        $revenue_rows = [
            [
                'label' => 'Total Revenue',
                'value' => $total_revenue,
                'percentage' => $format_revenue_percentage($total_revenue),
            ],
            [
                'label' => 'of which: 24-Credit Graduation Track',
                'value' => $track_24_revenue,
                'percentage' => $format_revenue_percentage($track_24_revenue),
            ],
            [
                'label' => '18-Credit ACCEL Track',
                'value' => $track_18_revenue,
                'percentage' => $format_revenue_percentage($track_18_revenue),
            ],
            [
                'label' => 'International Transfer Program',
                'value' => $transfer_revenue,
                'percentage' => $format_revenue_percentage($transfer_revenue),
            ],
            [
                'label' => 'Module, Honors & Prep-Courses',
                'value' => $module_revenue,
                'percentage' => $format_revenue_percentage($module_revenue),
            ],
            [
                'label' => 'Live Sessions & Coaching',
                'value' => $live_sessions_revenue,
                'percentage' => $format_revenue_percentage($live_sessions_revenue),
            ],
        ];

        $staff_counts = function ($query) {
            return [
                'employees' => (clone $query)->where('employment_type', 1)->count(),
                'freelancers' => (clone $query)->where('employment_type', 0)->count(),
            ];
        };

        $staff_rows = [
            [
                'label' => 'Educators Grades 9-12',
                'counts' => $staff_counts(
                    User::where('role_id', 5)->where(function ($query) {
                        $query->whereNull('is_counsellor')->orWhere('is_counsellor', 0);
                    })
                ),
            ],
            [
                'label' => 'Librarians & Media Specialists',
                'counts' => [
                    'employees' => 0,
                    'freelancers' => 0,
                ],
            ],
            [
                'label' => 'Guidance Counsellors',
                'counts' => $staff_counts(User::where('role_id', 5)->where('is_counsellor', 1)),
            ],
            [
                'label' => 'Administrators',
                'counts' => $staff_counts(User::where('role_id', 1)),
            ],
        ];

        $total_educators = array_sum($staff_rows[0]['counts']);
        $total_librarians = array_sum($staff_rows[1]['counts']);
        $total_counsellors = array_sum($staff_rows[2]['counts']);
        $total_administrators = array_sum($staff_rows[3]['counts']);

        $format_ratio = function ($staff_total, $suffix) use ($total_active_students) {
            if ($staff_total <= 0) {
                return 'N/A';
            }

            return number_format($total_active_students / $staff_total, 2) . ' ' . $suffix;
        };

        $metric_rows = [
            [
                'label' => 'Educators-to-Student Ratio',
                'value' => $format_ratio($total_educators, 'Students/Educator'),
            ],
            [
                'label' => 'Librarians-to-Student Ratio',
                'value' => $format_ratio($total_librarians, 'Students/Librarian'),
            ],
            [
                'label' => 'Counsellors-to-Student Ratio',
                'value' => $format_ratio($total_counsellors, 'Students/Counsellor'),
            ],
            [
                'label' => 'Administrators-to-Student Ratio',
                'value' => $format_ratio($total_administrators, 'Students/Administrator'),
            ],
        ];

        return view('admin.statistics')
            ->with('available_years', $available_years)
            ->with('selected_year', $selected_year)
            ->with('active_students_rows', $active_students_rows)
            ->with('ethnicity_rows', $ethnicity_rows)
            ->with('gender_rows', $gender_rows)
            ->with('program_rows', $program_rows)
            ->with('graduate_rows', $graduate_rows)
            ->with('graduate_ethnicity_rows', $graduate_ethnicity_rows)
            ->with('graduate_gender_rows', $graduate_gender_rows)
            ->with('graduate_program_rows', $graduate_program_rows)
            ->with('graduate_track_rows', $graduate_track_rows)
            ->with('applications_count', $applications_count)
            ->with('enrollments_count', $enrollments_count)
            ->with('conversion_rate', $conversion_rate)
            ->with('new_enrollments_count', $new_enrollments_count)
            ->with('withdrawals_count', $withdrawals_count)
            ->with('net_growth_count', $net_growth_count)
            ->with('graduation_rate', $graduation_rate)
            ->with('average_gpa', $average_gpa)
            ->with('revenue_rows', $revenue_rows)
            ->with('staff_rows', $staff_rows)
            ->with('metric_rows', $metric_rows);
    }
}
