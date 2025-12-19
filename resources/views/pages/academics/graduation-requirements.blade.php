@extends('template')
@section('seo')
<title>{{ trans('study-registration.meta-title') }}</title>
<meta itemprop="description" name="description" content="{{ trans('study-registration.meta-description')}}" />
<meta itemprop="title" property="og:title" content="{{ trans('study-registration.meta-title') }}"/>
<meta property="og:type" content="website"/>
<meta property="og:description" content="{{ trans('study-registration.meta-description')}}"/>
<x-meta-image itemprop="image" nickname="study_registration"/>

@endsection


@section('headCSS')
	<style>
	.requirements-section {
      padding: 60px 0;
      background: #e85c0d;
    }

    .accordion-block {
      max-width: 900px;
      margin: 0 auto 24px auto; /* spacing between blocks */
    }

    .card {
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .card-header {
      background: #fff;
      border: none;
      padding: 0!important;
    }

    .btn-accordion {
      width: 100%;
      text-align: left;
      background: #fff;
      color: #00529b;
      font-weight: 700;
      font-size: 1.4rem;
      padding: 1rem 1.5rem;
      border: none;
      border-radius: 10px;
    }

    .btn-accordion:focus {
      box-shadow: none;
    }

    .card-body {
      background: #fff;
      padding: 1.25rem 1.5rem 1.5rem;
      border-top: 1px solid #ddd;
    }
	</style>
@endsection

@section('content')
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Graduation Requirements</li>
		</ol>
	</div>
	<img src="{{ asset('/images/grad-requirements.png') }}">
	<div class="container-fluid">
		<h1 class="text-center page-headings">Graduation Requirements</h1>
	</div>
	<section class="requirements-section">
		<div class="container">
			<div id="accordion">
				<!-- Requirement 1 -->
				<div class="accordion-block">
					<div class="card">
						<div class="card-header" id="headingOne">
							<button class="btn btn-accordion" data-toggle="collapse" data-target="#req1" aria-expanded="false" aria-controls="req1">
								Requirement 1
							</button>
						</div>

						<div id="req1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								Your content for Requirement 1 goes here.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('footerScripts')
	
@endsection	
