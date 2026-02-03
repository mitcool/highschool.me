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
      padding: 30px;
      color:white;
      background: #045397;
      margin:40px 0;
      border-radius:15px;
    }
    .requirements-section hr{
      border-top:2px solid white;
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
	<div class="container page-content">
		<h1 class="text-center page-headings">Graduation Requirements</h1>
    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tortor augue, ullamcorper vel dui nec, posuere sodales est.</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, accusamus quam quos rerum quas, voluptas, non minus veritatis id labore mollitia ratione possimus quibusdam a ab excepturi repudiandae. Fugit veniam sint temporibus, accusantium porro sunt maiores tempora rerum non ex?</p>
	</div>
  <div class="container page-content">
      <section class="requirements-section">
          <h2>Requirement 1</h2>
          <hr>
          <p>Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern.
          </p>
	    </section>
      <section class="requirements-section">
          <h2>Requirement 2</h2>
          <hr>
          <p>Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern.
          </p>
	    </section>
      <section class="requirements-section">
          <h2>Requirement 3</h2>
          <hr>
          <p>Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern.
          </p>
	    </section>
  </div>
  <div class="container page-content">
     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta explicabo quidem odit. Iure laudantium sunt sed odit, dolorem velit quis ea perspiciatis voluptatem provident, at animi labore, delectus magni saepe recusandae blanditiis natus. Quaerat dicta accusantium et ipsum unde, consequuntur quia recusandae sequi architecto sapiente reprehenderit nostrum cupiditate. Beatae, perferendis.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta explicabo quidem odit. Iure laudantium sunt sed odit, dolorem velit quis ea perspiciatis voluptatem provident, at animi labore, delectus magni saepe recusandae blanditiis natus. Quaerat dicta accusantium et ipsum unde, consequuntur quia recusandae sequi architecto sapiente reprehenderit nostrum cupiditate. Beatae, perferendis.</p>
  </div>
 
  <x-three-buttons />
  <br>
@endsection
