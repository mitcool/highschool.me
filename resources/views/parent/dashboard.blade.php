<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <style type="text/css">
        html,body{
            overflow-x: hidden;
        }
      body,
html {
    overflow-x: hidden;
}

body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
}

textarea.form-control:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus {
    border-color: lightgrey;
    box-shadow: none;
    outline: 0 none;
}

.cke_notifications_area{
    display: none;
}
.page-content li {
    list-style: none;
    padding: 10px 30px;
    background-image: url("/public/images/orange-checkmark.webp");
    background-repeat: no-repeat;
    background-position: left center;
    background-size: 30px;
}

.accordion-element {
    background-color: #ffffff;
}

.accordion-header {
    margin: 10px;
    padding: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-family: "Poppins", sans-serif;
}
.accordion-header h4 {
    color: #3b3b3b;
}
.accordion-body {
    display: none;
}
#slogan {
    position: absolute;
    top: 50px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    text-align: center;
    font-size: 2.3rem;
    text-shadow: 0px 3px 6px #000000;
    font-weight: bold;
    width: 100%;
}

#main_image_mobile {
    display: none;
}

#main-search {
    position: absolute;
    bottom: 80px;
    left: 80px;
    width: 40%;
}

#settings_modal {
    overflow: auto;
}
#cookie_modal .modal-content,
#settings_modal .modal-content {
    margin: 0 auto;
    top: 100px;
    border-radius: 10px;
    border: none;
    padding: 8px 20px;
}
#cookie_modal .modal-body,
#settings_modal .modal-body {
    border: none;
}
#cookie_modal .modal-body div,
#settings_modal .modal-body div {
    margin: 0 auto;
    color: black;
}
#cookie_modal .modal-footer,
#settings_modal .modal-footer {
    border: none;
    justify-content: initial;
    margin: 0 auto;
}
#accept_cookies_btn,
#cookie_settings_btn,
#back_btn,
#accept_all_btn,
#save_settings_btn {
    width: 11.25em;
    cursor: pointer;
    font: Bold 16px Arial;
    border-radius: 10px;
}
#accept_cookies_btn,
#accept_all_btn {
    background-color: #00c219;
    color: #fff;
    border: none;
}
#cookie_settings_btn,
#back_btn {
    background-color: #fff;
    color: #b1b1b1;
    border: 1px solid #b1b1b1;
}
#save_settings_btn {
    background-color: #ffb300;
    color: #fff;
    border: none;
}
#settings_modal .col-md-4 {
    padding: 0px;
    max-width: 30%;
}
#settings_modal .wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.settings-descr {
    font-size: 0.8rem;
}
/* switcher styles */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 28px;
}
.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: 0.4s;
}

input:checked + .slider {
    background-color: #00c219;
}
input:focus + .slider {
    box-shadow: 0 0 1px #00c219;
}
input:checked + .slider:before {
    transform: translateX(26px);
}
.slider.round {
    border-radius: 34px;
}
.slider.round:before {
    border-radius: 50%;
}

.ohnohoney {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    height: 0;
    width: 0;
    z-index: -1;
}

.dropdown-submenu {
    position: relative;
    background: #e5f3ff;
}

.dropdown-submenu a::after {
    transform: rotate(-90deg);
    position: absolute;
    right: 6px;
    top: 0.8em;
}
.dropdown-menu {
    background: #f2f9ff !important;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-left: 0.1rem;
    margin-right: 0.1rem;
    background: #f2f9ff;
}
.dropdown:hover .dropdown-menu {
    display: block;
}
.dropdown:hover .dropdown-hide {
    display: none;
}
.dropdown-submenu:hover .dropdown-hide {
    display: block;
}

