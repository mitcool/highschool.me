@extends('parent.dashboard')

@section('css')
<style>
    .custom-form-label{
        border:1px solid lightgray;
        padding:8px;
        margin-right: 10px;
        border-radius: 8px;
        cursor: pointer;
    }
    .custom-file-input{
        position: absolute;
        left: -9999px;  
    }
    label{
        margin-bottom: 0!important;
    }
    .error-message{
        color:red;
        font-size:0.7rem;
    }
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
    .enrolled-courses-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 6px 22px rgba(13, 38, 76, 0.10);
        padding: 18px 16px 10px;
        margin-top: 50px;
        overflow: hidden;
    }
    .enrolled-courses-title {
        color: #045397;
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 16px;
    }
    .enrolled-courses-table {
        margin-bottom: 0;
    }
    .enrolled-courses-table thead th {
        border-top: none !important;
        border-bottom: 2px solid #d9dde5;
        color: #223a5f;
        font-size: .98rem;
        font-weight: 700;
        padding: 10px 14px;
        white-space: nowrap;
    }
    .enrolled-courses-table tbody td {
        border-top: none !important;
        border-bottom: 1px solid #d9dde5;
        color: #3b4960;
        font-size: .98rem;
        padding: 10px 14px;
        vertical-align: middle;
    }
    .enrolled-courses-table tbody tr:last-child td {
        border-bottom: none;
    }
    .enrolled-course-name {
        color: #34425a;
        min-width: 260px;
    }
    .enrolled-course-status {
        color: #4a5870;
        font-weight: 500;
    }
    .course-pill {
        display: inline-block;
        min-width: 92px;
        text-align: center;
        border-radius: 6px;
        padding: 5px 10px;
        font-size: .82rem;
        font-weight: 600;
        line-height: 1.2;
        border: none;
    }
    .course-pill-self-pending,
    .course-pill-action-pending {
        background: #d9d9d9;
        color: #fff;
    }
    .course-pill-self-results {
        background: #13b7c8;
        color: #fff;
    }
    .course-pill-action-start {
        background: #045397;
        color: #fff;
    }
    .course-pill-action-ready {
        background: #f36a10;
        color: #fff;
    }
    .course-pill-action-date {
        background: #f7b348;
        color: #fff;
    }
    .course-pill-action-results {
        background: #2dbb16;
        color: #fff;
    }
    .course-pill-empty {
        color: #a8b0bf;
        font-size: .9rem;
    }
    .course-action-form {
        margin: 0;
    }
    .course-action-button {
        cursor: pointer;
    }
    .course-action-cell {
        text-align: right;
        white-space: nowrap;
    }
    @media (max-width: 767.98px) {
        .enrolled-courses-card {
            padding: 16px 10px 8px;
            border-radius: 14px;
        }
        .enrolled-courses-title {
            font-size: 1.6rem;
            margin-bottom: 12px;
        }
        .enrolled-courses-table thead th,
        .enrolled-courses-table tbody td {
            padding: 9px 8px;
            font-size: .92rem;
        }
        .enrolled-course-name {
            min-width: 220px;
        }
        .course-pill {
            min-width: 82px;
            font-size: .78rem;
            padding: 5px 8px;
        }
    }
</style>
@endsection
@section('content')

