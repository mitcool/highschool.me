@extends('template')
@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('international-students') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description']}}"/>
	<x-meta-image itemprop="image" nickname="study_registration"/>
	<x-seo.web-page-schema :url="route('tuition')" :name="$texts['heading']" :description="$texts['meta-description']" :breadcrumbs="[['name' => 'Home', 'url' => route('welcome')], ['name' => $texts['heading'], 'url' => route('tuition')]]" />
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
        border-radius: 15px;
    }
    .pro{
        background-color:#ec7130; 
        color: white;
        border-radius: 15px;
    }
    .elite{
        background-color:#E9580C; 
        color: white;
        border-radius: 15px;
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
        table {
        width: 100%;
        border-collapse: collapse;
      
        font-size: 1.1rem;
        color: #222;
        border: 1px solid #ccc;
    }

    table th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
        vertical-align: middle;
      
    }
    table th p,
    table td p {
      margin-bottom:0;	
    }
    table thead th {
        background-color: #5282b9;
        color: #fff;
        font-weight: bold;
        padding: 10px;
    }

    table tbody tr:nth-child(odd) {
        background-color: #e9f1f9;
    }

    table tbody tr:nth-child(even) {
        background-color: #fff;
    }

    table tbody tr:hover {
        background-color: #d9e7f5;
    }
</style>
@endsection

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
    <ol class="bg-white breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ ucwords(str_replace('-', ' ', request()->segment(1))) }}</li>
    </ol>
</div>

<x-image-component nickname="smiling-female-student-classroom" class="w-100" loading="eager"/>

<div class="container-fluid" style="padding:20px;width:80%;margin:0 auto">
    <div class="row text-center container mx-auto">
        <div class="col-md-12">
            <h1 class="text-center page-headings">{{ $texts['heading'] }}</h1> <br>
            <h2 class="text-center font-weight-bold" style="margin-bottom:20px;">{{ $texts['subheading'] }}</h2>
            <div class="page-content">
               {!! $texts['intro'] !!}
            </div>
            <h2 class="font-weight-bold text-center" style="margin:50px 0;">{{ $texts['options'] }}</h2>
        </div>
       
        @foreach($plans as $plan)
            <div class="shadow p-2 {{ strtolower($plan->name) }} mb-4">
                <div class="plan-name"><span class="font-weight-bold">{{ $plan->name }}</span> Package</div>
                <div style="text-align:justify;">
                    {!! $plan->info !!}
                </div>
            </div>
        @endforeach

        <div class="col-md-12" style="margin:30px 0;">
            <div class="text-justify page-content">{!! $texts['last-paragraph'] !!}</div> 
            <x-three-buttons/>
        </div>
        
    </div>
</div>
    

@endsection

@section('footerScripts')
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
