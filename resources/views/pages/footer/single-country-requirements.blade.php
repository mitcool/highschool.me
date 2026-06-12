@extends('template')

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
    <div class="container page-content">
        <h2 class="section-headings">How the Recognition Process Works, Step by Step</h2>
        <div class="row">
            <div class="col-md-2">RECOGNITION</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">COMPETENT AUTHORITY</div>
            <div class="col-md-10">
                <p>НАЦИД / NACID, Sofia</p>
                <p>Sole authority for completed secondary education from foreign schools since October 1, 2025.</p>
            </div>
            <div class="col-md-2">LEGAL BASIS</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">PROCESSING TIME</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">FEE</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">DOCUMENTS</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">FILING</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">GRADE CONVERSION</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">UNIVERSITY ADMISSION</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
            <div class="col-md-2">PARALLEL TO SCHOOL</div>
            <div class="col-md-10">
                <p>Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
    </div>

</div>
@endsection