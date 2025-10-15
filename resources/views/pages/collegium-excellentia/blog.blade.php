@extends('template')

@section('seo')
	@if(request()->routeIs('blog-'.app()->currentLocale()))		
		<meta itemprop="title" property="og:title" content="{{ trans('blog.meta-title') }}"/>
		<meta property="og:description" content="{{ trans('blog.meta-description') }}"/>

		@if(Session::get('applocale') == 'de')
			<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/blog"/>
		@else
			<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/blog"/>
		@endif

		@if(request()->page)
			<title>{{ trans('blog.meta-title') }} | {{request()->segment(1) =='de' ? 'Seite' :  'Page'}} {{request()->page}}</title>
			<meta itemprop="description" name="description" content="{{ trans('blog.meta-description') }} | {{request()->segment(1) =='de' ? 'Seite' :  'Page'}} {{request()->segment(1)}}" />
			<link rel="alternate" href="{{ config('app.url') }}/en/blog?page={{request()->page}}" hreflang="en"/>
			<link rel="alternate" href="{{ config('app.url') }}/de/blog?page={{request()->page}}" hreflang="de"/>
			<link rel="alternate" href="{{ config('app.url') }}/en/blog?page={{request()->page}}" hreflang="x-default" />
		@else
			<title>{{ trans('blog.meta-title') }}</title>
			<meta itemprop="description" name="description" content="{{ trans('blog.meta-description') }}" />
			<link rel="alternate" href="{{ config('app.url') }}/en/blog" hreflang="en"/>
			<link rel="alternate" href="{{ config('app.url') }}/de/blog" hreflang="de"/>
			<link rel="alternate" href="{{ config('app.url') }}/en/blog" hreflang="x-default" />
		@endif
	@else
		
		<meta itemprop="title" property="og:title" content="{{ $news[0]->category->translated->meta_title }}"/>
		<meta property="og:description" content="{{ $news[0]->category->translated->meta_description}}"/>
		@if(!request()->page)
		<meta itemprop="description" name="description" content="{{ $news[0]->category->translated->meta_description}}">
		@endif
		@if(Session::get('applocale') == 'de')
			<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/blog/{{$news[0]->category->slug_de}}" />
		@else
			<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/blog/{{$news[0]->category->slug_en}}" />
		@endif
		@if(request()->page)
			<title>{{ $news[0]->category->translated->meta_title }} | {{request()->segment(1) =='de' ? 'Seite' :  'Page'}} {{request()->page}}</title>
			<meta itemprop="description" name="description" content="{{ $news[0]->category->translated->meta_description}} | {{request()->segment(1) =='de' ? 'Seite' :  'Page'}} {{request()->page}}">
			<link rel="alternate" href="{{config('app.url') }}/en/blog/{{ $news[0]->category->english_category->slug.'?page='.request()->page}}" hreflang="en"/>
			<link rel="alternate" href="{{ config('app.url') }}/de/blog/{{$news[0]->category->german_category->slug.'?page='.request()->page}}" hreflang="de"/>
			<link rel="alternate" href="{{ config('app.url') }}/en/blog/{{$news[0]->category->english_category->slug.'?page='.request()->page}}" hreflang="x-default" />
		@else
			<title>{{ $news[0]->category->translated->meta_title }}</title>
			<link rel="alternate" href="{{ config('app.url') }}/en/blog/{{$news[0]->category->english_category->slug}}" hreflang="en"/>
			<link rel="alternate" href="{{ config('app.url') }}/de/blog/{{$news[0]->category->german_category->slug}}" hreflang="de"/>
			<link rel="alternate" href="{{ config('app.url') }}/en/blog/{{$news[0]->category->english_category->slug}}" hreflang="x-default" />
		@endif
	@endif
		
	<meta property="og:type" content="website"/>
	<x-meta-image itemprop="image" nickname="blog-cover"/>
@endsection


