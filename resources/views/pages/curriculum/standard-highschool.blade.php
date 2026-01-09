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

<div class="container-fluid" style="padding:20px;width:80%;margin:0 auto">
    <h1 class="text-center page-headings">Online High School Diploma Tracks: Graduate with Power and no Barriers</h1> <br>
    <h2 class="text-center font-weight-bold" style="margin-bottom:20px;">Three Paths – One High School Diploma: The World Is Your Classroom</h2>
    <p class="page-content">All paths include full access to every graduation track, rolling enrollment, 12-month schooling, cross-grade learning, and credit-transfer options. Students benefit from subject-specific AI mentors, human educator support, real-time performance tracking, and access to awards programs and parent services. Higher tiers add personal mentoring, college & career coaching, and extended family support – creating a complete learning experience that adapts to every life situation.</p>
    <h2 class="font-weight-bold text-center" style="margin:50px 0;">High School Tuition Options</h2>
    <hr>
    <div class="row text-center container mx-auto">
        @foreach($plans as $plan)
            <div class="col-md-4 p-4">
                <div class="shadow wrapper">
                    <div class="plan-name"><span class="font-weight-bold">{{ $plan->name }}</span> Package</div>
                    <div class="tuition">Tuition fee</div>
                    <div style="padding: 10px;">
                        <div class="price">${{ $plan->price_per_month() }}</div>
                        <div class="text-right per-year">per Month</div>
                        <div class="or">OR</div>
                        <div class="price">${{ $plan->price_per_year() }}</div>
                        <div class="text-right per-year">per Year</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        @foreach($feature_categories as $category)
            <div class="col-md-12 text-center">
                <h2 class="h3 text-left" style="margin-top:50px;margin-bottom:20px;">{{ $category->name }}</h2>
                <div class="row">
                    <div class="td-row col-md-3 feature font-weight-bold">Features</div>
                    <div class="td-row col-md-3 core font-weight-bold">Core</div>
                    <div class="td-row col-md-3 pro font-weight-bold">Pro</div>
                    <div class="td-row col-md-3 elite font-weight-bold">Elite</div>
                </div>
                @foreach ($category->features as $feature )
                    <div class="row">
                        <div class="td-row td-border col-md-3 text-left font-weight-bold"  @if($loop->last) style="border-bottom-left-radius:15px;" @endif> <a  style="color: #045397;" href="{{ route('single-feature',$feature->slug) }}">{{ $feature->feature }}</a>  </div>
                        <div class="td-row td-border col-md-3" @if($feature->core_tooltip) data-toggle="tooltip" data-placement="top" title="{!! $feature->core_tooltip !!}" style="cursor:pointer;color:#045397" @endif>{!! $feature->core() !!}</div>
                        <div class="td-row td-border col-md-3" @if($feature->pro_tooltip) data-toggle="tooltip" data-placement="top" title="{!! $feature->pro_tooltip !!}"  style="cursor:pointer;color:#045397" @endif>{!! $feature->pro() !!}</div>
                        <div class="td-row td-border col-md-3" @if($feature->elite_tooltip) data-toggle="tooltip" data-placement="top" title="{!! $feature->elite_tooltip !!}"  style="cursor:pointer;color:#045397" @endif @if($loop->last) style="border-bottom-right-radius:15px;" @endif>{!! $feature->elite() !!}</div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<div class="container-fluid bg-light p-3">
    <div class="container">
        <h2 class="font-weight-bold text-center">Lorem ipsum</h2>
        <p class="page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</p>
        <div class="text-center">
            <button class="btn blue-button btn-lg">Apply now</button>
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