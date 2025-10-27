@extends('template')

@section('headCSS')
<style>
    .plan{
        padding:20px;
    }
   
</style>
@endsection
@section('content')

<div class="container" style="padding:20px;">
    <h1 class="text-center">Our plans</h1> <br>
    <div class="row" style="min-height: 50vh">
        @foreach ($plans as $plan )
            <div class="col-md-4">
                <div class="shadow bg-light plan">
                    <h2 class="text-center" style="color:#045397">{{ $plan->name }}</h2>
                    <ul class="list-group bg-light text-center p-0">
                        @foreach($plan->features as $feature)
                            <li class="list-group-item border-0 bg-light">  {{ $feature->featureObject->feature }}</li>   
                        @endforeach
                        <br>
                        <button class="w-50 mx-auto btn btn-warning font-weight-bold">Start now</button>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
