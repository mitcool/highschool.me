@extends('parent.dashboard')

@section('content')

@php
    $meeting_types = [
        12 => 'Group Learning Sessions',
        13 => 'Personal Mentoring Sessions',
        14 => 'College & Career Coaching',
        15 => 'Academic Office Hours',
        16 => 'Family Consultation'
    ];
@endphp

<div class="shadow container wrapper h-100">
    <h1 class="text-center h2" style="color:#045397">Select Your Time Slot</h1>
    <hr>
    
    <h3 class="text-center">Sessions Schedules</h3>

    <table class="table table-striped">
        <tbody>
           
           @foreach ($student_meetings as $key => $meetings)
                <tr>
                    <th colspan="3">
                        <h5>{{ $meeting_types[$key] }}</h5>
                    </th>
                </tr>
                <tr>
                    <th >Date</th>
                    <th>Educator</th>
                    <th class="text-right">Link</th>
                </tr>
                @foreach ($meetings as $meeting)
                    <tr>
                        <td>{{ $meeting->hour->date->format('F d,Y') }} at {{ $meeting->hour->start->format('g:iA') }}</td>
                        <td>{{ $meeting->hour->educator->fullname() }}</td>
                        <td class="text-right">{{ $meeting->hour->link }}</td>
                    </tr>
                @endforeach
           @endforeach
        </tbody>
    </table>
</div>
@endsection