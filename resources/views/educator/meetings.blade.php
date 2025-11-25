@extends('educator.dashboard')

@section('content')
<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">My Meetings</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Meeting Type</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meetings as $meeting)
                <tr>
                    <td>{{ $meeting->date }}</td>
                    <td>{{ $meeting->time }}</td>
                    <td>{{ $meeting->type }}</td>
                    <td>{{ $meeting->link }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection