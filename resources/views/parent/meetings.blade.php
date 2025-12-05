@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">My Meetings</h1>
    <table class="table">
        <tbody>
            @forelse ($family_consultations_requests as $request)
                <tr>
                    <th>Requested at</th>
                    <th>{{ $request->created_at->format('d.m.Y') }}</th>
                </tr>
                <tr>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Link</th>
                </tr>
                @foreach ($request->meetings as $meeting )
                  
                    <tr>
                        <th>{{ $meeting->date->format('d.m.Y') }}</th>
                        <th>{{ $meeting->start->format('H:i') }}</th>
                        <th>{{ $meeting->end->format('H:i') }}</th>
                        <th>{{ $meeting->link }}</th>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <th colspan="4" class="text-center">No meetings at the moment</th>
                </tr>
            @endforelse
               <tr>
                <th colspan="4" class="text-right">
                    <form action="{{ route('request-family-consultation') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ auth()->user()->id }}" name="parent_id"> 
                        <button class="orange-button">Request a family consultation</button>
                    </form>
                </th>
            </tr>
        </tbody>
    </table>
</div>
@endsection