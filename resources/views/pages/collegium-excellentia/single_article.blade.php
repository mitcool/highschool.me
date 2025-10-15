@extends('template')

@section('seo')
	<title>{!!  strip_tags($article->translated->meta_title) !!}</title>
	<meta itemprop="title" property="og:title" content="{{ strip_tags($article->translated->meta_title)  }}"/>
	<meta itemprop="description" name="description" content="{{ strip_tags($article->translated->meta_description) }}" />
	<meta property="og:description" content="{{ strip_tags($article->translated->meta_description) }}"/>
	@if(Session::get('applocale') == 'de')
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/blog/{{ $hreflang_de }}"/>
	@else
		<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/blog/{{ $hreflang_en }}"/>
	@endif
	<link rel="alternate" href="{{ config('app.url') }}/en/blog/{{ $hreflang_en }}" hreflang="en" />
	<link rel="alternate" href="{{ config('app.url') }}/de/blog/{{ $hreflang_de }}" hreflang="de" />
	<link rel="alternate" href="{{ config('app.url') }}/en/blog/{{ $hreflang_en }}" hreflang="x-default" />
	<meta itemprop="image" property="og:image" content="{{ asset('news_images') }}/{{ $article->main_image->all_translations[0]->content }}"/>
	<meta property="og:type" content="website">

	@if(app()->currentLocale() == 'en')
		<script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Article",
              "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://graduate.me/en/blog/{{$article->translated->slug}}"
              },
              "headline": "{{$article->translated->title}}",
              "description": "{{$article->translated->description}}",
              "image": "https://graduate.me/public/images/{{$article->translated->slug}}.webp",  
              "author": {
                "@type": "Organization",
                "name": "ONSITES Graduate School"
              },  
              "publisher": {
                "@type": "Organization",
                "name": "ONSITES Graduate School",
                "logo": {
                  "@type": "ImageObject",
                  "url": ""
                }
              },
              "datePublished": "{{ $article->created_at }}",
              "dateModified": "{{ $article->created_at }}}"
            }
        </script>
	@else
		<script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Article",
              "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "https://graduate.me/de/blog/{{$article->translated->slug}}"
              },
              "headline": "{{$article->translated->title}}",
              "description": "{{$article->translated->description}}",
              "image": "https://graduate.me/public/images/{{$article->translated->slug}}.webp",  
              "author": {
                "@type": "Organization",
                "name": "ONSITES Graduate School"
              },  
              "publisher": {
                "@type": "Organization",
                "name": "ONSITES Graduate School",
                "logo": {
                  "@type": "ImageObject",
                  "url": ""
                }
              },
              "datePublished": "{{ $article->created_at }}",
              "dateModified": "{{ $article->created_at }}}"
            }
        </script>
	@endif

@endsection


