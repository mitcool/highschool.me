@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">Add child</h1>
    <form action="{{ route('student.add') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">First name<span class="text-danger">*</span></label>
            <input type="text" value="{{ old('name') }}" required name="name" class="form-control">
        </div>
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Middle name(optional)</label>
            <input type="text" value="{{ old('middlename') }}"  name="middlename" class="form-control">
        </div>
         <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Surname<span class="text-danger">*</span></label>
            <input type="text" value="{{ old('surname') }}" required name="surname" class="form-control">
        </div>
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Email<span class="text-danger">*</span></label>
            <input type="email" value="{{ old('email') }}" required name="email" class="form-control">
        </div>
         <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Date of birth<span class="text-danger">*</span></label>
            <input type="date" value="{{ old('date_of_birth') }}" required name="date_of_birth" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Select Education Option<span class="text-danger">*</span></label>
            <select name="education_option" id="" required  class="form-control">
                <option value="" selected disabled>Please select</option>
                <option value="1">24-Credit-Standard/Honors Graduation Track</option>
                <option value="2">18-Credit-ACCEL Graduation Track</option>
                <option value="3">International Transfer Program</option>
                <option value="4">Module, Honors & Prep-Courses</option>
                <option value="5">Learning, Mentoring & Coaching Sessions</option>
            </select>
        </div>
   
        <p><span class="text-danger">*</span> Required fields</p>
        <hr>
        <div class="text-right">
            <button class="shadow orange-button">Send</button>
        </div>
    </form>
</div>
@endsection