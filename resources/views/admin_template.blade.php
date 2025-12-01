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
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/fontawesome-free-5.5.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    @yield('css')

</head>

<body id="page-top">
    <div class="container-fluid px-0">
        <div class="row">
            <div id="wrapper" style="padding:0 0px;">
                <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="min-height:1500vh;padding-left:10px;background:#045397">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('welcome')}}">
                            <i class="fas fa-fw fa-home"></i>
                            <span>HomePage</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider my-0">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin-dashboard')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">Courses</div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-courses-types')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Courses Types</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('enrollment-courses')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Enrollment Courses</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">Plans and features</div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-plans')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Plans</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-features')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Features</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-features-order')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Features order</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">  

                    <div class="sidebar-heading">
                        Meetings
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-group-sessions')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Group Session for Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Mentoring Session for Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>College and Career Coaching</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Family Consultation</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">  

                    <div class="sidebar-heading">
                        Ambassador
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin.ambassador-links') }}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Ambassador Links</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Ambassador Activities</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin.ambassador-rewards') }}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Ambassador Rewards</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">
                    
                    <div class="sidebar-heading">
                        News
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('dynamic-news')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>News Explorer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-facts-hub') }}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Facts Hub</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-press-release') }}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Press Release</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('edit-authors')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Author's Information</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider"> 

                    <div class="sidebar-heading">
                        Texts
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('faq-categories')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>FAQ Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('faq')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('texts')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Texts</span>
                        </a>
                    </li>
                   
                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Newsletter
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-newsletter')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Create Newsletter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('admin-newsletter-stats')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Newsletter Stats</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Student Management System
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Overview</span>
                        </a>
                        <a class="nav-link collapsed" href="{{route('admin-student-documents')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Documents</span>
                        </a>
                    </li>

                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        Payments & Invoices
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{ route('admin-invoices') }}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <hr class="sidebar-divider">
                        <form action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                            <button class="nav-link collapsed bg-transparent border-0">
                                <i class="fas fa-fw fa-cog"></i>
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
    </script>
</body>

</html>
