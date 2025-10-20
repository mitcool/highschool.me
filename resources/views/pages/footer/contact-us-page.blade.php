@extends('template')

@section('seo')
	<title>{{trans('contact-us.meta-title')}}</title>
	<meta itemprop="title" property="og:title" content="{{trans('contact-us.meta-title')}}"/>

	<meta property="og:title" content="{{trans('contact-us.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/kontakt"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/contact"/>
	@endif
	<meta itemprop="description" property="og:description" content="{{trans('contact-us.meta-title')}}"/>
	<x-meta-image itemprop="image" nickname="contact-form-background"/>

	<meta name="description" content="{{ trans('contact-us.meta-description') }}" />
	<link rel="alternate" href="{{ config('app.url') }}/en/contact" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/kontakt" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/contact" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/contact" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/kontakt" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
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
</style>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('contact-us.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="contact-form-background" class="w-100" loading="eager"/>

<div class="container-fluid main_page_container">
	<div class="row justify-content-center ">
		<div class="col-md-8 container-style contact-wrapper text-center">
			<h1>{!! trans('contact-us.first-heading') !!}</h1>
			<div class="page-content">{!! trans('contact-us.description') !!}</div>
			<h2>{!! trans('contact-us.second-heading') !!}</h2>
			<div class="row text-center">
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-1" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-1') !!}">
					<x-image-component nickname="contact-us-first-icon" class="w-50" />
					<h3>{!! trans('contact-us.first-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-2" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-2') !!}">
					<x-image-component nickname="contact-us-two-icon" class="w-50" />
					<h3>{!! trans('contact-us.second-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-3" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-3') !!}">
					<x-image-component nickname="contact-us-three-icon" class="w-50" />
					<h3>{!! trans('contact-us.third-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-4" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-4') !!}">
					<x-image-component nickname="contact-us-four-icon" class="w-50" />
					<h3>{!! trans('contact-us.four-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-5" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-5') !!}">
					<x-image-component nickname="contact-us-five-icon" class="w-50" />
					<h3>{!! trans('contact-us.fifth-icon-heading') !!}</h3>
				</div>
			</div>

			<div class="row text-center">			
			  	<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-6" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-6') !!}">
					<x-image-component nickname="contact-us-six-icon" class="w-50" />
					<h3>{!! trans('contact-us.sixth-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-7" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-7') !!}">
					<x-image-component nickname="contact-us-seven-icon" class="w-50" />
					<h3>{!! trans('contact-us.seventh-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-8" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-8') !!}">
					<x-image-component nickname="contact-us-eight-icon" class="w-50" />
					<h3>{!! trans('contact-us.eight-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg" data-placement="top" data-toggle="tooltip" data-target="#modal-9" style="cursor: pointer; background:none; box-shadow:none;" title="{!! trans('contact-us.modal-9') !!}">
					<x-image-component nickname="contact-us-nine-icon" class="w-50" />
					<h3>{!! trans('contact-us.ninth-icon-heading') !!}</h3>
				</div>
				<div class="col-md-6 col-lg"></div>
				
				
			</div>
			<form action="/send-email-modal" method="POST" style="margin:50px 0;" id="contact-form">
			  	{{csrf_field()}}
				  <div class="row">
					<div class="col-lg-12">
						<h4>{!! trans('contact-us.contact-us-text') !!}</h4>
					</div>
					  <div class="col-lg-6 my-2">
						  <input autocomplete="off" value="{{ old('name_request') }}" required type="text" name="name_request" placeholder="{{ trans('contact-us.name-placeholder') }}" class="form-control w-100 @error('name_request') is-invalid @enderror">
						  @error('name_request') <span class="validation-error">{!! $errors->first('name_request') !!}</span> @enderror
  
					  </div>
					  <div class="col-lg-6 my-2">
						  <input autocomplete="off" value="{{ old('email_request') }}" required type="email" name="email_request" placeholder="{{ trans('contact-us.email-placeholder') }}"  class="form-control w-100  @error('email_request') is-invalid @enderror" >
						  @error('email_request') <span class="validation-error">{{ $errors->first('email_request') }}</span> @enderror
					  </div>
					  <div class="col-lg-12 my-2">
						<select required type="text" name="request_type"  placeholder="{{trans('contact-us.subject-placeholder')}}" class="form-control w-100 @error('request_type') is-invalid @enderror">
							<option value="">{!! trans('contact-us.dropdown-option-request') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-one') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-two') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-three') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-four') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-five') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-six') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-seven') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-eight') !!}</option>
							<option value="">{!! trans('contact-us.dropdown-option-nine') !!}</option>
						</select>
						@error('request_type') <span class="validation-error">{{ $errors->first('request_type') }}</span> @enderror
				  	</div>
					  <div class="col-lg-12 my-2">
							<input autocomplete="off" value="{{ old('subject') }}" required type="text" name="subject"  placeholder="{{trans('contact-us.subject-placeholder')}}" class="form-control w-100 @error('subject') is-invalid @enderror">
							@error('subject') <span class="validation-error">{{ $errors->first('subject') }}</span> @enderror
					  </div>
					  <div class="col-lg-12 my-2">
						   
					  </div>
					  <div class="col-lg-12 text-center">
						  <textarea autocomplete="off" required rows="10" name="message" placeholder="{{trans('contact-us.message-placeholder')}}" class="form-control w-100 @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
						  @error('message') <span class="validation-error">{{ $errors->first('message') }}</span> @enderror
						  
						  
						  <label class="ohnohoney" for="name"></label>
						  <input class="ohnohoney" autocomplete="off" type="text" id="name" name="name" placeholder="{{trans('modals.cookies-accept-button')}}">
						  <label class="ohnohoney" for="email"></label>
						  <input class="ohnohoney" autocomplete="off" type="email" id="email" name="email" placeholder="{{trans('modals.cookies-accept-button')}}">
						  <input type="hidden" name="age">
						  <button class="orange-button btn mt-3" style="border-radius: 30px;">{!! trans('contact-us.send-button') !!}</button>
					  </div>
				  </div>
			</form>
			<br>
			<div class="page-content">{!! trans('contact-us.message-below-first') !!}</div>
			<br><br>

			<div class="row justify-content-center">
				<div class="col-md-4 d-flex justify-content-center">
					<x-image-component class="h-auto w-auto" nickname="contact-us-tech-support"/>
				</div>
				<div class="col-md-6 d-flex justify-content-center align-items-center">
					<div class="page-content">
						<p>{!! trans('contact-us.message-below-second') !!}</p>
						<p>{!! trans('contact-us.message-below-third') !!}</p>
						<p>{!! trans('contact-us.message-below-fourth') !!}</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 page-content">
					<br><br>
					<p>{!! trans('contact-us.message-below-fifth') !!}</p>
				</div>
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
