@extends('template')


@section('seo')
	<title>{{trans('recent-publications.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('recent-publications.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{trans('recent-publications.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/eventkalender/{{ $hreflang_de }}"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/event-calender/{{ $hreflang_en }}"/>
	@endif
	<meta property="og:description" content="{{ trans('recent-publications.meta-description') }}"/>
	<meta itemprop="image" property="og:image" content="{{asset('/images/conference-images')}}/{{$conference->picture}}" />

	<link rel="alternate" href="{{ config('app.url') }}/en/event-calender/{{ $hreflang_en }}" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/eventkalender/{{ $hreflang_de }}" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/event-calender/{{ $hreflang_en }}" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/event-calender/{{ $hreflang_en }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/eventkalender/{{ $hreflang_de }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(trans('recent-publications.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<div class="container-fluid main_page_container">
	<div class="row">	
		<img src="{{asset('/images/conference-images')}}/{{$conference->picture}}" class="main-pictures-pages" loading="eager">
		<div class="col-md-10 offset-md-1">
			<div class="row">
				<div class="col-md-12">
					<h1 class="px-5">{{$conference->heading}}</h1>
				</div>
				<div class="col-md-5">
					<p><i class="far fa-calendar"></i> {{trans('single-conference.from')}} {{ $conference->formated_date_from() }}</p>
					<p><i class="far fa-calendar"></i> {{trans('single-conference.to')}} {{ $conference->formated_date_to() }}</p>
				</div>
				<div class="col-md-5">
					<p><i class="far fa-calendar"></i> {{trans('single-conference.deadline')}} {{ $conference->formated_deadline() }}</p>
					<p><i class="fas fa-user-friends"></i> {{trans('single-conference.places')}} {{$conference->places}}</p>
				</div>
			</div>
			<hr>
			<div class="row mt-2">
				<p>{!! $conference->translated->long_description !!}</p>
			</div>
			<hr>

			@if($conference->places>0 && !$conference->deadlineIsPassed())
			 <div class="row text-center">
				<div class="col-md-4 offset-md-2">
					<a id="show_apply_form" data-toggle="modal" data-target="#apply-modal" class="btn read-more text-white">{{trans('single-conference.apply')}}</a>
				</div>
				<div class="col-md-4">
					<a class="btn btn-secondary text-white" data-toggle="modal" data-target="#share_modal">{{trans('single-conference.share')}}</a>
				</div>
				</div>
				<br>
			</div>
			@elseif($conference->places<=0)
			<div class="row text-center">
				<div class="col-md-10 offset-md-1">
					<h3>{{trans('single-conference.no-more-places')}}</h3>
				</div>
				<br>
			</div>
			@else
			<div class="row text-center">
				<div class="col-md-10 offset-md-1">
					<h3>{{trans('single-conference.expired')}}</h3>
				</div>
				<br>
			</div>
			@endif
		</div>
	</div>
	<hr />
	<div class="row ">
		<div class="col-md-8 offset-md-2" style="padding:30px">
			<h1 class="text-center">{{$conference->translated->heading}}</h1>
			<h5  class="text-center">{{trans('apply-conference.heading')}}</h5>
			<form action="{{route('apply-now',$conference->id)}}" method="POST">
				{{csrf_field()}}
				<div class="row apply-row">
					<div class="col-md-1 flex-right"></div>
					<div class="col-md-5 flex-center">
						<input type="text" required name="firstname" class="form-control m-1" placeholder="{{trans('apply-conference.firstname')}}">
					</div>
					<div class="col-md-5 flex-center">
						<input type="text" required name="lastname" class="form-control m-1" placeholder="{{trans('apply-conference.lastname')}}">
					</div>
				</div>	
				<div class="row apply-row">
					<div class="col-md-1"></div>
					<div class="col-md-10 flex-center">
						<input type="text" required name="street" class="form-control m-1" placeholder="{{trans('apply-conference.street')}}">
					</div>
				</div>	
				<div class="row apply-row">
					<div class="col-md-10 offset-md-1 flex-center">
						<input type="text" required name="address" class="form-control m-1" placeholder="{{trans('apply-conference.address')}}">
					</div>
				</div>	
				<div class="row apply-row">
					<div class="col-md-10 offset-md-1 flex-center">
						<input type="text" required name="phone" class="form-control m-1" placeholder="{{trans('apply-conference.phone')}}">
					</div>
				</div>	
				<div class="row apply-row">
					<div class="col-md-10 offset-md-1 flex-center">
						<input type="email" required name="email" class="form-control m-1" placeholder="{{trans('apply-conference.email')}}">
					</div>
				</div>
				<hr>	
			
				<div class="row apply-row text-center">
					<div class="col-md-2"></div>
					<div class="col-md-8 text-center">
						<input type="checkbox" required name="agree"> &nbsp; <span>{{trans('apply-conference.agree')}}</span>
					</div>
				</div>
				<hr>
				<div class="row apply-row">
					<div class="col-md-4 offset-md-4 text-center">
						<input type="hidden" name="conference_id" value="{{$conference->id}}">
						<input type="submit" class="btn btn-success w-50" value="{{trans('apply-conference.save-button')}}">
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>


@endsection


