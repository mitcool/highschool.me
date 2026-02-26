@extends('educator.dashboard')

@section('content')

<div class="shadow container wrapper">
    <h2 class="text-center blue-heading h2">Add Exam</h2>
    <hr/>
     <form action="{{ route('educator.create-exam') }}" method="POST" >
        {{ csrf_field() }}
        <label class="font-weight-bold mb-0" for="">Date</label>
        <input  class="form-control" name="date"type="date"  required/><br>
        <label class="font-weight-bold mb-0" for="">Time</label>
        <input class="form-control" name="time" type="time" required /><br>
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
        </tr>
        @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->date->format('d.m.Y') }}</td>
                <td>{{ $exam->time->format('H:i') }}</td>
                <td>{{ $exam->course->course->title }}</td>
                <td>{{ $exam->student->fullname() }}</td>
            </tr>
        @endforeach
      </table>
</div>
@endsection

@section('scripts')
<script>
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