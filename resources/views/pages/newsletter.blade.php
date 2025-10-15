@extends('template')

@section('seo')
<title>{{trans('promotion.meta-title')}}</title>
<meta itemprop="description" name="description" content="{{ trans('newsletter.meta-description') }}" />

<meta itemprop="title" property="og:title" content="{{trans('newsletter.meta-title')}}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{  route('newsletter-de') }}"/>
@else
	<meta itemprop="url" property="og:url" content="{{  route('newsletter-en') }}"/>
@endif
<meta property="og:description" content="{{ trans('newsletter.meta-description') }}"/>
<x-meta-image itemprop="image" nickname="coaching"/>

<link rel="alternate" href="{{ route('newsletter-en') }}" hreflang="en" />
<link rel="alternate" href="{{ route('newsletter-de') }}" hreflang="de" />
<link rel="alternate" href="{{ route('newsletter-en') }}" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ route('newsletter-en') }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ route('newsletter-de') }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection


@section('content')

<div class="container-fluid main_page_container">

	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
            <h1 class="page-headings">{!! trans('newsletter.heading') !!}</h1>
            <div class="page-content">{!! trans('newsletter.content') !!}</div>
            <div class="page-content">
                <form action="{{ route('subscribe') }}" method="POST" class="bg-light shadow p-3 d-flex flex-column justify-content-center align-items-center">
                    {{ csrf_field() }}
                    <label class="d-block font-weight-bold w-50">{{ trans('newsletter.firstname') }}
                        <input name="firstname" type="text" class="form-control" required>
                    </label>
                        
                    <label class="d-block font-weight-bold w-50">{{ trans('newsletter.lastname') }}
                        <input name="lastname" type="text" class="form-control" required>
                    </label>
                        
                    <label class="d-block font-weight-bold w-50">{{ trans('newsletter.email') }}
                        <input name="email" type="text" class="form-control" required>
                    </label>
                    <div>
                       
                        <div class="d-flex justify-content-center">
                            @if(config('services.recaptcha.key'))
                                <div class="g-recaptcha"
                                    data-sitekey="{{config('services.recaptcha.key')}}" style="margin: 0 auto;">
                                </div>
                            @endif
                        </div>
                       
                     <hr/>   
                        {!! trans('newsletter.privacy') !!}
                     <hr />
                    </div>
                    <button class="btn orange-button">{{ trans('newsletter.subscribe-button') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection