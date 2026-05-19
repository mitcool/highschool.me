@extends('parent.dashboard')

@section('css')
<style>
    #other-address{
        display:none;
    }
    .shadow.col-md-10{
        padding:20px;
    }
    label{
        margin-top: 10px;
        margin-bottom:0;
    }
</style>
@endsection

@section('content')
<div class="row">
<div class="col-md-12">
    <h1 class="text-center h2" style="color:#045397;margin:40px 0;">Add Student</h1>
</div>
<div class="shadow col-md-10 mx-auto mt-2">
    <h3 class="text-center my-2">Personal Information</h3>
    <div  class="mb-3">
        <label for="" class="font-weight-bold mb-0">First Name<span class="text-danger">*</span></label>
        <input type="text" value="{{ old('name') }}" required name="name" class="form-control" form="add-student-form">
    </div>
    <div  class="mb-3">
        <label for="" class="font-weight-bold mb-0">Middle Name(optional)</label>
        <input type="text" value="{{ old('middlename') }}"  name="middlename" class="form-control" form="add-student-form">
    </div>
    <div  class="mb-3">
        <label for="" class="font-weight-bold mb-0">Last Name<span class="text-danger">*</span></label>
        <input type="text" value="{{ old('surname') }}" required name="surname" class="form-control" form="add-student-form">
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div>
                <label for="" class="font-weight-bold mb-0">Date of birth<span class="text-danger">*</span></label>
                <input type="date" value="{{ old('date_of_birth') }}" required name="date_of_birth" class="form-control" form="add-student-form">
            </div>
        </div>
        <div class="col-md-6">
            <label class="font-weight-bold mb-0 d-block">Gender<span class="text-danger">*</span></label>
            <select name="gender" class="form-control" required form="add-student-form">
                <option value="">-- Please select your gender --</option>
                <option value="0">Male</option>
                <option value="1">Female</option>
                <option value="2">Other</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="" class="font-weight-bold mb-0">Ethnicity<span class="text-danger">*</span></label>
            <select name="ethnicity_id" required class="form-control" form="add-student-form">
                <option value="" selected disabled>-- Please select --</option>
                @foreach($ethnicities as $ethnicity)
                    <option value="{{ $ethnicity->id }}" {{ old('ethnicity_id') == $ethnicity->id ? 'selected' : '' }}>
                        {{ $ethnicity->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Country of Citizenship<span class="text-danger">*</span></label>
                <select name="citizenship" required class="form-control" form="add-student-form">
                <option value="" selected disabled>-- Please select --</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>
                        {{ $country->nicename }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
           <label for="" class="font-weight-bold mb-0">Current National ID Card Number<span class="text-danger">*</span></label>
            <input type="id_card_number" value="{{ old('id_card_number') }}" required name="id_card_number" class="form-control" form="add-student-form">
        </div>
        <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Student Location<span class="text-danger">*</span></label>
                <select name="student_location_id" required class="form-control" form="add-student-form">
                <option value="" selected disabled>-- Please select --</option>
                @foreach($student_locations as $location)
                    <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    
</div>
<div class="shadow col-md-10 mx-auto mt-2">
    <h3 class="text-center my-2">Academic Information</h3>
        <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Current Grade Level<span class="text-danger">*</span></label>
            <select name="current_grade_level" required class="form-control" form="add-student-form">
                <option value="" selected disabled>-- Please select --</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Current School Name<span class="text-danger">*</span></label>
            <input type="text" name="current_school_name" required class="form-control" form="add-student-form">
        </div>
         <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Country of Current School<span class="text-danger">*</span></label>
            <select name="country_of_current_school" required class="form-control" form="add-student-form">
                <option value="" selected disabled>-- Please select --</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>
                        {{ $country->nicename }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">English Proficiency Level<span class="text-danger">*</span></label>
                <select name="language_level" required class="form-control" form="add-student-form">
                <option value="" selected disabled>Please select</option>
                @foreach($language_levels as $language_level)
                    <option value="{{ $language_level }}" {{ old('language_level') == $language_level ? 'selected' : '' }}>
                        {{ $language_level }}
                    </option>
                @endforeach
            </select>
            </div>
            <div class="col-md-6">
                <label for="" class="font-weight-bold mb-0">Preffered Start Date<span class="text-danger">*</span></label>
                <input type="date" name="preffered_start_date" required class="form-control" form="add-student-form">   
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="font-weight-bold mb-0">Education Option<span class="text-danger">*</span></label>
            <select name="track" id="" required  class="form-control" form="add-student-form">
                <option value="" selected disabled>-- Please select --</option>
                <option value="1" {{ old('track') == 1 ? 'selected' : '' }}>24-Credit-Standard/Honors Graduation Track</option>
                <option value="2" {{ old('track') == 2 ? 'selected' : '' }}>18-Credit-ACCEL Graduation Track</option>
                <option value="3" {{ old('track') == 3 ? 'selected' : '' }}>International Transfer Program</option>
                <option value="4" {{ old('track') == 4 ? 'selected' : '' }}>Module, Honors & Prep-Courses</option>
                <option value="5" {{ old('track') == 5 ? 'selected' : '' }}>Learning, Mentoring & Coaching Sessions</option>
            </select>
        </div>
    </div>
<div class="shadow col-md-10 mx-auto mt-2">
    <h3 class="text-center my-2">Contact Information</h3>
    <div class="mb-3">
        <label class="font-weight-bold mb-0">Student E-mail address</label>
        <input type="email" name="email" required class="form-control" form="add-student-form">
    </div>
    <div class="row mb-3">
        <div class="col-md-2">
            <label for="" class="font-weight-bold mb-0">Country code<span class="text-danger">*</span></label>
            <select name="phonecode" required class="form-control" form="add-student-form">
            <option value="" selected disabled>-- Please select --</option>
            @foreach($countries as $country)
                <option value="{{ $country->phonecode }}" >
                    +{{ $country->phonecode }}
                </option>
            @endforeach
        </select>
        </div>
        <div class="col-md-10">
            <label for="" class="font-weight-bold mb-0">Phone Number<span class="text-danger">*</span></label>
            <input type="number" name="phone_number" required class="form-control" form="add-student-form">   
        </div>
    </div>
</div>
<div class="shadow col-md-10 mx-auto mt-2">
    <h3 class="text-center my-2">Address Information</h3>
    <div class="mb-3">
        <label class="font-weight-bold mb-0">Same address as parent/legal guardian?</label>
        <select class="form-control" name="same_address" id="same_address" form="add-student-form">
            <option value="0">Yes</option>
            <option value="1">No</option>
        </select>
    </div>
    <div class="" id="other-address">
        <div class="mb-3">
            <label class="font-weight-bold mb-0">Address Line 1<span class="text-danger">*</span></label>
            <input type="text" name="address"  class="form-control" form="add-student-form">
        </div>
        <div class="mb-3">
            <label class="font-weight-bold mb-0">Address Line 2 (optional)</label>
            <input type="text" name="address_two"  class="form-control" form="add-student-form">
        </div>
        <div class="mb-3">
            <label class="font-weight-bold mb-0">ZIP<span class="text-danger">*</span></label>
            <input type="text" name="zip"  class="form-control" form="add-student-form">
        </div>
        <div class="mb-3">
            <label class="font-weight-bold mb-0">City<span class="text-danger">*</span></label>
            <input type="text" name="city"  class="form-control" form="add-student-form">
        </div>
        <div class="mb-3">
            <label class="font-weight-bold mb-0">State / Province / Region (optional)</label>
            <input type="text" name="state"  class="form-control" form="add-student-form">
        </div>
        <div class="mb-3">
            <label class="font-weight-bold mb-0">Country<span class="text-danger">*</span></label>
            <select required name="country"  class="form-control" form="add-student-form">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" >
                        {{ $country->nicename }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    
    <p><span class="font-weight-bold">Legal notice:</span> Additional documentation may be requested in specific legal or administrative situations.*</p>
    <form action="{{ route('student.add') }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center" style="padding: 20px;" id="add-student-form">
        {{ csrf_field() }}
        <a href="{{ route('parent.dashboard') }}" class="blue-button-outline btn-lg btn mx-2">Cancel</a>
        <button class="shadow orange-button btn-lg btn mx-2">Proceed</button>
    </form>
</div>
</div>
@endsection


@section('scripts')
<script>
    $('#same_address').on('change',function(){
        if($(this).val()==0){
            $('#other-address').css('display','none')
        }else{
            $('#other-address').css('display','block')
        }
    })
</script>
@endsection