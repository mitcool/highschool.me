@extends('educator.dashboard')
@section('css')
<style>
    body {
        background-color: #fcfcfc;
        color: #212529;
    }

    h2, h3, h4 {
        color: #004c99;
        font-weight: 700;
    }

    .section-spacer {
        margin-top: 60px;
        margin-bottom: 40px;
        border-top: 2px dashed #ddd;
        padding-top: 40px;
    }

    /* =========================================
        MY COURSES TABLE
        ========================================= */
    .table-container {
        max-width: 650px;
        margin: 0 auto;
    }

    .course-table {
        width: 100%;
    }

    .course-table thead th {
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 10px;
        font-weight: 500;
        color: #495057;
        border-top: none;
    }

    .course-table tbody tr {
        border-bottom: 1px solid #dee2e6;
    }

    .course-table tbody tr:last-child {
        border-bottom: none;
    }

    .course-table tbody td {
        padding: 12px 0;
        border-top: none !important; 
    }

    .view-link {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }
    .view-link:hover { text-decoration: underline; }

    /* =========================================
        PROGRESS BAR
        ========================================= */

    .graduation-card {
        border-radius: 14px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        border: none;
    }

    .graduation-progress {
        height: 18px;
        border-radius: 10px;
        background: #f1f1f1;
    }
    .graduation-progress .progress-bar { border-radius: 10px; }

    .credits-label{
        position:absolute;
        top:-2px;
        right:0;
        font-size:13px;
        font-weight:600;
        padding-right: 7px;
    }

    .accordion-card { border: 0; border-radius: 10px; overflow: hidden; }
    .accordion-header {
        background: transparent;
        border: 0;
        padding: 0;
    }

    .accordion-toggle{
        padding: 12px 0;
        font-weight: 600;
        color: #0d6efd;
        text-decoration: none !important;
        outline: none !important;
        box-shadow: none !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .accordion-toggle:hover{ text-decoration:none; }

    .accordion-toggle .chev { transition: transform .2s ease; color:#0d6efd; }
    .chev { font-size: 30px; }
    .accordion-toggle.collapsed .chev { transform: rotate(180deg); }

    .badge-wrap { gap: 14px; }

    .completed-pill, .progress-pill{
        font-size: 13px;
        padding: 10px 14px;
        border-radius: 6px;
        font-weight: 500;
        white-space: normal;
    }

    .completed-pill{ background:#19a319; color:#fff; }
    .progress-pill{ background:#f3f3f3; color:#000; }

    .accordion-card {
        border: 1px solid #00000029;
        border-radius: 10px;
    }

    .student-grade-control {
        max-width: 320px;
        margin-top: 12px;
    }

    .student-grade-feedback {
        display: none;
        margin-top: 8px;
        font-size: 14px;
    }
</style>
@endsection
@section('content')
<div class="shadow container wrapper">    
	<h2 class="text-center mb-3 ">Student Information</h2>
    <div class="row">
        <div class="col-md-6">
            <h5>Student Name: <span style="color:#004c99;font-weight:bold">{{ $student->fullname() }}</span></h5>
            <h5>Email: <span style="color:#004c99;font-weight:bold">{{ $student->email }}</span></h5>
            <h5>Born: {{ $student->date_of_birth->format('d.m.Y') }}</h5>
            <h5>Joined: {{ $student->created_at->format('d.m.Y') }}</h5>
            <div class="student-grade-control">
                <label for="student-grade-select" class="font-weight-bold mb-1">Grade</label>
                @if($student->student_details && $student->student_details->usesTransferProgramGradeRule())
                    <select class="form-control" disabled>
                        <option selected>International Transfer Program</option>
                    </select>
                @else
                    <select
                        id="student-grade-select"
                        class="form-control"
                        data-student-id="{{ $student->id }}"
                        data-update-url="{{ route('admin.single-student-grade.update', $student->id) }}"
                    >
                        <option value="" disabled {{ is_null(optional($student->student_details)->grade) ? 'selected' : '' }}>Please select</option>
                        @foreach($grade_levels as $grade_level)
                            <option value="{{ $grade_level }}" {{ (int) optional($student->student_details)->grade === $grade_level ? 'selected' : '' }}>
                                {{ $grade_level }}th Grade
                            </option>
                        @endforeach
                    </select>
                @endif
                <div id="student-grade-feedback" class="student-grade-feedback"></div>
            </div>
        </div>
         <div class="col-md-6">
            <h5> Parent Name: <span style="color:#004c99;;font-weight:bold">{{ $student->student_details->parent->fullname() }}</span>
            </h5>
        </div>
    </div>
	<hr>
    <a href="{{ route('admin.single-student-uploaded-documents', $student->id) }}">View Uploaded documents</a>
    <hr>
    <h2 class="">Degrees and Courses</h2>
   <div class="card graduation-card p-4">
        <h2 class="text-center mb-4">Graduation Process</h2>
        <div class="position-relative mb-4">
            <div class="progress graduation-progress">
                <div class="progress-bar bg-success" style="width:{{ $credits['completed_credits'] / $credits['needed_credits'] * 100 }}%"></div>
            </div>
            <span class="credits-label">{{ $credits['completed_credits'] }}/{{ $credits['needed_credits'] }} Credits</span>
        </div>

        <div id="graduationAccordion">
            <div class="card accordion-card">
                <div class="card-header accordion-header" id="headingOne">
                    <button class="btn btn-link accordion-toggle w-100 text-left" data-toggle="collapse" data-target="#completedCourses" aria-expanded="true" aria-controls="completedCourses">
                        Completed
                        <span class="chev">▴</span>
                    </button>
                </div>

                <div id="completedCourses" class="collapse show" aria-labelledby="headingOne" data-parent="#graduationAccordion">
                    <div class="card-body pt-3">
                        <div class="d-flex flex-wrap badge-wrap">
                            @foreach($completed_courses as $completed_course)
                                <span class="badge completed-pill">✓ {{ $completed_course->course->course->title }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="card accordion-card mt-3">
                <div class="card-header accordion-header" id="headingTwo">
                    <button class="btn btn-link accordion-toggle w-100 text-left collapsed" data-toggle="collapse" data-target="#inProgressCourses" aria-expanded="false" aria-controls="inProgressCourses">
                        In Progress
                        <span class="chev">▴</span>
                    </button>
                </div>

                <div id="inProgressCourses" class="collapse" aria-labelledby="headingTwo" data-parent="#graduationAccordion">
                    <div class="card-body pt-3">
                        <div class="d-flex flex-wrap badge-wrap">
                            @foreach($in_progress_courses as $in_progress_course)
                                <span class="badge progress-pill">□ {{ $in_progress_course->course->course->title }}</span>
                                {{-- <span class="badge progress-pill">□ Anatomy &amp; Physiology</span>
                                <span class="badge progress-pill">□ World History</span>
                                <span class="badge progress-pill">□ U.S. Government</span> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center my-4">Course list</h2>
        <table class="table">
            <tr>
                <th>Subject</th>
                <th>Mandatory</th>
                <th>Status</th>
                <th>Exam Protocol</th>
                <th>Final Grade</th>
            </tr>
                @foreach ($student_enrolled_courses as $enrolled_course)
                    <tr>
                        <td>{{ $enrolled_course->course->course->title }} </td>
                        <td>{{ $enrolled_course->course->required_flag == 1 ? 'Yes' : 'No' }}</td>
                        <td>
                            @if($enrolled_course->status ==5 )
                                Completed
                            @elseif($enrolled_course->status <= 1)
                                Pending
                            @else
                                In progress
                            @endif
                        </td>
                        <td>
                            @if($enrolled_course->status == 5) <a href="{{ route('exam-protocol',$enrolled_course->passed_exam->id) }}">View</a> @endif
                        </td>
                        <td>{{ $enrolled_course->status == 5 ?  $enrolled_course->passed_exam->grade : '' }}</td>
                    </tr>
                @endforeach
        </table>

        <div class="text-center">
            <a href="{{ route('admin-student-overview') }}" class="btn btn-outline-secondary me-2">Close</a>
        </div>
</div>


@endsection
@section('scripts')
<script>
    $(function () {
        const $gradeSelect = $('#student-grade-select');
        const $feedback = $('#student-grade-feedback');

        if (!$gradeSelect.length) {
            return;
        }

        let previousValue = $gradeSelect.val();

        $gradeSelect.on('change', function () {
            const newValue = $(this).val();

            $.ajax({
                url: $(this).data('update-url'),
                method: 'POST',
                data: {
                    grade: newValue
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    previousValue = newValue;
                    $feedback
                        .removeClass('text-danger')
                        .addClass('text-success')
                        .text(response.message)
                        .show();
                },
                error: function (xhr) {
                    $gradeSelect.val(previousValue);

                    let message = 'Unable to update the student grade.';

                    if (xhr.responseJSON) {
                        if (xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        } else if (xhr.responseJSON.errors && xhr.responseJSON.errors.grade && xhr.responseJSON.errors.grade.length) {
                            message = xhr.responseJSON.errors.grade[0];
                        }
                    }

                    $feedback
                        .removeClass('text-success')
                        .addClass('text-danger')
                        .text(message)
                        .show();
                }
            });
        });
    });
</script>
@endsection
