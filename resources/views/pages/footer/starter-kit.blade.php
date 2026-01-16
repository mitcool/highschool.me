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
    .small-text {
        font-size: 14px;
        line-height: 1.7;
        color: #8a8a8a;
    }
    .feature-icon {
        font-size: 42px;
        color: #f15a00;
        margin-right: 20px;
        min-width: 50px;
    }

    .feature-text {
        color: #8a8a8a;
        font-size: 15px;
        line-height: 1.6;
        margin: 0;
    }
    @media (max-width: 992px) {
        .right-column {
            margin-top: 20px;
        }
    }
</style>
@endsection

@section('content')

<x-image-component nickname="freshman-kit-cover" class="digital_studies-images main-pictures-pages"/>
<div class="mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
                <h1 class="page-headings p-3">{{trans('promotion.heading')}}</h1>

                <p class="lead text-dark mb-4">
                    Earn real high school credits through a recognized curriculum that
                    meets national academic standards.
                </p>

                <p class="text-muted small-text">
                    Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque.
                    Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                    Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros.
                    Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin.
                    Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.
                    Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim.
                    Proin mattis porttitor lorem a tristique.
                </p>
            </div>
        </div>
    </div>
    <div class="mt-4" style="background-color: #F8F9FA;">
        <div class="container row g-4 pt-5 pb-5" style="margin: 0 auto;">

            <!-- LEFT COLUMN -->
            <div class="col-lg-6">
                <div class="d-flex align-items-start mb-4 feature-item">
                    <img src="{{ asset('/images/freshman-kit/bag.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4 feature-item">
                    <img src="{{ asset('/images/freshman-kit/headphones.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4 feature-item">
                    <img src="{{ asset('/images/freshman-kit/usb.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-start feature-item">
                    <img src="{{ asset('/images/freshman-kit/phone.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-lg-6 right-column">
                <div class="d-flex align-items-start mb-4 feature-item">
                    <img src="{{ asset('/images/freshman-kit/book.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4 feature-item">
                    <img src="{{ asset('/images/freshman-kit/power.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4 feature-item">
                    <img src="{{ asset('/images/freshman-kit/tablet.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-start feature-item">
                    <img src="{{ asset('/images/freshman-kit/pens.webp') }}" class="feature-icon">
                    <div>
                        <p class="feature-text">
                            Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium.
                            Vivamus vitae nisi a dolor aliquet varius in a eros.
                            Suspendisse non orci eros.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-three-buttons />
</div>
@endsection