@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ request()->routeIs('blog-'.app()->currentLocale()) ? route('blog-en') : route('single-article-en',$news[0]->category->all_translations[0]->slug) }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ request()->routeIs('blog-'.app()->currentLocale()) ? route('blog-de') : route('single-article-de',$news[0]->category->all_translations[1]->slug) }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('headCSS')
<style type="text/css">
	.news-image{
		width: 100%;
	}
	.news-body{
		padding:20px;
		height:100%;
	}
	.news-link{
		color:black;
	}
	.news-link:hover{
		text-decoration: none;
		color:black;
	}
	.news-wrapper{
		margin-top:20px;
		height: 100%;
	}
	.news-heading{
		min-height: 100px;
	}
	.news-description{
		min-height: 180px;
		font-size:15px;
		line-height:1.6;
	}
	.article-date{
		font-size:13px;
		color: #EE6123;
	}
</style>
@endsection
@section('content')
@if(request()->routeIs('blog-'.app()->currentLocale()))
	@php
	    $breadcrumb_title = strtok(trans('blog.meta-title'), '|');
	@endphp
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
		</ol>
	</div>
@else
	@php
	    $breadcrumb_title = strtok($news[0]->category->translated->meta_title, '|');
	@endphp
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
		</ol>
	</div>
@endif

<x-image-component nickname="blog-cover" id="cover" class="main-pictures-pages" loading="eager"/>
<div itemscope itemtype="http://schema.org/Blog" class="container-fluid main_page_container">
	<div id="blog_row" class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style" >
			@if(request()->routeIs('blog-'.app()->currentLocale()))
			<h1 class="page-headings">{{trans('blog.heading')}}
				@if(request()->page != '')
				<br>
				<span style="opacity: 0;">{{(session()->get('locale')=='en' ? 'Page ' : 'Seite ')}} {{request()->page}}</span>
				@endif
			</h1>
			@else
			<h1 class="page-headings">{{ $news[0]->category->translated->headline }}
				@if(request()->page != '')
				<br>
				<span style="opacity: 0;">{{(session()->get('locale')=='en' ? 'Page ' : 'Seite ')}} {{request()->page}}</span>
				@endif
			</h1>
			@endif
			<div class="row" id="blog">
				@foreach($news as $n)
				<div itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting" class="col-lg-4 news-wrapper">
					<div itemprop="articleBody" class="news_container shadow">
						<img 
							class="news-image" 
							src="{{ asset('news_images') }}/{{ $n->main_image->all_translations[0]->content }}" 
							alt="{{ $n->main_image->attributes ? $n->main_image->attributes->alt() : '' }}"
							title="{{ $n->main_image->attributes ? $n->main_image->attributes->title() : '' }}"
						/>
						<div class="news-body">
							<h2 itemprop="name" class="news-heading mt-2 text-center font-weight-bold h6">{{ $n->sections[0]->translated->content }}</h2>
							<div class="d-flex justify-content-between">
								<div class="category mr-2">
									<a class="btn p-0 btn-link text-left text-dark font-weight-bold" href="{{ route('single-article-'.app()->currentLocale(),$n->category->translated->slug) }}">{{ $n->category->translated->name }}
									</a>
								</div>
							</div>
							<div class="minutes">
								<p class="font-weight-bold"><i class="fas fa-clock"></i> {{ $n->minutes }} min.</p>
							</div>
						</div>
						<div itemprop="author" itemscope itemtype="https://schema.org/Person">
							<form action="{{ route('blog-'.app()->currentLocale()) }}">
							<input type="hidden" name="author" value="{{ $n->author->translated->slug}}">
								<button class="btn p-0 btn-link text-left text-dark font-weight-bold">
									<span itemprop="name">{{ $n->author->translated->name }}</span><br/>
								</button>
							</form>
						</div>
						<div class="text-center mt-auto">
							<hr/>
							<a itemprop="url" href="{{ route('single-article-'.app()->currentLocale(),$n->translated->slug) }}" class="btn read-more">{{ trans('welcome.read-more') }}</a>
						</div>  
					</div> 
				</div>
				@endforeach
			</div>
			<div class="d-flex justify-content-center mt-3">{{$news->links()}}</div>
		</div>
	</div>	
</div>
@endsection