<div class="container shadow wrapper h-100">
    <div class="page-content">
        {{-- Student Details --}}
        <div class="d-flex justify-content-between">
            <div>
                <h4 style="color:#045397">{{ $student->fullname() }} </h4>
                @if($student->date_of_birth) <p class="mb-0">Born: {{ $student->date_of_birth->format('d.m.Y')}}</p> @endif
                @if($student->student_details->track == 1 || $student->student_details->track == 2) 
                    <p class="mb-0">Grade: {{ $student->student_details->grade }}</p>
                @endif
            </div>
            <div>
                @if($student->student_details->track == 4 || $student->student_details->track == 5) 
                    <a class="orange-button" href="{{ route('parent.select-track',$student->id) }}">Start Now </a>
                @endif
            </div>
        </div>
        
        
        <hr>
        @if(($student->student_details->track == 1 || $student->student_details->track == 2) && $status == 3)
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endif
      
    </div>
    
    {{-- Pending documentation approval --}}
    @if($status == 1)
    <div class="page-content">
        <h4 style="color:#E9580C">Pending Documentation Approval</h4>
        <p class="mb-0">This account is currently under review. You will be notified once the documents have been reviewed.</p>
        {{-- @if($student->student_details->feedback)
            <p class="mb-0 text-danger">{{ $student->student_details->feedback }}</p>
        @endif --}}
    </div>
            
    {{-- Pending enrollemnt and plan fee to be paind --}}
    @elseif($status == 2)
    <div class="page-content">
        <h4 style="color:#E9580C">Documentation is Approved</h4>
        @if($student->student_details->track == 3)
            <form action="{{ route('parent.transfer-program-pay',$student->id) }}" method="POST">
                {{ csrf_field() }}
                <p>The documentation for this student is approved. You must pay the following fees:</p>
                <input type="radio" checked readonly class="radio"> Enrolment Fee <span style="color:#E9580C">($300.00)</span> 
                <p>Mandatory International Transfer Program Fee:</p>
                 @foreach($plans as $key => $plan)
                    <div>
                        <input class="plans" value="{{ $plan->id }}" type="radio" {{ $key == 0 ? ' checked ' : '' }} name="plan" data-price-per-year="{{ $plan->price_per_year }}" data-price-per-month="{{ $plan->price_per_month }}"> {{ $plan->name }} Package (${{ $plan->price_per_year() }})
                    </div> 
                @endforeach
                <p class="mb-0 font-weight-bold mt-3">Please select Monthly or Yearly Plan:</p>
                <div>
                    <input type="radio" checked name="payment_type" class="payment-type" value="0"> Monthly Fee 
                </div>
                <div>
                    <input type="radio" name="payment_type" class="payment-type" value="1"> Yearly Fee 
                </div>
                <p class="mb-0 font-weight-bold mt-3">You can find more information about the Payment Plans <a target="_blank" href="{{ route('standard-high-school') }}">HERE.</a></p>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="total">
                        Total Fee:  <span id="total-transfer-program">$2200.00</span>
                    </div>
                    <button class="orange-button">Proceed to Payment</button>
                </div>
            </form>
        @else
            <p>The documentation for this student is approved. Please select your plan:</p>
            <p class="mb-0 font-weight-bold mt-3">You must pay mandatory Enrolment Fee:</p>
            <form action="{{ route('parent.pay.plan',$student->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="radio" checked readonly class="radio"> Enrolment Fee <span style="color:#E9580C">($300.00)</span> 
                <p class="mb-0 font-weight-bold mt-3">Please select your preferred Package:</p>
                @foreach($plans as $key => $plan)
                    <div>
                        <input class="plans" value="{{ $plan->id }}" type="radio" {{ $key == 0 ? ' checked ' : '' }} name="plan" data-price-per-year="{{ $plan->price_per_year }}" data-price-per-month="{{ $plan->price_per_month }}"> {{ $plan->name }} Package (${{ $plan->price_per_year() }})
                    </div> 
                @endforeach
                <p class="mb-0 font-weight-bold mt-3">Please select Monthly or Yearly Plan:</p>
                <div>
                    <input type="radio" checked name="payment_type" class="payment-type" value="0"> Monthly Fee 
                </div>
                <div>
                    <input type="radio" name="payment_type" class="payment-type" value="1"> Yearly Fee 
                </div>
                <p class="mb-0 font-weight-bold mt-3">You can find more information about the Payment Plans <a target="_blank" href="{{ route('standard-high-school') }}">HERE.</a></p>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="total">
                        Total: <span id="total"></span>
                    </div>
                    <button class="orange-button">Proceed to Payment</button>
                </div>
            </form>
       @endif
    </div>
        
    {{-- Active Student --}}
    @elseif($status == 3)
        @if($student->student_details->track == 5)
        <p>The student have </p>
        @else
            <x-enrollment-table :student="$student"></x-enrollment-table>
            @if(count($student->enrolled_courses) > 0)
                @php
                    $status_labels = [
                        0 => 'Pending',
                        1 => 'Started',
                        2 => 'Started',
                        3 => 'Started',
                        4 => 'Started',
                        5 => 'Completed',
                    ];
                    $curriculum_type_labels = [
                        'AP' => 'AP',
                        'CTE' => 'CTE',
                        'CLEP' => 'CLEP',
                        'PSAT' => 'PSAT',
                        'SAT' => 'SAT',
                        'PREACT' => 'PreACT',
                        'ACT' => 'ACT',
                        'ESOL' => 'ESOL',
                    ];
                @endphp
                <div class="enrolled-courses-card">
                    <h2 class="enrolled-courses-title">Enrolled Courses</h2>
                    <div class="table-responsive">
                        <table class="table enrolled-courses-table">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Self-Exam</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->enrolled_courses as $enrolled_course)
                                    @php
                                        $curriculum_type_code = optional(optional($enrolled_course->course)->curriculumType)->code;
                                        $course_type = $curriculum_type_labels[$curriculum_type_code] ?? (optional($enrolled_course->course)->required_flag ? 'Core' : 'Elective');
                                        $pre_exam_state = $pre_exam_states[$enrolled_course->id] ?? null;
                                        $pre_exam_exam_id = $pre_exam_exam_ids[$enrolled_course->id] ?? null;
                                        $action_exam_date = $action_exam_dates[$enrolled_course->id] ?? null;
                                    @endphp
                                    <tr>
                                        <td class="enrolled-course-name">{{ $enrolled_course->course->course->title }}</td>
                                        <td>{{ $course_type }}</td>
                                        <td class="enrolled-course-status">{{ $status_labels[$enrolled_course->status] ?? 'Pending' }}</td>
                                        <td>
                                            @if($pre_exam_state === 'results')
                                                <a href="{{ route('parent.student.pre-exam', [$student->id, $pre_exam_exam_id]) }}" class="course-pill course-pill-self-results text-decoration-none">Results</a>
                                            @elseif($pre_exam_state === 'pending')
                                                <span class="course-pill course-pill-self-pending">Pending</span>
                                            @else
                                                <span class="course-pill-empty">-</span>
                                            @endif
                                        </td>
                                        <td class="course-action-cell">
                                            @if($enrolled_course->status == 0)
                                                <form action="{{ route('update-enrolled-course-status',$enrolled_course->id) }}" method="POST" class="confirm-first course-action-form">
                                                    {{ csrf_field() }}
                                                    <button class="course-pill course-pill-action-start course-action-button">Start Study</button>
                                                </form>
                                            @elseif($enrolled_course->status == 1)
                                                <form action="{{ route('update-enrolled-course-status',$enrolled_course->id) }}" method="POST" class="confirm-first course-action-form">
                                                    {{ csrf_field() }}
                                                    <button class="course-pill course-pill-action-ready course-action-button">Ready for Exam</button>
                                                </form>
                                            @elseif($enrolled_course->status == 2)
                                                <span class="course-pill course-pill-action-pending">Pending</span>
                                            @elseif($enrolled_course->status == 3)
                                                <span class="course-pill course-pill-action-date">{{ $action_exam_date ?: 'Pending' }}</span>
                                            @elseif($enrolled_course->status == 4)
                                                <span class="course-pill course-pill-action-pending">Pending</span>
                                            @elseif($enrolled_course->status == 5)
                                                <span class="course-pill course-pill-action-results">Exam Results</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endif
    {{-- Reupload documents --}}
    @elseif($status == 4)
        <form action="{{ route('parent.reupload.document',$student->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if($student->student_details->feedback)
                <p class="text-danger">{{ $student->student_details->feedback }}</p>
            @endif
            @foreach ($student->documents as $document )
                @if($document->is_approved == 2)
                <div class="mb-3 d-flex  justify-content-between">
                    <label for="document-{{ $document->id }}"  class="font-weight-bold mb-0 "> {{ $document->document_type->name }} <span class="text-danger">*</span></label>
                    <label for="document-{{ $document->id }}" class="custom-form-label">
                        <i class="fas fa-upload"></i> Upload File
                    </label>
                    <input name="documents[]" class="d-none custom-file-input" required type="file" id="document-{{ $document->id }}"">
                    <input type="hidden" name="types[]" value="{{ $document->type }}">
                </div>
                @endif
            @endforeach
            <p><span class="text-danger">*</span> Required fields</p>
            <hr>
            <div class="text-right">
                <button class="shadow orange-button">Send</button>
            </div>
        </form>
    @endif
    </div>
