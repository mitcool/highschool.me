@extends('template')
@section('seo')
<title>{{ trans('study-registration.meta-title') }}</title>
<meta itemprop="description" name="description" content="{{ trans('study-registration.meta-description')}}" />
<meta itemprop="title" property="og:title" content="{{ trans('study-registration.meta-title') }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/bewerbung-studium"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/student-portal"/>
@endif
<meta property="og:description" content="{{ trans('study-registration.meta-description')}}"/>
<x-meta-image itemprop="image" nickname="study_registration"/>
<link rel="alternate" href="{{ config('app.url') }}/en/student-portal" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/de/bewerbung-studium" hreflang="de" />
<link rel="alternate" href="{{ config('app.url') }}/en/student-portal" hreflang="x-default" />
@endsection


@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/student-portal" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/bewerbung-studium" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('headCSS')

<style>

.form-control,
.form-control:focus,
.form-control:active{

	outline: none !important;
}
.time-button,
.studies-button{
	background-color:white;
	border:1px solid black;
	min-width: 180px;
	max-width: 200px;
	cursor: pointer;
}
.selected-button{
	background-color:#d3ebff !important;
}
</style>

@endsection
@section('content')
@php
    $breadcrumb_title = strtok(trans('study-registration.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="study_registration" class="study_registration-images main-pictures-pages" loading="eager"/>
	<div class="container-fluid bg-white main_page_container">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 shadow text-center p-4" style="margin: 0 auto;">
				<h1 class="text-center font-weight-bold">{{ trans('study-registration.heading') }}</h1><hr>
				@if($errors)
					@foreach($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				@endif
			<form method="POST" action="{{route('receive-application')}}" enctype="multipart/form-data" id="application-form">
				@csrf
				<div class="col-lg-10 text-left border border-light" style="margin: 0 auto;padding:10px;">

					{{-- Studies select --}}
					<div class="row text-center my-3">
						<div class="col-md-12 text-left font-weight-bold">{{ trans('study-registration.degree') }}<span style="color: red;">*</span></div>
						<div class="col-md-3">
							<label class="studies-button form-control" data-id="{{ $studies[0]->id }}">{{ $studies[0]->translated->name }}</label>
						</div>
						<div class="col-md-3">
							<label class="studies-button form-control" data-id="{{ $studies[1]->id }}">{{ $studies[1]->translated->name }}/{{ $studies[2]->translated->name }}</label>
						</div>
						{{-- <div class="col-md-3">
							<label class="studies-button form-control" data-id="{{ $studies[4]->id }}">{{ $studies[4]->translated->name }}</label>
						</div> --}}
						<div class="col-md-3">
							<label class="studies-button form-control" data-id="{{ $studies[3]->id }}">{{ $studies[3]->translated->name }}</label>
						</div>
						
					</div>

					{{-- Program select --}}
					<div class="form-group my-3">
						<label for="program-select" class="font-weight-bold">{{ trans('study-registration.select-program') }} <span style="color: red;">*</span></label>
						<select class="form-control" id="program-select" name="chosen_program" required>
							
						</select>
					</div>

					{{-- Period select --}}
					<div class="form-group my-3">
						<label for="selectProgram" class="font-weight-bold">{{ trans('study-registration.time-model') }} <span style="color: red;">*</span></label>
						
						{{-- Bachelor --}}
						<div class="time-model">

							<div class="row" id="time_periods">
								
								
							</div>

						</div>

						{{-- Deadline --}}
						<div id="start_date" class="d-none">
							<label class="font-weight-bold mb-0">{{ trans('study-registration.start_date') }} <span style="color: red;">*</span></label>

							<div class="row">
								<div class="col-md-3">
									<input value="01" id="program_day" type="number" name="program_day" placeholder="DD" class="time-button form-control" required />
								</div>
								<div class="col-md-3">
									<select id="program_month" name="program_month"  class="time-button form-control" required>
										<option value="" selected disabled>MM</option>
										<option  data-value="1" {{ $month =='' ? 'selected ' : ''}} value="January">{{ trans('study-registration.january') }}</option>
										<option  data-value="2" {{ $month =='' ? 'selected ' : ''}} value="February">{{ trans('study-registration.february') }}</option>
										<option  data-value="3" {{ $month =='' ? 'selected ' : ''}} value="March">{{ trans('study-registration.march') }}</option>
										<option  data-value="4" {{ $month =='' ? 'selected ' : ''}} value="April">{{ trans('study-registration.april') }}</option>
										<option  data-value="5" {{ $month =='' ? 'selected ' : ''}} value="May">{{ trans('study-registration.may') }}</option>
										<option  data-value="6" {{ $month =='' ? 'selected ' : ''}} value="June">{{ trans('study-registration.june') }}</option>
										<option data-value="7"  {{ $month =='' ? 'selected ' : ''}} value="July">{{ trans('study-registration.july') }}</option>
										<option data-value="8"  {{ $month =='' ? 'selected ' : ''}} value="August">{{ trans('study-registration.august') }}</option>
										<option  data-value="9" {{ $month =='September' ? 'selected ' : ''}} value="September">{{ trans('study-registration.september') }}</option>
										<option data-value="10"  {{ $month =='' ? 'selected ' : ''}} value="October">{{ trans('study-registration.october') }}</option>
										<option data-value="11"  {{ $month =='' ? 'selected ' : ''}} value="November">{{ trans('study-registration.november') }}</option>
										<option data-value="12"  {{ $month =='' ? 'selected ' : ''}} value="December">{{ trans('study-registration.december') }}</option>
									
									</select>
								</div>
								<div class="col-md-3" >
									<input maxlength="4" value="{{ $year }}" type="text" id="program_year" class="time-button form-control" name="program_year" max="{{ date('Y') }}" placeholder="YYYY" required>
								</div>
								<div class="col-md-12">
									<span id="date-error" style="color: red;"></span>
								</div>
							</div>
						</div>
					</div>	

					{{-- Payment option select --}}
					<div class="col-lg-10 text-left border border-light" style="margin: 20px auto;padding:10px;">
						<h2 class="mt-3 text-center">{{ trans('study-registration.payment-method-heading') }}</h2>
						<p class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.payment-method-subheading') }}</p>
						<label class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.payment-interval') }}</label>
						<select class="form-control" id="payment-option" name="payment_option" required>
							
						</select>
					</div>
					<div class="col-lg-12" style="margin: 0 auto;">
						<div class="row">
							<div class="col-lg-6 text-left">{{ trans('study-registration.tuition-fee') }}</div>
							<div class="col-lg-6 text-right" id="fee"></div>
						</div>
						<div class="row">
							<div class="col-lg-6 text-left">{{ trans('study-registration.application-fee') }}</div>
							<div class="col-lg-6 text-right">&euro; {{ trans('study-registration.enrollment-fee-price') }}</div>
						</div>
						<div class="row">
							<div class="col-lg-6 text-left">{{ trans('study-registration.examination-fee') }}</div>
							<div class="col-lg-6 text-right">&euro; {{ trans('study-registration.examination-fee-price') }}</div>
						</div>
						<label class="mt-3 text-justify">
							<!-- <p>
								{{ trans('study-registration.further-details-one') }}
							</p>
							<p>
								{{ trans('study-registration.further-details-two') }}
							</p> -->
						</label>
					</div>
				</div>
				<div class="col-lg-10 text-left mt-5 border border-light" style="margin: 0 auto;padding:10px;">
					<h2 class="mt-3 text-center">{{ trans('study-registration.personal-information') }}</h2>
					<div class="form-row row">
						<div class="col-md-4">
							<label class="font-weight-bold m-0">{{ trans('study-registration.first-name') }} <span style="color: red;">*</span></label>
							<input type="text" class="form-control" required name="first_name"  value="{{ old('first_name') }}">
						</div>
						<div class="col-md-4">
							<label class="font-weight-bold m-0">{{ trans('study-registration.middle-name') }}</label>
							<input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
						</div>
						<div class="col-md-4">
							<label class="font-weight-bold m-0">{{ trans('study-registration.family-name') }} <span style="color: red;">*</span></label>
							<input type="text" class="form-control" required name="family_name" value="{{ old('family_name') }}">
						</div>
					</div>
					<label class="mt-3  mb-0 font-weight-bold">{{ trans('study-registration.birthdate') }} <span style="color: red;">*</span></label>
					<div class="form-row row">
						
						<div class="col-md-3">
							<input type="number" required class="form-control" name="day" placeholder="DD" value="{{ old('day') }}">
						</div>
						<div class="col-md-3">
							<select required class="form-control" name="month">
								<option value="" selected disabled>MM</option>
								<option  data-value="1" {{ $month =='' ? 'selected ' : ''}} value="January">{{ trans('study-registration.january') }}</option>
								<option  data-value="2" {{ $month =='' ? 'selected ' : ''}} value="February">{{ trans('study-registration.february') }}</option>
								<option  data-value="3" {{ $month =='' ? 'selected ' : ''}} value="March">{{ trans('study-registration.march') }}</option>
								<option  data-value="4" {{ $month =='' ? 'selected ' : ''}} value="April">{{ trans('study-registration.april') }}</option>
								<option  data-value="5" {{ $month =='' ? 'selected ' : ''}} value="May">{{ trans('study-registration.may') }}</option>
								<option  data-value="6" {{ $month =='' ? 'selected ' : ''}} value="June">{{ trans('study-registration.june') }}</option>
								<option data-value="7"  {{ $month =='' ? 'selected ' : ''}} value="July">{{ trans('study-registration.july') }}</option>
								<option data-value="8"  {{ $month =='' ? 'selected ' : ''}} value="August">{{ trans('study-registration.august') }}</option>
								<option  data-value="9" {{ $month =='September' ? 'selected ' : ''}} value="September">{{ trans('study-registration.september') }}</option>
								<option data-value="10"  {{ $month =='' ? 'selected ' : ''}} value="October">{{ trans('study-registration.october') }}</option>
								<option data-value="11"  {{ $month =='' ? 'selected ' : ''}} value="November">{{ trans('study-registration.november') }}</option>
								<option data-value="12"  {{ $month =='' ? 'selected ' : ''}} value="December">{{ trans('study-registration.december') }}</option>
							
							</select>


				
						</div>
						<div class="col-md-3">
							<input type="number" required class="form-control" name="year" placeholder="YYYY" value="{{ old('year') }}">
						</div>
						<div class="col-md-3">
							<input type="text" required class="form-control" name="place_of_birth" placeholder="{{ trans('study-registration.place-of-birth') }}" value="{{ old('place_of_birth') }}">
						</div>
					</div>
					<label class="mt-3 mb-0 font-weight-bold">{{ trans('study-registration.gender') }} <span style="color: red;">*</span></label>
					<select class="form-control" id="selectGender" name="chosen_gender" required>
						<option selected disabled value="">{{ trans('study-registration.select-option') }}</option>
						<option {{ old('choosen_gender') == "Female" ? 'selected' : '' }} value="Female">{{ trans('study-registration.female') }}</option>
						<option {{ old('choosen_gender') == "Male" ? 'selected' : '' }} value="Male">{{ trans('study-registration.male') }}</option>
					</select>
					<div class="row">
						<div class="col-md-12 my-3">
							<h2 class="mt-3 text-center">{{ trans('study-registration.personal-documents') }}</h2>
							<p id="file-validation-error" class="text-danger" style="font-size:16px;"></p>
						</div>
						<div class="col-md-6">
							<div class="input-group mb-3">
							
								<div class="custom-file">
									<input required type="file" class="custom-file-input" name="passport" id="passport" aria-describedby="inputGroupFileAddon01">
									<label class="custom-file-label" for="passport">{{ trans('study-registration.passport') }} <span style="color: red;">*</span></label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group mb-3">
								
								<div class="custom-file">
									<input required type="file" class="custom-file-input" name="cv" id="cv" aria-describedby="inputGroupFileAddon01">
									<label class="custom-file-label" for="cv">{{ trans('study-registration.cv') }} <span style="color: red;">*</span></label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group mb-3">
								
								<div class="custom-file">
									<input required type="file" class="custom-file-input" name="degrees" id="degrees" aria-describedby="inputGroupFileAddon01">
									<label class="custom-file-label" for="degrees">{{ trans('study-registration.degrees') }} <span style="color: red;">*</span></label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="reference_letter" id="reference-letter" aria-describedby="inputGroupFileAddon01">
									<label class="custom-file-label" for="reference-letter">{{ trans('study-registration.reference-letter') }}</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-10 text-left border border-light" style="margin: 0 auto;padding:10px;">
					<h2 class="mt-3 text-center">{{ trans('study-registration.contact-details') }}</h2>
					<label class="font-weight-bold m-0">{{ trans('study-registration.email') }} <span style="color: red;">*</span></label>
					<input type="email" class="form-control" name="mail" required value="{{ old('mail') }}">
					<label class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.phone') }}  <span style="color: red;">*</span></label>
					
					<div class="row">
						<div class="col-md-3"> 
							<select name="phone_code" class="form-control" id="phone_code" required>
								<option selected disabled value="">{{ trans('study-registration.phone-code') }}</option>
							@foreach ($countries as $country)
								<option value="{{ $country->phonecode }}">{{ request()->segment(1) == 'de' ? $country->nicename_de : $country->nicename}}(+{{ $country->phonecode }})</option>
							@endforeach
							</select>
						</div>
						<div class="col-md-9">
							<input type="number" value="{{ old('phone_number') }}" class="form-control" name="phone_number" placeholder="{{ trans('study-registration.phone-example') }}" required>
						</div>
					</div>
				</div>
				<div class="col-lg-10 text-left border border-light" style="margin: 0 auto;padding:10px;">
					<h2 class="mt-3 text-center">{{ trans('study-registration.residency') }}</h2>
					<label class="font-weight-bold m-0 mb-0">{{ trans('study-registration.country') }} <span style="color: red;">*</span></label>
					<input type="text" class="form-control" name="country" required value="{{ old('country') }}">
					<label class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.city') }} <span style="color: red;">*</span></label>
					<input type="text" class="form-control" name="city" required value="{{ old('city') }}">
					<div class="col-lg-4 pl-0">
						<label class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.zip') }} <span style="color: red;">*</span></label>
						<input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}" required>
					</div>
					<label class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.address') }} <span style="color: red;">*</span></label>
					<input type="text" value="{{ old('address') }}" class="form-control" name="address" placeholder="{{ trans('study-registration.address-example') }}" required>
				</div>
				<div class="col-lg-10 text-left border border-light" style="margin: 0 auto;padding:10px;">
					<h2 class="mt-3 text-center">{{ trans('study-registration.feedback') }}</h2>
					<label class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.how-you-learn-about-us') }}</label>
					<select class="form-control" id="selectHowYouLearn" name="how_you_learn_about_us" required>
						<option selected disabled value="">{{ trans('study-registration.select-option') }}</option>
						<option {{ old('how_you_learn_about_us') == 'Facebook' ? 'selected' : '' }} value="Facebook">Facebook</option>
						<option {{ old('how_you_learn_about_us') == 'Instagram' ? 'selected' : '' }} value="Instagram">Instagram</option>
						<option {{ old('how_you_learn_about_us') == 'LinkedIn' ? 'selected' : '' }} value="LinkedIn">LinkedIn</option>
						<option {{ old('how_you_learn_about_us') == 'Internet Search Engine' ? 'selected' : '' }} value="Internet Search Engine">{{ trans('study-registration.internet') }}</option>
						<option {{ old('how_you_learn_about_us') == 'Universitaet.com' ? 'selected' : '' }} value="Universitaet.com">Universitaet.com</option>
						<option {{ old('how_you_learn_about_us') == 'From a friend' ? 'selected' : '' }} value="From a friend">{{ trans('study-registration.from-friend') }}</option>
						<option {{ old('how_you_learn_about_us') == 'Other' ? 'selected' : '' }} value="Other">{{ trans('study-registration.other') }}</option>
					</select>
					<label class="mt-3 font-weight-bold mb-0">{{ trans('study-registration.why-choose-our-institute') }}</label>
					<select class="form-control" id="selectWhyChooseUs" name="why_did_you_chose_us" required>
						<option hidden value="0">{{ trans('study-registration.select-option') }}</option>
						<option {{ old('why_did_you_chose_us') == 'Attractive price' ? 'selected' : ''}} value="Attractive price">{{ trans('study-registration.price') }}</option>
						<option {{ old('why_did_you_chose_us') == 'Because it is online' ? 'selected' : ''}} value="Because it is online">{{ trans('study-registration.onllne') }}</option>
						<option {{ old('why_did_you_chose_us') == 'Positive opinions' ? 'selected' : ''}} value="Positive opinions">{{ trans('study-registration.opinions') }}</option>
						<option {{ old('why_did_you_chose_us') == 'Attractive study programs' ? 'selected' : ''}} value="Attractive study programs">{{ trans('study-registration.programs') }}</option>
					</select>
				</div>

				
				<div class="col-lg-10 text-left mt-5 border border-light" style="margin: 0 auto;padding:10px;">

		    		<div class="form-group mt-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck" name="agree_to_terms" required>
							<label class="form-check-label" for="gridCheck">
								<div>
									{!! trans('study-registration.terms') !!}
								</div>
							</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck" name="agree_to_terms" required>
							<label class="form-check-label" for="gridCheck">
								<div>
									{!! trans('study-registration.privacy') !!}
								</div>
							</label>
						</div>
					</div>
				</div>

				<div class="col-lg-10 w-100" style="margin: 20px auto;">
					<button type="submit" class="btn w-100 orange-button px-0 mb-5">{{ trans('study-registration.submit') }}</button>
				</div>
			</form>
				</div>
		</div>
	</div>
@endsection

@section('footerScripts')
	<script type="text/javascript">
		$(document).ready(function(){

			$('.studies-button').on('click', function(){
				$('#fee').html('');
				$('#payment-option').html('');
				$('#program-select').html('');
				$('.studies-button').removeClass('selected-button');
				$('#start_date').removeClass('d-block').addClass('d-none')
				$(this).addClass('selected-button');
				$('.program-option').prop('disabled', true).addClass('d-none');

				let study_id = $(this).attr('data-id');

				$.ajax({
					data: {study_id: study_id},
					method: "POST",
					url: "{{route('get-programs')}}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				}).done(function(response) {
					
					if(response.id == 1 || response.id == 4 || response.id == 5){
						let programs_html = '';
						for (const program of response.programs) {
							programs_html += `<option value="${program.id}">${program.translated.name}</option>`;
						}
						$('#program-select').html(programs_html);

						let time_period_html = '';

						for (const period of response.studies_periods) {
							time_period_html += `
							<div class="col-md-3">
								<label data-study="${study_id}" data-study-period="${period.id}" class="time-button time-period form-control" for="${period.period.key}">${period.period.translated.name}</label>
								<input  id="${period.period.key}" name="learning_period"  type="radio" value="${period.period.key}" class="d-none time-checkbox">
							</div>`;
						}
						$('#time_periods').html(time_period_html);
					}
					else{
						let programs_html = '';
						let time_period_html = '';
						
						for (const r of response) {
							for (const program of r.programs) {
								programs_html += `<option value="${program.id}">${program.translated.name}</option>`;
							}
							for (const period of r.studies_periods) {
								time_period_html += `
								<div class="col-md-3">
									<label data-study="${study_id}" data-study-period="${period.id}" class="time-button time-period form-control" for="${period.period.key}">${period.period.translated.name}</label>
									<input  id="${period.period.key}" name="learning_period"  type="radio" value="${period.period.key}" class="d-none time-checkbox">
								</div>`;
							}
						}
						
						$('#program-select').html(programs_html);
						$('#time_periods').html(time_period_html);

					}
					

				});
 
			});

			$('#program_day').on('change', function(){
				$('#date-error').html('')
				validateDate()
			})

			$('#program_month').on('change', function(){
				$('#date-error').html('')
				validateDate()
			})

			$('#program_year').on('change', function(){
				$('#date-error').html('')
				validateDate()
			});

			$('.custom-file-input').on('change', function(e){
				$('#file-validation-error').html('');
				let name = e.target.files[0].name;
				let extention = name.split('.').pop();
				let allowed_extentions = ['docx','pdf'];
				let message  = `{!! __('study-registration.incorrect-file') !!}`;

				if(!allowed_extentions.includes(extention)){ 
					$('#file-validation-error').html(message);
					$(this).val("");
					return;
				}
				$(this)
					.closest('.custom-file')
					.find('.custom-file-label')
					.css('background','#D1FFBE')
					.css('color','green')
					.html(name);
			});


		});
		$(document).on('click','.time-period',function() {
				$('#fee').html('');
				$('#payment-option').html('');
				$('.time-period').removeClass('selected-button');
				$('.time-checkbox').prop('checked', false);
				$(this).addClass('selected-button');
				$('#start_date').removeClass('d-block').addClass('d-none')
				let study_period = $(this).attr('data-study-period');
				$.ajax({
					data: {study_period: study_period},
					method: "POST",
					url: "{{route('get-payments-options')}}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				}).done(function(payment_options) {
					payment_html = '<option value="" selected disabled>{!! __('study-registration.select-option') !!}</option>`;';
					for (const option of payment_options) {
						payment_html += `
						<option data-price="${option.price}">${option.payment.translated.name}</option>`;
					}
					$('#payment-option').html(payment_html);
						$('#start_date').removeClass('d-none').addClass('d-block')
				});
				
		});
		
		$(document).on('change','#payment-option',function() {
			const formatter = new Intl.NumberFormat('en-US', {
				style: 'currency',
				currency: 'EUR'
			});
			let value = formatter.format($('#payment-option option:selected').attr('data-price'));
			$('#fee').html(value);
		})
		function validateDate(){	

			let message  = `{!! __('study-registration.incorrect-date') !!}`;
			let day = +$('#program_day').val();
			let month = $('#program_month option:selected').attr('data-value');
			let year = $('#program_year').val();
			let date = new Date(year,month,day);
			let daysInMonth = new Date(year, month, 0).getDate();

			if(day > daysInMonth || day < 1){
				$('#date-error').html(message)
				return 0;
			}
			else if(year < date.getFullYear() || year.length != 4 ){
				$('#date-error').html(message)
				return 0;
			}
			else if(date < new Date()){
				$('#date-error').html(message)
				return 0;
			}

			return 1;
		}
	</script>
@endsection	
