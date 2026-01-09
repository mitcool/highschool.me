@extends('template')

@section('seo')
	<title>{{ trans('digital-studies.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('digital-studies.meta-description')}}" />

	<meta itemprop="title" property="og:title" content="{{ trans('digital-studies.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/smart-studies"/>
	<meta property="og:description" content="{{ trans('digital-studies.meta-description')}}"/>
	<x-meta-image itemprop="image" nickname="digital_studies"/>
@endsection

@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">School Overview</li>
	</ol>
</div>

<x-image-component nickname="us-flag" class="digital_studies-images main-pictures-pages"/>

<div class="container-fluid main_page_container">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 bg-white">
			<section>
				<h1 class="page-headings text-center">School Overview</h1>
				<h4>Earn real high school credits through a recognized curriculum that meets national academic standards.</h4>
				<div class="page-content" style="margin-top:50px;">Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf höchstem Niveau zu unterstützen.Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf höchstem Niveau zu unterstützen.</div>
			</section>
			<x-three-buttons/>
			
			{{-- <div class="d-flex justify-content-center">
				<iframe width="800" height="450" src="https://www.youtube.com/embed/TZRz1KtPfN8?si=1SCyQX_SWoWm-MfL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
			</div> --}}
		</div>
	</div>
</div>

<br>
@endsection
