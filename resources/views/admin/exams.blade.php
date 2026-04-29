@extends('admin_template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
@endsection

@section('content')

<div class="shadow container wrapper">
    <h2 class="text-center blue-heading h2">Add Exam</h2>
    <p class="text-danger text-center">Please enter the time in UTC timezone <span class="font-weight-bold">(UTC time now : {{ $utc_time }})</span></p>
    <hr/>
     <form action="{{ route('create-exam') }}" method="POST" >
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <label class="font-weight-bold mb-0" for="">Date</label>
                <input  class="form-control datepicker" name="date" type="text" required /><br>
            </div>
            <div class="col-md-6">
                <label class="font-weight-bold mb-0" for="">UTC Time</label>
                <input class="form-control timepicker" name="time" type="text" required /><br>
            </div>
        </div>

        <label class="font-weight-bold mb-0" for="">Student <span class="text-danger">(*Note only students that have status Ready for exam)</span></label>
        <select required class="form-control" name="student_id" required id="student_id">
            @foreach ($students as $student )
                <option value="" selected disabled>Please select a student</option>
                <option value="{{ $student->student->id }}">{{ $student->student->fullname() }}</option>
            @endforeach
        </select><br>
        <label class="font-weight-bold mb-0" for="">Course  <span class="text-danger">(*Note you have to select a student first)</span></label>
        <select required class="form-control" name="course_id" required id="course_id">
            
        </select><br>
        
        <label class="font-weight-bold mb-0" for="">Educator</label>
        <select required class="form-control" name="educator_id" required>
            <option value="" selected disabled>Please select educator</option>
            @foreach ($educators as $educator )
                <option value="{{ $educator->id }}">{{ $educator->fullname() }}</option>
            @endforeach
                
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
        @if(count($exams) > 0)
            <tr>
                <th>Date</th>
                <th>UTC Time</th>
                <th>Subject</th>
                <th>Student</th>
                <th>Exam Type</th>
                <th class="text-center" colspan="3">Action</th>
            </tr>
        @endif
        @forelse($exams as $exam)
            <tr>
                <td>{{ $exam->datetime->format('d.m.Y') }}</td>
                <td>{{ $exam->datetime->format('H:i') }}</td>
                <td>{{ $exam->course->course->title }}</td>
                <td>{{ $exam->student->fullname() }}</td>
                <td>{{ $exam->type == 1 ? 'Open Exam' : 'Essay' }}</td>
                @if($exam->status == 0)
                <td class="text-center">
                    <button class="btn btn-link text-underline" style="text-decoration: underline" data-toggle="modal" data-target="#edit-modal-{{ $exam->id }}">Edit</button>
                </td>
                <td class="text-center">
                    <form action="{{ route('delete-exam',$exam->id) }}" method="POST" class="confirm-first">
                        {{ csrf_field() }}
                        <button class="btn btn-link text-underline" style="text-decoration: underline">Remove</button>
                    </form>
                </td>
                @elseif($exam->status==1)
                    <td class="text-center">
                        Exam submitted 
                    </td>
                    <td class="text-center">
                        <a href="{{ route('single-submission',$exam->id) }}" target="blank">Details...</a>
                    </td>
                    <td></td>
                @else
                    <td class="text-center">
                        Exam evaluated 
                    </td>
                    <td class="text-center">
                        <a href="{{ route('single-submission',$exam->id) }}" target="blank">Details...</a>
                    </td>
                     <td class="text-center">
                        <a href="{{ route('exam-protocol',$exam->id) }}" target="blank">Protocol...</a>
                    </td>
                @endif
            </tr>
            <div class="modal fade" id="edit-modal-{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Exam</h5><br>
                            <p class="text-danger text-center mb-0">Please enter the time in UTC timezone <span class="font-weight-bold">(UTC time now : {{ $utc_time }})</span></p>
                        </div>
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('edit-exam',$exam->id) }}" method="POST" id="edit-hour-{{ $exam->id }}">
                        {{ csrf_field() }}
                        <label class="font-weight-bold mb-0" for="">Date</label>
                        <input  class="datepicker form-control" name="date" type="text" value="{{ $exam->datetime->format('d-m-Y') }}" required/><br>
                        <label class="font-weight-bold mb-0" for="">Time (UTC)</label>
                        <input  class="timepicker form-control" name="time" value="{{ $exam->datetime->format('H:i') }}" type="text" required /><br>
                        
                        <label class="font-weight-bold mb-0" for="">Course</label>
                        <select required class="form-control" name="course_id" required id="course_id">
                            @foreach ($all_courses as $course )
                                <option value="{{ $course->id }}" {{ $course->id == $exam->course_id ? ' selected ' : '' }}>{{ $course->course->title }}</option>
                            @endforeach
                        </select><br> 
                        
                        <label class="font-weight-bold mb-0" for="">Educator</label>
                        <select required class="form-control" name="educator_id">
                            <option value="" selected disabled>Please select educator</option>
                            @foreach ($educators as $educator )
                                <option value="{{ $educator->id }}" {{ $educator->id == $exam->educator_id ? ' selected ' : '' }}>{{ $educator->fullname() }}</option>
                            @endforeach
                                
                        </select><br>
                        <label class="font-weight-bold mb-0" for="">Exam Type</label>
                        <select required class="form-control" name="type" required>
                            <option value="1" {{ $exam->type== 1 ? ' selected ' : '' }}>Open Exam</option>
                            <option value="2" {{ $exam->type== 2 ? ' selected ' : '' }}>Essay</option>
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
        @empty
            <tr>
                <td colspan="4" class="text-center">No exams at the moment</td>
            </tr>
            
        @endforelse
      </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/datetimepicker.js') }}"></script>
<script>

    $('.datepicker').datetimepicker({minDate:new Date(),allowTimes:[],format:'d-m-Y',dateFormat: 'd-m-Y',timepicker:false});
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
