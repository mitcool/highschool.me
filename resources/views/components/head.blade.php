<!DOCTYPE html>
<html lang="{{session()->get('applocale') ?? 'de'}}">
	<head>

		@yield('seo')

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="text/html; charset=utf-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		

		{{-- Custom Style --}}
		@yield('headCSS')
			<link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,200&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&family=Roboto:wght@300&display=swap" rel="stylesheet">
		<link rel="canonical" href="{{ url(Request::fullUrl()) }}"/>
		
		
		<link rel="shortcut icon preload" href="{{ asset('/images/logo.png') }}">
		<link rel="stylesheet preload" type="text/css" href="{{asset('/css/main/style.css')}}">
		
				<!-- JQUERY -->
		<script type="text/javascript" src="{{asset('/assets/jquery-3.3.1.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<!-- BOOTSTRAP -->
		<link rel="stylesheet preload" type="text/css" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
		<script type="text/javascript" src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
		{{-- <script src='https://www.google.com/recaptcha/api.js'></script> --}}
		<!-- Font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		@yield('headScripts')
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-2JV3FDFMX4"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-2JV3FDFMX4');
		</script>
		<script src='https://www.google.com/recaptcha/api.js' async></script>
		<meta property="og:site_name" content="graduate.me">
		<meta property="og:image" content="{{ asset('images/onsites-graduate-school-logo.png') }}">

		<!-- Mobile image preload -->
		<link fetchpriority="high" rel="preload" href="{{ asset('images/main-image-mobile.webp') }}" as="image" type="image/webp">

		<!-- For the sticky menu -->
		<style>
			.navbar-fixed {
				top: 0!important;
		    	z-index: 100!important;
		  		position: fixed!important;
			}
		</style>
		<script>
			$(document).ready(function() {
				$(window).scroll(function () {
			    if ($(window).scrollTop() > 98) {
			      $('.navigation').addClass('navbar-fixed');
			    }
			    if ($(window).scrollTop() < 99) {
			      $('.navigation').removeClass('navbar-fixed');
			    }
			  });
			});
		</script>
	</head>