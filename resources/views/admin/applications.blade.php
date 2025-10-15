@extends('admin_template')

@section('content')

<div class="container shadow" style="padding:20px;">
    <h1 class="text-center">List of applications</h1>
    <div class="row border p-3 my-2">
        <div class="col-md-3">NAME</div>
        <div class="col-md-3">EMAIL</div>
        <div class="col-md-3">PROGRAM</div>
        <div class="col-md-3">
           
        </div>
    </div>
    @foreach ($applications as $application)
        <div class="row border p-3 my-2">
            <div class="col-md-3">{{ $application->name }}</div>
            <div class="col-md-3">{{ $application->mail }}</div>
            <div class="col-md-3">{{ $application->program->translated->name }}</div>
            <div class="col-md-3 text-right">
                <a href="{{ route('application',$application->id) }}">Details</a>
            </div>
        </div>
    @endforeach
</div>
@endsection