.header-link {
    color: black !important;
}
.header-link:after {
    border: none !important;
}
#footer {
    padding: 20px;
    background: #f2f9ff;
    margin-top: 50px;
}
.footer-ul {
    list-style: none;
    padding: 0;
}
.footer-ul a {
    color: black !important;
}
.footer-ul a:hover {
    text-decoration: none;
}
.footer-ul li {
    margin: 8px 0 !important;
    cursor: pointer;
    transition: 0.3s;
    font-size: 0.8rem !important;
}
.footer-ul li:hover {
    color: #ee6123;
}
.section {
    margin: 50px 0;
}
.section-headings {
    text-align: center;
    font-family: "Poppins", bold;
    letter-spacing: 0px;
    color: #000000;
    opacity: 1;
    font-size: 2.2rem !important;
    font-weight: bold !important;
    /* margin: 50px 0; */
    margin-top: 50px;
}
.page-headings {
    text-align: center;
    font-family: "Poppins", bold;
    letter-spacing: 0px;
    color: #000000;
    opacity: 1;
    font-size: 2.2rem !important;
    font-weight: bold !important;
}
.section-wrapper {
    padding: 20px;
}
.orange-button {
    background: #ee6123;
    color: white !important;
}
.orange-button:hover {
    background: #ee6123;
    color: white;
    opacity: 0.9;
}
.go_to_button_link:hover {
    text-decoration: none;
    color: white;
}
.news-image {
    width: 100%;
}
.news-container {
    padding: 30px;
    box-shadow: 0px 3px 6px #0000001a;
}
s .padding-30 {
    padding: 30px;
}
.read-more {
    background-color: #025297;
    color: white;
    font-weight: bold;
    padding: 6px 10px;
}
.read-more:hover {
    color: white;
    text-decoration: none;
}
.news-link {
    color: black;
    transition: 0.5s;
}
.news-link:hover {
    color: grey;
    text-decoration: none;
}
.carousel-indicators li {
    width: 15px !important;
    height: 15px !important;
    border-radius: 100%;
    background-color: rgba(255, 255, 255, 0.5);
}
.main-pictures-pages {
    width: 100%;
    height: 400px;
    object-fit: cover;
}
.page-content {
    font-size: 20px;
}
.logoMainPage {
    width: 70%;
}

a {
    text-decoration: none;
    color: #232323;

    transition: color 0.3s ease;
}

a:hover {
    color: tomato;
    
}
.nav-link{
    opacity: 0.8;
}
.nav-link:hover{
   opacity: 1;
   color: tomato !important;
}

#menuToggle {
    display: block;
    position: absolute;
    top: 17px;
    right: 35px;

    z-index: 1;

    -webkit-user-select: none;
    user-select: none;
}

#menuToggle input {
    display: block;
    width: 40px;
    height: 32px;
    position: absolute;
    top: -7px;
    left: -5px;

    cursor: pointer;

    opacity: 0; /* hide this */
    z-index: 2; /* and place it over the hamburger */

    -webkit-touch-callout: none;
}
/*.form-control.is-invalid{
    color:rgb(156, 13, 13);
}*/
.validation-error {
    font-size: 12px;
    color: rgb(156, 13, 13);
}
.benefit-images {
    padding: 30px;
    width: 50%;
}
.benefit-box {
    width: 50%;
    padding: 20px;
}
/*
  * Just a quick hamburger
  */
#menuToggle span {
    display: block;
    width: 33px;
    height: 4px;
    margin-bottom: 5px;
    position: relative;

    background: #025297;
    border-radius: 3px;

    z-index: 1;

    transform-origin: 4px 0px;

    transition: transform 0.5s cubic-bezier(0.77, 0.2, 0.05, 1),
        background 0.5s cubic-bezier(0.77, 0.2, 0.05, 1), opacity 0.55s ease;
}

#menuToggle span:first-child {
    transform-origin: 0% 0%;
}

#menuToggle span:nth-last-child(2) {
    transform-origin: 0% 100%;
}

/* 
  * Transform all the slices of hamburger
  * into a crossmark.
  */
#menuToggle input:checked ~ span {
    opacity: 1;
    transform: rotate(45deg) translate(-2px, -1px);
    background: #025297;
}

/*
  * But let's hide the middle one.
  */
#menuToggle input:checked ~ span:nth-last-child(3) {
    opacity: 0;
    transform: rotate(0deg) scale(0.2, 0.2);
}

/*
  * Ohyeah and the last one should go the other direction
  */
#menuToggle input:checked ~ span:nth-last-child(2) {
    opacity: 1;
    transform: rotate(-45deg) translate(0, -1px);
}

/*
  * Make this absolute positioned
  * at the top left of the screen
  */
#menu {
    position: absolute;
    width: 325px;
    margin: -100px 0 0 0;
    padding: 50px;
    padding-top: 125px;
    right: -100px;
    box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2),
        0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
    background: #e5f3ff;
    list-style-type: none;
    -webkit-font-smoothing: antialiased;
    /* to stop flickering of text in safari */
    margin-right: 50px;
    transform-origin: 0% 0%;
    transform: translate(100%, 0);

    transition: transform 0.5s cubic-bezier(0.77, 0.2, 0.05, 1);
}

#menu li {
    padding: 10px 0;
    font-size: 22px;
}

/*
  * And let's fade it in from the left
  */
