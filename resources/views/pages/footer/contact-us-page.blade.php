@extends('template')

@section('seo')
	<title>HIGHSCHOOL.ME | Contact Us</title>
	<meta itemprop="title" property="og:title" content="{{trans('contact-us.meta-title')}}"/>

	<meta property="og:title" content="{{trans('contact-us.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/contact"/>
	
	<meta itemprop="description" property="og:description" content="{{trans('contact-us.meta-title')}}"/>
	<x-meta-image itemprop="image" nickname="contact-form-background"/>

	<meta name="description" content="{{ trans('contact-us.meta-description') }}" />
	
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
	.contact-categories {
		background-color: #EF6024;
		color: white;
		padding: 24px 20px;
		margin: 20px 0;
		border-radius: 15px;
		height: 100%;
		width: 100%;
	}
	.category-container {
		display: flex;
		margin-top: 20px;
	}
	.category-topic {
		font-size: 19px;
		font-weight: 600;
		height: 60px;
	}
	.category-description {
		font-size: 14px;
		margin-bottom: 0;
	}
	.category-icon-frame {
		width: 115px;
		height: 115px;
		margin: 0 auto;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.category-icon {
		width: 100%;
		height: 100%;
		object-fit: contain;
		display: block;
	}
	@media(max-width:800px){
		#phone{
			margin-top:20px;
		}
		#footer{
			padding-top:0 !important;
		}
	}
</style>
@endsection

@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
	</ol>
</div>

<x-image-component nickname="contact-form-background" class="w-100" loading="eager"/>

<div class="container-fluid main_page_container ">
	<div class="row justify-content-center ">
		<div class="col-md-10 contact-wrapper text-center">
			<h1>{{ $texts['heading'] }}</h1>
			<div class="page-content text-center">
				{!! $texts['intro'] !!}
			</div>
		</div>
	</div>
</div>

<div style="background-color: #025297; padding: 20px;">
	<div class="col-md-8" style="margin: 0 auto;">
		<h2 class="text-white text-center mt-3 mb-4">
			{{ $texts['topics'] }}
		</h2>
		<div class="row text-center mb-5">
			@foreach($categories as $cat)
			<div class="col-md-4 category-container">
				<div class="contact-categories">
					<div class="category-icon-frame mt-3">
						<img src="{{ asset('/images/contact-page') }}/{{ $cat->icon }}" class="category-icon" alt="{{ $cat->topic }}">
					</div>
					<p class="mt-3 category-topic">{{ $cat->topic }}</p>
					<p class="category-description">{{ $cat->description }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="col-md-10">
	
</div>
<div class="row col-md-8 mx-auto mb-0 pt-5 pb-5">
	<div class="col-md-6">
		<form action="/send-email-modal" method="POST"  id="contact-form">
  		{{csrf_field()}}
			<div class="row">
				<div class="col-lg-12 text-center mb-3">
					{!! $texts['form-intro'] !!}
				</div>
				<div class="col-lg-12 my-2">
					<input autocomplete="off" value="{{ old('name_request') }}" required type="text" name="name_request" placeholder="{{ $texts['name-placeholder'] }}" class="form-control w-100 @error('name_request') is-invalid @enderror">
					@error('name_request') <span class="validation-error">{!! $errors->first('name_request') !!}</span> @enderror
				</div>
				<div class="col-lg-12 my-2">
					<input autocomplete="off" value="{{ old('email_request') }}" required type="email" name="email_request" placeholder="{{ $texts['email-placeholder'] }}"  class="form-control w-100  @error('email_request') is-invalid @enderror" >
					@error('email_request') <span class="validation-error">{{ $errors->first('email_request') }}</span> @enderror
				</div>

				<div class="col-lg-12 my-2">
					<select class="form-control">
						<option disabled selected>{{ $texts['topic-placeholder'] }}</option>
						@foreach($categories as $cat)
							<option value="{{ $cat->id }}">{{ $cat->topic }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="col-lg-12 text-center my-2">
					<textarea autocomplete="off" required rows="10" name="message" placeholder="{{ $texts['message-placeholder'] }}" class="form-control w-100 @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
					@error('message') <span class="validation-error">{{ $errors->first('message') }}</span> @enderror
					
					<label class="ohnohoney" for="name"></label>
					<input class="ohnohoney" autocomplete="off" type="text" id="name" name="name" placeholder="{{trans('modals.cookies-accept-button')}}">
					<label class="ohnohoney" for="email"></label>
					<input class="ohnohoney" autocomplete="off" type="email" id="email" name="email" placeholder="{{trans('modals.cookies-accept-button')}}">
					<input type="hidden" name="age">

					{{-- reCAPTCHA --}}
                    <div class="form-group text-center mt-4 mb-4">
                        <div class="g-recaptcha d-inline-block"
                             data-sitekey="{{ config('services.recaptcha.key') }}">
                        </div>
                    </div>

					<button class="orange-button btn mt-3" style="border-radius: 30px;">{{ $texts['submit-btn'] }}</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-6 w-100" id="phone">
		<div class="d-flex justify-content-center align-items-center flex-column w-100">
			<h2 class="mb-3 text-center" style="color: #025297;">{{ $texts['phone-heading'] }}</h2>
			<p class="text-center">
			{{ $texts['phone-subheading'] }}<br>
			<p class="text-center" style="color: #EF6024; font-size: 24px; font-weight: 700;">{{ $texts['phone-number'] }}</p>
		</div>
	</div>
</div>

<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
@endsection
