@extends('template')

@section('seo')
		<meta itemprop="title" property="og:title" content="{{ trans('blog.meta-title') }}"/>
		<meta property="og:description" content="{{ trans('blog.meta-description') }}"/>
		<meta itemprop="url" property="og:url" content="{{  route('blog') }}"/>
		
		@if(request()->page)
			<title>{{ trans('blog.meta-title') }} | {{request()->segment(1) =='de' ? 'Seite' :  'Page'}} {{request()->page}}</title>
			<meta itemprop="description" name="description" content="{{ trans('blog.meta-description') }} | {{request()->segment(1) =='de' ? 'Seite' :  'Page'}} {{request()->segment(1)}}" />
			
		@else
			<title>{{ trans('blog.meta-title') }}</title>
			<meta itemprop="description" name="description" content="{{ trans('blog.meta-description') }}" />
			
		@endif
		
	<meta property="og:type" content="website"/>
	<x-meta-image itemprop="image" nickname="blog-cover"/>
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
	@php
	    $breadcrumb_title = strtok(trans('blog.meta-title'), '|');
	@endphp
	<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
		<ol class="bg-white breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
		</ol>
	</div>

<x-image-component nickname="blog-cover" id="cover" class="main-pictures-pages" loading="eager"/>
<div itemscope itemtype="http://schema.org/Blog" class="container-fluid main_page_container">
	<div id="blog_row" class="row justify-content-center">
		<div class="col-md-10 col-lg-8 container-style" >
			<h1 class="page-headings">{{trans('blog.heading')}}
				@if(request()->page != '')
				<br>
				<span style="opacity: 0;">{{(session()->get('locale')=='en' ? 'Page ' : 'Seite ')}} {{request()->page}}</span>
				@endif
			</h1>
			
			
			<div class="row" id="blog">
				@foreach($news as $n)
					<div class="news-body my-2">
						<a href="{{ route('single-press-release',$n->translated->slug) }}">
							<div>
								<h2>{{ $n->title }}</h2>
								<p class="mb-0">{{ $n->teaser }}</p>
							</div>
						</a>
						<p class="mb-0">{{ $n->created_at->format('d.m.Y') }}</p>
					</div>
				@endforeach
			</div>
			<div class="d-flex justify-content-center mt-3">{{$news->links()}}</div>
		</div>
	</div>	
</div>
@endsection
