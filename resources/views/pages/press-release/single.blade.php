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


@section('headCSS')
	<link rel="stylesheet" href="{{ asset('css/main/news.css') }}">
@endsection

@section('content')
@php
    $breadcrumb_title = strtok(strip_tags($article->translated->meta_title), '|');
@endphp


<div aria-label="breadcrumb" class="col-md-6 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-1">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
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
					<p class="font-weight-bold"><i class="fas fa-calendar-alt"></i>
		            	{{ request()->segment(1) == 'de' ? 'Veröffentlicht am' : 'Published on' }} <?php echo date("d.m.Y", strtotime($article->created_at))?>            	
						@if($article->updated_at)
						    {{ request()->segment(1) == 'de' ? 'Aktualisiert am' : 'Updated on' }} 
							<?php echo date("d.m.Y", strtotime($article->updated_at))?>
						@endif
		            </p>
					@if($article->translated->key_facts)
						<div class="key-facts">
							<div class="top left"></div>
							<div class="bottom right"></div>
							<h5 style="color:#E16221;">{{ request()->segment(1) == 'de' ? 'Key-Facts' : 'Key Facts' }}</h5>
							{!!  $article->translated->key_facts !!}
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
			<table class="table">
				<tr>
					<th>Medium</th>
					<th>Date</th>
					<th class="text-center">Title</th>
				</tr>
				@foreach($article->citations  as $citation )
				<tr>
					<td>{{ $citation->media_name }}</td>
					<td>{{ $citation->date->format('d.m.Y') }}</td>
					<td class="text-center">
						<a href="{{ asset('images/pdf') }}/{{ $citation->pdf_file }}" download=""><i style="font-size: 1.3rem;" class="fas fa-file-pdf"></i></a>
					</td>
				</tr>
			    @endforeach
			</table>
			
		</div>
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