@extends('template')
@section('seo')
<title>{{ trans('academics.meta-title') }}</title>
<meta itemprop="description" name="description" content="{{ trans('academics.meta-description') }}" />

<meta itemprop="name" property="og:title" content="{{ trans('academics.meta-title') }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/dozenten"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/lecturers"/>
@endif
<meta property="og:description" content="{{ trans('academics.meta-description') }}"/>
<x-meta-image itemprop="image" nickname="academics-cover"/>

<link rel="alternate" href="{{ config('app.url') }}/en/lecturers" hreflang="en" />
<link rel="alternate" href="{{ config('app.url') }}/de/dozenten" hreflang="de" />
<link rel="alternate" href="{{ config('app.url') }}/en/lecturers" hreflang="x-default" />

@endsection

@section('headCSS')

<style type="text/css">
	.academic-box{
		opacity:0.8;
		position:relative!important;
	}
	.academic-info{
		z-index:-1;
		display: none;
		background:#E5F3FF;
	}
	
	.active-box{
		border:8px solid #035397;
		
	}
	.active-box::after{
		
		content:"";
		position: absolute;
		bottom:-30px;
		z-index:1000;
		left:43%;
		display: inline-block;
		width:30px;
		height: 30px;
		border-bottom:8px solid #035397;
		border-right:8px solid #035397;
		transform:rotate(45deg);
	}

	@media (max-width: 768px) {
		.active-box::after{
			display:none !important;
		}
	}
	
	
</style>
@endsection
@section('content')
@php
    $breadcrumb_title = strtok(trans('academics.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component  id="cover" class="main-pictures-pages" nickname="academics-cover" loading="eager" />
<div class="container-fluid main_page_container" style="background:#F3F3F3;">	
	<div class="row justify-content-center">
		<div class="col-md-12 col-lg-10" style="padding:30px;">
			<h1 class="page-headings">{{ trans('academics.heading') }}</h1>
			<div class="page-content">{!! trans('academics.content') !!}</div>
			<div class="row">
				@foreach($academics as $key => $academic)	
					<div class="col-md-6 gap-2 my-2 px-3 w-100 "  data-id="{{$academic->id}}" data-key="{{ $key }}" data-name="{{$academic->name }}"data-description="{{ $academic->description }}">
						<div style="border:1px solid lightgrey;position:relative;cursor:pointer;background:white;">
							<div class="row p-2 my-3">
							<div class="col-md-5">
								<x-image-component nickname="academic-{{$academic->id}}" class="w-100" style="display:block;" id="test"/>
							</div>
							<div class="col-md-7">
								<h5 class="name mt-3" style="color:#035397;font-weight-bold;">{{ $academic->name }}</h5>
								<p class="description">{{ $academic->description }}</p>
							</div>		
						</div>		
						</div>
															
					</div>
					
				@endforeach
			</div>		
		</div>	
	</div>
</div>
@endsection

@section('footerScripts')

<script>

	$(document).ready(function(){
		$('.academic-box').on('click',function(){
			if($(window).width() >= 768){
				$(this).css('opacity',1);
				let key = ($(this).attr('data-key'));
				let index = Math.floor(key/4);

				if($('.academic-box').hasClass('active-box')){
					if(!$(this).hasClass('active-box')){
						$('.academic-box').removeClass('active-box');
						$('.academic-box').css('opacity',0.8);
						$(this).addClass('active-box');
						$('.academic-info').css('display','none');
						document.getElementsByClassName('academic-info')[index].style.display = 'block';
						let name = $(this).attr('data-name');
						let description = $(this).attr('data-description');
						let html = `<h2 class="name mt-3">${name}</h2><p class="description">${description}</p>`
						$(this).parents().find('.academic-info').html(html);
					}else {
						document.getElementsByClassName('academic-info')[index].style.display = 'none';						
						$('.academic-box').removeClass('active-box');
					}
				}
				else{
					$('.academic-box').removeClass('active-box');
					$('.academic-box').css('opacity',0.8);
					$(this).addClass('active-box');
					$('.academic-info').css('display','none');
					document.getElementsByClassName('academic-info')[index].style.display = 'block';
					let name = $(this).attr('data-name');
					let description = $(this).attr('data-description');
					let html = `<h2 class="name mt-3">${name}</h2><p class="description">${description}</p>`
					$(this).parents().find('.academic-info').html(html);
				}
			}
			else{
				$(this).css('opacity',1);
				let key = ($(this).attr('data-key'));

				if($('.academic-box').hasClass('active-box')){
					if(!$(this).hasClass('active-box')){
						$('.academic-box').removeClass('active-box');
						$('.academic-box').css('opacity',0.8);
						$(this).addClass('active-box');					
						$('.academic-info-mobile').css('display','none');
						$(this).find('.academic-info-mobile').css('display','block');
						let name = $(this).attr('data-name');
						let description = $(this).attr('data-description');
						let html = `<h2 class="name mt-3">${name}</h2><p class="description">${description}</p>`
						$(this).parents().find('.academic-info-mobile').html(html);
					}
					else{
						$(this).find('.academic-info-mobile').css('display','none');
						$('.academic-box').removeClass('active-box');
					}
				}
				else{
					$('.academic-box').removeClass('active-box');
					$('.academic-box').css('opacity',0.8);
					$(this).addClass('active-box');					
					$('.academic-info-mobile').css('display','none');
					$(this).find('.academic-info-mobile').css('display','block');
					let name = $(this).attr('data-name');
					let description = $(this).attr('data-description');
					let html = `<h2 class="name mt-3">${name}</h2><p class="description">${description}</p>`
					$(this).parents().find('.academic-info-mobile').html(html);	
				}			
			}	
		})
	})
</script>
@endsection