@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ config('app.url') }}/en/blog/{{ $hreflang_en }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ config('app.url') }}/de/blog/{{ $hreflang_de }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection


@section('headCSS')
	<style type="text/css">
	blockquote p {
		font-size: 1.25rem;
		color: #6c757d;
		font-family: "Open Sans", "Segoe UI", "Roboto", "Helvetica Neue", "Arial", "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
		font-style: italic;
		line-height: 1.6;
		margin: 1.875rem auto;
		background: #F3FAFF;
		position: relative;
		width: 100%;
	}

	blockquote p:before {
		font-size: 5rem;
		color: #025297;
		content: "“";
   		transform:rotate(180deg);
   		font-family: Georgia;
		position: absolute;
		top:-100px;
		right:10px;
	}
	.news-image{
		width: 100%;
	}
	.news-body{
		padding:20px;
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
		min-height: 220px;
		font-size:14px;
		line-height:1.6;
	}
	.article-date{
		font-size:13px;
		color: #EE6123;
	}
	.latest-news-container{
		width:80%;
		margin:0 auto;
	}
	.article_heading{
		font-size: 2.2rem;
		margin:20px 0;
	}
	.news-box-wrapper{
		margin:20px 0;
	}
	.news-box{
		background-color:#EEEEEE;
		padding:50px;
		margin-top:-15px;
		margin-left:10px;
		border-radius:2px;
	}
	.news-box-header{
		background-color:#025297;
		color:#ffffff;
		padding:20px;
		margin-right: 10px;
		border-radius:2px;
	}
	.blockquote-wrapper{
		background: #F3FAFF;
		padding:10px 20px;
	}
	#toc_wrapper{
		position:fixed; 
		top:120px;
		left:30px;
		width:18%;
		color:white;
		z-index: 12;
	}
	#toc_wrapper_heading{
		background-color: #E16221;
		color:white;
		padding:10px;
		margin-left:-10px;
		margin-top:-10px;
		border-radius: 2px;
	}
	#toc{
		background-color: #126BB7;
		margin-right:-10px;
		border-radius: 2px;
		padding:20px 10px;
	}
	#toc a{
		color:rgb(229, 219, 219);
		display: block;
	}
	#social-icons i{
		font-size:33px;
	}
	@media(max-width:991px){

		#toc_wrapper{
			width:100%;
			position: static;
		}

	}
	@media(max-width: 575px) {
		.author-image {
			width: 50%!important;
		}
		.author-image-container {
			text-align: center;
		}
		.author-description-container {
			text-align: center;
		}
	}
	[data-tag="<h1"] {
		font-weight: bold;
		font-size: 18px!important;
	}

	[data-tag="<h2"] {
		font-weight: bold;
		font-size: 16px!important;
	}

	[data-tag="<h3"] {
		font-size: 14px!important;
	}

	[data-tag="<h4"] {
		font-size: 12px!important;
	}

	[data-tag="<h5"] {
		font-size: 12px!important;
	}

	[data-tag="<h6"] {
		font-size: 12px!important;
	}

	[data-tag="<h1>"] {
		font-weight: bold;
		font-size: 18px!important;
	}

	[data-tag="<h2>"] {
		font-weight: bold;
		font-size: 16px!important;
	}

	[data-tag="<h3>"] {
		font-size: 14px!important;
	}

	[data-tag="<h4>"] {
		font-size: 12px!important;
	}

	[data-tag="<h5>"] {
		font-size: 12px!important;
	}

	[data-tag="<h6>"] {
		font-size: 12px!important;
	}
	.key-facts{
			position: relative;
			padding:20px;
			margin-top:20px;
		}
			.top, .bottom {
				position: absolute;
				width: 280px;
				height: 90px;
				pointer-events: none;
				color:#E16221;
			}
			.top {
				top: 0;
				border-top: 2px solid;
			}
			.bottom {
				bottom: 0;
				border-bottom: 2px solid;
				border-color:#E16221;
				right:0;
			}
			.left {
				left: 0;
				border-left: 2px solid;
			}
			.right {
				right: 0;
				border-right: 2px solid;
				border-color:#E16221;
			}
	</style>
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(strip_tags($article->translated->meta_title), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-6 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-1">
		<li class="breadcrumb-item"><a href="{{ route('welcome-'.app()->currentLocale()) }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('blog-'.app()->currentLocale()) }}">Blog</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<div class="container-fluid">
	<div itemscope itemtype="https://schema.org/Article" class="row p-2">
		<div class="col-lg-3">
			<div id="toc_wrapper" >
				<p id="toc_wrapper_heading" class="mb-0" style="font-size: 1.75rem;">{{ trans('single-blog.table-of-content') }}</p>
				<div id="toc"></div>
				<div style="margin-top:20px;" id="social-icons" class="d-flex justify-content-around">
					<a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}&display=popup" rel="nofollow"><i  widthh="17.02px" height="35px" href="" target="_blank" class="text-primary fab fa-facebook-f"></i></a>
					<a href="https://www.linkedin.com/sharing/share-offsite/?u={{Request::url()}}" rel="nofollow"><i widthh="28.88px" height="35px" href="" target="_blank" class="text-primary fab fa-linkedin"></i></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<img itemprop="image" rel="preload" fetchpriority="high" decoding="async" 
				src="{{ asset('news_images') }}/{{ $article->main_image->all_translations[0]->content }}" 
				class="w-100" 
				alt="{{ $article->main_image->attributes ? $article->main_image->attributes->alt() : '' }}"
				title="{{ $article->main_image->attributes ? $article->main_image->attributes->title() : '' }}"
			/>

			@foreach($article->sections as $key =>  $section)
				<div itemprop="articleBody" itemscope itemtype="https://schema.org/Text" style="margin-top:20px;" class="page-content">
					@if($key == 0)
					<h1 itemprop="headline" class="h1">{!! $section->translated->content !!}</h1>
					<span class="font-weight-bold">{{ $article->author->translated->name }}</span> <br/>
					<span>{{ $article->author->translated->occupation }}</span> <br/>
					<p class="font-weight-bold"><i class="fas fa-clock"></i> {{ $article->minutes }} min.</p>
					@if($article->translated->key_facts)
						<div class="key-facts">
							<div class="top left"></div>
							<div class="bottom right"></div>
							<h5 style="color:#E16221;">{{ request()->segment(1) == 'de' ? 'Key-Facts' : 'Key Facts' }}</h5>
							111111{!!  $article->translated->key_facts !!}
						</div>
					@endif
					@elseif($key==1)
					<p>{!! $section->translated->content !!}</p>
					@elseif($section->type == 1)
						<div id="section_{{$section->id}}">{!! $section->translated->content !!}</div>
					@elseif($section->type == 2 && $section->id != $article->main_image->id)
						<img 
							src="{{ asset('news_images') }}/{{ $section->image_src->content }}" 
							class="w-100" 
							alt="{{ $section->attributes ? $section->attributes->alt() : '' }}"
							title="{{ $section->attributes ? $section->attributes->title() : '' }}"
						/>
					@elseif($section->type == 3)
						<div class="blockquote-wrapper">
							<blockquote>
								<p>{{ $section->translated->content }}</p>
							</blockquote>
							<h5 class="text-right">{{ $section->details[0]->translated->content }}</h5>
						</div>
					@elseif($section->type == 4)
						<div class="news-box-wrapper">
							<h4 class="news-box-header">{{ $section->translated->content }}</h4>
							<div class="d-flex justify-content-between">
								@foreach( $section->details as $box )
									<div class="col news-box">{{ $box->translated->content }}</div>
								@endforeach
							</div>
							
						</div>
					@endif
				</div>
				
			@endforeach
			<p class="font-weight-bold"><i class="fas fa-calendar-alt"></i>
                <?php echo date("d.m.Y", strtotime($article->created_at))?>
            </p>
			<div itemprop="author" itemscope itemtype="https://schema.org/Person" class="row">
				<div class="col-lg-12">
					<hr/>
				</div>
				<div class="col-sm-2 author-image-container">
					{{-- <x-image-component itemprop="image" nickname="author-{{ $article->author_id }}" class="imprint-images main-pictures-pages" loading="eager"/> --}}
				</div>
				<div class="col-sm-10 author-description-container">
					<form action="{{ route('blog-'.app()->currentLocale()) }}">
							<input type="hidden" name="author" value="{{ $article->author->translated->slug}}">
							<button class="btn btn-link text-left">
							<span itemprop="name" itemscope itemtype="https://schema.org/Person">
								<span class="font-weight-bold">{{ $article->author->translated->name }}</span> <br/>
								<span>{{ $article->author->translated->occupation }}</span> <br/>
								{{ $article->author->total_articles() }} {{ trans('single-blog.articles') }}
							</button>
					</form>
					
				</div>
				<div class="col-lg-12">
					<hr/>
				</div>
				<div class="col-lg-12" style="background:#EEEEEE;padding:20px;margin:20px 0;">

					<div itemprop="description" class="page-content">{{ $article->author->translated->description }}</div>
					
				</div>
				<div class="col-lg-12 d-flex justify-content-between" style="margin-top:40px">
					@if($prev) <a style="text-decoration:none" href="{{route('single-article-'.app()->currentLocale(), $prev->translated->slug)}}"><h3 style="color: #EA580D;"> &#8592; {{ trans('single-blog.previous') }} </h3> </a> @endif
					@if($next) <a style="text-decoration:none" href="{{route('single-article-'.app()->currentLocale(), $next->translated->slug)}}"><h3 style="color: #EA580D;"> {{ trans('single-blog.next') }}  &#8594;    </h3> </a> @endif
				</div>
			</div>
		</div>
		
	</div>
	
</div>
<div class="row">
	<div class="col-lg-3"></div>
	<div id="latest_news" class="col-lg-6 centered">
		<h2 class="text-center article_heading pt-5">{!! trans('single-blog.all-news-heading') !!}</h2>
		<div id="blog" class="row m-0">
			@foreach($last_three_articles as $news)
			<div class="col-lg-4 news_wrapper">
					<div class="news_container h-100 shadow">
					  	<img class="news-image w-100" src="{{ asset('news_images') }}/{{ $news->main_image->all_translations[0]->content }}" />
					  	<div class="news-body">
						    <h2 class="news-heading mt-2 text-center font-weight-bold h6">{{ $news->sections[0]->translated->content }}</h2>
							<div class="minutes text-right">
									<p class="font-weight-bold"><i class="fas fa-clock"></i> {{ $news->minutes }} min.</p>
								</div>
							<div class="d-flex justify-content-between">
								<div class="category">
									<a href="{{ route('single-article-'.app()->currentLocale(),$news->category->translated->slug) }}" class="btn p-0 m-0 btn-link text-left text-dark font-weight-bold">
										{{ $news->category->translated->name }}
									</a>
								</div>
								
							</div>
							<div>
								<div>
									<form action="{{ route('blog-'.app()->currentLocale()) }}">
									<input type="hidden" name="author" value="{{ $news->author->translated->slug}}">
										<button class="btn p-0 btn-link text-left text-dark font-weight-bold">
											{{ $news->author->translated->name }} <br/>
											{{ $news->author->translated->occupation }} <br/>
										</button>
									</form>
								</div>
								<div class="text-center mt-auto">
									<hr/>
									<a href="{{ route('single-article-'.app()->currentLocale(),$news->translated->slug) }}" class="btn read-more">{{ trans('welcome.read-more') }}</a>
								</div>  
							</div> 
						</div> 
					</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="col-lg-3"></div>
	<div class="text-center my-5 col-lg-12">
		<a class="btn w-auto orange-button" href="{{route('blog-'.app()->currentLocale())}}">{{trans('single-blog.all-news-button')}}</a>
	</div>
</div>
@endsection

@section('footerScripts')
<script>
	$(document).ready(function(){
        let html = '';
        let index = 1;
        $('.contents').each(function(){
            $(this).attr('id','section_'+index);
            let heading = $(this).html();
            let mod_heading = heading.replace('<strong>', '');
            let final_heading = mod_heading.replace('</strong>', '');
            let get_tag = final_heading.substring(0,5).trim();
            let no_tags_display_heading = $(final_heading).text();
            if (get_tag == '<h1' || get_tag == '<h1>') {
                html += `<a href="#section_${index}" data-tag="${get_tag}">${no_tags_display_heading}</a>`;
            }
            if (get_tag == '<h2' || get_tag == '<h2>') {
                html += `<a href="#section_${index}" data-tag="${get_tag}">${no_tags_display_heading}</a>`;
            }
            if (get_tag == '<h3' || get_tag == '<h3>') {
                html += `<a href="#section_${index}" data-tag="${get_tag}">${no_tags_display_heading}</a>`;
            }
            if (get_tag == '<h4' || get_tag == '<h4>') {
                html += `<a href="#section_${index}" data-tag="${get_tag}">${no_tags_display_heading}</a>`;
            }
            if (get_tag == '<h5' || get_tag == '<h5>') {
                html += `<a href="#section_${index}" data-tag="${get_tag}"><i class="fas fa-angle-right ml-1"></i>${no_tags_display_heading}</a>`;
            }
            if (get_tag == '<h6' || get_tag == '<h6>') {
                html += `<a href="#section_${index}" data-tag="${get_tag}"><i class="fas fa-angle-double-right ml-2"></i>${no_tags_display_heading}</a>`;
            }
            index++;
        });
        $('#toc').append(html); 
    });

	$(window).on('scroll',function(){
		let element = document.getElementById('section_1');
		if(isScrolledIntoView(element)){
			$('a[href=element.href]').css('display', 'none');
		}
	})

	function authorImage() {
        if ($(window).width() < 575) {
            $('.author-image').removeClass('w-100');
        }
        else {
            $('.author-image').addClass('w-100');
        }
    };
    authorImage();
    $(window).resize(function() {
        authorImage();
    });

	function isScrolledIntoView(elem)
	{
		console.log(elem)
		var docViewTop = $(window).scrollTop();
		var docViewBottom = docViewTop + $(window).height();

		var elemTop = $(elem).offset().top;
		var elemBottom = elemTop + $(elem).height();

		return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
</script>

@endsection