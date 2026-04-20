@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('leadership') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	<x-meta-image itemprop="image" nickname="digital_studies"/>
@endsection

@section('headCSS')
	<style>
		@media(max-width:1200px){
			.benefit-wrapper{
				margin-top:15px;
			}
            .video iframe{
                height:300px;
            }
		}
	</style>
@endsection



@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $texts['heading'] }}</li>
	</ol>
</div>

<div class="container-fluid bg-white main_page_container mb-3">	
    <div class="row justify-content-center" >		
        <div class="col-lg-8  p-4 page-content bg-white text-justify" style="margin: 0 auto;">
            <div class="page-content">
                <div class="">
                    <h1 class="text-center page-headings">{{ $texts['heading'] }}</h1>
                    <hr class="white-hr">
                    <div class="w-100 centered text-center mx-auto mb-5">
                        
                    </div>
                    <div class="video mt-3 mb-5">
                        <iframe height="600" width="100%" src="https://www.youtube.com/embed/FbXEqmzu05I?si=wYLlYX3WT1ENmdOd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    {!! $texts['content'] !!}
                </div>
            </div>
        </div>
    </div>
</div>

<section class="row" style="background-color: #045397;padding:50px;">
    <div class="col-md-10 offset-md-1" >
        <!-- <div class="d-flex" id="benefit_wrapper"> -->

        <div class="row col-md-12 ml-0 mr-0" >
            <div class="col-xl-3 benefit-wrapper  text-center ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/badge.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['first-box-heading'] }}</h3>
                    <p>{{ $texts['first-box-content'] }}</p>
                </div>
            </div>
            <div class="col-xl-3 benefit-wrapper text-center ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/idea.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['second-box-heading'] }}</h3>
                    <p>{{ $texts['second-box-content'] }}</p>
                </div>
            </div>
            <div class="col-xl-3 benefit-wrapper text-center ">
                <div class="benefit-box">
                     <img src="{{ asset('images/icons/commitment.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['third-box-heading'] }}</h3>
                    <p>{{ $texts['third-box-content'] }}</p>
                </div>
            </div>
             <div class="col-xl-3 benefit-wrapper text-center  ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/open-book.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['fourth-box-heading'] }}</h3>
                    <p>{{ $texts['fourth-box-content'] }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection