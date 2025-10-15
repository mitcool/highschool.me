@extends('template')

@section('seo')
<title>{{ $program->translated->meta_title }}</title>
<meta itemprop="description" name="description" content="{{ $program->translated->meta_description }}">

<meta itemprop="title" property="og:title" content="{{ $program->translated->meta_title }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/{{ $hreflang_de }}"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/{{ $hreflang_en }}"/>
@endif
<meta property="og:description" content="{{ $program->translated->meta_description }}"/>


<link rel="alternate" href="{{ config('app.url') }}/en/{{ $hreflang_en }}" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/en/{{ $hreflang_en }}" hreflang="x-default" />
<link rel="alternate" href="{{ config('app.url') }}/de/{{ $hreflang_de }}" hreflang="de" />

@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/{{ $hreflang_en }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/{{ $hreflang_de }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('headCSS')
<style type="text/css">
    :root{
		--blue-color:#025297;
		--orange-color: #EA580D;
		
	}
	.body {
		min-height: 40vh!important;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		font-size: 1.7rem;
		font-weight: 700;
		background-color: #FFF6E7;
		-webkit-box-shadow: 0px 7px 10px 1px rgba(0,0,0,0.35);
		-moz-box-shadow: 0px 7px 10px 1px rgba(0,0,0,0.35);
		box-shadow: 0px 7px 10px 1px rgba(0,0,0,0.35);
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
  		text-shadow: 2px 2px black;
  		transition: 0.5s;
  		border: 3px solid transparent;
		font-family: 'Poppins'
	}

	.transition-body {
		min-height: 40vh!important;
		border: 3px solid #FFF6E7;
		background-color: white;
		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
  		opacity: 0.7;
  		text-shadow: 2px 2px black;
  		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		font-size: 1.7rem;
		font-weight: 700;
		transition: 0.5s;
	}

	.transition-body div {
		padding: 20px;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
		font-size: 1.7rem;
		font-weight: 700;
	}

	.trans-desc {
		display: none;
	}

	.trans-desc-visible {
		display: block;
		opacity: 1!important;
		color: white;
		text-shadow: 2px 2px black;
	}

	.link-to {
		color: white;
		text-decoration: none;
	}

	.link-to:hover {
		color: white;
		text-decoration: none;
		text-shadow: 2px 2px black;
	}
	.blue-section{
		background-color:var(--blue-color);
		color:white;
		padding:30px;
	}
	.blue-section h2{
		text-align: center;
		font-weight: bold;
		margin-bottom:30px;
	}
	.white-section{
		padding: 20px;
	}
	.white-section h2{
		text-align: center;
		font-weight: bold;
		margin-bottom:30px;
	}
	.outline-button{
		border:2px solid var(--orange-color);
		color:black;
		display:inline-block;
		padding:10px 20px;
		
		text-align: center;
		font-weight: bold;
		font-size: 1.1rem;
	}
	.outline-button:hover{
		text-decoration:none;
		color:black;
	}
	.blue-box:after{
		content:"";
		position:absolute;
		z-index:-1;
		right:50%;
		height:160px;
		top:50%;
		transform:translateY(-50%);
		width:5px;
		background:#F5B295;

	}

	.page-content li{
		background-position: top left !important;
		padding:5px 30px !important;
	}

	/* .video{
		display: flex;
		justify-content: center;
	} */
	.accordion-wrapper{
		padding:20px;
	 }
	.accordion-heading{
		cursor: pointer;
		border-bottom:2px solid white;
		padding:10px;
	}
	.accordion-content{
		padding:10px;
	}
	.key-facts{
		position: relative;
		padding:20px;
		margin:20px;
	}
	.top, .bottom {
		position: absolute;
		width: 280px;
		height: 90px;
		pointer-events: none;
		color:#E16221;
	}
	.top {
		top: 0;
		border-top: 2px solid;
	}
	.bottom {
		bottom: 0;
		border-bottom: 2px solid;
		border-color:#E16221;
		right:0;
	}
	.left {
		left: 0;
		border-left: 2px solid;
	}
	.right {
		right: 0;
		border-right: 2px solid;
		border-color:#E16221;
	}
	@media(max-width:768px){
		h4.benefits-text{
			font-size: 1rem;
		}
	}
</style>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok($program->translated->meta_title, '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

 @if($program->id == 1)
	<x-image-component nickname="program-cover-{{ $program->id }}" id="cover" class="main-pictures-pages" loading="eager" />
@endif 
<div id="studies_container" class="container-fluid main_page_container" style="min-height: auto;">
	<div class="row justify-content-center px-0">
		<div class="col-md-10 col-lg-8 container-style px-0">
			
			@if(!$program->main_video)
				<div class="row single-programs-style">
					<div class="col-md-8" style="">
						<div>
							<h1 itemprop="name" class="page-headings" property="name">{{$program->translated->single_page_heading}}</h1>
							<div itemprop="description" class="page-content">{!!$program->translated->small_desc!!}</div>
						</div>
						
						<div class="d-flex">
							@if($program->translated->tutorial)
								<a href="{{route('program-tutorial-'.app()->currentLocale(),$program->translated->slug)}}" class="apply-now-btn mr-4">{{trans('single-program.apply')}}</a>
							@endif
							<a  class="learn_more_btn" data-toggle="modal" data-target="#staticBackdrop">{{trans('single-program.learn-more')}}</a>
						</div>	
						<br>			
					</div>
					<div class="col-md-4">
						<x-image-component nickname="program-{{ $program->id }}" class="w-100" loading="eager"/>
					</div>
				</div>
			@endif

			{{-- 1 Intro --}}
			@if($program->main_video)
			<h1 itemprop="name" class="page-headings" property="name">{{$program->translated->single_page_heading}}</h1>
			@endif
			<div class="key-facts">
				<div class="top left"></div>
				<div class="bottom right"></div>
				<div class="page-content p-3 my-4">{!! $program->translated->text !!}</div>
			</div>
		
			
			{{-- 2 VIdeo --}}
			@if($program->main_video)
				<div class="video">
					<iframe height="600" width=100%" src="{{ $program->main_video->link() }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</div>
			@endif
		
			{{-- 3 Benefits --}}
			@if(count($program->benefits) > 2)
			<div class="blue-section page-content">
				<h2>{{ request()->segment(1) == 'de' ? 'Studieren neu gedacht – mit System, Support & Stil' 
					: 'A new approach to studying – with system, support and style' }}</h2>	
				<div class="d-flex justify-content-around" style="margin-top:40px;">
					@foreach($program->benefits as $benefit)
					<div class="text-center">
						<h2 class="h1 mb-0">
							{!! $benefit->icon !!} 
						</h2>
						<h4 class="mt-2 benefits-text">{{ request()->segment(1) == 'de' ? $benefit->benefit_de :  $benefit->benefit}}</h4>
					</div>
					@endforeach
				</div>
			</div>	
			@endif

			{{-- 4 ISO--}}
			@if($program->iso)
				<div class="white-section">
					<div class="page-content">
						{!! request()->segment(1) == 'de' ? $program->iso->iso_text_de : $program->iso->iso_text !!}
					</div>
					<div class="text-center" style="margin:40px 0;">
						@foreach ($iso_icons as $icon )
						{{-- <a href="{{ $icon->text }}" target="_black" > --}}
							<img src="{{ asset('images/iso') }}/{{ $icon->icon }}" alt="" title="iso.com" style="width:auto;height:80px;margin:0 20px;" alt="{{request()->segment(1) == 'de' ? $icon->alt_de : $icon->alt}}" title="{{request()->segment(1) == 'de' ? $icon->title_de : $icon->title}}">
						{{-- </a> --}}
						@endforeach
					</div>
				</div>
			@endif
			
			@if($program->ai_support)
			{{-- 5 AI Support --}}
			<div class="blue-section page-content">
				{!! request()->segment(1) == 'de' 
					? $program->ai_support->ai_support_text_de
					: $program->ai_support->ai_support_text  
				!!}
			</div>
			@endif

			{{-- 6 Facts --}}
			@if(count($program->facts) > 7)
			<div class="white-section page-content">
				<h2> Facts at a glance</h2>
				<div class="row">
					@foreach ($program->facts as $fact )
						<div class="col-md-3 col-sm-6">
							<div class="text-center">
								<h2 class="h1 mb-1" style="color:var(--orange-color)">
									{!! $fact->icon !!}
								</h2>
								<p>{!! request()->segment(1) == 'de'  
									? $fact->fact_de 
									: $fact->fact !!}
								</p>
							</div>
						</div>
					@endforeach
				</div>
				<x-program-buttons />
			</div>
			@endif

			{{-- 7 Program Content --}}
			@if($program->program_content)
				<div class="blue-section page-content">
					{!! request()->segment(1) == 'de' 
						? $program->program_content->text_de 
						: $program->program_content->text  !!}
					<div>
						@foreach ($program->program_content_accordion as $accordion )
						<div  class="accordion-wrapper">
							<p  class="font-weight-bold"><img src="{{ asset('images/orange-checkmark.webp') }}" style="height:2rem;" alt=""> {{ request()->segment(1) == 'de' ?  $accordion->bold_headline_de : $accordion->bold_headline }}</p>
							<div class="text-white d-flex justify-content-between align-items-center accordion-heading">
								<div>
									
									{!! request()->segment(1) == 'de' ? $accordion->headline_de : $accordion->headline !!}
								</div>
								<i  style="font-size:2rem;" class="fas fa-caret-down"></i>
							</div>
							<div class="text-white accordion-content d-none">{!! request()->segment(1) == 'de' ? $accordion->content_de : $accordion->content !!}</div>
						</div>
						@endforeach
					</div>
				</div>
				
			@endif
			
			{{-- 8 Requirements --}}
			@if($program->study_requirements)
				<div class="white-section page-content">
					{!! request()->segment(1) == 'de' 
						? $program->study_requirements->text_de 
						: $program->study_requirements->text  !!}
				</div>
			@endif

			{{-- 9 Documents --}}
			@if($program->required_documents)
			<div class="blue-section page-content">
				{!! request()->segment(1) == 'de' 
					? $program->required_documents->text_de 
					: $program->required_documents->text  !!}
			</div>
			@endif

			{{-- 10 Fees --}}
			@if($program->tuition_fee)
			<div class="white-section">
				<div class="page-content">
					{!! request()->segment(1) == 'de' 
						? $program->tuition_fee->text_de 
						: $program->tuition_fee->text  !!}
						<div>
							<a href="{{ route('study-registration-'.app()->currentLocale()) }}" class="outline-button" style="margin-top:10px;font-size:1rem;">{{request()->segment(1) == 'de' ? 'Jetzt individuelle Gebühren berechnen' : 'Calculate individual fees now'}}</a>
						</div>
				</div>
				
			</div>
			@endif

			{{-- 11 Financing --}}
			@if($program->financing)
			<div class="blue-section page-content">
				<div>{!! request()->segment(1) == 'de' ? $program->financing->text_de : $program->financing->text  !!}</div>
				
				<x-program-buttons />
				
			</div>
			@endif
			
			{{-- 12 Career paths --}}
			@if($program->career_paths)
			<div class="white-section page-content">
				{!! request()->segment(1) == 'de' ? $program->career_paths->text_de : $program->career_paths->text  !!}
				<x-program-career-table jobs="{{ $program->id }}"/>
			</div>
			@endif

			{{-- 13 Partners --}}
			@if($program->partner_text)
			<div class="blue-section page-content">
				{!! request()->segment(1) == 'de' ? $program->partner_text->text_de : $program->partner_text->text  !!}
				<x-companies />
			</div>
			@endif
			
			{{-- 14 Testimonials videos --}}
			@if($program->testimonials)
			
			<div class="white-section page-content">

				{!! request()->segment(1) == 'de' ? $program->testimonials->text_de : $program->testimonials->text  !!}
				<div class="video">
					<video width="100%" height="auto" controls>
						<source src="{{ asset('videos')}}/{{ $program->testimonials->video }}" type="video/mp4">
						Your browser does not support the video tag.
					  </video>
				</div>
			
			</div>
			@endif

			{{-- 15 Success --}}
			@if($program->knowledge_for_success)
			<div class="blue-section page-content">
				{!! request()->segment(1) == 'de' ? $program->knowledge_for_success->text_de : $program->knowledge_for_success->text  !!}
				<x-program-buttons />
			</div>
			@endif
		</div>
	</div>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			
			<div class="modal-body ">
				<div class="d-flex mb-3 align-items-center justify-content-between">
					<p class="modal-title mx-auto mb-2" id="staticBackdropLabel" style="font-size:1.75rem"><strong>{{ trans('single-program.request') }}</strong></p>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" action="{{route('request-information')}}" id="program-request-form">
					@csrf
					<label class="ohnohoney" for="name"></label>
					<input class="ohnohoney" autocomplete="off" type="text" name="first_name" placeholder="{{trans('modals.cookies-accept-button')}}">
					<label class="ohnohoney" for="email"></label>
					<input class="ohnohoney" autocomplete="off" type="text" name="address" placeholder="{{trans('modals.cookies-accept-button')}}">
					<input type="hidden" name="age">
					<div class="col-md-10" style="margin: 0 auto;">
						<div class="form-group">
							<label for="program-request-name">{{ trans('single-program.name') }}*</label>
							<input type="text" value="{{ old('name') }}" name="name" class="@error('name') is-invalid @enderror form-control" id="program-request-name" required>
							@error('name') <span class="validation-error">{{ $errors->first('name') }}</span> @enderror
						</div>
						<div class="form-group">
							<label for="program-request-lastname">{{ trans('single-program.last_name') }}</label>
							<input type="text" value="{{ old('last_name') }}" name="last_name" class="@error('last_name') is-invalid @enderror form-control" id="program-request-lastname"  required>
							@error('last_name') <span class="validation-error">{{ $errors->first('last_name') }}</span> @enderror
						</div>
						<div class="form-group">
							<label for="program-request-email">{{ trans('single-program.email') }}*</label>
							<input type="email" value="{{ old('mail') }}" name="mail" class="@error('mail') is-invalid @enderror form-control" id="program-request-email" required>
							@error('mail') <span class="validation-error">{{ $errors->first('mail') }}</span> @enderror
						</div>
						<div class="form-group">
							<label for="program-request-phone-code">{{ trans('welcome.contact-form-phone') }}</label>
							<select type="text" required name="phonecode" value="{{ old('phonecode') }}" class="form-control @error('phonecode') is-invalid @enderror"  id="program-request-phone-code">
							<option value="" selected disabled>{{ trans('welcome.please-select') }}</option>

								@foreach ($countries as $country)
									<option value="{{ $country->phonecode }}">{{ request()->segment(1) == 'en' ? $country->nicename : $country->nicename_de }} (+{{  $country->phonecode }})</option>
								@endforeach
							</select>
							@error('phonecode') <span class="validation-error">{{ $errors->first('phonecode') }}</span> @enderror
						</div>
						<div class="form-group">
							<label for="program-request-phone">{{ trans('single-program.phone') }}</label>
							<input required type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ old('phone_number') }}" name="phone_number" class="@error('phone_number') is-invalid @enderror form-control" placeholder="" required for="program-request-phone">
							
							@error('phone_number') <span class="validation-error">{{ $errors->first('phone_number') }}</span> @enderror
						</div>
						
						<label for="program-request-program-name">Program name:</label>
						<input id="program-request-program-name" name="program_name" type="text" readonly class="form-control" value="{{$program->translated->name}}" />
						
						<div class="form-group" style="padding-top:1rem;">
							<label for="how_did_you_find">{{ trans('single-program.how_did_you_find') }}</label>
							<select name="how_did_you_find" id="how_did_you_find" style="width:100%; height:39px; border: 1px solid #ced4da; color: #495057; padding: 0.375rem 0.75rem;" required>
								<option value="" selected disabled>{{ trans('welcome.please-select') }}</option>
								<option data-value="Google" value="Google">Google</option>
								<option data-value="Facebook" value="Facebook">Facebook</option>
								<option data-value="Instagram" value="Instagram">Instagram</option>
								<option data-value="LinkedIn" value="LinkedIn">LinkedIn</option>
								<option  data-value="{{ Session::get('applocale') == 'de' ? 'Studienportale' : 'Study Portals' }}" value="Study Portals">{{ Session::get('applocale') == 'de' ? 'Studienportale' : 'Study Portals' }}</option>
								<option  data-value="{{ Session::get('applocale') == 'de' ? 'Empfehlung' : 'Recommendations' }}" value="Recommendations">{{ Session::get('applocale') == 'de' ? 'Empfehlung' : 'Recommendations' }}</option>
								<option  data-value="{{ Session::get('applocale') == 'de' ? 'Sonstige' : 'Other' }}" value="Other">{{ Session::get('applocale') == 'de' ? 'Sonstige' : 'Other' }}</option>
							</select>
						</div>
						
						<div class="form-group" style="padding-top:1rem;">
							<label for="more_details">
								{{ trans('single-program.more_details') }}
							</label>
							<textarea maxlength="2000" class="form-control" name="more_details"  id="more_details"  placeholder="{{ trans('single-program.enter_message_placeholder') }}">{{ old('more_details') }}</textarea>
						</div>
						
						<div class="form-group" style="padding-top:1rem;">
							<label for="communication_language">{{ trans('single-program.text-dropdown') }}</label>
							<select name="communication_language" id="communication_language" style="width:100%; height:39px; border: 1px solid #ced4da; color: #495057; padding: 0.375rem 0.75rem;" required>
								<option value="" selected disabled>{{ trans('welcome.please-select') }}</option>
								<option  data-value="1" value="English">{{ trans('single-program.lang-one') }}</option>
								<option  data-value="2" value="German">{{ trans('single-program.lang-two') }}</option>
							</select>
						</div>
					</div>
					<div class="input-group mt-2 mb-3">
		
						@if(config('services.recaptcha.key'))
							<div class="g-recaptcha"
							data-sitekey="{{config('services.recaptcha.key')}}" style="margin: 0 auto;">
							</div>
						@endif
					</div>
					<div class="col-md-4 mt-4 mb-4 text-center" style="margin: 0 auto;">
						<button type="submit" class="d-inline btn orange-button">{{ trans('single-program.send') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footerScripts')
<script type="text/javascript">
	$( document ).ready(function() {
		$('.body').on({
			mouseenter: function () {
        		$(this).toggleClass('transition-body');
        		$(this).removeClass('body');
        		$(this).find('p').toggleClass('trans-desc-visible');
		    },
		    mouseleave: function () {
		        $(this).removeClass('transition-body');
		        $(this).toggleClass('body');
		        $(this).find('p').removeClass('trans-desc-visible');
		    }
		});
		$('.accordion-heading').on('click',function(){
			$(this).closest('.accordion-wrapper').find('.accordion-content').toggleClass('d-none',2000);
			$(this).closest('.accordion-wrapper').find('.fa-caret-down').toggleClass('fa-caret-up',2000);
		})
	});
</script>
@endsection
