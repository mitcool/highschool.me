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
    <h1 class="text-center h2 page-headings">Your Meetings</h1>
    <hr>
    
    <h3 class="text-center">Sessions Schedules</h3>

    <table class="table table-striped">
        <tbody>
           
           @forelse ($student_meetings as $key => $meetings)
                <tr>
                    <th colspan="4">
                        <h5 class="mb-0">{{ $meeting_types[$key] }}</h5>
                    </th>
                </tr>
                <tr>
                    <th >Date</th>
                    <th>Student</th>
                    <th>Educator</th>
                    <th class="text-right">Link</th>
                </tr>
                @foreach ($meetings as $meeting)
                    <tr>
                        <td>{{ $meeting->meeting->date->format('F d,Y') }} at {{ $meeting->meeting->start->format('g:iA') }}</td>
                        <td>{{ $meeting->student->fullname() }}</td>
                        <td>{{ $meeting->meeting->educator->fullname() }}</td>
                        <td class="text-right">{{ $meeting->meeting->link }}</td>
                    </tr>
                @endforeach

               
            @endforeach
            @if(count($family_consultations))
            <tr>
                <th colspan="4">
                    <h5 class="mb-0">Family Consultations</h5>
                </th>
            </tr>
            <tr>
                <th>Date</th>
                <th>Educator</th>
                <th>Link</th>
            </tr>
            @endif
            @foreach ($family_consultations as  $family_consultation)
                <tr>
                    <td>{{ $family_consultation->date->format('F d,Y') }} at {{ $family_consultation->start->format('g:iA') }}</td>
                    <td>{{ $family_consultation->educator->fullname() }}</td>
                    <td>{{ $family_consultation->link }}</td>
                </tr>  
            @empty
            <div class="page-content">
                 <p class="text-center">There are currently no sessions available</p>
            </div>
                      
            @endforelse
        </tbody>
    </table>
</div>
@endsection