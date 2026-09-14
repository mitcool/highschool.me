@extends('template')

@section('seo')
<x-seo.web-page-schema :url="url()->current()" :name="$country->nicename" :description="$country->nicename . ' country requirements'" :breadcrumbs="[['name' => 'Home', 'url' => route('welcome')], ['name' => 'Country Requirements', 'url' => route('country-requirements')], ['name' => $country->nicename, 'url' => url()->current()]]" />
@endsection

@section('headCSS')
<style>
    .orange{
        color:#E9580C;
    }
    .orange-icon{

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
		<li class="breadcrumb-item" aria-current="page"><a href="{{ route('country-requirements') }}">Country Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $country->nicename }}</li>
	</ol>
</div>

<div class="container-fluid bg-light">
    <div class="container page-content">
        <div class="d-flex">
            <div class="my-2">
                <a href="{{ route('single-country-requirements',$country->english_slug) }}">
                    <div class="shadow-sm d-flex justify-content-start w-auto" style="padding:10px;border-radius:15px;border:1px solid #045397">
                        <img style="height: 30px;width:50px;" src="{{ asset('images/flags/usa_flag.png') }}/" alt="" class="border">
                        <h5 class="ml-3 mb-0">English</h5> 
                    </div>
                </a>
            </div>
             @foreach($country->languages as $language)
            <div class="my-2">
                <a href="{{ route('single-country-translated-requirements',[$language->language->iso,$language->country->slug]) }}">
                    <div class="shadow-sm d-flex justify-content-start" style="padding:10px;border-radius:15px;margin-left:20px;border:1px solid #045397"">
                        <img style="height: 30px;width:50px;" src="{{ asset('images/flags') }}/{{ $language->language->flag }}" alt="" class="border">
                        <h5 class="ml-3 mb-0">{{ $language->language->nicename }}</h5> 
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <x-country.intro :country="$country"/>
    </div>
    <x-image-component nickname="country-requirements" class="imprint-images main-pictures-pages" loading="eager"/>
</div>

<x-country.recognition :country="$country"/>

<x-country.steps />

<x-country.diploma />

<x-country.inside />

<x-country.faq />

<x-country.sources />

<x-three-buttons />

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
             $(this).find('.service-icon').addClass('fa-times');
             $(this).find('.service-icon').removeClass('fa-plus')

        }
        else{
             $(this).find('.service-action').addClass('d-none')
             $(this).find('.service-icon').removeClass('fa-chevron-up')
             $(this).find('.service-icon').addClass('fa-plus')
             $(this).find('.service-icon').removeClass('fa-times')
        }
    })
</script>

@endsection
