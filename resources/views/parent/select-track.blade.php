@extends('parent.dashboard')

@section('content')
<div class="shadow container wrapper h-100">
    <h1 class="text-center h2" style="color:#045397">Add Student</h1>
    <hr>
    
    <form action="{{ route('parent.update-student-track',$student->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      
            <label for="" class="font-weight-bold mb-0">Select Education Option<span class="text-danger">*</span></label>
            <select name="education_option" id="" required  class="form-control">
                <option value="" selected disabled>Please select</option>
                <option value="1">24-Credit-Standard/Honors Graduation Track</option>
                <option value="2">18-Credit-ACCEL Graduation Track</option>
                <option value="3">International Transfer Program</option>
                {{-- <option value="4">Module, Honors & Prep-Courses</option>
                <option value="5">Learning, Mentoring & Coaching Sessions</option> --}}
            </select>
     
        <hr>
        <div class="text-right">
            <button class="shadow orange-button">Send</button>
        </div>
    </form>
</div>
@endsection