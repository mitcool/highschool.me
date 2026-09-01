@extends('admin_template')

@section('content')

<div class="shadow container wrapper">
    <h2 class="text-center font-weight-bold h2" style="margin-top:40px;">List of countries</h2>
    <div class="row">
        @foreach ($countries as $country)
            <div class="col-md-4 my-2">
                <a href="{{ route('admin.single-country-requirements',$country->slug) }}">
                    <div class="border p-2">
                        <img style="height: 30px;width:50px;" src="{{ asset('images/flags') }}/{{ $country->flag }}" alt="" > {{ $country->nicename }}
                    </div>
                </a>
            </div>   
        @endforeach
    </div>
    
</div>

@endsection