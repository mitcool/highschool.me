
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
           4. MY COURSES TABLE
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
           5. ENROLL PAGE (Tabs & Accordion)
           ========================================= */
        /* Tabs */
        .custom-tabs {
            justify-content: center;
            margin-bottom: 20px;
        }

        /* BS4 Nav Pills spacing */
        .custom-tabs .nav-item {
            margin: 0 4px;
        }

        .custom-tabs .nav-link {
            background-color: white;
            color: #004c99;
            font-weight: 600;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 8px 16px;
        }

        .custom-tabs .nav-link.active {
            background-color: #e65100;
            color: #fff;
        }

        /* Accordion - Adapted for BS4 Card Structure */
        .custom-accordion .card {
            border: none;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .custom-accordion .card-header {
            background-color: white;
            border-bottom: none;
            padding: 0;
        }

        .custom-accordion .btn-header {
            color: #004c99;
            font-size: 1.1rem;
            font-weight: 500;
            text-decoration: none;
            width: 100%;
            text-align: left;
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-accordion .btn-header:hover, 
        .custom-accordion .btn-header:focus {
            text-decoration: none;
            box-shadow: none;
        }

        .custom-accordion .btn-header::after {
            content: '';
            width: 16px;
            height: 16px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23004c99'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: contain;
            transition: transform 0.2s;
        }

        .custom-accordion .btn-header.collapsed::after {
            transform: rotate(-90deg);
        }

        .course-row {
            padding: 15px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .course-row:last-child { border-bottom: none; }

        .credit-text { color: #4dabf7; font-weight: 400; }

        .btn-enroll {
            background-color: #cc4400;
            color: white;
            border: none;
            font-weight: 600;
            padding: 5px 20px;
            border-radius: 6px;
        }
        .btn-enroll:hover {
            background-color: #b33b00;
            color: white;
        }
        .btn-enrolled {
            background-color: #f3f3f3;
            color: white;
            border: none;
            font-weight: 600;
            padding: 5px 20px;
            border-radius: 6px;
        }
        .btn-transfer-back{
            background-color: #DC3546;
            color: white;
            border: none;
            font-weight: 600;
            padding: 5px 20px;
            border-radius: 6px;
        }
</style>
 @if($track == 3)
    <div class="container my-5">
    
    <h4 class="text-center mb-4">Transfer subjects</h4>   
    @foreach($transfer_program_courses as $tpc)
      <div class="course-row d-flex justify-content-between align-items-center">
            <div>
                {{ $tpc->course->title }}
                {{-- @if(!is_null($credits))
                    <span class="credit-text">
                        ({{ number_format($credits, 1) }} Credit{{ $credits == 1 ? '' : 's' }})
                    </span>
                @endif --}}
            </div>
            @if(in_array($tpc->id,$enrolled_courses_ids))
                <button id="transfer-{{ $tpc->id }}" class="btn btn-transfer-back" data-student-id="{{ $student->id }}" data-course-id="{{ $tpc->id }}">Transfer Back</button>
            @else
                <button id="transfer-{{ $tpc->id }}" class="btn btn-enroll btn-transfer" data-student-id="{{ $student->id }}" data-course-id="{{ $tpc->id }}">Transfer</button>
            @endif
        </div>   
        @endforeach
 @else
<div class="container my-5">
    
    <h2 class="text-center mb-4">Transfer</h2>

    @php
        $typeLabels = [
            'CORE'   => 'Core',
            'ELECTIVE' => 'Elective',
            'AP'     => 'AP',
            'CTE'    => 'CTE',
            'CLEP'   => 'CLEP',
            'PSAT'   => 'PSAT',
            'SAT'    => 'SAT',
            'PREACT' => 'PreACT',
            'ACT'    => 'ACT',
            'ESOL'   => 'ESOL',
        ];

        $displayTypes = $curriculumTypes->filter(function ($type) use ($typeLabels) {
            return isset($typeLabels[$type->code]);
        });
    @endphp

   
    {{-- Tabs --}}
    <ul class="nav nav-pills custom-tabs mb-3" id="enrollTabs" role="tablist">
        @foreach($displayTypes as $type)
            @php $tabId = strtolower($type->code); @endphp
            <li class="nav-item p-0">
                <a
                    class="nav-link {{ $loop->first ? 'active' : '' }}"
                    id="{{ $tabId }}-tab"
                    data-toggle="pill"
                    href="#{{ $tabId }}"
                    role="tab"
                    aria-controls="{{ $tabId }}"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                >
                    {{ $typeLabels[$type->code] }}
                </a>
            </li>
        @endforeach
    </ul>

    {{-- Tab content --}}
    <div class="tab-content" id="enrollTabsContent">
        @foreach($displayTypes as $type)
            @php
                $tabId = strtolower($type->code);

                // curriculum_courses that have NO category
                $uncategorized = $type->curriculumCourses
                    ->where('category_id', null)
                    ->sortBy('course.title');
            @endphp

            <div
                class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                id="{{ $tabId }}"
                role="tabpanel"
                aria-labelledby="{{ $tabId }}-tab"
            >
                @if($type->categories->count() || $uncategorized->count())
                    <div class="accordion custom-accordion" id="{{ $tabId }}Accordion">

                        {{-- CATEGORY CARDS --}}
                        @foreach($type->categories as $category)
                            @php
                                $collapseId = $tabId . '-cat-' . $category->id;
                                $hasCourses = $category->curriculumCourses->count() > 0;
                            @endphp

                            <div class="card">
                                <div class="card-header" id="heading-{{ $collapseId }}">
                                    <button
                                        class="btn btn-header {{ $loop->first ? '' : 'collapsed' }}"
                                        type="button"
                                        data-toggle="collapse"
                                        data-target="#collapse-{{ $collapseId }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="collapse-{{ $collapseId }}"
                                    >
                                        {{ $category->name }}
                                    </button>
                                </div>
                                <div
                                    id="collapse-{{ $collapseId }}"
                                    class="collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="heading-{{ $collapseId }}"
                                    data-parent="#{{ $tabId }}Accordion"
                                >
                                    <div class="card-body pt-0">
                                        @if($hasCourses)
                                            @foreach($category->curriculumCourses as $cc)
                                                @php
                                                    $course  = $cc->course;
                                                    $credits = $cc->credits_override ?? $course->default_credits;
                                                @endphp
                                                <div class="course-row d-flex justify-content-between align-items-center">
                                                    <div>
                                                        {{ $course->title }}
                                                        @if(!is_null($credits))
                                                            <span class="credit-text">
                                                                ({{ number_format($credits, 1) }} Credit{{ $credits == 1 ? '' : 's' }})
                                                            </span>
                                                        @endif
                                                    </div>
                                                    @if(in_array($cc->id,$enrolled_courses_ids))
                                                        <button id="transfer-{{ $cc->id }}" data-student-id="{{ $student->id }}" data-course-id="{{ $cc->id }}" class="btn  btn-transfer-back">Transfer Back</button>
                                                    @else
                                                        <button id="transfer-{{ $cc->id }}" data-student-id="{{ $student->id }}" data-course-id="{{ $cc->id }}" class="btn btn-enroll btn-transfer">Transfer</button>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted p-3 mb-0">No courses available in this category yet.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- UNCATEGORIZED COURSES CARD (e.g. CLEP) --}}
                        @if($uncategorized->count())
                            @php
                                $otherCollapseId = $tabId . '-other';
                                $headerTitle = ($type->code === 'CLEP')
                                    ? 'CLEP Courses'
                                    : 'Other Courses';
                            @endphp

                            <div class="card">
                                <div class="card-header" id="heading-{{ $otherCollapseId }}">
                                    <button
                                        class="btn btn-header {{ $type->categories->count() ? 'collapsed' : '' }}"
                                        type="button"
                                        data-toggle="collapse"
                                        data-target="#collapse-{{ $otherCollapseId }}"
                                        aria-expanded="{{ $type->categories->count() ? 'false' : 'true' }}"
                                        aria-controls="collapse-{{ $otherCollapseId }}"
                                    >
                                        {{ $headerTitle }} 
                                    </button>
                                </div>
                                <div
                                    id="collapse-{{ $otherCollapseId }}"
                                    class="collapse {{ $type->categories->count() ? '' : 'show' }}"
                                    aria-labelledby="heading-{{ $otherCollapseId }}"
                                    data-parent="#{{ $tabId }}Accordion"
                                >
                                    <div class="card-body pt-0">
                                        @foreach($uncategorized as $cc)
                                            @php
                                                $course  = $cc->course;
                                                $credits = $cc->credits_override ?? $course->default_credits;
                                            @endphp
                                            <div class="course-row d-flex justify-content-between align-items-center">
                                                <div>
                                                    {{ $course->title }}
                                                    @if(!is_null($credits))
                                                        <span class="credit-text">
                                                            ({{ number_format($credits, 1) }} Credit{{ $credits == 1 ? '' : 's' }})
                                                        </span>
                                                    @endif
                                                </div>
                                                @if($student->status == 1)
                                                    <button id="transfer-{{ $cc->id }}" data-student-id="{{ $student->id }}" data-course-id="{{ $cc->id }}" class="btn btn-transfer-back">Transfer Back</button>                                         
                                                @else
                                                    <button id="transfer-{{ $cc->id }}" data-student-id="{{ $student->id }}" data-course-id="{{ $cc->id }}" class="btn btn-enroll btn-transfer">Transfer</button>
                                                
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                @else
                    <p class="text-muted text-center py-4 mb-0">
                        No courses available for {{ $typeLabels[$type->code] }} yet.
                    </p>
                @endif
            </div>
        @endforeach
    </div>
</div>


@endif
<!-- Confirmation Modal -->
<div class="modal fade" id="confirm-transfer-modal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-xl" style="border:none !important;border-radius:5px !important;padding:20px; ">
        
            <div class="modal-body">
                
                <h3 class="text-center text-dark font-weight-bold message"></h3>
                <label for="" class="font-weight-bold grade-label mb-0 mt-3">Grade</label>
                <select name="grade" class="form-control grade">
                    <option value="" selected disabled>Please select</option>
                    
                    @for($i = 1; $i < 4.1; $i+= 0.1)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                
                <div class="d-flex justify-content-center" style="margin-top:40px;">
                    <button type="button" class="mx-2 btn-lg btn blue-button-outline" data-dismiss="modal" id="transfer-no">
                        Cancel
                    </button>

                    <button type="button" class="mx-2 btn-lg btn orange-button" id="transfer-yes">
                        Confirm
                    </button>
                </div> 
            </div>
        </div>
    </div>
</div>
<script>

    $(document).on('click','.btn-transfer',function(){
        
        let btn_id = $(this).attr('id');
        let student_id = $(this).attr('data-student-id');
        let course_id = $(this).attr('data-course-id');
        $('#confirm-transfer-modal').modal('show');
        $('.grade').css('display','block')
        $('.grade-label').css('display','block')
        $('.message').html('Please enter grade and confirm')
        $('#transfer-yes').attr('data-student-id',student_id)
            .attr('data-course-id',course_id)
            .attr('data-id',btn_id)
            .attr('data-transfer','transfer')    
     });

    $(document).on('click','.btn-transfer-back',function(){
        let btn_id = $(this).attr('id');
        let student_id = $(this).attr('data-student-id');
        let course_id = $(this).attr('data-course-id');
        $('.grade').css('display','none')
        $('.grade-label').css('display','none')
        $('#confirm-transfer-modal').modal('show');
        $('.message').html('Are you sure')
        $('#transfer-yes').attr('data-student-id',student_id)
            .attr('data-course-id',course_id)
            .attr('data-id',btn_id)
            .attr('data-transfer','transfer-back')

    });

    $(document).on('click','#transfer-yes',function(){
        let grade = $(this).closest('.modal-body').find('.grade').val();
        
        if($(this).attr('data-transfer') == 'transfer'){
           
            if(grade < 1 || grade > 5 || !grade){
                
                return;
            };
        }
        
        let student_id = $(this).attr('data-student-id');
        let course_id = $(this).attr('data-course-id');
        let btn = $(this).attr('data-id');
       
        transfer(student_id,course_id,grade,btn)
    })

    function transfer(student_id,course_id,grade,btn){
        //  url: "{{route('transfer-back')}}",
        
        $.ajax({
            data: {
                student_id: student_id,
                course_id:course_id,
                grade:grade
            },
            method: "POST",
            url: "{{route('transfer')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(type) {
            if(type == 1){
                console.log(type)
                $(`#${btn}`).removeClass('btn-transfer').addClass('btn-enroll').addClass('btn-transfer-back').html('Transfer Back')
            }
            else{
                $(`#${btn}`).removeClass('btn-transfer-back').addClass('btn-enroll').addClass('btn-transfer').html('Transfer')
            }
            $('#confirm-transfer-modal').modal('hide')
            
        }); 
    }

</script>