@extends('template')

@section('seo')
	<title>{{ trans('digital-studies.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('digital-studies.meta-description')}}" />

	<meta itemprop="title" property="og:title" content="{{ trans('digital-studies.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/online-studieren"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/smart-studies"/>
	@endif
	<meta property="og:description" content="{{ trans('digital-studies.meta-description')}}"/>
	<x-meta-image itemprop="image" nickname="digital_studies"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/smart-studies" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/en/smart-studies" hreflang="x-default" />
	<link rel="alternate" href="{{ config('app.url') }}/de/online-studieren" hreflang="de" />
@endsection


@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/smart-studies" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/online-studieren" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('digital-studies.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="us-flag" class="digital_studies-images main-pictures-pages"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8">
			<section>
				<h1 class="page-headings text-center">School Overview</h1>
				<h4>Earn real high school credits through a recognized curriculum that meets national academic standards.</h4>
				<div class="page-content" style="margin-top:50px;">Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf höchstem Niveau zu unterstützen.Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf höchstem Niveau zu unterstützen.</div>
			</section>

			
			{{-- <div class="d-flex justify-content-center">
				<iframe width="800" height="450" src="https://www.youtube.com/embed/TZRz1KtPfN8?si=1SCyQX_SWoWm-MfL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
			</div> --}}
		</div>
	</div>
</div>
<section style="background: #025297;color:white;">
	<h2 class="text-white page-headings" style="padding-top:30px;">Send us a message</h2>
	<form action="" class="jumbotron container bg-transparent mt-2 pt-2		">
		<label class="font-weight-bold" for="">Name</label>
		<input type="text" class="form-control">
		<label class="font-weight-bold" for="">Email</label>
		<input type="text" class="form-control">
		<label class="font-weight-bold" for="">Message</label>
		<textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
		<div class="d-flex mt-3">
			<div>
				<input type="checkbox"> <label for="" class="text-white">
			</div>
			<div>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod tempor neque consequat accumsan. Vestibulum viverra blandit nunc ac auctor.
			</div>
			
		</label>
		</div>
		<div class="d-flex justify-content-center">
			@if(config('services.recaptcha.key'))
				<div class="g-recaptcha"
				data-sitekey="{{config('services.recaptcha.key')}}" style="margin: 0 auto;">
				</div>
			@endif
		</div>
		<div class="d-flex justify-content-center mt-3">
			<button class="btn orange-button">Send</button>
		</div>
	</form>
</section>
@endsection
