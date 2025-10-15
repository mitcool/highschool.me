@extends('template')

@section('seo')
<title>{{ trans('all-programs.meta-title') }}</title>
<meta property="og:title" content="{{ trans('all-programs.meta-title') }}"/>
<meta itemprop="description" name="description" content="{{ trans('all-programs.meta-description') }}"/>

<meta itemprop="title" property="og:title" content="{{ trans('all-programs.meta-title') }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ route('all-programs-de') }}"/>
@else
	<meta itemprop="url" property="og:url" content="{{ route('all-programs-en')}}"/>
@endif
<meta property="og:description" content="{{ trans('all-programs.meta-description') }}"/>

<link rel="alternate" href="{{ route('all-programs-en') }}" hreflang="en" />
<link rel="alternate" href="{{ route('all-programs-de') }}" hreflang="x-default" />
<link rel="alternate" href="{{ route('all-programs-de') }}" hreflang="de" />

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="graduate.me">
<meta property="twitter:url" content="{{ config('app.url') }}">
<meta name="twitter:title" content="{{ trans('all-programs.meta-title') }}">
<meta name="twitter:description" content="{{ trans('all-programs.meta-title') }}">
<meta name="twitter:image" content="{{ trans('all-programs.meta-title') }}">



@endsection 
@section('headCSS')
<style type="text/css">
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
		margin-top:10px;
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
		margin-top:10px;
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
	@media (min-width: 768px) and (max-width: 1650px) {
		.name-program{
			font-size:1.25rem;
		}
	}
	@media (max-width: 768px) {
		.name-program{
			font-size:1.40rem;
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
			<a href="{{ route('all-programs-en') }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ route('all-programs-de') }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection


@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-2">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{  Session::get('applocale') == 'de' ? 'Alle Programme' : 'All Programs' }}</li>
	</ol>
</div>

<x-image-component nickname="all_programs" class="digital_studies-images main-pictures-pages"/>

<div class="row justify-content-center" typeof="Course">
    <div class="col-md-10 col-lg-9 container-style shadow-none">
		<div style="padding:30px;">
        	<h1 style="word-wrap: break-word;">{{ trans('all-programs.heading') }}</h1>
			<div >{!! trans('all-programs.description') !!}</div>
		</div>
        @foreach($studies as $study)
            <div  style="padding:30px;">
                <h2 class="text-center">{{ $study->translated->all_program_page_heading }}</h2>
                <div class="row">
                    @foreach($study->programs as $program)
					<div class="col-xl-4">
						<div class="body" style="background-image:url( {{asset($program->image() )}});">
							<a href="{{route('programs-'.app()->currentLocale(), [$study->translated->slug, $program->translated->slug])}}" class="link-to">
								<h3 class="name-program"><strong>{!! $program->translated->name !!}</strong></h3>
							</a>
						</div>
					</div>
				@endforeach
                </div>
            </div>
        @endforeach
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
	});
</script>
@endsection