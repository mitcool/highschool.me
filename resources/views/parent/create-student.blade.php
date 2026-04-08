@extends('parent.dashboard')

@section('content')
<div class="shadow container wrapper h-100">
    <h1 class="text-center h2" style="color:#045397">Add Student</h1>
    <hr>
    
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
        <div class="mb-3">
            <label class="font-weight-bold mb-0 d-block">Gender<span class="text-danger">*</span></label>
            <div class="mt-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="student-gender-male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="student-gender-male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="student-gender-female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="student-gender-female">Female</label>
                </div>
            </div>
        </div>
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">E-Mail of the Student<span class="text-danger">*</span></label>
            <input type="email" value="{{ old('email') }}" required name="email" class="form-control">
        </div>
         <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Date of birth<span class="text-danger">*</span></label>
            <input type="date" value="{{ old('date_of_birth') }}" required name="date_of_birth" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Student Location<span class="text-danger">*</span></label>
            <select name="student_location_id" required class="form-control">
                <option value="" selected disabled>Please select</option>
                @foreach($student_locations as $student_location)
                    <option value="{{ $student_location->id }}" {{ old('student_location_id') == $student_location->id ? 'selected' : '' }}>
                        {{ $student_location->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Ethnicity<span class="text-danger">*</span></label>
            <select name="ethnicity_id" required class="form-control">
                <option value="" selected disabled>Please select</option>
                @foreach($ethnicities as $ethnicity)
                    <option value="{{ $ethnicity->id }}" {{ old('ethnicity_id') == $ethnicity->id ? 'selected' : '' }}>
                        {{ $ethnicity->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Select Education Option<span class="text-danger">*</span></label>
            <select name="education_option" id="" required  class="form-control">
                <option value="" selected disabled>Please select</option>
                <option value="1" {{ old('education_option') == 1 ? 'selected' : '' }}>24-Credit-Standard/Honors Graduation Track</option>
                <option value="2" {{ old('education_option') == 2 ? 'selected' : '' }}>18-Credit-ACCEL Graduation Track</option>
                <option value="3" {{ old('education_option') == 3 ? 'selected' : '' }}>International Transfer Program</option>
                <option value="4" {{ old('education_option') == 4 ? 'selected' : '' }}>Module, Honors & Prep-Courses</option>
                <option value="5" {{ old('education_option') == 5 ? 'selected' : '' }}>Learning, Mentoring & Coaching Sessions</option>
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
