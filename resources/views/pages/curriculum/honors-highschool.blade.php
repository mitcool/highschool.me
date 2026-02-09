@extends('template')

@section('headCSS')
<style>
    .feature{
        background-color:#045397;
        color: white;
        border-top-left-radius: 15px;
    }
    .core{
        background-color:#f08a54;
        color: white; 
    }
    .pro{
        background-color:#ec7130; 
        color: white;
    }
    .elite{
        background-color:#E9580C; 
        color: white;
         border-top-right-radius: 15px;
    }
    .td-row{
        padding:10px;
        border:1px solid #f08a54;
        font-size: 0.9rem;
    }
    .td-row.feature{
        border:none;
    }
    .plan-name{
        color:white;
        border-top-left-radius:10px;
         border-top-right-radius: 10px;
         padding:10px;
         font-size: 1.5rem;
    }
    .plan-name:nth-of-type(1){
        background-color:#f08a54;
    }
    .plan-name:nth-of-type(2){
        background-color:#ec7130;
    }
    .plan-name:nth-of-type(3){
        background-color:#E9580C;
    }
    .course-name{
         background: #045397;
         color:white;
         border-top-left-radius:10px;
         border-top-right-radius: 10px;
         padding:10px;
         font-size: 1.5rem;
         min-height: 100px;
         display: flex;
         justify-content: center;
         align-items: center;
         opacity: 0.7;
    }
    .tuition{
        background-color:#DCEFFF;
        color:#000000;
        padding:10px;
        font-size: 1.2rem;
        text-transform: uppercase;
        font-weight: bold;
    }
    .price{
        font-size:1.5rem;
        text-align: right;
        font-weight: 600;
    }
    .wrapper{
        margin:10px;
        border-radius: 10px;
    }
    .or{
        text-align: right;
        color:#E9580C;
        font-size: 1.1rem;
        font-weight: bold;
    }
    .or::before{
        border-top: 2px solid #E9580C;
        display: block;
        position: relative;
        top: 15px;   
        width: 88%;
        content: "";
    }
    .per-year{
        font-size:1.1rem;
    }
    .description{
        color:#737373;
        text-align: justify;
        padding:20px;
    }
    .description ul li{
        list-style: none;
        padding: 10px 30px;
        background-image: url("/images/orange-checkmark.webp");
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 30px;
        text-align: initial;
    }
    .blue-button{
        background-color: #045397;
        color: white;
    }
</style>
@endsection
@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
    <ol class="bg-white breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Module & Honors Courses</li>
    </ol>
</div>

<img src="{{ asset('images/module-courses.png') }}" alt="">
<div class="container-fluid" style="padding:20px;width:80%;margin:0 auto">
    <h1 class="text-center page-headings">Module & Honors Courses</h1> <br>
    <h2 class="text-center font-weight-bold" style="margin-bottom:20px;">Lorem Ipsum</h2>
    <p class="page-content">All paths include full access to every graduation track, rolling enrollment, 12-month schooling, cross-grade learning, and credit-transfer options. Students benefit from subject-specific AI mentors, human educator support, real-time performance tracking, and access to awards programs and parent services. Higher tiers add personal mentoring, college & career coaching, and extended family support – creating a complete learning experience that adapts to every life situation.</p>
    <hr>
   
   
    
</div>
<div class="container-fluid pl-0 pr-0">
    <div class="row text-center w-85  mx-auto container">
        @foreach ($courses as  $course)
            <div class="col-md-6 pb-5">
                <div class="shadow wrapper h-100">
                    <div class="course-name text-center"> {{ $course->name }}</div>
                    <div class="description">{!! $course->description!!}</div>
                    <div class="text-center tuition">Course fee</div>
                    <div style="padding: 20px;text-align:center;">
                        <div class="price text-center">${{ $course->price() }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container-fluid px-0" style="margin-top:20px;padding:20px 0;background-color:#F1F1F1;">
        <p class="page-content container">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</p>
        <div class="text-center">
            <x-three-buttons/>
        </div>
    </div>
    
</div>

@endsection

@section('footerScripts')
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection