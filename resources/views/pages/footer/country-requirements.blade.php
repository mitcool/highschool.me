@extends('template')

@section('headCSS')
<style>
        .feature{
        background-color:#045397;
        color: white;
        border-top-left-radius: 15px;
    }
    .core{
        background-color:#f08a54;
        color: white; 
    }
    .pro{
        background-color:#ec7130; 
        color: white;
    }
    .elite{
        background-color:#E9580C; 
        color: white;
         border-top-right-radius: 15px;
    }
    .td-row{
        padding:10px;
        border:1px solid #f08a54;
        font-size: 0.9rem;
    }
    .td-row.feature{
        border:none;
    }
    .plan-name{
        color:white;
        border-top-left-radius:10px;
         border-top-right-radius: 10px;
         padding:10px;
         font-size: 1.5rem;
    }
    .plan-name:nth-of-type(1){
        background-color:#f08a54;
    }
    .plan-name:nth-of-type(2){
        background-color:#ec7130;
    }
    .plan-name:nth-of-type(3){
        background-color:#E9580C;
    }
    .course-name{
         background: #045397;
         color:white;
         border-top-left-radius:10px;
         border-top-right-radius: 10px;
         padding:10px;
         font-size: 1.5rem;
         min-height: 100px;
         display: flex;
         justify-content: center;
         align-items: center;
         opacity: 0.7;
    }
    .tuition{
        background-color:#DCEFFF;
        color:#000000;
        padding:10px;
        font-size: 1.2rem;
        text-transform: uppercase;
        font-weight: bold;
    }
    .price{
        font-size:1.5rem;
        text-align: right;
        font-weight: 600;
    }
    .wrapper{
        margin:10px;
        border-radius: 10px;
    }
    .or{
        text-align: right;
        color:#E9580C;
        font-size: 1.1rem;
        font-weight: bold;
    }
    .or::before{
        border-top: 2px solid #E9580C;
        display: block;
        position: relative;
        top: 15px;   
        width: 88%;
        content: "";
    }
    .per-year{
        font-size:1.1rem;
    }
    .description{
        color:#737373;
        text-align: center;
        padding:20px;
    }
    .description ul li{
        list-style: none;
        padding: 10px 30px;
        background-image: url({{ asset('images/orange-checkmark.webp') }});
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 30px;
        text-align: initial;
    }
    .blue-button{
        background-color: #045397;
        color: white;
    }
    .psat-container {
        border-radius: 10px;
    }
    .space-top{
        margin-top:40px;
    }
    .letter{
        color:#045397;
        font-weight: bold;
        margin-bottom:0;
    }
    .letter-hr{
         margin-top:0;
        border-bottom:2px solid #045397;
    }
    .letter-search{
        cursor: pointer;
    }
</style>
@endsection

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('awards') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	{{-- <x-meta-image itemprop="image" nickname="study_registration"/> --}}
@endsection

@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $texts['breadcrumb'] }}</li>
	</ol>
</div>

<x-image-component nickname="country-requirements" class="imprint-images main-pictures-pages" loading="eager"/>

<div class="container-fluid main_page_container bg-light" style="padding:20px;">
	
	<div class="row justify-content-center" >
		<div class="col-md-10 col-lg-8">
			<h1 class="page-headings">{{ $texts['heading'] }}</h1>
			<div class="page-content">{!! $texts['intro'] !!}</div>
		</div>
	</div>
</div>
<div class="container text-center page-content" style="padding:20px;">
    <h2 class="blue-heading space-top" style="color:#045397;">ONSITES High School Diploma at a Glance</h2>
    <div class="row">
        <div class="col-md-6 space-top">
             <div class="shadow h-100 psat-container">
                <div class="course-name text-center"> 24-Credit Standard Track</div>
                <div class="description">Standard Program with full Core & Electives Curriculum</div>
            </div>
        </div>
        <div class="col-md-6 space-top">
            <div class="shadow h-100 psat-container">
                <div class="course-name text-center"> 18-Credit ACCEL Track</div>
                <div class="description">Accelerated Program with compact Core & Electives Curriculum</div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4 space-top">
            <div class="shadow h-100 psat-container">
                <div class="course-name text-center">Advanced Placement Prep-Courses</div>
                <div class="description">Advanced Placement Prep-Courses in various disciplines</div>
            </div>
        </div>
        <div class="col-md-4 space-top">
            <div class="shadow h-100 psat-container">
                <div class="course-name text-center"> CTE Prep-Courses</div>
                <div class="description">Career & Technical Prep-Courses in applied fields</div>
            </div>
        </div>
        <div class="col-md-4 space-top">
            <div class="shadow h-100 psat-container">
                <div class="course-name text-center"> ESOL Courses</div>
                <div class="description">English for Speakers of Other Languages</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 space-top">
            <div class="shadow h-100 psat-container">
                <div class="course-name text-center">CLEP Prep-Courses</div>
                <div class="description">College-Level-Examination-Prep-Courses in multiple subjects</div>
            </div>
        </div>
        <div class="col-md-6 space-top">
            <div class="shadow h-100 psat-container">
                <div class="course-name text-center">College Entrance Prep-Courses</div>
                <div class="description">College Admission Prep-Courses for PSAT, SAT, PreACT & ACT</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 space-top">
            <div class="shadow h-100 psat-container">
                <div class="course-name text-center">International Transfer Program</div>
                <div class="description">Local coursework recognized - only U.S. specific subjects to complete</div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<div class="container-fluid bg-light">
    <div class="container text-center" style="padding:20px;">
        <h2 class="blue-heading space-top" style="color:#045397;">Recognized by Country</h2>
        <div class="d-flex justify-content-center w-100 my-4">
            @foreach ($alphas as $alpha)
                <a  data-id="{{ $alpha }}" class="letter-search text-dark mx-2 {{ in_array($alpha,$country_keys) ? 'font-weight-bold' : '' }}">{{ $alpha }}</a>
            @endforeach
        </div>
        @foreach ($countries as $first_letter => $grouped_countries )
            <div class="my-3">
                <h3 class="text-left letter" id="{{ $first_letter }}">{{ $first_letter }}</h3>
                <hr class="letter-hr">
            </div>
            <div class="row">
                @foreach($grouped_countries as $group_country)
                    <div class="col-md-4 my-2">
                        <a href="{{ route('single-country-requirements',$group_country->id) }}">
                           <div class="shadow-sm d-flex justify-content-start" style="padding:20px;border-radius:5px;">
                                <img style="height: 30px;width:50px;" src="{{ asset('images/flags') }}/{{ $group_country->flag }}" alt="" class="border">
                                <h5 class="ml-3 mb-0">{{ $group_country->nicename }}</h5> 
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
        @endforeach
    </div>
   
</div>
@endsection

@section('footerScripts')
<script>
    $('.letter-search').on('click',function() {
        let id = $(this).attr('data-id')
        const element = document.getElementById(id);
        const offset = 200;
        const bodyRect = document.body.getBoundingClientRect().top;
        const elementRect = element.getBoundingClientRect().top;
        const elementPosition = elementRect - bodyRect;
        const offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    });
    
</script>
@endsection