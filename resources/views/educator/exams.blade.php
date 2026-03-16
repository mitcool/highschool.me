@extends('educator.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
@endsection

@section('content')

<div class="shadow container wrapper">
    <h2 class="text-center blue-heading h2">Add Exam</h2>
    <hr/>
     <form action="{{ route('educator.create-exam') }}" method="POST" >
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <label class="font-weight-bold mb-0" for="">Date</label>
                <input  class="form-control datepicker" name="date" type="text" required /><br>
            </div>
            <div class="col-md-6">
                <label class="font-weight-bold mb-0" for="">Time</label>
                <input class="form-control timepicker" name="time" type="text" required /><br>
            </div>
        </div>

        <label class="font-weight-bold mb-0" for="">Student <span class="text-danger">(*Note only students that have status Ready for exam)</span></label>
        <select required class="form-control" name="student_id" required id="student_id">
            <option value="" selected disabled>Please select a student</option>
            @foreach ($students as $student )
                <option value="{{ $student->student->id }}">{{ $student->student->fullname() }}</option>
            @endforeach
        </select><br>
        <label class="font-weight-bold mb-0" for="">Course  <span class="text-danger">(*Note you have to select a student first)</span></label>
        <select required class="form-control" name="course_id" required id="course_id">
            
        </select><br>
        
        <label class="font-weight-bold mb-0" for="">Educator</label>
        <select required class="form-control" readonly name="educator_id" required>
                <option value="{{ auth()->id() }}">{{ auth()->user()->fullname() }}</option>
        </select><br>
        <label class="font-weight-bold mb-0" for="">Exam Type</label>
        <select required class="form-control" name="type" required>
            <option value="1">Open Exam</option>
            <option value="2">Essay</option>
        </select><br>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn orange-button mx-2">Add Exam</button>
        </div>
        <input type="hidden" name="pre_exam" value="0">
    </form>
    <hr>
     <h2 class="text-center blue-heading h2">Exams</h2>
     <table class="table">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Subject</th>
            <th>Student</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Remove</th>
        </tr>
        @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->date->format('d.m.Y') }}</td>
                <td>{{ $exam->time->format('H:i') }}</td>
                <td>{{ $exam->course->course->title }}</td>
                <td>{{ $exam->student->fullname() }}</td>
                <td class="text-center">
                    <button class="btn btn-link text-underline" style="text-decoration: underline" data-toggle="modal" data-target="#edit-modal-{{ $exam->id }}">Edit</button>
                </td>
                <td class="text-center">
                    <form action="{{ route('delete-exam',$exam->id) }}" method="POST" class="confirm-first">
                        {{ csrf_field() }}
                        <button class="btn btn-link text-underline" style="text-decoration: underline">Remove</button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="edit-modal-{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Exam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit-exam',$exam->id) }}" method="POST" id="edit-hour-{{ $exam->id }}">
                        {{ csrf_field() }}
                       <label class="font-weight-bold mb-0" for="">Date</label>
                        <input  class="datepicker form-control" name="date" type="text" value="{{ $exam->date->format('d-m-Y') }}" required/><br>
                        <label class="font-weight-bold mb-0" for="">Time</label>
                        <input  class="timepicker form-control" name="time" value="{{ $exam->time->format('H:i') }}" type="text" required /><br>
                        <label class="font-weight-bold mb-0" for="">Student <span class="text-danger">(*Note only students that have status Ready for exam)</span></label>
                        <select required class="form-control" name="student_id" required id="student_id">
                            <option value="" selected disabled>Please select a student</option>
                            @foreach ($all_students as $student )
                                <option {{ $student->id == $exam->student_id ? ' selected ' : '' }} value="{{ $student->id }}">{{ $student->fullname() }}</option>
                            @endforeach
                        </select><br>
                        <label class="font-weight-bold mb-0" for="">Course  <span class="text-danger">(*Note you have to select a student first)</span></label>
                        <select required class="form-control" name="course_id" required id="course_id">
                            @foreach ($all_courses as $course )
                                <option value="{{ $course->id }}" {{ $course->id == $exam->course_id ? ' selected ' : '' }}>{{ $course->course->title }}</option>
                            @endforeach
                        </select><br>
                        
                        <label class="font-weight-bold mb-0" for="">Educator</label>
                        <select required class="form-control" readonly name="educator_id" required>
                                <option value="{{ auth()->id() }}">{{ auth()->user()->fullname() }}</option>
                        </select><br>
                        <label class="font-weight-bold mb-0" for="">Exam Type</label>
                        <select required class="form-control" name="type" required>
                            <option value="1">Open Exam</option>
                            <option value="2">Essay</option>
                        </select><br>
                    
                        <input type="hidden" name="pre_exam" value="0">
                         </form>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn orange-button" form="edit-hour-{{ $exam->id }}">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
      </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/datetimepicker.js') }}"></script>
<script>

    $('.datepicker').datetimepicker({minDate:new Date(),allowTimes:[],format:'d.m.Y',dateFormat: 'd-m-Y',timepicker:false});
    $('.timepicker').datetimepicker({minDate:new Date(),allowTimes:[],format:'H:i',dateFormat: 'H:i',timepicker:true,datepicker:false,step:15});
    	
    $(document).on('change','#student_id',function() {
        
        let student_id = $(this).val();
        if(!student_id){
            return;
        }
        $.ajax({
                data: {student_id: student_id},
                method: "POST",
                url: "{{route('get-courses')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(courses) {
                console.log(courses)
                courses_html = '<option value="" selected disabled>Please select a course</option>`;';
                for (const course of courses) {
                    courses_html += `
                    <option value="${course.catalog_course_id}">${course.course.course.title}</option>`;
                }
                $('#course_id').html(courses_html); 
            }); 
    });
</script>
@endsection