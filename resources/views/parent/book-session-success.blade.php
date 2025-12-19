@extends('parent.dashboard')

@section('content')
    <div class="mx-auto jumbotron bg-white">
        <div class="shadow text-center page-content" style="padding:20px;">
            <img src="{{ asset('images/success-icon.png') }}" alt="" style="width:33%;padding:10px;">
            <h1 class="font-weight-bold text-center" style="margin:20px 0;">Your Appointments Are Confirmed</h1>
            <p>You will receive all session details via email.</p>
            <hr>
            <a class="orange-button" href="{{ route('parent.meetings') }}" style="margin:20px 0;">Check your meetings</a>
        </div>
    </div>
@endsection