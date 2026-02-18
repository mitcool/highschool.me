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
		
		<!-- On desktop screen -->
		<div class="menuButton col-lg-10 col-md-10 col-8 position-relative">
			@auth
				{{-- Mobile notifications --}}
			    <a id="mobileHeaderNotif"
			    @if(auth()->user()->role_id == 1)
					href="{{ route('admin.notifications') }}"
				@elseif(auth()->user()->role_id == 2)
					href="{{ route('parent.notifications') }}"
				@elseif(auth()->user()->role_id == 3)
					href=""
				@elseif(auth()->user()->role_id == 4)
					href="{{ route('student.notifications') }}"
				@elseif(auth()->user()->role_id == 5)
					href="{{ route('educator.notifications') }}"
				@endif 
			    >
			        <i class="fas fa-user-circle"></i>
			            <span id="notifBadgeMobile" style="display:none;">
			                {{ $unreadNotificationsCount > 99 ? '99+' : $unreadNotificationsCount }}
			            </span>
			    </a>
		    @endauth
			<x-nav-mobile/>
		</div>

		<div class="twoButtons col-lg-3 col-md-3 justify-content-end align-items-center" style="padding-right:40px">
			@auth
				{{-- Notifications --}}
			    <a 
			    @if(auth()->user()->role_id == 1)
					href="{{ route('admin.notifications') }}"
				@elseif(auth()->user()->role_id == 2)
					href="{{ route('parent.notifications') }}"
				@elseif(auth()->user()->role_id == 3)
					href=""
				@elseif(auth()->user()->role_id == 4)
					href="{{ route('student.notifications') }}"
				@elseif(auth()->user()->role_id == 5)
					href="{{ route('educator.notifications') }}"
				@endif 
			    class="notif-btn" title="Notifications">
			        <i class="fas fa-user-circle" style="font-size: 22px;"></i>
			            <span class="notif-badge" id="notifBadge" style="display:none;">
			                {{ $unreadNotificationsCount > 99 ? '99+' : $unreadNotificationsCount }}
			            </span>
			    </a>
		    @endauth
			@auth
				@if(auth()->user()->role_id == 1)
					<a class="btn mx-2 orange-button" href="{{ route('admin-dashboard') }}">DASHBOARD</a>
				@elseif(auth()->user()->role_id == 2)
					<a class="btn mx-2 orange-button" href="{{ route('parent.dashboard') }}">DASHBOARD</a>
				@elseif(auth()->user()->role_id == 3)
					<a class="btn mx-2 orange-button" href="{{ route('partner.dashboard') }}">DASHBOARD</a>
				@elseif(auth()->user()->role_id == 4)
					<a class="btn mx-2 orange-button" href="{{ route('student.dashboard') }}">DASHBOARD</a>
				@elseif(auth()->user()->role_id == 5)
					<a class="btn mx-2 orange-button" href="{{ route('educator.dashboard') }}">DASHBOARD</a>
				@endif
				
			@else
				<a class="btn mx-1 orange-button" href="{{route('register')}}">REGISTER</a>
				<a class="btn mx-1 orange-button" href="{{route('login')}}">LOGIN</a>
			@endauth
			<a class="btn mx-1 contact_btn_header" style="background: #025297;color:white;" href="{{ route('student-advisory-service') }}">CONTACT</a>	
		
				
		</div>
	</div>
</header>

<script>
	function loadUnreadCount() {
        $.ajax({
            url: "{{ route('get-unread-count') }}",
            type: "GET",
            success: function (res) {
                console.log(res);
                if (res.count > 0) {
                    $("#notifBadge").text(res.count).show();
                    $("#notifBadgeMobile").text(res.count).show();
                } else {
                    $("#notifBadge").hide();
                    $("#notifBadgeMobile").hide();
                }
            }
        });
    }

    loadUnreadCount();
    setInterval(loadUnreadCount, 5000);
</script>