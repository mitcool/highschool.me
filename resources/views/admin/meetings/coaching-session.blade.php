@extends('admin_template')

@section('content')


<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Coaching Session for Students</h2>
    <table class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Link</th>
        </tr>
        @foreach ($coaching_sessions as $session )
        <tr>
            <th>{{ $session->date->format('d.m.Y') }}</th>
            <th>{{ $session->start->format('H:i') }}</th>
            <th>{{ $session->end->format('H:i') }}</th>
            <th>{{ $session->link }}</th>
        </tr>
        @endforeach
    </table>
    <div class="text-right mt-5">
        <a href="{{ route('add-coaching-session') }}" class="orange-button">Add Coaching Session</a>
    </div>
</div>
@endsection