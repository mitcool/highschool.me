@extends('template')

@section('seo')
    <!-- HTML Meta Tags -->
    {{-- <title>{!! trans('gold-chart.meta-title') !!} | </title>
    <meta itemprop="description" name="description" content="{!! trans('gold-chart.meta-desc') !!} ">
    <!-- Open Graph Meta Tags -->
    <meta itemprop="name" property="og:title" content="{!! trans('gold-chart.meta-title') !!}">
	<meta property="og:description" content="{!! trans('gold-chart.meta-desc') !!}"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}"/>
	<meta itemprop="image" property="og:image" content="{{ asset('images/gold-bars-and-gold-coins.jpg') }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:logo" content="{{ asset('images/logo-gold-biz.png') }}"/>
    <!-- Hreflang -->
    <link rel="alternate" href="{{ route('gold-chart-en',  != 'all' ? : '') }}" hreflang="en" />
	<link rel="alternate" href="{{ route('gold-chart-de', != 'all' ? : '') }}" hreflang="de" />
	<link rel="alternate" href="{{ route('gold-chart-de', != 'all' ? : '') }}" hreflang="x-default" />
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="gold.biz">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta name="twitter:title" content="{!! trans('gold-chart.meta-title') !!}">
    <meta name="twitter:description" content="{!! trans('gold-chart.meta-desc') !!}">
    <meta name="twitter:image" content="{{ asset('images/gold-bars-and-gold-coins.jpg') }}"> --}}
    
    {{-- <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Gold.biz",
        "url": "https://gold.biz",
        "isPartOf": {
            "@type": "Website",
            "name": "LEGALIS Associates LTD",
            "url": "https://gold.biz"
        }
    }
    </script> --}}
    <style type="text/css">
        :root{
           --main-color:#025297;
           --today:rgb(0, 0, 0);
           --weekend:rgba(234,88,13,0.8);
           --orange: #EA580D;
        }
        #calendar-container{
            margin-top:50px;
        }
        .date{
            border:1px solid white;
            border-radius: 100%;
            padding:8px;
            width:50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-top:10px;
        }
        .date.top{
            color:white !important;
        }
        .date-past{
            border:1px solid white;
            border-radius: 100%;
            padding:8px;
            width:50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:10px;
            opacity: 0.6;
            cursor:not-allowed !important;
        }
        .date:hover{
            background-color: var(--main-color);
            border:1px solid var(--main-color);
            color:white;
        }
        .calendar-label{
            margin:20px 0;
            font-weight: bold;
        }
        .calendar-label .date{
            background: var(--main-color);
            color:black;
            border-color:transparent;
        }
        .today{
            background-color: var(--today);
            color:white;
        }
        .today:hover{
            color:black;
        }
        .weekend{
            background-color: var(--weekend);
        }
        .hour{
            display:none;
        }
        .reserved,
        .hour-label{
            border:1px solid lightgrey;
            color:white;
            display:block;
            width:50%;
            margin:10px auto;
            cursor: pointer;
            background-color: var(--main-color);
            padding:10px;
            border-radius: 20px;
        }
        .reserved{
            text-decoration: line-through;
            opacity: 0.5;
            cursor:not-allowed;
        }
        .hour-label:hover{
            opacity: 0.7;
        }
        
        .gold-line{
            height: 0px;
            border:1px solid var(--main-color);
            opacity: 0.9;
        }
        .author-top-image {
			width:40%;
			border-radius:100%;
			height: auto;
		}
        .appointment-form{
            display:none;
        }
        #appointment-details-form label{
            color:var(--main-color)
        }
        .invoice-details{
            display: none;
        }
        .meeting-details{          
            margin-top:30px;
        }
        #appointment-details-form{
          
        }
        #appointment-details-form .form-control::placeholder{
           
            opacity: 1; /* Firefox */
        }
        @media(max-width:1368px){
            .date,
            .date-past{
                width:40px;
                height: 40px;
            }
        }
        @media(max-width:858px){
            .date,
            .date-past,
            .top{
                width:30px;
                height: 30px;
                font-size:0.8rem;
            }
        }

        @media(max-width:430px){
            .date,
            .date-past{
                width:25px;
                height: 25px;
                font-size:0.8rem;
            }
        }
        @media(max-width:395px){
            .date,
            .date-past{
                width:20px;
                height: 20px;
                font-size:0.6rem;
            }
        }
    </style>
    @yield('calendar-css')
@endsection

@yield('language-switcher-calendar')


@section('content')

<div class="container-fluid" id="calendar-container">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-3 col-md-5" style="padding:20px;">
            <img width="323" 
                height="323" 
                loading="lazy" 
                src="https://gold.biz/public/images/authors/dr-mathias-kunze-author-profile.webp" 
                alt="Dr. Mathias Kunze, economist and business lawyer." title="Dr. Mathias Kunze, Ökonom und Wirtschaftsjurist, ist Experte für Wirtschaftsrecht, Edelmetallmärkte und internationale Steueroptimierung." 
                class="author-top-image" 
            />
            <hr>
            <div class="text-left" style=" padding:20px;">
                <h2 class="text-left">Dr. Mathias Kunze</h2>
                <h3>Expert in:</h3>
                <div class="meeting-details">
                    @if(!empty($reserved_hour))
                    <div class="hour-details font-weight-normal" style="padding:10px;">
                        <h5>{{ $reserved_hour->day_of_week() }}, {{ $reserved_hour->formatted_reserved_date() }} </h5> 
                        <h5 class="font-weight-normal">{{ $reserved_hour->formatted_time() }} - {{ $reserved_hour->end_meeting() }}</h5>
                    </div>
                    @endif
                    <div>
                        <br>
                        <h5>&nbsp;&nbsp;<span class="badge d-inline-block" style="color:white;background-color:var(--main-color);"><i class="fas fa-clock"></i> 45min</span></h5>
                    </div>
                    
                </div>
                
            </div>
            

        </div>
        
        <div class="col-xl-5 col-md-7" style="box-shadow: 0 0 10px #ffffff29;padding:20px;">
            @yield('right-side')
        </div>
        <div class="col-xl-2 col-md-1"></div>
    </div>
</div>

@endsection

@section('footerScripts')
    @yield('calendar-scripts')
@endsection

