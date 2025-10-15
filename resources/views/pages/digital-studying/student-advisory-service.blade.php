@extends('template')

@section('seo')
	<title>{{ trans('student-advisory-service.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('student-advisory-service.meta-description')}}" />

	<meta itemprop="title" property="og:title" content="{{ trans('student-advisory-service.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/studienberatung"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/student-assistance-team"/>
	@endif
	<meta property="og:description" content="{{ trans('student-advisory-service.meta-description')}}"/>
	<x-meta-image itemprop="image" nickname="student_advisory_service"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/student-assistance-team" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/studienberatung" hreflang="de" />	
	<link rel="alternate" href="{{ config('app.url') }}/en/student-assistance-team" hreflang="x-default" />
@endsection

@section('headCSS')
<style>	
	.tooltip.show {
  		opacity: 1;
	}
	.tooltip-inner {
		display: flex;
		align-items: center;
    	justify-content: center;
    	max-width: 350px;
    	width: 250px;
		padding: 1rem !important;
		color: black !important;
		background:white !important;
		color: rgba(0, 0, 0, 1);
		box-shadow: 0px 0px 27px -1px rgba(66, 68, 90, 1);
		border: 0px solid black !important;
	}
	.bs-tooltip-auto[x-placement^=right] .arrow::before,
	.tooltip.right .arrow::before {
		border-right-color: #EF6024 !important;
	}
	.bs-tooltip-auto[x-placement^=left] .arrow::before,
	.bs-tooltip-left .arrow::before	{
		border-left-color: #EF6024 !important;
	}
	.bs-tooltip-auto[x-placement^=top] .arrow::before,
	.bs-tooltip-top .arrow::before {
		border-top-color: #EF6024 !important;
	}
	.bs-tooltip-auto[x-placement^=bottom] .arrow::before,
	.bs-tooltip-bottom .arrow::before {
		border-bottom-color: #EF6024 !important;
	}

	.contact-wrapper h1{
		font-size:2rem;
	}
	.contact-wrapper h2{
		font-size:1.6rem;
	}
	.contact-wrapper h3{
		font-size:1.1rem;
	}
	.contact-wrapper h1,
	.contact-wrapper h2,
	.contact-wrapper h3{
		color:#2980B9;
		
	}
	.contact-wrapper h3{
		margin-bottom:20px;
		
	}
	.contact-wrapper h1,
	.contact-wrapper h2{
		margin:20px 0;
		padding:10px;
	}
	.contact-wrapper{
		padding:50px;
	}
	#contact-form input,
	#contact-form select,
	#contact-form textarea{
		background:#F3FAFF;
		border:none;
	}
	.contact-icons{
		color:#2980B9;
		font-size:20px;
	}
	.contact-text-phone{
		display:flex;
		justify-content:center;
	}
	.contact-text-working-hours{
		display:flex;
		justify-content:end;
	}
	.contact-form{
		padding:40px;
	}
	@media (max-width: 500px)
	{
		.hover-picture{
			padding-top:30px;
		}
		.contact-form{
			padding:0px;
		}
	}
	@media (max-width: 992px)
	{
		.contact-text{
			display:flex;
			justify-content:center;
		}
		.icon-headset, .contact-text-working-hours{
			display:flex;
			justify-content:center;
		}
		
	}
	@media (min-width: 1200px) and (max-width: 1300px)
	{
		.contact-icons{
			font-size:11px;
		}
	}
	@media (min-width: 1300px) and (max-width: 1400px)
	{
		.contact-icons{
			font-size:12px;
		}
	}
	@media (min-width: 1400px) and (max-width: 1770px)
	{
		.contact-icons{
			font-size:13px;
		}
	}
	@media (min-width: 1670px) and (max-width: 1970px)
	{
		.contact-icons{
			font-size:15px;
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
			<a href="{{ config('app.url') }}/en/student-assistance-team" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/studienberatung" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('student-advisory-service.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="student_advisory_service" class="student_advisory_service-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">

	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style shadow" style="padding:40px;">
			<h1 class="page-headings">{{ trans('student-advisory-service.heading') }}</h1>
			<div class="page-content">{!! trans('student-advisory-service.text') !!}</div>
	
			<h2 style="padding-bottom:20px;">{!! trans('student-advisory-service.second-heading') !!}</h2>
			
			<div class="row d-flex justify-content-center text-center" style="padding-bottom:40px;">
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-1" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-1') !!}">
					<x-image-component nickname="contact-us-first-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.first-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-2" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-2') !!}">
					<x-image-component nickname="contact-us-two-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.second-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-3" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-3') !!}">
					<x-image-component nickname="contact-us-three-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.third-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-4" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-4') !!}">
					<x-image-component nickname="contact-us-four-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.four-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-5" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-5') !!}">
					<x-image-component nickname="contact-us-five-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.fifth-icon-heading') !!}</h3>
				</div>
				<div class="d-none d-lg-none d-xl-block col-xl-12 p-3"></div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-6" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-6') !!}">
					<x-image-component nickname="contact-us-six-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.sixth-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-7" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-7') !!}">
					<x-image-component nickname="contact-us-seven-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.seventh-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-8" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-8') !!}">
					<x-image-component nickname="contact-us-eight-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.eight-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-9" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-9') !!}">
					<x-image-component nickname="contact-us-nine-icon" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.ninth-icon-heading') !!}</h3>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6 col-xl hover-picture" data-placement="top" data-toggle="tooltip" data-target="#modal-10" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('student-advisory-service.modal-10') !!}">
					<x-image-component nickname="bubble-message-boxes" class="w-50" />
					<h3 class="contact-icons">{!! trans('student-advisory-service.ten-icon-heading') !!}</h3>
				</div>
			</div>

			<div class="row  d-flex justify-content-center contact-form">
				<div class="col-md-9 col-lg-9 shadow">
					<form action="{{ route('general-request') }}" method="POST" style="margin:50px 0;" id="contact-form">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-12">
								<h4>{!! trans('student-advisory-service.contact-us-text') !!}</h4>
							</div>
							<div class="col-lg-6 my-2">
								<label for="name_request">{{ trans('student-advisory-service.name-placeholder') }}</label>
								<input autocomplete="off" value="{{ old('name_request') }}" required type="text" name="name_request" class="form-control w-100 @error('name_request') is-invalid @enderror">
								@error('name_request') <span class="validation-error">{!! $errors->first('name_request') !!}</span> @enderror

							</div>
							<div class="col-lg-6 my-2">
								<label for="email_request">{{ trans('student-advisory-service.email-placeholder') }}</label>
								<input autocomplete="off" value="{{ old('email_request') }}" required type="email" name="email_request"  class="form-control w-100  @error('email_request') is-invalid @enderror" >
								@error('email_request') <span class="validation-error">{{ $errors->first('email_request') }}</span> @enderror
							</div>
							<div class="col-lg-12 my-2">
								<label for="request_type">{!! trans('student-advisory-service.dropdown-option-request') !!}</label>
								<select required type="text" name="request_type" id="request_type"  placeholder="{{trans('student-advisory-service.subject-placeholder')}}" class="form-control w-100 @error('request_type') is-invalid @enderror">
									<option value="">{{ trans('welcome.please-select') }}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-one') !!}">{!! trans('student-advisory-service.dropdown-option-one') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-two') !!}">{!! trans('student-advisory-service.dropdown-option-two') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-three') !!}">{!! trans('student-advisory-service.dropdown-option-three') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-four') !!}">{!! trans('student-advisory-service.dropdown-option-four') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-five') !!}">{!! trans('student-advisory-service.dropdown-option-five') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-six') !!}">{!! trans('student-advisory-service.dropdown-option-six') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-seven') !!}">{!! trans('student-advisory-service.dropdown-option-seven') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-eight') !!}">{!! trans('student-advisory-service.dropdown-option-eight') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-nine') !!}">{!! trans('student-advisory-service.dropdown-option-nine') !!}</option>
									<option value="{!! trans('student-advisory-service.dropdown-option-ten') !!}">{!! trans('student-advisory-service.dropdown-option-ten') !!}</option>
								</select>
								@error('request_type') <span class="validation-error">{{ $errors->first('request_type') }}</span> @enderror
							</div>
							<div class="col-lg-12 my-2">
									<label for="subject">{{trans('student-advisory-service.subject-placeholder')}}</label>
									<input autocomplete="off" value="{{ old('subject') }}" required type="text" name="subject" id="subject"   class="form-control w-100 @error('subject') is-invalid @enderror">
									@error('subject') <span class="validation-error">{{ $errors->first('subject') }}</span> @enderror
							</div>
							<div class="col-lg-12 my-2">
								
							</div>
							<div class="col-lg-12 text-left">
								<label for="message">{{trans('student-advisory-service.message-placeholder')}}</label>
								<textarea autocomplete="off" required rows="10" name="message" id="message" class="form-control w-100 @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
								@error('message') <span class="validation-error">{{ $errors->first('message') }}</span> @enderror					

								<label class="ohnohoney" for="name"></label>
								<input class="ohnohoney" autocomplete="off" type="text" id="name" name="name" placeholder="{{trans('modals.cookies-accept-button')}}">
								<label class="ohnohoney" for="email"></label>
								<input class="ohnohoney" autocomplete="off" type="email" id="email" name="email" placeholder="{{trans('modals.cookies-accept-button')}}">
								<div class="input-group mt-2 mb-3">
                    
									@if(config('services.recaptcha.key'))
										<div class="g-recaptcha"
										data-sitekey="{{config('services.recaptcha.key')}}" style="margin: 0 auto;">
										</div>
									@endif
								</div>
								
							</div>
							<div class="text-center col-md-12">
								<button class="orange-button btn mt-3" style="border-radius: 30px;">{!! trans('student-advisory-service.send-button') !!}</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<br>
			<div class="page-content d-flex justify-content-center">{!! trans('student-advisory-service.message-below-first') !!}</div>
			<br><br>

			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="row justify-content-center">
						<div class="col-md-3 icon-headset d-flex justify-content-center">
							<x-image-component class="h-auto w-auto" nickname="contact-us-tech-support"/>
						</div>
						<div class="col-md-9 d-flex justify-content-center align-items-center">
							<div class="page-content">
								<p>{!! trans('student-advisory-service.message-below-second') !!}</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-12 p-4">
					<div class="col-md-12 col-lg-12">
						<div class="h-100">
							<hr>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-3 contact-text">
									<p class="mb-0">{{ trans('student-advisory-service.support-english') }}</p>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4 contact-text-phone">
									<p class="mb-0">{{ trans('student-advisory-service.phone_one') }}</p>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-5 contact-text contact-text-working-hours">
									<p class="mb-0">{{ trans('student-advisory-service.working-time-one') }}</p>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-3 contact-text">
									<p class="mb-0">{{ trans('student-advisory-service.support-german') }}</p>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4 contact-text-phone">
									<p class="mb-0">{{ trans('student-advisory-service.phone_two') }}</p>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-5 contact-text contact-text-working-hours">
									<p class="mb-0">{{ trans('student-advisory-service.working-time-two') }}</p>
								</div>
							</div>
							<hr>
						</div>				
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 page-content d-flex justify-content-center page-headings">
					<br><br>
					<p>{!! trans('student-advisory-service.message-below-fifth') !!}</p>
				</div>
			</div>				
		</div>
	</div>
</div>

<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
@endsection
