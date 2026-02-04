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
         text-align: left;
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
    .blue-box{
        padding:20px;
    }
</style>
@endsection

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
    <ol class="bg-white breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">High School Diploma Tracks</li>
    </ol>
</div>

<img src="{{ asset('images/cheerful-teenagers-classroom.png') }}" alt="">
<div class="container-fluid" style="padding:20px;width:70%;margin:0 auto">
        <div class="row text-center mx-auto">
            <div class="col-md-12">
                <h1 class="text-center page-headings">High School Diploma Tracks</h1> <br>
                <h2 class="text-center font-weight-bold" style="margin-bottom:20px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tortor augue, ullamcorper vel dui nec, posuere sodales est.</h2>
                <div class="page-content">
                    <p>Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iacul</p>
                </div>
            </div>
       
        <div class="col-md-12" style="margin:30px 0;">
            <p class="page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</p>
           
        </div>
        
    </div>
</div>

<div class="container-fluid page-content">
    <div class="row text-white" style="background: #045397;opacity:0.8;">
        <div class="col-md-2"></div>
        <div class="col-md-3" style="padding:30px;">
            <img src="{{ asset('images/glasses.png') }}" alt="">
        </div>
        <div class="col-md-5" style="padding:30px;">
            <h2>24-Credit-Graduation Standard Track</h2>
            <p>Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem </p>
        </div>
        <div class="col-md-2"></div>
    </div>
   <div class="row text-white" style="background:#045397;opacity:0.9">
    <div class="col-md-2"></div>
        <div class="col-md-5" style="padding:30px;">
            <h2>24-Credit-Graduation Honors Track</h2>
            <p>Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus </p>
        </div>
        <div class="col-md-3" style="padding:30px;">
            <img src="{{ asset('images/glasses.png') }}" alt="">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row text-white" style="background:#045397 ">
        <div class="col-md-2"></div>
        <div class="col-md-3" style="padding:30px;">
            <img src="{{ asset('images/glasses.png') }}" alt="">
        </div>
        <div class="col-md-5" style="padding:30px;">
            <h2>18-Credit-ACCEL Graduation Track</h2>
            <p>Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem </p>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<div class="mb-3">
    <x-three-buttons />
</div>


@endsection

@section('footerScripts')
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection