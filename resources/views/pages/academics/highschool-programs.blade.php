@extends('template')

@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('highschool-programs')}}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>
	<x-meta-image itemprop="image" nickname="accreditation-cover"/>

@endsection

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
         text-align: left;
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
        text-align: justify;
        padding:20px;
    }
    .description ul li{
        list-style: none;
        padding: 10px 30px;
        background-image: url("/images/orange-checkmark.webp");
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 30px;
        text-align: initial;
    }
    .blue-button{
        background-color: #045397;
        color: white;
    }
    .blue-box{
        padding:20px;
    }
    .main-container{
        padding:20px;
        width:70%;
        margin:0 auto;
    }
    @media(max-width:1000px){
        .main-container{
            padding:20px;
            width:90%;
            margin:0 auto;
        }
        .reverse{
            flex-direction: column-reverse;
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

<img src="{{ asset('images/cheerful-teenagers-classroom.png') }}" alt="" class="w-100">
<div class="container-fluid main-container" >
    <div class="row text-center mx-auto">
        <div class="col-md-12">
            <h1 class="text-center page-headings">{{ $texts['heading'] }}</h1> <br>
            <h2 class="text-center font-weight-bold" style="margin-bottom:20px;font-size:1.4rem;">{{ $texts['subheading'] }}</h2>
            <div class="page-content">{!! $texts['intro'] !!}</div>
        </div>
    
        <div class="col-md-12" style="margin:30px 0;">{!! $texts['intro-2'] !!}</div>
    
    </div>
</div>

<div class="container-fluid page-content">
    <div class="row text-white" style="background: #045397;opacity:0.8;">
        <div class="col-md-2"></div>
        <div class="col-md-3" style="padding:30px;">
            <img src="{{ asset('images/glasses.png') }}" alt="" class="w-100">
        </div>
        <div class="col-md-5" style="padding:30px;">{!! $texts['track-1'] !!}</div>
        <div class="col-md-2"></div>
    </div>
    <div class="row text-white reverse" style="background:#045397;opacity:0.9">
        <div class="col-md-2"></div>
        <div class="col-md-5" style="padding:30px;"> {!! $texts['track-2'] !!}</div>
        <div class="col-md-3" style="padding:30px;">
            <img src="{{ asset('images/glasses.png') }}" alt="" class="w-100">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row text-white" style="background:#045397">
        <div class="col-md-2"></div>
        <div class="col-md-3" style="padding:30px;">
            <img src="{{ asset('images/glasses.png') }}" alt="" class="w-100">
        </div>
        <div class="col-md-5" style="padding:30px;"> {!! $texts['track-3'] !!}</div>
        <div class="col-md-2"></div>
    </div>
</div>

<div class="mb-3">
    <x-three-buttons />
</div>

@endsection

@section('footerScripts')
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection