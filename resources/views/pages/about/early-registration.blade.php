@extends('template')

@section('headCSS')
	<style>
        #reg-form{
            padding:20px;
        }
        #reg-form label{
            display: block;
            text-align: left;
            margin-bottom:5px;
            margin-top:20px;
            font-weight: bold;
        }
        .validation-error{
            text-align: left;
        }
	</style>	
@endsection
@section('seo')

	<title>{{ trans('early-registration.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('early-registration.meta-description') }}" />
	<meta itemprop="title" property="og:title" content="{{ trans('early-registration.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('early-registration')}}"/>
	<meta property="og:description" content="{{ trans('early-registration.meta-description') }}"/>

@endsection

@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Early Registration</li>
	</ol>
</div>
<div class="container-fluid main_page_container pt-0">
	<div class="row justify-content-center">
		<div class="col-md-12">
            <h1 class="page-headings">Early Registration</h1>
			<p class="text-center">
You can register as a guardian, who is responsible for the student and then to create profile for the student from the dashboard.</p>
        </div>
		<div class="col-md-9 col-lg-7 mb-4 text-center bg-white">
			<form action="{{ route('early-registration-submit') }}" method="POST" id="reg-form" class="confirm-first shadow">
                {{ csrf_field() }}

                <label for="">First Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                @error('name') <div class="text-left"><span class="validation-error">{{ $errors->first('name') }}</span></div>  @enderror

                <label for="">Second Name (optional)</label>
                <input type="text" name="middlename" class="form-control" value="{{ old('middlename') }}">
                @error('middlename') <div class="text-left"><span class="validation-error">{{ $errors->first('middlename') }}</span> </div> @enderror

                <label for="">Family Name</label>
                <input type="text" name="surname" class="form-control" required value="{{ old('surname') }}">
                @error('surname') <div class="text-left"><span class="validation-error">{{ $errors->first('surname') }}</span> </div> @enderror

                <label for="">E-mail address:</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                @error('email') <div class="text-left"><span class="validation-error">{{ $errors->first('email') }}</span> </div> @enderror

                <label for="">I am interested in:</label>
                <select name="education_option" class="form-control" required>
                    <option value="">Please select edication</option>
                    <option {{ old('education_option') == 1 ? ' selected ' : '' }} value="1">24-Credit-Standard/Honors Graduation Track</option>
                    <option {{ old('education_option') == 2 ? ' selected ' : '' }} value="2">18-Credit-ACCEL Graduation Track</option>
                    <option  {{ old('education_option') == 3 ? ' selected ' : '' }} value="3">International Transfer Program</option>
                    <option {{ old('education_option') == 4 ? ' selected ' : '' }} value="4">Module, Honors & Prep-Courses</option>
                    <option {{ old('education_option') == 5 ? ' selected ' : '' }} value="5">Learning, Mentoring & Coaching Sessions</option>
                </select>
                @error('education_option') <div class="text-left"> <span class="validation-error">{{ $errors->first('education_option') }}</span> </div> @enderror

                <label for="">Message (optional)</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10">{{ old('message') }}</textarea>
                @error('message') <div class="text-left"> <span class="validation-error">{{ $errors->first('message') }}</span> </div> @enderror

                <div class="text-left">
                    <input type="checkbox" name="agree" required> Lorem ipsum dolor sit amet.
                </div>
                <p class="text-danger text-left">Be aware that we cannot sign students from the following countries: North Korea, China</p>
                {{-- reCAPTCHA --}}
                    <div class="form-group text-center mt-4 mb-4">
                        <div class="g-recaptcha d-inline-block"
                             data-sitekey="{{ config('services.recaptcha.key') }}">
                        </div>
                    </div>

					<button class="orange-button btn mt-3">Submit</button>
            </form>
		</div>
	</div>
	
</div>
@endsection