</div>
@endsection

@section('scripts')

@if($student->student_details->track == 3)
<script>
    let plan  = $('input[class=plans]:checked').attr('data-price-per-year');
    let total = Number(plan) + 300;
    $('#total-transfer-program').html('$' + total.toFixed(2));

    $('.plans').on('click',function(){
        let type_of_payment = $('.payment-type:checked')
        let plan = type_of_payment.val() == 0 
            ? $('input[class=plans]:checked').attr('data-price-per-month') 
            : $('input[class=plans]:checked').attr('data-price-per-year');
         let total = Number(plan) + 300;
        $('#total-transfer-program').html('$' + total.toFixed(2));
    });
    $('.payment-type').on('click',function(){
         let type_of_payment = $('.payment-type:checked')
         let plan = type_of_payment.val() == 0 
            ? $('input[class=plans]:checked').attr('data-price-per-month') 
            : $('input[class=plans]:checked').attr('data-price-per-year');
        let total = Number(plan) + 300;
       $('#total-transfer-program').html('$' + total.toFixed(2));
    })
</script>
@endif
<script>
    $(document).ready(function(){
        let payment_type = $('input[name=payment_type]:checked').val();
        let plan =  $('input[name=plan]:checked').attr('data-price-per-month');
        let total = Number(plan) + 300;
        $('#total').html('$' + total.toFixed(2));
        $('#total-without-enrollment').html('$' + Number(plan).toFixed(2));

        $('.plans').on('click',function(){
            let payment_type = $('input[name=payment_type]:checked').val();
            let plan_price = payment_type == 0 ? $(this).attr('data-price-per-month') : $(this).attr('data-price-per-year');
            let total = Number(plan_price) + 300;
            $('#total').html('$' + total.toFixed(2));
        });

        $('.payment-type').on('click',function(){
            let payment_type = $(this).val();
            let plan =  $('input[name=plan]:checked');
            let plan_price = payment_type == 0 ? plan.attr('data-price-per-month') : plan.attr('data-price-per-year');
            let total = Number(plan_price) + 300;
            $('#total').html('$' + total.toFixed(2));
        });
        
        $('.custom-file-input').on('change',function(){
            var file = this.files[0];
            $('.error-message').html('')
            if (file) {
                var fileName = file.name;          
                var fileExtension = fileName.split('.').pop(); 
                if(fileExtension != 'pdf'){
                    alert('Please upload pdf file');
                }
                else{
                    if(fileName.length > 10){
                        fileName = fileName.substring(0,8)+'...'+fileExtension
                    }
                    $(this).closest('div').find('.custom-form-label')
                            .css('color','#fff')
                            .css('background','#28a745')
                            .html(fileName)
                }
            }
            else{
                return;
            }
        });

        $('.enroll-form').on('submit',function(){
            $(this).find('button').attr('disabled','true');
        })
    })
</script>
@endsection