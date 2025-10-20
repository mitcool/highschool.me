<header class="navigation container-fluid shadow p-2 bg-white">
	<div class="row">
		@if(Session::has('success_message'))
			<div class="modal fade" id="message_modal">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="d-flex w-100 justify-content-between align-items-center">
							<div></div>
							{!! Session::get('success_message') !!}
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 50px; color:black; margin-bottom: 15px;">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
				</div>
			</div> 
		@endif

		<div class="col-lg-2 col-md-2 col-4" style="padding-left:40px;">
			<a href="{{ route('welcome') }}">
				<x-image-component rel="preload" fetchpriority="high" decoding="async" nickname="logo-header" class="logo-header-images logoMainPage" />
			</a>

		</div>

		 <!-- On mobile screen menuDesktop-->
		<div class="menuDesktop col-lg-7 col-md-9 col-8 flex-column" style="align-items: center;">
			<x-nav/>
		</div>
		
		{{-- <!-- On desktop screen -->
		<div class="menuButton col-lg-10 col-md-10 col-8">
			<x-nav-mobile/>
		</div> --}}

		<div class="twoButtons col-lg-3 col-md-3 justify-content-end align-items-center" style="padding-right:40px">
			<a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{ route('student-advisory-service') }}">CONTACT</a>	
			{{-- @if(!Auth::user())
				<a class="btn mx-2 contact_btn_header" style="background: #025297;color:white;" href="{{ route('study-registration-'.app()->currentLocale()) }}">{{trans('nav.study-registration')}}</a>
			@else
				<a class="btn mx-2 contact_btn_header" style="background: #025297;color:white;" href="{{route('admin-dashboard')}}">DASHBOARD</a>
			@endif
				
			@yield('language-switcher')   --}}
		</div>
	</div>
</header>