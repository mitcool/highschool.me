@extends('template')


@section('seo')
	<title>{{trans('sitemap.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('sitemap.meta-description') }}" />

	<meta itemprop="title" property="og:title" content="{{trans('sitemap.meta-title')}}"/>
	<meta property="og:type" content="website"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/sitemap"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/sitemap"/>
	@endif
	<meta property="og:description" content="{{ trans('sitemap.meta-description') }}"/>

	<link rel="alternate" href="{{ config('app.url') }}/en/sitemap" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/sitemap" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/sitemap" hreflang="x-default" />
@endsection

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/sitemap" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/sitemap" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection
@section('content')
@php
    $breadcrumb_title = strtok(trans('sitemap.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-11 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>

<div class="container-fluid main_page_container">
	<div class="row justify-content-center ">
		<div class="col-md-11 container-style">
			<h1 class="page-headings">{{(Session::get('applocale') == 'de' ? 'Unsere Sitemap' : 'Sitemap')}}</h1>
			<hr>
			<div class="row">
				<div class="col-md p-2">
					<h2 style="font-size:1.2rem;color:black;">  {{ trans('nav.study-programs-link') }} </h2>
					@foreach($studies as $study)
					
					<a class="d-block"  href="{{ route('studies-'.app()->currentLocale(),$study->translated->slug)}}">{{ $study->translated->name }}</a>
					@if(Session::get('applocale') == 'de')
						@foreach ($study->programs as $program)
							<a class="d-block" href="{{route('programs-'.app()->currentLocale(),[$study->translated->slug,$program->translated->slug])}}">
								{{ $program->translated->name }}
							</a>
						@endforeach
					@else
						@foreach ($study->programs as $program)
							<a class="d-block" href="{{route('programs-'.app()->currentLocale(),[$study->translated->slug,$program->translated->slug])}}">
								{{ $program->translated->name }}
							</a>
						@endforeach
					@endif
					@endforeach
				</div>
				<div class="col-md p-2">
					<h2 style="font-size:1.2rem;color:black;"> {{ trans('nav.digital-study-link') }} </h2>
					@if(Session::get('applocale') == 'de')
						@foreach($second_column_routes as $route)
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_de }}
							</a>
						@endforeach
					@else
						@foreach($second_column_routes as $route)
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_en }}
							</a>
						@endforeach
					@endif
				</div>

				<div class="col-md p-2">
					<h2 style="font-size:1.2rem;color:black;"> {{ trans('nav.research-link') }} </h2>
					@if(Session::get('applocale') == 'de')
						@foreach($third_column_routes as $route)
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_de }}
							</a>
						@endforeach
					@else
						@foreach($third_column_routes as $route)
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_en }}
							</a>
						@endforeach
					@endif
				</div>
			
				<div class="col-md p-2">
					<h2 style="font-size:1.2rem;color:black;"> {{ trans('nav.onsites-school') }} </h2>
					@if(Session::get('applocale') == 'de')
						@foreach($fourth_column_routes as $route)
							<!-- Session check -->
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_de }}
							</a>
						@endforeach
					@else
						@foreach($fourth_column_routes as $route)
							<!-- Session check -->
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_en }}
							</a>
						@endforeach
					@endif

				</div>
				
				<div class="col-md p-2">
					<h2 style="font-size:1.2rem;color:black; text-transform:uppercase;">{{ trans('footer.resources') }}</h2>
					@if(Session::get('applocale') == 'de')
						@foreach($fifth_column_routes as $route)
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_de }}
							</a>
						@endforeach
					@else
						@foreach($fifth_column_routes as $route)
							<a class="d-block" href="{{ route($route->slug.'-'.app()->currentLocale()) }}">
								{{ $route->sitemap_name_en }}
							</a>
						@endforeach
					@endif		
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
