@extends('template')

@section('seo')
	<title></title>
	<meta itemprop="description" name="description" content="">

	<meta itemprop="title" property="og:title" content=""/>
	<meta property="og:type" content="website"/>
	
	<meta property="og:description" content=""/>
@endsection



@section('content')
@php
    
@endphp
<div aria-label="breadcrumb" class="col-md-10 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-1">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page"></li>
	</ol>
</div>
<div class="container-fluid main_page_container bg-light">
	<div class="row">
		<div class="col-md-10 offset-md-1 p-3">
			<h1 class="page-headings">FAQ</h1>
			@foreach($faq_category_questions as $faq)
			
				<h2>{{ $faq->question }}</h2>
				<p>{!! $faq->answer !!}</p>
					
				<hr>
			@endforeach
		</div>
	</div>
</div>
@endsection