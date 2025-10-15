<x-head/>
		
	<body itemscope itemtype="http://schema.org/WebPage">

		<x-header/>

	@yield('content')

	<x-footer/>

	<x-modals/>
		
	<input id="hf" type="hidden" data-accept-cookies="{{Cookie::get('accept_cookies')}}" data-lang="{{Cookie::get('lang_conversion')}}" data-youtube="{{Cookie::get('youtube')}}" data-landbot="{{Cookie::get('landbot')}}" data-maps="{{Cookie::get('google_maps')}}" data-ads="{{Cookie::get('google_ads')}}" data-facebook="{{Cookie::get('facebook')}}" data-analytics="{{Cookie::get('google_analytics')}}">	
	
	<script type="text/javascript" src="{{asset('js/main/main.min.js')}}"></script>
	
	@yield('footerScripts')
	
	<script>
		$('#program-page-link-mobile,#program-page-link').on('click', function(){
			let lang = location.pathname.split('/')[1];
			let redirect = lang == 'en' ? '/en/online-degrees' : '/de/online-studiengaenge';
			window.location = redirect;
		})
		
		$('#message_modal').modal('show');

		$('#program-page-link-wrapper').on('mouseover',function(){
			$('.program-dropdown-menu').removeClass('d-none')
		})
		$('#program-page-link-wrapper').on('mouseleave',function(){
			$('.program-dropdown-menu').addClass('d-none')
		})
	</script>
	</body>
</html>