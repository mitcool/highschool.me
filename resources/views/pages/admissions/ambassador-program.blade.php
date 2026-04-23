@extends('template')
@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('international-students') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description']}}"/>
	<x-meta-image itemprop="image" nickname="study_registration"/>
@endsection
@section('headCSS')
<style>
    .h3.blue{
        color: #045397 !important;
    }
    .box{
        padding:20px;
    }
    #open-rewards,
    .service-wrapper{
        cursor: pointer;
    }
    .service-wrapper{
        margin:10px 0;
        padding:10px;
        border-radius: 15px;
        -webkit-box-shadow: 0px 0px 20px -5px rgba(0,0,0,0.55); 
        box-shadow: 0px 0px 20px -5px rgba(0,0,0,0.55);
    }
    .reward-container {
        border-radius: 15px;
        -webkit-box-shadow: 0px 0px 20px -5px rgba(0,0,0,0.55); 
        box-shadow: 0px 0px 20px -5px rgba(0,0,0,0.55);
    }
</style>

@endsection

@section('content')
    <div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
        <ol class="bg-white breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $texts['breadcrumb'] }}</li>
        </ol>
    </div>
    
    <div class="container-fluid bg-white box">
        <div class="container">
            <div class="text-center">
                <x-image-component nickname="gold-shield-ambassador-badge-stars" class="w-25" loading="eager"/>
            </div>
             <h1 class="page-headings">{{ $texts['heading'] }}</h1>
            {!! $texts['intro'] !!}
        </div>
    </div>
    <div class="container-fluid box" style="background-color:#F1F1F1">
        <div class="container">
            {!! $texts['how-it-works'] !!}
            @foreach($ambassador_services as $service)
                <div class="service-wrapper bg-white pl-3 pr-3">
                    <div class="d-flex justify-content-between" style="padding:10px 0;font-size:1.1rem;color:#045397;font-weight:bold">
                            <div>{{ $service->name }}</div>
                            <div><i class="fas {{ $loop->first ? 'fa-chevron-up' : 'fa-chevron-down' }} service-icon"></i></div>
                    </div>
                    <div class="service-action {{ $loop->first ? '' : 'd-none' }}">
                        @foreach ($service->actions as $action )
                            <div class="d-flex justify-content-between">
                                <div>{{ $action->name }}</div>
                                <div>{{ $action->value }} {{ $action->additional_information }}</div>
                            </div>
                            <hr class="my-1">
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="container-fluid bg-white box">
        <div class="container">
            {!! $texts['status'] !!}
        </div>
    </div>
      <div class="container-fluid box" style="background-color:#F1F1F1">
        <div class="container">
            {!! $texts['rewards'] !!}
            <div class="shadow bg-white p-3 reward-container">
                <div class="d-flex justify-content-between" id="open-rewards" style="color:#14213D;font-weight:bold;color:#E9580C;padding:10px 0;">
                    <div>{{ $texts['reward-list'] }}</div> 
                    <div><i class="fas fa-chevron-up" id="icon" ></i></div>
                </div> 
                <div id="rewards">
                    <div class="d-flex justify-content-between" style="color:#14213D;font-weight:bold">
                        <div>{{ $texts['reward'] }}</div> 
                        <div>{{ $texts['points'] }}</div>
                    </div> 
                    <hr class="my-1">
                    @foreach($ambassador_rewards as $reward)
                        <div class="d-flex justify-content-between">
                            <div>{{ $reward->name }}</div> 
                            <div style="color:#E9580C;font-weight:bold">{{ $reward->points }}</div>
                        </div> 
                    <hr class="my-1">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

     <div class="container-fluid bg-white box">
        <div class="container">
             {!! $texts['purpose'] !!}
        </div>
    </div>

    <x-three-buttons/>
@endsection

@section('footerScripts')
<script>
    $('#open-rewards').on('click',function(){
        if($('#rewards').hasClass('d-none')){
             $('#rewards').removeClass('d-none');
             $('#icon').removeClass('fa-chevron-down')
             $('#icon').addClass('fa-chevron-up')
        }
        else{
             $('#rewards').addClass('d-none');
             $('#icon').removeClass('fa-chevron-up')
             $('#icon').addClass('fa-chevron-down')
        }
    });

    $('.service-wrapper').on('click',function(){
        if($(this).find('.service-action').hasClass('d-none')){
             $(this).find('.service-action').removeClass('d-none')
             $(this).find('.service-icon').removeClass('fa-chevron-down')
             $(this).find('.service-icon').addClass('fa-chevron-up')
        }
        else{
             $(this).find('.service-action').addClass('d-none')
             $(this).find('.service-icon').removeClass('fa-chevron-up')
             $(this).find('.service-icon').addClass('fa-chevron-down')
        }
    })
</script>
@endsection
