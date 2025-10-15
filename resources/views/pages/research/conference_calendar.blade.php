@extends('template')

@section('seo')
	<title>{{trans('conference-calendar.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('conference-calendar.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{trans('conference-calendar.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/eventkalender"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/event-calendar"/>
	@endif
	<meta property="og:description" content="{{ trans('conference-calendar.meta-description') }}"/>	
	@php
		$first_conference = null;
		if(count($conferences) > 0){
			$first_conference = $conferences->first();
		}
		$first_conference_id = $first_conference ? $first_conference->id : null;
	@endphp
	@if($first_conference_id)
		
	@endif
	
	<link rel="alternate" href="{{ config('app.url') }}/en/event-calendar" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/eventkalender" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/event-calendar" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/event-calendar" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/eventkalender" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('conference-calendar.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<div class="container-fluid bg-light main_page_container">
	<div class="row">
		<div class="col-md-10 offset-md-1 p-5">
			<h1 class="page-headings">{{ trans('conference-calendar.heading') }}</h1>
			<div class="row h-100">
				@foreach($conferences as $c)
					<div class="col-md-4 news_wrapper ">
						<div class="news_container shadow">
						  <a href="{{route('single-conference-'.app()->currentLocale(),$c->translated->slug)}}" class="w-100">
						  	<x-image-component class="w-100" nickname="conference-{{ $c->id }}" style="max-height:220px;" loading="eager"/>
						  </a>
						  <div class="news_body p-3">
						  	<strong>{{ $c->formated_date_from() }} - {{$c->formated_date_to()}}</strong>
						    <h5 class="news_heading my-2">{{$c->translated->heading}}</h5>
						    <p class="conferences_short_description">{!!$c->translated->short_description!!}</p>
						  </div>
						 <div class="row text-center">
							<div class="col-md-6">
								<a href="{{route('single-conference-'.app()->currentLocale(),$c->translated->slug)}}" class="btn btn-secondary">{{ trans('conference-calendar.apply') }}</a>
							</div>
							<div class="col-md-6">
								<a class="copyLink btn read-more text-white" data-link="{{route('single-conference-'.app()->currentLocale(),$c->translated->slug)}}" data-toggle="modal" data-target="#share_modal">{{ trans('conference-calendar.share') }}</a>
							</div>
							</div>
							<br>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
