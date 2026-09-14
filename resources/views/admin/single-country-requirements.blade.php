@extends('admin_template')

@section('css')
<style>
    form label{
        font-weight: bold;
        margin-bottom: 0;
        margin-top:10px;
    }
    form input[type=checkbox]{
        width:20px;
        height: 20px;
    }
</style>
@endsection
@section('content')

<div class="shadow container wrapper">
    
    <h2 class="text-center font-weight-bold h2" style="margin-top:40px;"><img style="height: 30px;width:50px;" src="{{ asset('images/flags') }}/{{ $country->flag }}" alt="" class="border">
        {{ $country->nicename }} - Country Requirements  </h2>

    <form action="{{ route('add-country-languages') }}" class="row" method="POST">
        {{ csrf_field() }}
        
        <div class="col-md-12">
            <label for="cover">Cover</label>
            <input id="cover" name="cover" type="file" class="form-control">
        </div>
        <div class="col-md-12">
            <label for="required-documents">Select Languges <span class="text-danger">*(English Language is add by default)</span></label>
            <div class="row">
                @foreach ($all_countries as $c)
                    <div class="col-md-3 my-2 d-flex">
                        <input {{ in_array($c->id,$country_languages_array) ? ' checked ' : '' }} name="language_ids[]" class="m-0" type="checkbox" value="{{ $c->id }}">&nbsp;<span>{{ $c->nicename }}</span> 
                    </div>
                @endforeach
            </div>
             <div class="text-center">
                <input type="hidden" name="country_id" value="{{ $country->id }}">
                <button class="btn btn-info">Save Changes</button>
             </div>
        </div>
    </form>
</div>
@endsection
