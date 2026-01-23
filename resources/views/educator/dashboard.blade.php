<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/fontawesome-free-5.5.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    @yield('css')
    <style>
        .sidebar {
            background-color: #AB0050!important;
        }
        .sidebar-heading {
            background-color: #7B0039!important;
        }
        .nav-item {
            background-color: #AB0050!important;
        }
        .sidebar-divider {
            background-color: #AB0050!important;
        }
    </style>

</head>

<body id="page-top">
    <div class="container-fluid px-0">
        <div class="row">
            <div id="wrapper" style="padding:0 0px;">
                <ul class="navbar-nav pl-2 sidebar sidebar-dark accordion" id="accordionSidebar" style="min-height:1500vh;background:#045397">
                    <li class="nav-item black">
                        <a class="nav-link" href="{{route('welcome')}}">
                            <i class="fas fa-fw fa-home"></i>
                            <span id="home-link">HomePage</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider my-0">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.dashboard')}}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                   
                    <div class="sidebar-heading">Meetings</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('educator.meetings')}}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Meetings</span>
                        </a>
                    </li>

                    <div class="sidebar-heading">Inquiries</div>
                    <li class="nav-item active">
                        <a class="nav-link" href="">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Inquiries</span>
                        </a>
                    </li>

                    <div class="sidebar-heading">
                        Profile Settings
                    </div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.reset.password.page') }}">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Password change</span>
                        </a>
                    </li>
                    <li class="nav-item">
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

            @if(Session::has('success_message'))
                <div class="alert alert-success text-center alert-fixed shadow" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('success_message') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger text-center alert-fixed shadow" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('error') }}
                </div>
            @endif

            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger text-center alert-fixed shadow" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @yield('content')
                
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>

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
    </script>
</body>

</html>
