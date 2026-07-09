@extends('student.dashboard')

@section('headCss')
<style>
    .meetings-table th,
    .meetings-table td {
        vertical-align: middle;
    }
    .meetings-table .section-title-row th {
        border-top: none;
    }
    .meetings-table .action-cell {
        text-align: right;
        white-space: nowrap;
    }
</style>
@endsection

@section('content')

<div class="shadow container wrapper">
    <h1 class="text-center h2 page-headings" style="color:#045397">Select Your Time Slot</h1>
    <hr>
   
    <h3 class="text-center">Sessions Schedules</h3>

    <table class="table table-striped meetings-table">
        <tbody>
           {{-- Group Sessions --}}
            <tr class="section-title-row">
                <th colspan="5">
                    <h5>Group Mentoring Sessions</h5>
                </th>
            </tr>
            @if(count($group_sessions) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
            @forelse ($group_sessions as $session)
                <tr>
                    <td><span>{{ $session->meeting->local_date() }} at {{ $session->meeting->local_time()}}</span> </td>
                    <td><span>{{ $session->meeting->educator->fullname() }}</span></td>
                    <td></td>
                    <td></td>
                    <td class="action-cell">
                        <a target="_blank"  href="{{ $session->meeting->link }}">URL</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">At the moment, there are no group sessions scheduled.</td>
                </tr>
            @endforelse
             <tr>
                <td colspan="5">
                    <a href="{{ route('book-meetings','group-sessions') }}" class="orange-button btn">Book a Session</a>
                </td>
            </tr>

            {{-- Mentoring Sessions --}}
             <tr class="section-title-row">
                <th colspan="5">
                    <h5 class="mb-0">Personal Mentoring Sessions</h5>
                </th>
            </tr>
             @if(count($mentoring_sessions) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
            @forelse ($mentoring_sessions as $session)
                <tr>
                    <td><span>{{ $session->meeting->local_date() }} at {{ $session->meeting->local_time()}}</span> </td>
                    <td>
                        <p class="mb-0">{{ $session->meeting->educator->fullname() }}</p>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="action-cell">
                        <a target="_blank" href="{{ $session->meeting->link }}">URL</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">At the moment, there are no personal sessions scheduled.</td>
                </tr>
            @endforelse

             <tr>
                <td colspan="5">
                    <a href="{{ route('book-meetings','personal-mentoring-sessions') }}" class="orange-button btn">Book a Session</a>
                </td>
            </tr>

            {{-- Coaching Sessions --}}
            <tr class="section-title-row">
                <th colspan="5">
                    <h5>College & Career Coaching</h5>
                </th>
            </tr>
            @if(count($coaching_sessions) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
            @forelse ($coaching_sessions as $session)
                <tr>
                    <td><span>{{ $session->meeting->local_date() }} at {{ $session->meeting->local_time()}}</span> </td>
                    <td>{{ $session->meeting->educator->fullname() }}</td>
                    <td></td>
                    <td></td>
                     <td class="action-cell">
                        <a target="_blank" href="{{ $session->meeting->link }}">URL</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">At the moment, there are no coaching sessions scheduled.</td>
                    </tr>
            @endforelse
             <tr>
                <td colspan="5">
                    <a href="{{ route('book-meetings','career-coaching-sessions') }}" class="orange-button btn">Book a Session</a>
                </td>
            </tr>
             {{-- Personal Tutoring Sessions --}}
            <tr class="section-title-row">
                <th colspan="5">
                    <h5>Personal Tutoring Sessions</h5>
                </th>
            </tr>
            @if(count($academic_hours) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
            @forelse ($academic_hours as $session)
                <tr>
                     <td><span>{{ $session->meeting->local_date() }} at {{ $session->meeting->local_time()}}</span> </td>
                    <td>{{ $session->meeting->educator->fullname() }}</td>
                    {{-- <td>{{ $session->meeting->course->title }}</td> --}}
                    <td></td>
                    <td></td>
                    <td class="action-cell">
                        <a target="_blank" href="{{ $session->meeting->link }}">URL</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5">At the moment, there are no coaching sessions scheduled.</td>
                    </tr>
            @endforelse
             <tr>
                <td colspan="5">
                    <a href="{{ route('book-meetings','personal-tutoring-sessions') }}" class="orange-button btn">Book a Session</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
