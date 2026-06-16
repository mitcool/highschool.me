@extends('template')

@section('headCSS')
<style>
    .orange{
        color:#E9580C;
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
        <h1 class="page-headings">Recognition of the U.S. High School Diploma in Bulgaria</h1>
        <p>Complete an accredited American high school fully online. NACID issues the recognition certificate within 1 month of a complete submission, opening the path to Bulgarian universities.</p>
    </div>
    <x-image-component nickname="country-requirements" class="imprint-images main-pictures-pages" loading="eager"/>
</div>

<div class="container-fluid ">
     <div class="container">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;">Recognition in Bulgaria at a Glance</h2>
     </div>
    <div class="container page-content shadow">
       
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">RECOGNITION</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">COMPETENT AUTHORITY</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">LEGAL BASIS</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">PROCESSING TIME</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">FEE</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">DOCUMENTS</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">FILING</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">GRADE CONVERSION</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">UNIVERSITY ADMISSION</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">PARALLEL TO SCHOOL</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light">
     <div class="container">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;padding:20px 0;">How the Recognition Process Works, Step by Step</h2>
        <p>Five steps separate the American diploma from the Bulgarian recognition certificate. Two take place in the United States, three in Bulgaria, and all of them can be arranged remotely.</p>
     </div>
    <div class="container page-content">
       
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">01</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">02</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">03</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">04</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">05</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
    </div>
</div>
@endsection