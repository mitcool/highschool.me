@extends('admin_template')

@section('content')


<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center page-headings">Group Session for Students</h2>
    <table class="table">
        @if(count($group_sessions) > 0)
        <tr>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Educator</th>
            <th>Link</th>
        </tr>
        @else
        <tr>
            <th colspan="4" class="text-center">No group sessions yet</th>
        </tr>
        @endif
        @foreach ($group_sessions as $session )
        <tr>
            <th>{{ $session->date->format('d.m.Y') }}</th>
            <th>{{ $session->start->format('H:i') }}</th>
            <th>{{ $session->end->format('H:i') }}</th>
            <th>{{ $session->educator->fullname() }}</th>
            <th>{{ $session->link }}</th>
        </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $group_sessions->links() }}
    </div>
    <div class="text-right mt-5">
        <a href="{{ route('add-group-session') }}" class="orange-button">Add Group Session</a>
    </div>
</div>
@endsection
