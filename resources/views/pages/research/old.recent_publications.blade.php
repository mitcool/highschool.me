@extends('template')

@section('seo')
	<title>{{trans('recent-publications.meta-title')}}</title>
	<meta name="description" content="{{ trans('recent-publications.meta-description') }}" />

	<meta property="og:title" content="{{trans('recent-publications.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta property="og:url" content="{{ config('app.url') }}de/recent-publications_de"/>
	@else
		<meta property="og:url" content="{{ config('app.url') }}en/recent-publications"/>
	@endif
	<meta property="og:description" content="{{ trans('recent-publications.meta-description') }}"/>
	<x-meta-image nickname="publication-{{ $p->id }}"/>

	<link rel="alternate" href="{{ config('app.url') }}en/recent-publications" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}de/recent-publications_de" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}en/recent-publications" hreflang="x-default" />
@endsection

@section('headCSS')
	<style type="text/css">
		.display-none{
			display:none;
		}
	</style>
@endsection

@section('content')
<div id="publications_container" class="container-fluid main_page_container">
	<div class="row">
		<div class="col-lg-10 offset-lg-1 p-5">
			<h1 class="page-headings mb-4">{{trans('recent-publications.heading')}}</h1>
			<div class="row" id="publication_info">
				@foreach($publications as $p)
				<div class="col-lg-6" style="margin-bottom: 40px;">
					<div class="shadow p-3 h-100">
						<h5 class="publication-heading">{{$p->translated->heading}}</h5>
						<hr>
						<div class="row">
							<div class="col-lg-6 publication-img">
								<x-image-component nickname="publication-{{ $p->id }}" class="w-100" />
							</div>
							<div class="col-lg-6">
								<div class="row details">
									<div class="col-lg-6">
										<p class="m-1 font-weight-bold">{{trans('recent-publications.author')}}</p>
									</div>
									<div class="col-lg-6 no-padding">
										<p class="m-1">{!! $p->translated->authors !!}</p> 
									</div>
								
								</div>
								<div class="row details">
									<div class="col-lg-6">
										<p class="font-weight-bold m-1">{{trans('recent-publications.pages')}}</p>
									</div>
									<div class="col-lg-6 no-padding">
										<p class="m-1">{{$p->pages}}</p>
									</div>
									<div class="col-lg-12 text-center display-none my-2">
										<p class="font-weight-bold m-1">{{trans('recent-publications.pages')}}</p>
										<p class="m-1">{{$p->pages}}</p>
									</div>
								</div>
								<div class="row details">
									<div class="col-lg-6">
										<p class="font-weight-bold m-1">{{trans('recent-publications.edition')}}</p>
									</div>
									<div class="col-lg-6 no-padding">
										<p class="m-1">{{$p->edition}}</p>
									</div>
									<div class="col-lg-12 text-center display-none my-2">
										{{trans('recent-publications.edition')}}
										<p class="m-1">{{$p->edition}}</p>
									</div>
								</div>
								<div class="row details">
									<div class="col-lg-6">
										<p class="font-weight-bold m-1">{{trans('recent-publications.year')}}</p>
									</div>
									<div class="col-lg-6 no-padding">
										<p class="m-1">{{$p->year}}</p>
									</div>
									<div class="col-lg-12 text-center display-none my-2">
										<p class="font-weight-bold m-1">{{trans('recent-publications.year')}}</p> 
										<p class="m-1">{{$p->year}}</p>
									</div>
								</div>
								<div class="row details">
									<div class="col-lg-6">
										<p class="font-weight-bold m-1">{{trans('recent-publications.language')}}</p> 
									</div>
									<div class="col-lg-6 no-padding">
										<p class="m-1">{{$p->translated->language}}</p>
									</div>
									<div class="col-lg-12 text-center display-none my-2">
										<p class="font-weight-bold m-1">{{trans('recent-publications.language')}}</p>
										<p class="m-1">{{$p->translated->language}}</p>
									</div>
								</div>
								<div class="row details">
									<div class="col-lg-6">
										<p class="font-weight-bold m-1">{{trans('recent-publications.isbn')}}</p> 
									</div>
									<div class="col-lg-6 no-padding">
										<p class="m-1">{{$p->translated->ISBN}}</p>
									</div>
									<div class="col-lg-12 text-center display-none mb-2">
										<p class="font-weight-bold m-1">{{trans('recent-publications.isbn')}}</p> 
										<p class="m-1">{{$p->translated->ISBN}}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-12 publication-summary">
								<p class="text-justify p-3">{!!$p->translated->summary!!}</p>
							</div>
						</div>
						<hr>
					</div>
				</div>
				@endforeach
			</div>
			<div class="mt-3 d-flex justify-content-center">{{$publications->links()}}</div>
		</div>
	</div>
</div>
@endsection