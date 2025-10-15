@extends('template')

@section('seo')
	<title>{{trans('help-desk.meta-title')}}</title>
	<meta name="description" content="{{ trans('help-desk.meta-description') }}" />
	<link rel="alternate" href="{{ config('app.url') }}en/help-desk" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}de/help-desk" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}en/help-desk" hreflang="x-default" />
@endsection

@section('content')
<x-image-component nickname="help_desk" class="help_desk-images main-pictures-pages"/>

<div class="container-fluid  p-5">
	
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style">
			<h2 class="page-headings">{{trans('help-desk.heading')}}</h2>
			<div class="page-content">{!!trans('help-desk.content') !!}</div>
			
			<div class="row">
				@foreach($tutorials as $tutorial)
					<div class="col-md-4">
						<div class="shadow">
							<a href="{{route('single-help-desk-'.app()->currentLocale(),$tutorial->translated->slug)}}">
								<x-image-component nickname="tutorial-{{app()->currentLocale().'-'.$tutorial->id}}" class="w-100" />
							</a>
						</div>
						<p class="my-2 text-secondary font-weight-bold">{{$tutorial->name}}</p>
					</div>
				@endforeach
			</div>
			
		</div>
	</div>
</div>

@endsection
