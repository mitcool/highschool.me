@extends('template')
@section('seo')
	<title>{{ trans('study-registration.meta-title') }}</title>
	<meta itemprop="description" name="description" content="{{ trans('study-registration.meta-description')}}" />
	<meta itemprop="title" property="og:title" content="{{ trans('study-registration.meta-title') }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/student-portal"/>
	<meta property="og:description" content="{{ trans('study-registration.meta-description')}}"/>
	<x-meta-image itemprop="image" nickname="study_registration"/>
@endsection

@section('headCSS')

<style>

.form-control,
.form-control:focus,
.form-control:active{

	outline: none !important;
}
.time-button,
.studies-button{
	background-color:white;
	border:1px solid black;
	min-width: 180px;
	max-width: 200px;
	cursor: pointer;
}
.selected-button{
	background-color:#d3ebff !important;
}
</style>

@endsection
@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">International Students</li>
	</ol>
</div>
<img src="{{ asset('images/international-students-cover.png') }}" alt="">
<div class="container-fluid bg-white main_page_container mb-2">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 shadow text-justify p-4 bg-white page-content" style="margin: 0 auto;">
				<h1 class="text-center font-weight-bold page-headings">International Students</h1><hr>
				<p>Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver</p><p> Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf höchstem Niveau zu unterstützen.Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern.\ Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf höchstem Niveau zu unterstützen.</p>
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('images/international-students.png') }}" alt="" class="w-100"/> 
					</div>
					<div class="col-md-6">
						<p>Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<x-three-buttons/>
@endsection

