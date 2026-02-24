@extends('parent.dashboard')

@section('content')
    <div class="container wrapper h-100 shadow">
        <div class=" text-center page-content" style="padding:20px;">
            <img src="{{ asset('images/success-icon.png') }}" alt="" style="width:33%;padding:10px;">
            <h1 class="font-weight-bold text-center" style="margin:20px 0;">Payment Successful</h1>
            <p>Your booking has been confirmed. You can now select from the available time slots provided by our team.</p>
            <hr>
            <a class="orange-button" href="{{ route('parent.meetings') }}" style="margin:20px 0;">Select Your Time Slots</a>
        </div>
    </div>
@endsection