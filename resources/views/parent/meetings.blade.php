@extends('parent.dashboard')

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
    </table>
</div>
@endsection