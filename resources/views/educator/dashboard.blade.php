<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
	<link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/fontawesome-free-5.5.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,200&display=swap" rel="stylesheet">
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    @yield('css')
    <style>
        :root {
            --educator-sidebar-bg: #045397;
            --educator-sidebar-item-bg: #AB0050;
            --educator-sidebar-heading-bg: #7B0039;
        }
        .sidebar {
            background-color: #AB0050!important;
        }
        .sidebar-heading {
            background-color: #7B0039!important;
        }
        .sidebar .nav-item {
            background-color: #AB0050!important;
        }
        .sidebar-divider {
            background-color: #AB0050!important;
        }
        .page-headings{
            font-size:3rem;
            color:#045397;
            font-weight: bold;
        }
        #footer{
            margin-top:0;
        }
        .nav-item a {
            width: 100%!important;
        }
        .educator-mobile-panel {
            display: none;
            background: var(--educator-sidebar-item-bg);
            color: #fff;
        }
        .educator-mobile-panel-toggle {
            width: 100%;
            background: var(--educator-sidebar-item-bg);
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
        .educator-mobile-panel-toggle:focus {
            outline: none;
        }
        .educator-mobile-panel-icon {
            font-size: 26px;
            line-height: 1;
            font-weight: 400;
        }
        .educator-mobile-menu {
            background: var(--educator-sidebar-bg);
        }
        .educator-mobile-menu-section {
            padding: 12px 12px 6px;
            background: var(--educator-sidebar-heading-bg);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .educator-mobile-menu-link,
        .educator-mobile-menu-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            color: #fff;
            background: var(--educator-sidebar-item-bg);
            border: 0;
            border-top: 1px solid rgba(255,255,255,0.12);
            text-decoration: none !important;
            font-size: 14px;
        }
        .educator-mobile-menu-link:hover,
        .educator-mobile-menu-button:hover,
        .educator-mobile-menu-link:focus,
        .educator-mobile-menu-button:focus {
            color: #fff;
            background: var(--educator-sidebar-heading-bg);
            outline: none;
        }
        .educator-mobile-menu-button {
            text-align: left;
        }
        .educator-mobile-menu-link i,
        .educator-mobile-menu-button i {
            width: 18px;
            text-align: center;
        }
        body.educator-mobile-nav-active .educator-desktop-sidebar {
            display: none !important;
        }
        body.educator-mobile-nav-active .educator-mobile-panel {
            display: block !important;
        }
        body.educator-desktop-nav-active .educator-mobile-panel {
            display: none !important;
        }
        /*body.educator-desktop-nav-active .educator-desktop-sidebar {
            display: block !important;
        }*/
       
        .pagination .page-link {
            color: #AB0050!important; /* your color */
        }

        /* Hover state */
        .pagination .page-link:hover {
            color: #ffffff !important;
            background-color: #AB0050!important;
            border-color: #AB0050!important;
        }

        /* Active page */
        .pagination .page-item.active .page-link {
            background-color: #AB0050!important;
            border-color: #AB0050!important;
            color: #ffffff !important;
        }

        /* Disabled buttons */
        .pagination .page-item.disabled .page-link {
            color: #999999;
        }

        @media (max-width: 1460px) {
            .educator-mobile-panel {
                display: block !important;
            }
            .educator-desktop-sidebar {
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
    </style>

</head>

<body id="page-top">
    <x-header />
    <div class="container-fluid px-0">
        <div class="educator-mobile-panel d-lg-none">
            <button
                type="button"
                class="educator-mobile-panel-toggle collapsed"
                data-toggle="collapse"
                data-target="#educatorMobileMenu"
                aria-expanded="false"
                aria-controls="educatorMobileMenu"
            >
                <span>Panel</span>
                <span class="educator-mobile-panel-icon" aria-hidden="true">+</span>
            </button>
            <div class="collapse educator-mobile-menu" id="educatorMobileMenu">
                <a class="educator-mobile-menu-link" href="{{ route('educator.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>

                <div class="educator-mobile-menu-section">Courses</div>
                <a class="educator-mobile-menu-link" href="{{ route('educator.courses') }}">
                    <i class="fas fa-book"></i>
                    <span>Your Courses</span>
                </a>

                <div class="educator-mobile-menu-section">Meetings</div>
                <a class="educator-mobile-menu-link" href="{{ route('educator.meetings') }}">
                    <i class="fas fa-users"></i>
                    <span>Your Meetings</span>
                </a>

                <div class="educator-mobile-menu-section">Help Desk</div>
                <a class="educator-mobile-menu-link" href="{{ route('help-desk') }}">
                    <i class="fas fa-users"></i>
                    <span>Educator Help Desk</span>
                </a>

                {{-- <div class="educator-mobile-menu-section">Exams</div>
                <a class="educator-mobile-menu-link" href="{{ route('educator.exams') }}">
                    <i class="fas fa-folder"></i>
                    <span>Exams</span>
                </a> --}}
                {{--
                <a class="educator-mobile-menu-link" href="{{ route('educator.add-exam-question') }}">
                    <i class="fas fa-question"></i>
                    <span>Exam Questions</span>
                </a>
                <a class="educator-mobile-menu-link" href="{{ route('educator.self-assessment') }}">
                    <i class="fas fa-question"></i>
                    <span>Self Assesment Questions</span>
                </a>
                --}}
                <a class="educator-mobile-menu-link" href="{{ route('educator.submissions') }}">
                    <i class="fas fa-file"></i>
                    <span>Submitted Exams</span>
                </a>
                <a class="educator-mobile-menu-link" href="{{ route('educator.complaints') }}">
                    <i class="fas fa-file"></i>
                    <span>Complaints</span>
                </a>
                <div class="educator-mobile-menu-section">Payments &amp; Invoices</div>
                <a class="educator-mobile-menu-link" href="{{ route('educator.invoices') }}">
                    <i class="fas fa-file-invoice"></i>
                    <span>Credit Memos</span>
                </a>

                <div class="educator-mobile-menu-section">Profile Settings</div>
                  <a class="educator-mobile-menu-link" href="{{ route('educator.profile') }}">
                    <i class="fas fa-key"></i>
                    <span>Profile</span>
                </a>
                <a class="educator-mobile-menu-link" href="{{ route('educator.reset.password.page') }}">
                    <i class="fas fa-key"></i>
                    <span>Password change</span>
                </a>
                <form action="{{ route('logout') }}" method="post" class="educator-mobile-menu-section">
                    {{ csrf_field() }}
                    <button type="submit" class="educator-mobile-menu-button" style="background-color: #7B0039;border-top: none;">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="row px-3">
            <div id="wrapper" class="educator-desktop-sidebar" style="padding:0 0px; height: stretch;">
                <ul class="navbar-nav pl-0 sidebar sidebar-dark accordion educator-desktop-sidebar" id="accordionSidebar" style="background:#045397">
                    <li class="nav-item black">
                        <a class="nav-link" href="{{route('educator.dashboard')}}">
                            <i class="fas fa-home"></i>
                            <span id="home-link">Dashboard</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider my-0">

                    <div class="sidebar-heading">Courses</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.courses')}}">
                            <i class="fas fa-book"></i>
                            <span>Your Courses</span>
                        </a>
                    </li>
                    <div class="sidebar-heading">Meetings</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.meetings')}}">
                            <i class="fas fa-users"></i>
                            <span>Your Meetings</span>
                        </a>
                    </li>

                    <div class="sidebar-heading">Help Desk</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('educator.help-desk') }}">
                            <i class="fas fa-users"></i>
                            <span>Student Help Desk</span>
                        </a>
                    </li>

                    <div class="sidebar-heading">Exams</div>
                     <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.overview')}}">
                            <i class="fas fa-folder"></i>
                            <span>Overview</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.exams')}}">
                            <i class="fas fa-folder"></i>
                            <span>Exams</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.add-exam-question')}}">
                            <i class="fas fa-question"></i>
                            <span>Exam Questions</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.self-assessment')}}">
                            <i class="fas fa-question"></i>
                            <span>Self Assesment Questions</span>
                        </a>
                    </li> --}}
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.submissions')}}">
                            <i class="fas fa-file"></i>
                            <span>Submitted Exams</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.complaints')}}">
                            <i class="fas fa-file"></i>
                            <span>Complaints</span>
                        </a>
                    </li>
                    <div class="sidebar-heading">Payments & Invoices</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.invoices')}}">
                            <i class="fas fa-file-invoice"></i>
                            <span>Credit Memos</span>
                        </a>
                    </li>

                    <div class="sidebar-heading">
                        Profile Settings
                    </div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('educator.hours') }}">
                            <i class="fas fa-clock"></i>
                            <span>My Hours</span>
                        </a>
                    </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="{{ route('educator.profile') }}">
                            <i class="fas fa-key"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('educator.reset.password.page') }}">
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
        </div>
    </div>
      <!-- Confirmation Modal -->
        <div class="modal fade" id="confirm_modal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow-xl" style="border:none !important;border-radius:5px !important;padding:20px; ">
                
                    <div class="modal-body">
                        <h3 class="text-center text-dark font-weight-bold">Are you sure?</h3>
                        <div class="d-flex justify-content-center" style="margin-top:40px;">
                            <button type="button" class="mx-2 btn-lg btn blue-button-outline" data-dismiss="modal" id="no">
                                Cancel
                            </button>

                            <button type="button" class="mx-2 btn-lg btn orange-button" id="yes">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <x-footer />
    <x-scroll-top />
    @yield('scripts')

    <script type="text/javascript">   
        let forms = document.querySelectorAll('.confirm-first');

        for(let form of forms){  
            form.addEventListener('submit',function(e){
                e.preventDefault();
                $('#confirm_modal').modal('show');
                $('#yes').attr('data-id',form.getAttribute('id'))
                
            });
        }

       $('#yes').on('click',function(){
            let id = $(this).attr('data-id');
            $(`#${id}`).find('button').attr('disabled',true);
            $('#confirm_modal').modal('hide');
            $(`#${id}`).submit();
       })
       $('#no').on('click',function(){
            let id = $(this).attr('data-id');
            $(`#${id}`).find('button').attr('disabled',false);
       })

       $('#message_modal').modal('show');

       const educatorMobileMenu = document.getElementById('educatorMobileMenu');
       const educatorMobileMenuToggle = document.querySelector('.educator-mobile-panel-toggle');
       const educatorMobileMenuIcon = document.querySelector('.educator-mobile-panel-icon');
       const body = document.body;

       if (educatorMobileMenu && educatorMobileMenuToggle && educatorMobileMenuIcon) {
            $('#educatorMobileMenu').on('show.bs.collapse', function () {
                educatorMobileMenuToggle.classList.remove('collapsed');
                educatorMobileMenuToggle.setAttribute('aria-expanded', 'true');
                educatorMobileMenuIcon.textContent = '−';
            });

            $('#educatorMobileMenu').on('hide.bs.collapse', function () {
                educatorMobileMenuToggle.classList.add('collapsed');
                educatorMobileMenuToggle.setAttribute('aria-expanded', 'false');
                educatorMobileMenuIcon.textContent = '+';
            });
       }

       function syncEducatorNavigation() {
            const isMobileView = window.innerWidth <= 1460;

            body.classList.toggle('educator-mobile-nav-active', isMobileView);
            body.classList.toggle('educator-desktop-nav-active', !isMobileView);

            if (!isMobileView && educatorMobileMenu && $(educatorMobileMenu).hasClass('show')) {
                $(educatorMobileMenu).collapse('hide');
            }
       }

       syncEducatorNavigation();
       window.addEventListener('resize', syncEducatorNavigation);
    </script>
</body>

</html>