#menuToggle input:checked ~ ul {
    transform: none;
    opacity: 1;
}
.requestInformationMainPage {
    font-size: 0.8rem !important;
}
.recognition-icons {
    height: 50px;
    padding-left: 10px;
}
.card-body {
    text-align: justify;
    text-justify: inter-word;
}
.paragraphs-style {
    font-size: 1.25rem !important;
}

.sidenav a {
    padding: 8px 8px 8px 20px;
    text-decoration: none;
    color: #111;
    display: block;
    transition: 0.3s;
    border-bottom: 1px solid #000;
    font-weight: 600;
}
.hamburger_under {
    padding: 0;
    background-color: white;
    padding: 0 !important;
}
.hamburger_under_program {
    padding: 0;
    background-color: rgb(225, 225, 225) !important;
}
#main-search p {
    color: white;
    font-weight: bold;
    font-size: 1.3rem;
    text-shadow: 0px 3px 6px #000000;
}
.news-box,
.testimonial-box,
.partner-box {
    width: 25%;
}
.single-programs-style {
    padding: 50px;
}
.icons-holder-single-programs {
    width: 33.33%;
    display: flex;
}
.accreditation-certificate {
    width: 60%;
}
.logoFooter {
    width: 70%;
}
.student_advisory_page {
    padding-top: 20px;
    width: auto;
}
.video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    height: 0;
}
.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.container-style {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    padding: 30px;
}
.apply-now-btn,
.learn_more_btn {
    display: block;
    padding: 10px 17px;
    text-decoration: none;
    cursor: pointer;
    border-radius: 0.25rem;
    outline: none;
    margin: 5px 0;
}
.apply-now-btn,
.apply-now-btn:hover {
    border: 3px solid #ee6123;
    color: white;
    background-color: #ee6123;
}
.learn_more_btn {
    text-decoration: none;
    border: 3px solid #ee6123;
    color: #ee6123;
    background-color: white;
}

.bold_opt {
    font-weight: 700;
}

.no-marg {
    margin-left: 0px !important;
    margin-right: 0px !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

.link-to-program {
    text-decoration: none;
    color: black;
}

.link-to-program:hover {
    color: black;
    cursor: pointer;
}

.arrow {
    justify-content: center;
    align-items: center;
    line-height: 50px;
}

.cont-btn-mobile {
    background: #42708b;
    color: #fff;
    padding: 10px 17px;
    text-decoration: none;
    cursor: pointer;
    border-radius: 0.25rem;
    outline: none;
    border: none;
    margin: 5px 0;
}

.cont-btn-mobile a {
    text-decoration: none;
    color: #fff;
}

.cont-btn-mobile a:hover {
    text-decoration: none;
    color: #fff;
}
.link-to-program {
    font-size: 1.1rem;
}
.link-to-program:hover {
    text-decoration: none;
}
.padding-20 {
    padding: 20px;
}
.image-accreditation {
    justify-content: none;
}

/*Responsive styles*/
/*mobile style*/
@media screen and (max-width: 1000px) {
    .image-accreditation {
        justify-content: center !important;
    }
    #slogan {
        top: 50px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        text-align: center;
        font-size: 1.8rem;
        text-shadow: 0px 3px 6px #000000;
        font-weight: bold;
        width: 100%;
    }
    #main-search {
        bottom: 20px;
        left: 0;
        right: 10px;
        width: 100%;
        padding: 20px;
    }
    #main-search p {
        font-size: 1.1rem;
    }
    #main-search select {
        width: 100%;
    }
    #benefit_wrapper {
        flex-direction: column;
    }
    .news-box,
    .testimonial-box,
    .partner-box {
        width: 100%;
    }
}
@media screen and (max-width: 300px) {
    #contact_btn_header {
        display: none !important;
    }
}

