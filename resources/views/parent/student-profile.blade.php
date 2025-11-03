@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    @if($status == 1)
        <h1 class="text-center">Status</h1>
        <hr>
        <div class="text-center">
            <a class="orange-button" href="{{ route('enrollment-fee',$student->id) }}">Pay enrollment fee</a>
        </div>
    @else
        <h1 class="text-center">Your profile is active</h1>
    @endif
</div>
@endsection