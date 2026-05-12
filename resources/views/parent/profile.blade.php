@extends('parent.dashboard')

@section('css')

<style>
    form label{
        margin-bottom: 0;
        font-weight: bold;
        margin-top:10px;
    }   
</style>

@endsection
@section('content')
<div class="container wrapper shadow">
    <div class="" style="padding:20px;">
        <h1 style="color:#045397" class="h2 text-center">Hello {{ auth()->user()->name }} You can edit your profile details here.</h1>
        <form action="{{ route('parent.update-info') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <label for="">Name:</label>
                <input name="text" readonly  type="text" class="form-control" value="{{ auth()->user()->fullname() }}">
            </div>
            <div>
                <label for="">Email:</label>
                <input name="email" required type="text" class="form-control" value="{{ auth()->user()->email }}">
            </div>
              <div>
                <label for="">Country:</label>
                <select name="country_id" required type="text" class="form-control">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($countries as $country )
                        <option value="{{ $country->id }}" 
                            @if(auth()->user()->invoice_details)
                                {{  auth()->user()->invoice_details->country_id == $country->id ?' selected ' : ''  }}
                            @else
                                {{  old('country_id') == $country->id ? ' selected ' : '' }}   
                            @endif
                        >
                            {{ $country->nicename }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">City:</label>
                <input name="city" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->city : old('city') }}">
            </div>
            <div>
                <label for="">Street:</label>
                <input name="street" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->street : old('street') }}">
            </div>
            <div>
                <label for="">Street number:</label>
                <input name="street_number" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->street_number : old('street_number') }}">
            </div>
             <div>
                <label for="">Zip code:</label>
                <input name="zip" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->zip : old('zip') }}">
            </div>
             <div>
                <label for="" class="d-block">Phone number:</label>
                <div class="row">
                    <div class="col-md-3">
                        <select name="phone_code" id="" class="form-control">
                            <option value="" selected disabled>Please select a phone code</option>
                            @foreach ($countries as $country )
                                <option
                                    @if(auth()->user()->invoice_details)
                                        {{ '+'.$country->phonecode == auth()->user()->invoice_details->phone_code ? ' selected ' : ''}}
                                    @else
                                        {{ '+'.$country->phonecode == old('phone_code') ? ' selected ' : ''}}
                                    @endif
                                    value="+{{ $country->phonecode }}">{{ $country->nicename }} +{{ $country->phonecode }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-9">
                        <input name="phone" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->phone : old('phone') }}">
                    </div>
                </div>
            </div>
            <div class="d-flex mt-4 ">
                 @if(auth()->user()->avatar)
                    <img src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}" alt="" style="width:40px;height:40px;margin-right:20px;">
                 @endif
                 <div>
                    <label for="" class="d-block">Profile picture:</label>
                    <input type="file" name="avatar">
                 </div>
            </div>
           
            <div class="text-center">
                <hr>
                <button class="btn btn-info">Update info</button>
            </div>
        </form>
    </div>
</div>
@endsection