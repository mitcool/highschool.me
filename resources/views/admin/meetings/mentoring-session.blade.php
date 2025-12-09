@extends('admin_template')

@section('content')


<div class="jumbotron container shadow bg-white h-100">
    <h2 class="text-center" style="color:#045397;margin:30px 0">Mentoring Session for Students</h2>
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Link</th>
        </tr>
        @foreach ($mentoring_sessions as $session )
        <tr>
            <th>{{ $session->date->format('d.m.Y') }}</th>
            <th>{{ $session->start->format('H:i') }}</th>
            <th>{{ $session->end->format('H:i') }}</th>
            <th>{{ $session->link }}</th>
        </tr>
        @endforeach
    </table>
    <div class="text-right mt-5">
        <a href="{{ route('add-mentoring-session') }}" class="orange-button">Add Meeting</a>
    </div>
</div>
@endsection