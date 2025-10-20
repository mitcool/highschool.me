@extends('template')

@section('seo')
<title>{{trans('promotion.meta-title')}}</title>
<meta itemprop="description" name="description" content="{{ trans('promotion.meta-description') }}" />

<meta itemprop="title" property="og:title" content="{{trans('promotion.meta-title')}}"/>
<meta property="og:type" content="website"/>
<meta itemprop="url" property="og:url" content="{{  route('starter-kit') }}"/>
<meta property="og:description" content="{{ trans('promotion.meta-description') }}"/>
<x-meta-image itemprop="image" nickname="coaching"/>

@endsection

@section('headCSS')
<style>
    .promotion-images{
        width:100%;
        padding:20px;
    }
    .promotion-text{
        padding:20px;
		display:flex;
        align-items:start;
		justify-content:center;
		flex-direction:column;
    }
    @media(max-width:1200px){
        .reverse{
            flex-direction: column-reverse;
        }
    }
</style>
@endsection

@section('content')

<x-image-component nickname="promotion-cover" class="digital_studies-images main-pictures-pages"/>
<div class="container-fluid main_page_container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h1 class="page-headings p-3">{{trans('promotion.heading')}}</h1>
			<div class="page-content">{!! trans('promotion.starting-text') !!}</div>
            <div class="row p-3">
                <div class="col-xl-6">
                    <x-image-component nickname="promotion-1"  class="promotion-images"/>
                </div>
                <div class="col-xl-6 promotion-text">
                    {!! trans('promotion.text-one') !!}
                </div>
            </div>
            <div class="row reverse p-3">
                <div class="col-xl-6 promotion-text">
                    {!! trans('promotion.text-two') !!}
                </div>
                <div class="col-xl-6">
                    <x-image-component nickname="promotion-2" class="promotion-images"/>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-xl-6">
                    <x-image-component nickname="promotion-3" class="promotion-images"/>
                </div>
                <div class="col-xl-6 promotion-text">
                    {!! trans('promotion.text-three') !!}
                </div>
            </div>
            <div class="row reverse p-3">
                <div class="col-xl-6 promotion-text">
                    {!! trans('promotion.text-four') !!}
                </div>
                <div class="col-xl-6">
                    <x-image-component nickname="promotion-4" class="promotion-images"/>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-xl-6">
                    <x-image-component nickname="promotion-5" class="promotion-images"/>
                </div>
                <div class="col-xl-6 promotion-text">
                    {!! trans('promotion.text-five') !!}
                </div>
            </div>
            <div class="row reverse p-3">
                <div class="col-xl-6 promotion-text">
                    {!! trans('promotion.text-six') !!}
                </div>
                <div class="col-xl-6">
                    <x-image-component nickname="promotion-6" class="promotion-images"/>
                </div>
            </div>  
            <div class="row p-3">
                <div class="col-xl-6">
                    <x-image-component nickname="promotion-7" class="promotion-images"/>
                </div>
                <div class="col-xl-6 promotion-text">
                    {!! trans('promotion.text-seven') !!}
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>

<div style="background:#045397;padding:20px;text-center;display:flex;justify-content:center;">
    <a href="" class="orange-button btn mx-auto">View Courses</a>
</div>
@endsection