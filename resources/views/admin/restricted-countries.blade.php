@extends('admin_template')

@section('content')

<div class="shadow container mx-auto wrapper">    
    <h2 class="text-center">Add a restricted country</h2>
    <hr>
    <form action="{{ route('update-country') }}" method="POST" class="confirm-first">
        {{ csrf_field() }}
        <label for="" class="font-weight-bold mb-1">Country</label>
        <select name="country_id" id="" class="form-control">
            <option value="" selected disabled>--Select Country--</option>
            @foreach ($countries as $country )
                <option value="{{ $country->id }}">{{ $country->nicename }}</option>
            @endforeach
        </select>
        <div class="my-2 d-flex justify-content-center">
            <button class="btn btn-info">Add to list</button>
        </div>
    </form>
  
    <h2 class="text-center" style="margin-top:50px;">List of restricted countries</h2>
    <hr>
    <table class="table">
    <tr>
        <th>Country</th>
        <th class="text-right">Remove</th>
    </tr>
    @foreach($restricted_countries  as $country)
    <tr>
        <td>{{ $country->nicename }}</td>
        <td class="text-right">
            <form action="{{ route('update-country') }}" method="POST" class="confirm-first">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $country->id }}" name="country_id">
                <button class="btn btn-danger">Remove</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
</div>
@endsection