@media screen and (max-width: 450px) {
    #slider_mobile {
        display: block !important;
    }
    #slider {
        display: none;
    }
    .logoFooter {
        width: 50%;
    }
}
@media only screen and (max-width: 768px) {
    #first {
        order: 2;
    }
    #second {
        order: 4;
    }
    #third {
        order: 1;
    }
    #fourth {
        order: 3;
    }

    .main-image {
        display: none;
    }

    .img-for-info {
        text-align: center;
    }

    .info-for-program {
        text-align: center;
        margin-bottom: 2rem;
    }

    .cont-btn-mobile {
        display: block;
    }

    .prev-mobile {
        text-align: center;
        margin-bottom: 3rem;
    }
    #menu {
        transform: none;
        opacity: 0;

        transition: opacity 0.5s cubic-bezier(0.77, 0.2, 0.05, 1);
    }
    .benefit-images {
        padding: 20px;
        width: 30%;
    }
    .benefit-box {
        width: 100%;
        padding: 0px;
    }
    .accordion-body .card-body {
        padding: 20px;
    }
    #partner_box,
    #testimonial_box,
    #news_box {
        flex-direction: column;
    }
    .next-mobile {
        text-align: center;
    }
    #main_image {
        display: none;
    }
    #main_image_mobile {
        display: block;
    }
    .main-pictures-pages {
        width: 100%;
        height: 170px !important;
    }
    .section-headings {
        font-size: 2rem !important;
    }
    .section-headings-pages {
        font-size: 2rem !important;
    }
    .page-content {
        font-size: 16px;
    }
    .logoMainPage {
        width: 140%;
    }
    .single-programs-style {
        padding: 10px;
    }
    .icons-holder-single-programs {
        display: table;
    }

    .recognition-icons {
        height: 100px;
        padding-left: 10px;
    }
    .accreditation-certificate {
        width: 100%;
    }
    .student_advisory_page {
        padding-top: 10px;
        width: 23rem !important;
    }
    .img-for-info {
        text-align: right;
    }

    .cont-btn-mobile {
        display: none;
    }
    
}
@media (min-width: 450px) and (max-width: 550px) {
    .logoFooter {
        width: 60%;
    }
}
@media (min-width: 550px) and (max-width: 600px) {
    .logoMainPage {
        width: 110%;
    }
    .logoFooter {
        width: 40%;
    }
}
@media (min-width: 600px) and (max-width: 768px) {
    .logoMainPage {
        width: 90%;
    }
    .logoFooter {
        width: 40%;
    }
}
@media (min-width: 768px) and (max-width: 1200px) {
    .logoMainPage {
        width: 140%;
    }
    .logoFooter {
        width: 30%;
        padding-bottom: 20px;
    }
    .benefit-images {
        padding: 20px;
        width: 50%;
    }
    #slogan {
        line-height: 0.8;
    }
    .icons-holder-single-programs {
        width: 100%;
        margin: 8px;
    }
}
@media (min-width: 990px) and (max-width: 1350px) {
    .benefit-images {
        padding: 20px;
        width: 100%;
    }
}
@media (min-width: 990px) and (max-width: 1100px) {
    .logoFooter {
        width: 100%;
    }
    #menuToggle {
        right: -140px;
    }
}
@media only screen and (min-width: 1100px) {
    .logoFooter {
        width: 100%;
    }
}
@media only screen and (min-width: 1300px) {
    .logoFooter {
        width: 70%;
    }
}
@media (min-width: 1100px) and (max-width: 1200px) {
    #menuToggle {
        right: -170px;
    }
}
@media (min-width: 1200px) and (max-width: 1392px) {
    #menuToggle {
        right: -180px;
    }
    .icons-holder-single-programs {
        width: 100%;
        margin: 12px;
    }
}


        .green-button{
            color:white;
            background: #00B74A;
            border:none;
            border-radius:5px;
            padding:8px 20px;
        }

        .alert-fixed {
            position: fixed !important;
            width: 50%;
            right: 0;
            left: 0;
            margin: auto;
            top: 40px;
            transform: translate3d(0, -50%, 0);
            text-align: center;
            z-index: 9999;
        }
        #requests{
            cursor: pointer;
        }
        .requests{
            display: none;
            padding-left:10px;
        }
    </style>
    <link href="{{asset('css/admin/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/fontawesome-free-5.5.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    @yield('css')

</head>

<body id="page-top">
    
    <div class="container-fluid px-0">
        <div class="row">
           
                <div id="wrapper">
                    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="min-height:1500vh;padding:10px;background: linear-gradient(115deg, #62cff4, #2c67f2)
">
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
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.create.student')}}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Create student</span>
                            </a>
                        </li>
                        <hr class="sidebar-divider">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.meetings')}}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>My meetings</span>
                            </a>
                        </li>
                        <hr class="sidebar-divider">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('parent.create.student')}}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>My payments</span>
                            </a>
                        </li>
                       
                        <hr class="sidebar-divider">
                        
                        <li class="nav-item">
                            <hr>
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

    @yield('scripts')

    <script type="text/javascript">
        
       $('#requests').on('click', function(){
           if($('.requests').css('display') == 'block'){
             $('.requests').css('display', 'none');
           }
           else{
             $('.requests').css('display', 'block');
           }
           
       })
       
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
