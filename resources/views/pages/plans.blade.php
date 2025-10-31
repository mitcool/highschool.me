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
    
</style>
@endsection
@section('content')

<div class="container-fluid" style="padding:20px;width:80%;margin:0 auto">
    <h1 class="text-center page-headings">Pick the perfect plan for you</h1> <br>
    <p class="page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</p>
    <div class="row" style="min-height: 50vh">
        @foreach($feature_categories as $category)
            <div class="col-md-12 text-center">
                <h2 class="h3" style="margin-top:50px;margin-bottom:20px;">{{ $category->name }}</h2>
                <div class="row">
                    <div class="td-row col-md-3 feature font-weight-bold">Features</div>
                    <div class="td-row col-md-3 core font-weight-bold">Core</div>
                    <div class="td-row col-md-3 pro font-weight-bold">Pro</div>
                    <div class="td-row col-md-3 elite font-weight-bold">Elite</div>
                </div>
                @foreach ($category->features as $feature )
                    <div class="row">
                        <div class="td-row td-border col-md-3 text-left font-weight-bold"  @if($loop->last) style="border-bottom-left-radius:15px;" @endif>{{ $feature->feature }}</div>
                        <div class="td-row td-border col-md-3" @if($feature->core_tooltip) data-toggle="tooltip" data-placement="top" title="{!! $feature->core_tooltip !!}" style="cursor:pointer" @endif>{!! $feature->core() !!}</div>
                        <div class="td-row td-border col-md-3" @if($feature->pro_tooltip) data-toggle="tooltip" data-placement="top" title="{!! $feature->pro_tooltip !!}"  style="cursor:pointer" @endif>{!! $feature->pro() !!}</div>
                        <div class="td-row td-border col-md-3" @if($feature->elite_tooltip) data-toggle="tooltip" data-placement="top" title="{!! $feature->elite_tooltip !!}"  style="cursor:pointer" @endif @if($loop->last) style="border-bottom-right-radius:15px;" @endif>{!! $feature->elite() !!}</div>
                    </div>
                @endforeach
            </div>
        @endforeach
    
    </div>
    <p class="page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</p>
    <div class="text-center"><button>Apply now</button></div>
</div>

@endsection

@section('footerScripts')
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection