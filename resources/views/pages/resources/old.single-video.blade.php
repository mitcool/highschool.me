@extends('template')

@section('seo')
	<link rel="alternate" href="{{ config('app.url') }}en/faq/{{ $hreflang_en }}" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}de/faq/{{ $hreflang_de }}" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}en/faq/{{ $hreflang_en }}" hreflang="x-default" />
@endsection

@section('content')
<div class="container text-center" style="min-height:80vh;">
	<div style="margin-top:100px;">
		<h1>{{$tutorial->translated->name}}</h1>
		<hr>
		<div class="video-container">
			<iframe width="800" height="450" src="{{$tutorial->translated->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		
		<hr>
		{!! $tutorial->translated->text !!}
	</div>
</div>
@endsection
