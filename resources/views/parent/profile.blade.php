@extends('parent.dashboard')

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
    .profile-picture-field {
        margin-top: 20px;
    }
    .profile-picture-label {
        display: block;
        margin-top: 0;
        margin-bottom: 14px;
    }
    .profile-picture-preview {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #9ca3af;
        display: block;
        margin-bottom: 18px;
    }
</style>

@endsection
@section('content')
<div class="container wrapper ">
    <div>
        <h1 class="text-center h2 page-headings">Hello {{ auth()->user()->name }}, you can edit your profile details here.</h1>
        <form action="{{ route('parent.update-info') }}" method="POST" enctype="multipart/form-data" id="confirm-first" class="confirm-first">
            {{ csrf_field() }}

            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Personal Information</h3>
                <label for="">First Name*:</label>
                <input name="name" readonly required type="text" class="form-control" value="{{ auth()->user()->name }}">

                <label for="">Middle Name(optionals):</label>
                <input name="middlename" readonly required type="text" class="form-control" value="{{ auth()->user()->middlename }}">

                <label for="">Last Name:</label>
                <input name="email" readonly required type="text" class="form-control" value="{{ auth()->user()->surname }}">

                <div class="profile-picture-field">
                    <label for="avatar" class="profile-picture-label">Profile picture:</label>
                    @if(auth()->user()->avatar)
                        <img
                            src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}"
                            alt="Profile picture"
                            class="profile-picture-preview"
                        >
                    @endif
                    <div>
                        <input id="avatar" type="file" name="avatar">
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
