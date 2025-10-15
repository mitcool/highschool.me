@extends('calendar.layout')

@section('calendar-css')
<style>
    @media(max-width:768px){
        #phone-label{
            margin-top:20px;
        }
    }
</style>
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ route('appointment-details-en') }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ route('appointment-details-de') }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('right-side')

<form action="{{ route('record-appointment-details') }}" method="POST" class="text-left" id="appointment-details-form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="">Gender<span class="text-danger">*</span></label>
        <select name="gender" id="" class="form-control" required>
            <option class="text-light" value="" selected disabled>Please choose</option>
            <option  value="Male">Male</option>
            <option  value="Female">Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Title</label>
        <select name="title" id="" class="form-control">
            <option class="text-light" value="" selected disabled>Please choose</option>
            <option  value="Doctor">Doctor</option>
            <option  value="Professor">Professor</option>
            <option  value="Professor Doctor">Professor Doctor</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">First name<span class="text-danger">*</span></label>
        <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Last name<span class="text-danger">*</span></label>
        <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">E-mail<span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">How should the conversation take place?<span class="text-danger">*</span></label>
        <select name="conversation_type" id="" class="form-control" required>
            <option class="text-light" value="" selected disabled>Please choose</option>
            <option  value="Skype">Skype</option>
            <option  value="Phone">Phone</option>
            <option  value="WhatsApp">WhatsApp</option>
        </select>
    </div>
    <div class="form-group">
        <label for="subject">What would like to discuss with Mr.Kunze?<span class="text-danger">*</span></label>
        <textarea name="discussion_topic" id="" cols="30" rows="10" class="form-control" required></textarea>
    </div>
   
    <div class="row">
        <div class="col-md-4">
            <label for="">Phone Code</label>
            <select name="phone_code" class="form-control">
                <option value="" selected disabled>Please choose</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->phonecode }}">{{ $country->full_name() }} (+{{ $country->phonecode }})</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="" id="phone-label">Telephone number</label>
                <input type="number" name="phone_number" class="form-control">
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
           
            @if(config('services.recaptcha.key'))
                <div class="g-recaptcha"
                data-sitekey="{{config('services.recaptcha.key')}}" style="margin: 0 auto;">
                </div>
            @endif
        </div>
    </div>
  
    <div class="form-group text-right">
        <hr>
        <button class="btn orange-button">Confirm</button>
    </div>
</form>
@endsection

