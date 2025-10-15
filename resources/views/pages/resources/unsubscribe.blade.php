@extends('template')


@section('seo')
	<title>Unsubscribe</title>
	<meta itemprop="description" name="description" content="{{ trans('imprint.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{trans('imprint.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/unsubscribe/{{ $subscriber->code }}"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/unsubscribe//{{ $subscriber->code }}"/>
	@endif
	<meta property="og:description" content="{{ trans('imprint.meta-description') }}"/>
	<x-meta-image itemprop="image" nickname="unsubscribe"/>

	
	<style>
		.checkbox-label{
			border:1px solid black;
			width:20px;
			height: 20px;
			margin:0;
		}
		.checkbox-div{
			display: flex;
			align-items: center;
		}
		.checkbox-div input{
			display: none;
		}
		p.font-italic{
			font-size:1rem;
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
			<a href="{{ config('app.url') }}/en/unsubscribe/{{ $subscriber->code }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/unsubscribe/{{ $subscriber->code }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection
@section('content')
@php
    $breadcrumb_title = '';
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<x-image-component nickname="unsubscribe" class="imprint-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center" >
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings">{{ trans('unsubscribe.heading') }}</h1>
			<div class="page-content">
				<p class="text-center">{{ trans('unsubscribe.top-text') }}</p>
				
				<div class="d-flex justify-content-center">
					<ul class="text-left">
						<li>{{ trans('unsubscribe.reason_one') }}</li>
						<li>{{ trans('unsubscribe.reason_two') }}</li>
						<li>{{ trans('unsubscribe.reason_three') }}</li>
						<li>{{ trans('unsubscribe.reason_four') }}</li>
						<li>{{ trans('unsubscribe.reason_five') }}</li>
						<li>{{ trans('unsubscribe.reason_six') }}</li>
						<li>{{ trans('unsubscribe.reason_seven') }}</li>
						<li>{{ trans('unsubscribe.reason_eight') }}</li>
					</ul>
				</div>
				
				<div class="text-center">
					<p>{{ trans('unsubscribe.bottom-text') }}</p>
					<form action="{{ route('subscribe') }}" method="POST">
						{{ csrf_field() }}
						<button class="btn orange-button">{{ trans('unsubscribe.resubscribe-button') }}</button>
					</form>
				</div>
				<hr>
				<h2 class="text-center" style="margin:20px 0;">{{ trans('unsubscribe.tell-us-why') }} </h2>

				<div class="d-flex justify-content-center">
					<div class="text-left">
						<form action="{{ route('unsubscribe-user',$subscriber->id) }}" method="POST" class="mx-auto" id="unsubscribe-form">
							{{ csrf_field() }}
						
							<div class="d-flex">
								<div>
									<input value="I didn't know the benefits before" type="checkbox" name="reasons[]" class="reason-checkbox" >&nbsp;
								</div>
								<div>
									<span class="font-weight-bold">{{ trans('unsubscribe.reason_one_leave') }}</span>	
									<p class="font-italic">{{ trans('unsubscribe.reason_one_desc') }}</p>
								</div>
							</div> 		  
							
							<div class="d-flex">
								<div>
									<input value="I would like to receive fewer updates" type="checkbox" name="reasons[]"  class="reason-checkbox">&nbsp;
								</div>
								<div>
									<span class="font-weight-bold">{{ trans('unsubscribe.reason_two_leave') }}</span>	
									<p class="font-italic">{{ trans('unsubscribe.reason_two_desc') }}</p>
								</div>
							</div> 			  
							
							<div class="d-flex">
								<div>
									<input value="I wasn't aware of the added value before" type="checkbox" name="reasons[]"  class="reason-checkbox">&nbsp;
								</div>
								<div>
									<span class="font-weight-bold">{{ trans('unsubscribe.reason_three_leave') }}</span>	
									<p class="font-italic">{{ trans('unsubscribe.reason_three_desc') }}</p>
								</div>
							</div>			  						
		
							<div class="d-flex">
								<div>
									<input value="Other" type="checkbox" name="reasons[]" class="reason-checkbox" >&nbsp;
								</div>
								<div>
									<span class="font-weight-bold">{{ trans('unsubscribe.reason_four_leave') }}</span>	
									<p class="font-italic">{{ trans('unsubscribe.reason_four_desc') }}</p>
								</div>
							</div> 			  
							<textarea class="form-control" name="feedback" placeholder="{{ trans('unsubscribe.feedback') }}" rows="5"></textarea>
							
							<div class="text-center">
								<p class="font-weight-bold">{{ trans('unsubscribe.thank-you') }}</p>
								<p>{{ trans('unsubscribe.improve') }}</p>
								
								<button class="btn btn-secondary">{{ trans('unsubscribe.unsubscribe-button') }}</button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footerScripts')

<script>
	$(document).ready(function(){
		$('#unsubscribe-form').on('submit',function(e){
			e.preventDefault();
			if($('.reason-checkbox:checked').length > 0){
				document.getElementById('unsubscribe-form').submit()
			}
			
		})
	})
</script>
@endsection

