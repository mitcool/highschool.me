@extends('parent.dashboard')

@section('css')

<style>
    form label{
        margin-bottom: 0;
        font-weight: bold;
    }
</style>

@endsection
@section('content')
<div class="container jumbotron bg-white">
    <div class="shadow" style="padding:20px;">
        <h1 class="h3 text-center">Hello {{ auth()->user()->name }} You can edit your profile details here.</h1>
        <form action="{{ route('parent.update-info') }}" method="POST">
            {{ csrf_field() }}
            <div>
                <label for="">Email:</label>
                <input name="email" required type="text" class="form-control" value="{{ auth()->user()->email }}">
            </div>
              <div>
                <label for="">Country:</label>
                <select name="country_id" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->city : '' }}">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($countries as $country )
                        <option value="{{ $country->id }}" {{ auth()->user()->invoice_details ? auth()->user()->invoice_details->country_id == $country->id ?' selected ' : '' : '' }}>{{ $country->nicename }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">City:</label>
                <input name="city" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->city : '' }}">
            </div>
            <div>
                <label for="">Street:</label>
                <input name="street" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->street : '' }}">
            </div>
            <div>
                <label for="">Street number:</label>
                <input name="street_number" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->street_number : '' }}">
            </div>
             <div>
                <label for="">Zip code:</label>
                <input name="zip" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->zip : '' }}">
            </div>
           
            <div class="text-center">
                <hr>
                <button class="btn btn-info">Update info</button>
            </div>
        </form>
    </div>
</div>
@endsection