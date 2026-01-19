@extends('student.dashboard')

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
</style>
@endsection

@section('content')
<div class="container my-5">
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
                                <span class="badge completed-pill">✓ {{ $completed_course->course->title }}</span>
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
                                <span class="badge progress-pill">□ {{ $in_progress_course->course->title }}</span>
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

    <div class="table-container mx-auto mt-5">
        <h2 class="text-center mb-4">My Courses</h2>
        @foreach ($needed_mandatory_courses as $message)
            <p class="text-danger mb-0">{{ $message }}</p>
        @endforeach
        
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    <tr class="text-center">
                        <th class="text-left">Subject</th>
                        <th>Grade</th>
                        <th>Mandatory</th>
                        <th>Resources</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($in_progress_courses as $in_progress_course) 
                        <tr>
                            <td class="text-left">{{ $in_progress_course->course->title }}</td>
                            <td>{{ auth()->user()->student_details->grade }}</td>
                            <td>{{ $in_progress_course->course->curriculumCourses[0]->required_flag == 1 ? 'Yes' : 'No' }} </td>
                            <td><a href="{{ route('student.single-course',$in_progress_course->id) }}" class="view-link">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection