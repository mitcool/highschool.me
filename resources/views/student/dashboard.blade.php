<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/fontawesome-free-5.5.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    @yield('css')
    <style>
        :root {
            --student-sidebar-bg: #00A0B2;
            --student-sidebar-item-bg: #00A0B2;
            --student-sidebar-heading-bg: #00606B;
        }
        .sidebar {
            background-color: var(--student-sidebar-item-bg)!important;
        }
        .sidebar-heading {
            background-color: var(--student-sidebar-heading-bg)!important;
        }
        .sidebar .nav-item {
            background-color: var(--student-sidebar-item-bg)!important;
        }
        .sidebar-divider {
            background-color: var(--student-sidebar-item-bg)!important;
        }
        #footer{
            margin-top:0;
        }
        .nav-item a {
            width: 100%!important;
        }
        .student-dashboard-row {
            margin-left: 0;
            margin-right: 0;
        }
        .student-page-content {
            width: 100%;
        }
        .student-mobile-panel {
            display: none;
            background: var(--student-sidebar-item-bg);
            color: #fff;
        }
        .student-mobile-panel-toggle {
            width: 100%;
            background: var(--student-sidebar-item-bg);
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
        .student-mobile-panel-toggle:focus {
            outline: none;
        }
        .student-mobile-panel-icon {
            font-size: 26px;
            line-height: 1;
            font-weight: 400;
        }
        .student-mobile-menu {
            background: var(--student-sidebar-bg);
        }
        .student-mobile-menu-section {
            padding: 12px 12px 6px;
            background: var(--student-sidebar-heading-bg);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .student-mobile-menu-link,
        .student-mobile-menu-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            color: #fff;
            background: var(--student-sidebar-item-bg);
            border: 0;
            border-top: 1px solid rgba(255,255,255,0.12);
            text-decoration: none !important;
            font-size: 14px;
        }
        .student-mobile-menu-link:hover,
        .student-mobile-menu-button:hover,
        .student-mobile-menu-link:focus,
        .student-mobile-menu-button:focus {
            color: #fff;
            background: var(--student-sidebar-heading-bg);
            outline: none;
        }
        .student-mobile-menu-button {
            text-align: left;
        }
        .student-mobile-menu-link i,
        .student-mobile-menu-button i {
            width: 18px;
            text-align: center;
        }
        .modal-content {
            border-radius: 30px !important;
            border: 5px solid #025297 !important;
        }
        .error-msg {
            border-radius: 30px !important;
            border: 5px solid rgb(141, 37, 37) !important;
        }
        body.student-mobile-nav-active .student-desktop-sidebar {
            display: none !important;
        }
        body.student-mobile-nav-active .student-mobile-panel {
            display: block !important;
        }
        body.student-desktop-nav-active .student-mobile-panel {
            display: none !important;
        }
        body.student-desktop-nav-active .student-desktop-sidebar {
            display: block !important;
        }
        @media (min-width: 1461px) {
            .student-dashboard-row {
                display: flex;
                flex-wrap: nowrap;
                align-items: flex-start;
            }
            .student-desktop-sidebar {
                flex: 0 0 240px;
                max-width: 240px;
            }
            .student-page-content {
                flex: 1 1 auto;
                min-width: 0;
                width: auto;
                padding-left: 24px;
            }
        }
        @media (max-width: 1460px) {
            .student-mobile-panel {
                display: block !important;
            }
            .student-desktop-sidebar {
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
            .student-page-content {
                padding-left: 12px;
                padding-right: 12px;
            }
        }
    </style>

</head>

<body id="page-top">
    <x-header />
    <div class="container-fluid px-0">
        <div class="student-mobile-panel d-lg-none">
            <button
                type="button"
                class="student-mobile-panel-toggle collapsed"
                data-toggle="collapse"
                data-target="#studentMobileMenu"
                aria-expanded="false"
                aria-controls="studentMobileMenu"
            >
                <span>Panel</span>
                <span class="student-mobile-panel-icon" aria-hidden="true">+</span>
            </button>
            <div class="collapse student-mobile-menu" id="studentMobileMenu">
                <a class="student-mobile-menu-link" href="{{ route('student.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>

                <div class="student-mobile-menu-section">Meetings</div>
                <a class="student-mobile-menu-link" href="{{ route('student.meetings') }}">
                    <i class="fas fa-users"></i>
                    <span>Meetings</span>
                </a>

                <div class="student-mobile-menu-section">Education</div>
                <a class="student-mobile-menu-link" href="{{ route('student.my-courses') }}">
                    <i class="fas fa-book"></i>
                    <span>My Courses</span>
                </a>
                <a class="student-mobile-menu-link" href="{{ route('student.exams') }}">
                    <i class="fas fa-folder"></i>
                    <span>My Exams</span>
                </a>
                <a class="student-mobile-menu-link" href="{{ route('student.diplomas') }}">
                    <i class="fas fa-scroll"></i>
                    <span>My Diplomas</span>
                </a>
                <a class="student-mobile-menu-link" href="{{ route('student.study-mentor') }}">
                    <i class="fas fa-user-graduate"></i>
                    <span>Study Mentor</span>
                </a>

                <div class="student-mobile-menu-section">Rewards</div>
                <a class="student-mobile-menu-link" href="{{ route('student.ambassador-program') }}">
                    <i class="fas fa-award"></i>
                    <span>Ambassador Program</span>
                </a>

                <div class="student-mobile-menu-section">Help Desk</div>
                <a class="student-mobile-menu-link" href="{{ route('help-desk') }}">
                    <i class="fas fa-envelope"></i>
                    <span>Help Desk</span>
                </a>

                <div class="student-mobile-menu-section">Profile Settings</div>
                <a class="student-mobile-menu-link" href="{{ route('student.profile') }}">
                    <i class="fas fa-key"></i>
                    <span>Profile</span>
                </a>
                <a class="student-mobile-menu-link" href="{{ route('student.reset.password.page') }}">
                    <i class="fas fa-key"></i>
                    <span>Password change</span>
                </a>
                <form action="{{ route('logout') }}" method="post" class="student-mobile-menu-section">
                    {{ csrf_field() }}
                    <button type="submit" class="student-mobile-menu-button" style="background-color: var(--student-sidebar-heading-bg);border-top: none;">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="row student-dashboard-row">
            <div id="wrapper" class="student-desktop-sidebar" style="padding:0 0px;">
                <ul class="navbar-nav sidebar sidebar-dark accordion student-desktop-sidebar pl-0" id="accordionSidebar" style="background:var(--student-sidebar-bg)">
                    <li class="nav-item black">
                        <a class="nav-link" href="{{route('student.dashboard')}}">
                            <i class="fas fa-home"></i>
                            <span id="home-link">Dashboard</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider my-0">
                                   
                    <div class="sidebar-heading">Meetings</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.meetings') }}">
                            <i class="fas fa-users"></i>
                            <span>Meetings</span>
                        </a>
                    </li>
                    {{-- <div class="sidebar-heading">Documents</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Upload Documentation</span>
                        </a>
                    </li> --}}

                    <div class="sidebar-heading">Education</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.my-courses') }}">
                            <i class="fas fa-book"></i>
                            <span>My Courses</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.exams') }}">
                            <i class="fas fa-folder"></i>
                            <span>My Exams</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.diplomas') }}">
                            <i class="fas fa-scroll"></i>
                            <span>My Diplomas</span>
                        </a>
                    </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.study-mentor') }}">
                            <i class="fas fa-user-graduate"></i>
                            <span>Study Mentor</span>
                        </a>
                    </li>
                    <div class="sidebar-heading">Rewards</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.ambassador-program') }}">
                            <i class="fas fa-award"></i>
                            <span>Ambassador Program</span>
                        </a>
                    </li>

                    <div class="sidebar-heading">Help Desk</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('help-desk') }}">
                            <i class="fas fa-envelope"></i>
                            <span>Help Desk</span>
                        </a>
                    </li>

                    <div class="sidebar-heading">
                        Profile Settings
                    </div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.profile') }}">
                            <i class="fas fa-key"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.reset.password.page') }}">
                            <i class="fas fa-key"></i>
                            <span>Password change</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" class="sidebar-heading p-0">
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
    <x-footer />
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
       const studentMobileMenu = document.getElementById('studentMobileMenu');
       const studentMobileMenuToggle = document.querySelector('.student-mobile-panel-toggle');
       const studentMobileMenuIcon = document.querySelector('.student-mobile-panel-icon');
       const body = document.body;

       if (studentMobileMenu && studentMobileMenuToggle && studentMobileMenuIcon) {
            $('#studentMobileMenu').on('show.bs.collapse', function () {
                studentMobileMenuToggle.classList.remove('collapsed');
                studentMobileMenuToggle.setAttribute('aria-expanded', 'true');
                studentMobileMenuIcon.textContent = '-';
            });

            $('#studentMobileMenu').on('hide.bs.collapse', function () {
                studentMobileMenuToggle.classList.add('collapsed');
                studentMobileMenuToggle.setAttribute('aria-expanded', 'false');
                studentMobileMenuIcon.textContent = '+';
            });
       }

       function syncStudentNavigation() {
            const isMobileView = window.innerWidth <= 1460;

            body.classList.toggle('student-mobile-nav-active', isMobileView);
            body.classList.toggle('student-desktop-nav-active', !isMobileView);

            if (!isMobileView && studentMobileMenu && $(studentMobileMenu).hasClass('show')) {
                $(studentMobileMenu).collapse('hide');
            }
       }

       syncStudentNavigation();
       window.addEventListener('resize', syncStudentNavigation);

       const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
		fetch('/set-timezone', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			body: JSON.stringify({ timezone })
		});

        $('#message_modal').modal('show');
    </script>
</body>

</html>
