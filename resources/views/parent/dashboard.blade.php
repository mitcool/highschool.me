<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/fontawesome-free-5.5.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>


    

    @yield('css')
    <style>
        :root {
            --parent-sidebar-bg: #4E28B9;
            --parent-sidebar-item-bg: #4E28B9;
            --parent-sidebar-heading-bg: #26088D;
        }
        .modal-content {
            border-radius: 30px !important;
            border: 5px solid #025297 !important;
        }
        .error-msg {
            border-radius: 30px !important;
            border: 5px solid rgb(141, 37, 37) !important;
        }
        .sidebar {
            background-color: var(--parent-sidebar-item-bg)!important;
        }
        .sidebar-heading {
            background-color: var(--parent-sidebar-heading-bg)!important;
        }
        .navbar-nav nav-item {
            background-color: var(--parent-sidebar-item-bg)!important;
        }
        .sidebar-divider {
            background-color: var(--parent-sidebar-item-bg)!important;
        }
        #footer{
            margin-top:0;
        }
        .nav-item a {
            width: 100%!important;
        }
        .parent-dashboard-row {
            margin-left: 0;
            margin-right: 0;
        }
        .parent-page-content {
            width: 100%;
        }
        .parent-mobile-panel {
            display: none;
            background: var(--parent-sidebar-item-bg);
            color: #fff;
        }
        .parent-mobile-panel-toggle {
            width: 100%;
            background: var(--parent-sidebar-item-bg);
            border: 0;
            color: inherit;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            font-size: 14px;
            font-weight: 700;
            text-align: left;
        }
        .parent-mobile-panel-toggle:focus {
            outline: none;
        }
        .parent-mobile-panel-icon {
            font-size: 26px;
            line-height: 1;
            font-weight: 400;
        }
        .parent-mobile-menu {
            background: var(--parent-sidebar-bg);
        }
        .parent-mobile-menu-section {
            padding: 12px 12px 6px;
            background: var(--parent-sidebar-heading-bg);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .parent-mobile-menu-link,
        .parent-mobile-menu-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            color: #fff;
            background: var(--parent-sidebar-item-bg);
            border: 0;
            border-top: 1px solid rgba(255,255,255,0.12);
            text-decoration: none !important;
            font-size: 14px;
        }
        .parent-mobile-menu-link:hover,
        .parent-mobile-menu-button:hover,
        .parent-mobile-menu-link:focus,
        .parent-mobile-menu-button:focus {
            color: #fff;
            background: var(--parent-sidebar-heading-bg);
            outline: none;
        }
        .parent-mobile-menu-button {
            text-align: left;
        }
        .parent-mobile-menu-link i,
        .parent-mobile-menu-button i {
            width: 18px;
            text-align: center;
        }
        body.parent-mobile-nav-active .parent-desktop-sidebar {
            display: none !important;
        }
        body.parent-mobile-nav-active .parent-mobile-panel {
            display: block !important;
        }
        body.parent-desktop-nav-active .parent-mobile-panel {
            display: none !important;
        }
        body.parent-desktop-nav-active .parent-desktop-sidebar {
            display: block !important;
        }
        @media (min-width: 1461px) {
            .parent-dashboard-row {
                display: flex;
                flex-wrap: nowrap;
                align-items: flex-start;
            }
            .parent-desktop-sidebar {
                flex: 0 0 240px;
                max-width: 300px;
            }
            .parent-page-content {
                flex: 1 1 auto;
                min-width: 0;
                width: auto;
                padding-left: 24px;
            }
        }
        @media (max-width: 1460px) {
            .parent-mobile-panel {
                display: block !important;
            }
            .parent-desktop-sidebar {
                display: none !important;
            }
            .navigation .row {
                align-items: center;
            }
            .navigation .menuDesktop,
            .navigation .twoButtons {
                display: none !important;
            }
            .navigation .menuButton {
                display: flex !important;
                align-items: center;
                justify-content: flex-end;
                min-height: 64px;
            }
            .navigation .logoMainPage {
                width: 100% !important;
                max-width: 185px;
            }
        }
        @media (min-width: 992px) and (max-width: 1460px) {
            .navigation #menuToggle {
                top: 50%;
                right: 24px;
                transform: translateY(-50%);
            }
            .navigation #mobileHeaderNotif {
                top: 50%;
                right: 86px;
                transform: translateY(-50%);
            }
        }
        @media (max-width: 600px) {
            .parent-page-content {
                padding-left: 12px;
                padding-right: 12px;
            }
        }
    </style>

</head>

<body id="page-top">
    <x-header/>
    <div class="container-fluid px-0">
        <div class="parent-mobile-panel d-lg-none">
            <button
                type="button"
                class="parent-mobile-panel-toggle collapsed"
                data-toggle="collapse"
                data-target="#parentMobileMenu"
                aria-expanded="false"
                aria-controls="parentMobileMenu"
            >
                <span>Panel</span>
                <span class="parent-mobile-panel-icon" aria-hidden="true">+</span>
            </button>
            <div class="collapse parent-mobile-menu" id="parentMobileMenu">
                <a class="parent-mobile-menu-link" href="{{ route('parent.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>

                <div class="parent-mobile-menu-section">Meetings</div>
                <a class="parent-mobile-menu-link" href="{{ route('parent.meetings') }}">
                    <i class="fas fa-users"></i>
                    <span>Meetings</span>
                </a>

                <div class="parent-mobile-menu-section">Child Information</div>
                <a class="parent-mobile-menu-link" href="{{ route('parent.create.student') }}">
                    <i class="fas fa-user-edit"></i>
                    <span>Add Child</span>
                </a>
                @if(auth()->user()->students)
                    @foreach (auth()->user()->students as $student)
                        <a class="parent-mobile-menu-link" href="{{ route('parent.student.profile', $student->student->id) }}">
                            <i class="fas fa-user-tie"></i>
                            <span>{{ $student->student->name }} {{ $student->student->surname }}</span>
                        </a>
                    @endforeach
                @endif
                <a class="parent-mobile-menu-link" href="{{ route('parent.request-leave') }}">
                    <i class="fas fa-scroll"></i>
                    <span>Request Leave</span>
                </a>
                <a class="parent-mobile-menu-link" href="{{ route('parent.protocols.index') }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Protocols</span>
                </a>

                <div class="parent-mobile-menu-section">Payments and invoices</div>
                <a class="parent-mobile-menu-link" href="{{ route('parent.invoices') }}">
                    <i class="fas fa-file-invoice"></i>
                    <span>Payments and invoices</span>
                </a>
                 <a class="parent-mobile-menu-link" href="{{ route('parent.plans') }}">
                    <i class="fas fa-file-invoice"></i>
                    <span>Plans</span>
                </a>
                <div class="parent-mobile-menu-section">Help Desk</div>
                <a class="parent-mobile-menu-link" href="{{ route('help-desk') }}">
                    <i class="fas fa-envelope"></i>
                    <span>Help Desk</span>
                </a>

                <div class="parent-mobile-menu-section">Profile</div>
                <a class="parent-mobile-menu-link" href="{{ route('parent.profile') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Profile</span>
                </a>
                <a class="parent-mobile-menu-link" href="{{ route('parent.reset.password.page') }}">
                    <i class="fas fa-key"></i>
                    <span>Change Password</span>
                </a>
                <form action="{{ route('logout') }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="parent-mobile-menu-button">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="row parent-dashboard-row">
                <div id="wrapper" class="parent-desktop-sidebar" style="padding:0 0px;">
                    <ul class="navbar-nav pl-0 sidebar sidebar-dark accordion parent-desktop-sidebar" id="accordionSidebar" style="background:var(--parent-sidebar-bg)">
                        <li class="nav-item black">
                            <a class="nav-link" href="{{route('parent.dashboard')}}">
                                <i class="fas fa-home"></i>
                                <span id="home-link">Dashboard</span>
                            </a>
                        </li>
                        <hr class="sidebar-divider my-0">
                        
                        <div class="sidebar-heading">Meetings</div>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.meetings')}}">
                                <i class="fas fa-users"></i>
                                <span>Meetings</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-heading">Child Information</div>
                        
                       
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.create.student')}}">
                                <i class="fas fa-user-edit"></i>
                                <span>Add Child</span>
                            </a>
                        </li>
                        @if(auth()->user()->students)
                          @foreach (auth()->user()->students as $student)
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('parent.student.profile',$student->student->id)}}">
                                        <i class="fas fa-user-tie"></i>
                                        <span>{{ $student->student->name }} {{ $student->student->surname }}</span>
                                    </a>
                                </li>
                          @endforeach
                        @endif
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('parent.request-leave') }}">
                                <i class="fas fa-scroll"></i>
                                <span>Request Leave</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('parent.protocols.index') }}">
                                <i class="fas fa-file-alt"></i>
                                <span>Protocols</span>
                            </a>
                        </li>
                       <div class="sidebar-heading">Payments and invoices</div>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.invoices')}}">
                                <i class="fas fa-file-invoice"></i>
                                <span>Payments and invoices</span>
                            </a>
                        </li>
                         <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.plans')}}">
                                <i class="fas fa-file-invoice"></i>
                                <span>Plans</span>
                            </a>
                        </li>
                        <div class="sidebar-heading">Help Desk</div>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('help-desk')}}">
                                <i class="fas fa-envelope"></i>
                                <span>Help Desk</span>
                            </a>
                        </li>
                        <div class="sidebar-heading">Profile</div>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.profile')}}">
                                <i class="fas fa-fw fa-cog"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.reset.password.page')}}">
                                <i class="fas fa-key"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="nav-item">
                           
                            <form action="{{ route('logout') }}" method="post">
                                {{ csrf_field() }}
                                <button class="nav-link collapsed bg-transparent border-0">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
               

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

                    @if(Session::has('error'))
                        <div class="modal fade" id="message_modal">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content error-msg">
                                <div class="modal-body text-center">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div></div>
                                        {{ Session::get('error') }}
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 50px; color:black; margin-bottom: 15px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div> 
                    @endif

                    @if(count($errors) > 0)
                        <div class="modal fade" id="message_modal">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content error-msg">
                                <div class="modal-body text-center">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div>
                                            @foreach($errors->all() as $error)
                                             <p class="text-left"> {{ $error }} </p>  
                                            @endforeach
                                        </div>
                                        
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 50px; color:black; margin-bottom: 15px;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>  
                    @endif
                    
                    @yield('content')
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>
    <x-footer/>
    @yield('scripts')

    <script type="text/javascript">
       let forms = document.querySelectorAll('.confirm-first');

       for(let form of forms){  
        form.addEventListener('submit',function(e){
            if(form.getAttribute('id')=='logout_form' ){
                form.submit();
            }
            else if(form.getAttribute('id')=='create_news_form' ){
                return;
            }
            else{
                e.preventDefault();
                if(confirm('Are you sure?')){
                    form.submit();
                };
            }    
        });
       }

       $('#message_modal').modal('show');

       const parentMobileMenu = document.getElementById('parentMobileMenu');
       const parentMobileMenuToggle = document.querySelector('.parent-mobile-panel-toggle');
       const parentMobileMenuIcon = document.querySelector('.parent-mobile-panel-icon');
       const body = document.body;

       if (parentMobileMenu && parentMobileMenuToggle && parentMobileMenuIcon) {
            $('#parentMobileMenu').on('show.bs.collapse', function () {
                parentMobileMenuToggle.classList.remove('collapsed');
                parentMobileMenuToggle.setAttribute('aria-expanded', 'true');
                parentMobileMenuIcon.textContent = '−';
            });

            $('#parentMobileMenu').on('hide.bs.collapse', function () {
                parentMobileMenuToggle.classList.add('collapsed');
                parentMobileMenuToggle.setAttribute('aria-expanded', 'false');
                parentMobileMenuIcon.textContent = '+';
            });
       }

       function syncParentNavigation() {
            const isMobileView = window.innerWidth <= 1460;

            body.classList.toggle('parent-mobile-nav-active', isMobileView);
            body.classList.toggle('parent-desktop-nav-active', !isMobileView);

            if (!isMobileView && parentMobileMenu && $(parentMobileMenu).hasClass('show')) {
                $(parentMobileMenu).collapse('hide');
            }
       }

       syncParentNavigation();
       window.addEventListener('resize', syncParentNavigation);

       const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
		fetch('/set-timezone', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			body: JSON.stringify({ timezone })
		});
    </script>
</body>

</html>
 