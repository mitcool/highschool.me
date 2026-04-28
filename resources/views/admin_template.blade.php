<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/fontawesome-free-5.5.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,200&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
    @yield('css')
    <style>
        :root {
            --admin-sidebar-bg: #045397;
            --admin-sidebar-item-bg: #AB4400;
            --admin-sidebar-heading-bg: #7B1D00;
        }
        .sidebar {
            background-color: var(--admin-sidebar-item-bg)!important;
        }
        .sidebar-heading {
            background-color: var(--admin-sidebar-heading-bg)!important;
        }
        .sidebar .nav-item {
            background-color: var(--admin-sidebar-item-bg)!important;
        }
        .sidebar-divider {
            background-color: var(--admin-sidebar-item-bg)!important;
        }
        #footer{
            margin-top:0 !important;
        }
        /* Default link color */
        .pagination .page-link {
            color: #ff6600; /* your color */
        }

        /* Hover state */
        .pagination .page-link:hover {
            color: #ffffff;
            background-color: #ff6600;
            border-color: #ff6600;
        }

        /* Active page */
        .pagination .page-item.active .page-link {
            background-color: #ff6600;
            border-color: #ff6600;
            color: #ffffff;
        }

        /* Disabled buttons */
        .pagination .page-item.disabled .page-link {
            color: #999999;
        }

        .nav-item a {
            width: 100%!important;
        }
        .admin-dashboard-row {
            margin-left: 0;
            margin-right: 0;
        }
        .admin-page-content {
            width: 100%;
        }
        .admin-mobile-panel {
            display: none;
            background: var(--admin-sidebar-item-bg);
            color: #fff;
        }
        .admin-mobile-panel-toggle {
            width: 100%;
            background: var(--admin-sidebar-item-bg);
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
        .admin-mobile-panel-toggle:focus {
            outline: none;
        }
        .admin-mobile-panel-icon {
            font-size: 26px;
            line-height: 1;
            font-weight: 400;
        }
        .admin-mobile-menu {
            background: var(--admin-sidebar-bg);
        }
        .admin-mobile-menu-section {
            padding: 12px 12px 6px;
            background: var(--admin-sidebar-heading-bg);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .admin-mobile-menu-link,
        .admin-mobile-menu-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            color: #fff;
            background: var(--admin-sidebar-item-bg);
            border: 0;
            border-top: 1px solid rgba(255,255,255,0.12);
            text-decoration: none !important;
            font-size: 14px;
        }
        .admin-mobile-menu-link:hover,
        .admin-mobile-menu-button:hover,
        .admin-mobile-menu-link:focus,
        .admin-mobile-menu-button:focus {
            color: #fff;
            background: var(--admin-sidebar-heading-bg);
            outline: none;
        }
        .admin-mobile-menu-button {
            text-align: left;
        }
        .admin-mobile-menu-link i,
        .admin-mobile-menu-button i {
            width: 18px;
            text-align: center;
        }
        body.admin-mobile-nav-active .admin-desktop-sidebar {
            display: none !important;
        }
        body.admin-mobile-nav-active .admin-mobile-panel {
            display: block !important;
        }
        body.admin-desktop-nav-active .admin-mobile-panel {
            display: none !important;
        }
        body.admin-desktop-nav-active .admin-desktop-sidebar {
            display: block !important;
        }
	.error-msg {
            border-radius: 30px !important;
            border: 5px solid rgb(141, 37, 37) !important;
        }
        @media (min-width: 1461px) {
            .admin-dashboard-row {
                display: flex;
                flex-wrap: nowrap;
                align-items: flex-start;
            }
            .admin-desktop-sidebar {
                flex: 0 0 240px;
                max-width: 300px;
            }
            .admin-page-content {
                flex: 1 1 auto;
                min-width: 0;
                width: auto;
                padding-left: 24px;
            }
        }
        @media (max-width: 1460px) {
            .admin-mobile-panel {
                display: block !important;
            }
            .admin-desktop-sidebar {
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
            .admin-page-content {
                padding-left: 12px;
                padding-right: 12px;
            }
        }
    </style>

</head>

<body id="page-top">
    <x-header />
    <div class="container-fluid px-0">
        <div class="admin-mobile-panel d-lg-none">
            <button
                type="button"
                class="admin-mobile-panel-toggle collapsed"
                data-toggle="collapse"
                data-target="#adminMobileMenu"
                aria-expanded="false"
                aria-controls="adminMobileMenu"
            >
                <span>Panel</span>
                <span class="admin-mobile-panel-icon" aria-hidden="true">+</span>
            </button>
            <div class="collapse admin-mobile-menu" id="adminMobileMenu">
                <a class="admin-mobile-menu-link" href="{{ route('admin-dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>

                <div class="admin-mobile-menu-section">Courses</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-courses-types') }}">
                    <i class="fas fa-book"></i>
                    <span>Courses Types</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('all-enrollment-courses') }}">
                    <i class="fas fa-book"></i>
                    <span>Enrollment Courses</span>
                </a>

                <div class="admin-mobile-menu-section">Plans and features</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-plans') }}">
                    <i class="fas fa-book"></i>
                    <span>Plans</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-features') }}">
                    <i class="fas fa-clipboard"></i>
                    <span>Features</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-features-order') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Features order</span>
                </a>

                <div class="admin-mobile-menu-section">Meetings</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-group-sessions') }}">
                    <i class="fas fa-users"></i>
                    <span>Group Session for Students</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-mentoring-sessions') }}">
                    <i class="fas fa-user-graduate"></i>
                    <span>Mentoring Session for Students</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-coaching-sessions') }}">
                    <i class="fas fa-university"></i>
                    <span>College and Career Coaching</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-family-consultations') }}">
                    <i class="fas fa-handshake"></i>
                    <span>Family Consultation</span>
                </a>

                <div class="admin-mobile-menu-section">Ambassador</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin.ambassador-links') }}">
                    <i class="fas fa-star"></i>
                    <span>Ambassador Links</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.ambassador-activities') }}">
                    <i class="fas fa-award"></i>
                    <span>Ambassador Activities</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.ambassador-rewards') }}">
                    <i class="fas fa-trophy"></i>
                    <span>Ambassador Rewards</span>
                </a>

                <div class="admin-mobile-menu-section">News</div>
                <a class="admin-mobile-menu-link" href="{{ route('dynamic-news') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>News Explorer</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-facts-hub') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Facts Hub</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-press-release') }}">
                    <i class="fas fa-bullhorn"></i>
                    <span>Press Release</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('edit-authors') }}">
                    <i class="fas fa-user-edit"></i>
                    <span>Author's Information</span>
                </a>

                <div class="admin-mobile-menu-section">Help Desk</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-parent-help-desk') }}">
                    <i class="fas fa-envelope"></i>
                    <span>Parent Help Desk</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-student-help-desk') }}">
                    <i class="fas fa-envelope"></i>
                    <span>Student Help Desk</span>
                </a>

                <div class="admin-mobile-menu-section">Texts</div>
                <a class="admin-mobile-menu-link" href="{{ route('faq-categories') }}">
                    <i class="fas fa-pen-nib"></i>
                    <span>FAQ Categories</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-faq') }}">
                    <i class="fas fa-pen-nib"></i>
                    <span>FAQ</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('texts') }}">
                    <i class="fas fa-pen-nib"></i>
                    <span>Texts</span>
                </a>

                <div class="admin-mobile-menu-section">Newsletter</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-newsletter') }}">
                    <i class="fas fa-paper-plane"></i>
                    <span>Create Newsletter</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-newsletter-stats') }}">
                    <i class="fas fa-chart-pie"></i>
                    <span>Newsletter Stats</span>
                </a>

                <div class="admin-mobile-menu-section">Student Management System</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-student-overview') }}">
                    <i class="fas fa-user-graduate"></i>
                    <span>Overview</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-student-documents') }}">
                    <i class="fas fa-folder"></i>
                    <span>Documents</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.protocols.index') }}">
                    <i class="fas fa-file"></i>
                    <span>Protocols</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.all-requested-leaves') }}">
                    <i class="fas fa-door-open"></i>
                    <span>Leave Requests</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-student-diploma-requests') }}">
                    <i class="fas fa-scroll"></i>
                    <span>Diploma Requests</span>
                </a>

                <div class="admin-mobile-menu-section">Educators and Exams</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-educators') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Educators</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-other-staff') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Other Staff</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-exams') }}">
                    <i class="fas fa-folder"></i>
                    <span>Exams</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.add-exam-question') }}">
                    <i class="fas fa-question"></i>
                    <span>Exam Questions</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.add-self-assess-question') }}">
                    <i class="fas fa-question"></i>
                    <span>Self Assesment Questions</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin-submissions') }}">
                    <i class="fas fa-file"></i>
                    <span>Submimissions</span>
                </a>

                <div class="admin-mobile-menu-section">Payments &amp; Invoices</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-invoices') }}">
                    <i class="fas fa-file-invoice"></i>
                    <span>Invoices</span>
                </a>

                <div class="admin-mobile-menu-section">Academics</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin-academics') }}">
                    <i class="fas fa-school"></i>
                    <span>Academics</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.students-in-spotlights') }}">
                    <i class="fas fa-user-graduate"></i>
                    <span>Students in Spotlights</span>
                </a>
                <a class="admin-mobile-menu-link" href="{{ route('admin.statistics') }}">
                    <i class="fas fa-table"></i>
                    <span>Statistics</span>
                </a>

                <div class="admin-mobile-menu-section">My Profile</div>
                <a class="admin-mobile-menu-link" href="{{ route('admin.change-password') }}">
                    <i class="fas fa-key"></i>
                    <span>Change password</span>
                </a>
                <form action="{{ route('logout') }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="admin-mobile-menu-button">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="row admin-dashboard-row">
            <div id="wrapper" class="admin-desktop-sidebar" style="padding:0 0px;">
                <ul class="navbar-nav sidebar sidebar-dark accordion admin-desktop-sidebar pl-0" id="accordionSidebar" style="background:var(--admin-sidebar-bg);">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin-dashboard')}}">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider my-0">

                    <div class="sidebar-heading">Courses</div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-courses-types')}}">
                            <i class="fas fa-book"></i>
                            <span>Courses Types</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('all-enrollment-courses')}}">
                            <i class="fas fa-book"></i>
                            <span>Enrollment Courses</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">Plans and features</div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-plans')}}">
                            <i class="fas fa-book"></i>
                            <span>Plans</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-features')}}">
                            <i class="fas fa-clipboard"></i>
                            <span>Features</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-features-order')}}">
                            <i class="fas fa-clipboard-list"></i>
                            <span>Features order</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">  

                    <div class="sidebar-heading">
                        Meetings
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-group-sessions')}}">
                            <i class="fas fa-users"></i>
                            <span>Group Session for Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-mentoring-sessions') }}">
                            <i class="fas fa-user-graduate"></i>
                            <span>Mentoring Session for Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-coaching-sessions') }}">
                            <i class="fas fa-university"></i>
                            <span>College and Career Coaching</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-family-consultations') }}">
                            <i class="fas fa-handshake"></i>
                            <span>Family Consultation</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">  

                    <div class="sidebar-heading">
                        Ambassador
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin.ambassador-links') }}">
                            <i class="fas fa-star"></i>
                            <span>Ambassador Links</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin.ambassador-activities') }}">
                            <i class="fas fa-award"></i>
                            <span>Ambassador Activities</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin.ambassador-rewards') }}">
                            <i class="fas fa-trophy"></i>
                            <span>Ambassador Rewards</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">
                    
                    <div class="sidebar-heading">
                        News
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('dynamic-news')}}">
                            <i class="fas fa-newspaper"></i>
                            <span>News Explorer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-facts-hub') }}">
                            <i class="fas fa-newspaper"></i>
                            <span>Facts Hub</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-press-release') }}">
                            <i class="fas fa-bullhorn"></i>
                            <span>Press Release</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('edit-authors')}}">
                            <i class="fas fa-user-edit"></i>
                            <span>Author's Information</span>
                        </a>
                    </li>
                   <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Help Desk
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-parent-help-desk')}}">
                            <i class="fas fa-envelope"></i>
                            <span>Parent Help Desk</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-student-help-desk')}}">
                            <i class="fas fa-envelope"></i>
                            <span>Student Help Desk</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider"> 

                    <div class="sidebar-heading">
                        Texts
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('faq-categories')}}">
                            <i class="fas fa-pen-nib"></i>
                            <span>FAQ Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-faq')}}">
                            <i class="fas fa-pen-nib"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('texts')}}">
                            <i class="fas fa-pen-nib"></i>
                            <span>Texts</span>
                        </a>
                    </li>
                   
                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Newsletter
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-newsletter')}}">
                            <i class="fas fa-paper-plane"></i>
                            <span>Create Newsletter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-newsletter-stats')}}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Newsletter Stats</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Student Management System
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-student-overview') }}">
                            <i class="fas fa-user-graduate"></i>
                            <span>Overview</span>
                        </a>
                        <a class="nav-link collapsed" href="{{route('admin-student-documents')}}">
                            <i class="fas fa-folder"></i>
                            <span>Documents</span>
                        </a>
                        <a class="nav-link collapsed" href="{{ route('admin.protocols.index') }}">
                            <i class="fas fa-file"></i>
                            <span>Protocols</span>
                        </a>
                        <a class="nav-link collapsed" href="{{route('admin.all-requested-leaves')}}">
                            <i class="fas fa-door-open"></i>
                            <span>Leave Requests</span>
                        </a>
                        <a class="nav-link collapsed" href="{{route('admin-student-diploma-requests')}}">
                            <i class="fas fa-scroll"></i>
                            <span>Diploma Requests</span>
                        </a>
                        <a class="nav-link collapsed" href="{{route('admin.restricted-countries')}}">
                            <i class="fas fa-globe"></i>
                            <span>Restricted countries</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                         Educators and Exams
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-educators') }}">
                            <i class="fas fa-user-tie"></i>
                            <span>Educators</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-other-staff') }}">
                            <i class="fas fa-user-tie"></i>
                            <span>Other Staff</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-exams') }}">
                            <i class="fas fa-folder"></i>
                            <span>Exams</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin.add-exam-question') }}">
                            <i class="fas fa-question"></i>
                            <span>Exam Questions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin.add-self-assess-question') }}">
                            <i class="fas fa-question"></i>
                            <span>Self Assesment Questions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-submissions') }}">
                            <i class="fas fa-file"></i>
                            <span>Submimissions</span>
                        </a>                     
                    </li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        Payments & Invoices
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-invoices') }}">
                            <i class="fas fa-file-invoice"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        Academics
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-academics') }}">
                            <i class="fas fa-school"></i>
                            <span>Academics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <hr class="sidebar-divider">
                        <a class="nav-link collapsed" href="{{ route('admin.students-in-spotlights') }}">
                            <i class="fas fa-user-graduate"></i>
                            <span>Students in Spotlights</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <hr class="sidebar-divider">
                        <a class="nav-link collapsed" href="{{ route('admin.statistics') }}">
                            <i class="fas fa-table"></i>
                            <span>Statistics</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        My Profile
                    </div>
                    <li class="nav-item">
                        <hr class="sidebar-divider">
                        <a class="nav-link collapsed" href="{{ route('admin.change-password') }}">
                            <i class="fas fa-key"></i>
                            <span>Change password</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <hr class="sidebar-divider">
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

            <x-flash-messages />
            @yield('content')

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>
    <x-footer />
    @yield('scripts')
    <script type="text/javascript">
       $('#requests').on('click', function(){
           if($('.requests').css('display') == 'block'){
             $('.requests').css('display', 'none');
           }
           else{
             $('.requests').css('display', 'block');
           }
       });
       
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

       const adminMobileMenu = document.getElementById('adminMobileMenu');
       const adminMobileMenuToggle = document.querySelector('.admin-mobile-panel-toggle');
       const adminMobileMenuIcon = document.querySelector('.admin-mobile-panel-icon');
       const body = document.body;

       if (adminMobileMenu && adminMobileMenuToggle && adminMobileMenuIcon) {
            $('#adminMobileMenu').on('show.bs.collapse', function () {
                adminMobileMenuToggle.classList.remove('collapsed');
                adminMobileMenuToggle.setAttribute('aria-expanded', 'true');
                adminMobileMenuIcon.textContent = '-';
            });

            $('#adminMobileMenu').on('hide.bs.collapse', function () {
                adminMobileMenuToggle.classList.add('collapsed');
                adminMobileMenuToggle.setAttribute('aria-expanded', 'false');
                adminMobileMenuIcon.textContent = '+';
            });
       }

       function syncAdminNavigation() {
            const isMobileView = window.innerWidth <= 1460;

            body.classList.toggle('admin-mobile-nav-active', isMobileView);
            body.classList.toggle('admin-desktop-nav-active', !isMobileView);

            if (!isMobileView && adminMobileMenu && $(adminMobileMenu).hasClass('show')) {
                $(adminMobileMenu).collapse('hide');
            }
       }

       syncAdminNavigation();
       window.addEventListener('resize', syncAdminNavigation);
       $('#message_modal').modal('show');
    </script>
</body>

</html>
