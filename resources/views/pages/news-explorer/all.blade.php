@extends('template')

@section('seo')
		<meta itemprop="title" property="og:title" content="{{ trans('blog.meta-title') }}"/>
		<meta property="og:description" content="{{ trans('blog.meta-description') }}"/>
		<meta itemprop="url" property="og:url" content="{{ route('blog') }}"/>
		
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
	.news-card {
	    border-radius: 10px;
	    overflow: hidden;
	    transition: all 0.3s ease-in-out;
	    background-color: #fff;
	}

	.news-card:hover {
	    transform: translateY(-5px);
	    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
	}

	.news-image {
	    height: 200px;
	    width: 100%;
	    object-fit: cover;
	}

	.btn-orange {
	    background-color: #ff6600;
	    color: white;
	    border-radius: 20px;
	    transition: background 0.3s ease;
	}

	.btn-orange:hover {
	    background-color: #e65500;
	    color: #fff;
	}

	.card-title {
	    font-size: 1.05rem;
	}

	.card-text {
	    font-size: 0.9rem;
	    line-height: 1.4;
	}
	#footer {
		margin-top: 0px!important;
	}
	.main-container-back {
		background-color: #F1F1F1;
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
<div itemscope itemtype="http://schema.org/Blog" class="container-fluid main-container-back">
	<div id="blog_row" class="row justify-content-center">
		<div class="col-md-10 col-lg-8" >
			@if(request()->routeIs('blog'))
			<h1 class="page-headings mb-2">{{trans('blog.heading')}}
				@if(request()->page != '')
				<br>
				<span style="opacity: 0;">{{(session()->get('locale')=='en' ? 'Page ' : 'Seite ')}} {{request()->page}}</span>
				@endif
			</h1>
			@else
			<h1 class="page-headings mb-2">{{ $news[0]->category->translated->headline }}
				@if(request()->page != '')
				<br>
				<span style="opacity: 0;">{{(session()->get('locale')=='en' ? 'Page ' : 'Seite ')}} {{request()->page}}</span>
				@endif
			</h1>
			@endif
			<div class="text-center mb-5">
				<p>Regular and concise updates about the ONSITES High School.</p>
			</div>
			
			<div class="row" id="blog">
			    @foreach($news as $n)
			    <div itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting" class="col-lg-4 col-md-6 mb-4">
			        <div class="card h-100 shadow-sm border-0 news-card">
			            <img 
			                class="card-img-top news-image"
			                src="{{ asset('images/news') }}/{{ $n->image }}" 
			            />

			            <div class="card-body d-flex flex-column">
			                <h5 itemprop="name" class="card-title fw-bold mb-2 text-truncate">
			                    {!! $n->sections[0]->content !!}
			                </h5>
			                <div style="width: 150px; height: 3px; background-color: #045397; margin: 10px 5px 10px 0px;"></div>
			                <p class="card-text text-muted small mb-3">
			                    {!! \Illuminate\Support\Str::limit(strip_tags($n->sections[1]->content ?? ''), 120, '...') !!}
			                </p>
			                
			                <div class="mt-auto text-right">
			                    <a itemprop="url" href="{{ route('single-article',$n->slug) }}" class="btn btn-sm btn-orange px-4">
			                        {{ trans('welcome.read-more') }}
			                    </a>
			                </div>
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
