@extends('educator.dashboard')

@section('content')

<div class="container my-3 shadow  p-3">
    <h1 class="text-center page-headings">Add Exam</h1>
    <hr/>
     <form action="{{ route('create-exam') }}" method="POST" >
        {{ csrf_field() }}
       
        <label class="font-weight-bold mb-0" for="">Date</label>
        <input  class="form-control" name="date"type="date"  required/><br>
        <label class="font-weight-bold mb-0" for="">Time</label>
        <input class="form-control" name="time" type="time" required /><br>
        <label class="font-weight-bold mb-0" for="">Course</label>
        <select required class="form-control" name="course_id" required>
            @foreach ($courses as $course )
                <option value="{{ $course->course->id }}">{{ $course->course->title }}</option>
            @endforeach
        </select><br>
        <label class="font-weight-bold mb-0" for="">Student</label>
        <select required class="form-control" name="student_id" required>
            @foreach ($students as $student )
                <option value="{{ $student->id }}">{{ $student->fullname() }}</option>
            @endforeach
        </select><br>
        <label class="font-weight-bold mb-0" for="">Educator</label>
        <select required class="form-control" name="educator_id" required readonly>
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
    </form>
</div>
@endsection
