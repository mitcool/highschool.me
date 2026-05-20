@extends('educator.dashboard')

@section('css')

<style>
    form label{
        margin-bottom: 0;
        font-weight: bold;
        margin-top:10px;
    }  
    .shadow.section{
        padding:20px;
        margin-top:10px;
    }
</style>

@endsection
@section('content')
<div class="container wrapper ">
    <div>
        <h1 style="color:#045397" class="h2 text-center">Hello {{ auth()->user()->name }}, you can edit your profile details here.</h1>
        <form action="{{ route('parent.update-info') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Personal Information</h3>
                <label for="">First Name*:</label>
                <input name="name" readonly required type="text" class="form-control" value="{{ auth()->user()->name }}">

                <label for="">Middle Name(optionals):</label>
                <input name="middlename" readonly required type="text" class="form-control" value="{{ auth()->user()->middlename }}">

                <label for="">Last Name:</label>
                <input name="email" readonly required type="text" class="form-control" value="{{ auth()->user()->surname }}">

                 <div class="d-flex mt-4 ">
                @if(auth()->user()->avatar)
                    <img src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}" alt="" style="width:40px;height:40px;margin-right:20px;">
                @endif
                <div>
                    <label for="" class="d-block">Profile picture:</label>
                    <input type="file" name="avatar">
                </div>
                </div>
            </div>
            <div class="shadow section" >
                 <h3 class="font-weight-bold text-center">Contact Information</h3>
            
                <label for="">Email:</label>
                <input name="email" required type="text" class="form-control" value="{{ auth()->user()->email }}">

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
            </div>
              <div class="shadow section" >
                 <h3 class="font-weight-bold text-center">Address Information</h3>
               
                <label for="">Address Line 1*:</label>
                <input name="address" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->address : old('address') }}">
            
            <div>
                <label for="">Address Line 2(optional):</label>
                <input name="address_two"  type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->address_two : old('address_two') }}">
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Zip code:</label>
                    <input name="zip" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->zip : old('zip') }}">
                </div>
                <div class="col-md-9">
                    <label for="">City:</label>
                    <input name="city" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->city : old('city') }}">
                </div>
            </div>
            <div>
                <label for="">State / Province / Region (optional):</label>
                <input name="state" type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->state : old('state') }}">
            </div>
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
           
            <div class="text-center">
                <button class="btn btn-large btn-info">Update info</button>
            </div>
        </form>
    </div>
</div>
@endsection