@extends('educator.dashboard')

@section('content')

<div class="shadow container bg-white my-3">
    <h1 class="text-center page-headings">Your Meetings</h1>
    <hr>
   
    <h3 class="text-center">Sessions Schedules</h3>

    <table class="table table-striped">
        <tbody>
           {{-- Group Sessions --}}
            <tr>
                <th colspan="2">
                    <h5>Group Learning Sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($group_sessions) > 0)
            <tr>
                <th colspan="2">Date</th>
                <th class="text-right">Link</th>
            </tr>
            @endif
            @foreach ($group_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                     <td></td>
                    <td class="text-right">
                        {{ $session->link }}
                    </td>
                </tr>
            @endforeach
            {{-- Mentoring Sessions --}}
             <tr>
                <th colspan="2">
                    <h5>Personal Mentoring Sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($mentoring_sessions) > 0)
            <tr>
                <th colspan="2">Date</th>
                <th class="text-right">Link</th>
            </tr>
            @endif
            @foreach ($mentoring_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td></td>
                    <td class="text-right">
                         {{ $session->link }}
                    </td>
                </tr>
            @endforeach
              <tr>
                <th colspan="2">
                    <h5>Coaching sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($coaching_sessions) > 0)
            <tr>
                <th colspan="2">Date</th>
                <th class="text-right">Link</th>
            </tr>
            @endif
            @foreach ($coaching_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td></td>
                    <td class="text-right">
                         {{ $session->link }}
                    </td>
                </tr>
             @endforeach
        </tbody>
    </table>
</div>
@endsection