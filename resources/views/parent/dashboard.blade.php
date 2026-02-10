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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    @yield('css')
    <style>
        .modal-content {
            border-radius: 30px !important;
            border: 5px solid #025297 !important;
        }
        .error-msg {
            border-radius: 30px !important;
            border: 5px solid red !important;
        }
        .sidebar {
            background-color: #4E28B9!important;
        }
        .sidebar-heading {
            background-color: #26088D!important;
        }
        .navbar-nav nav-item {
            background-color: #4E28B9!important;
        }
        .sidebar-divider {
            background-color: #4E28B9!important;
        }
        #footer{
            margin-top:0;
        }
    </style>

</head>

<body id="page-top">
    <x-header/>
    <div class="container-fluid px-0">
        <div class="row">
           
                <div id="wrapper" style="padding:0 0px;">
                    <ul class="navbar-nav pl-2 sidebar sidebar-dark accordion" id="accordionSidebar" style="background:#045397"
>
                        <li class="nav-item black">
                            <a class="nav-link" href="{{route('welcome')}}">
                                <i class="fas fa-fw fa-home"></i>
                                <span id="home-link">HomePage</span>
                            </a>
                        </li>
                        <hr class="sidebar-divider my-0">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.dashboard')}}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                       
                        <div class="sidebar-heading">Meetings</div>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.meetings')}}">
                                <i class="fas fa-fw fa-cog"></i>
                                <span>Meetings</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-heading">Child Information</div>
                        
                       
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.create.student')}}">
                                <i class="fas fa-fw fa-cog"></i>
                                <span>Add Child</span>
                            </a>
                        </li>
                        @if(auth()->user()->students)
                          @foreach (auth()->user()->students as $student)
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('parent.student.profile',$student->student->id)}}">
                                        <i class="fas fa-fw fa-cog"></i>
                                        <span>{{ $student->student->name }} {{ $student->student->surname }}</span>
                                    </a>
                                </li>
                          @endforeach
                        @endif
                       <div class="sidebar-heading">Payments and invoices</div>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.invoices')}}">
                                <i class="fas fa-fw fa-cog"></i>
                                <span>Payments and invoices</span>
                            </a>
                        </li>
                        
                        <div class="sidebar-heading">Help Desk</div>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('help-desk')}}">
                                <i class="fas fa-fw fa-cog"></i>
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
                                <i class="fas fa-fw fa-cog"></i>
                                <span>Change Password</span>
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
    </script>
</body>

</html>
