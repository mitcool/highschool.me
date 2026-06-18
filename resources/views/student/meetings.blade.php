@extends('student.dashboard')

@section('headCss')
<style>
    tr,td{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0;
    }
</style>
@endsection

@section('content')

<div class="shadow container wrapper">
    <h1 class="text-center h2 page-headings" style="color:#045397">Select Your Time Slot</h1>
    <hr>
   
    <h3 class="text-center">Sessions Schedules</h3>

    <table class="table table-striped">
        <tbody>
           {{-- Group Sessions --}}
            <tr>
                <th colspan="4">
                    <h5>Group Mentoring Sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($group_sessions) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
            @forelse ($group_sessions as $session)
                <tr>
                    <td><span>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</span> </td>
                    <td><span>{{ $session->educator->fullname() }}</span></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        @if(in_array($session->id,$already_booked_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @elseif(count($session->students) > 9)
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                            @if($permissions['group'])
                                <form action="{{ route('book-session',$session->id) }}" method="POST" id="session-form-{{ $session->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <button class="btn-enroll" >Confirm Appointments</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">At the moment, there are no group sessions scheduled.</td>
                </tr>
            @endforelse

            {{-- Mentoring Sessions --}}
             <tr>
                <th colspan="4">
                    <h5 class="mb-0">Personal Mentoring Sessions</h5>
                </th>
                <th></th>
            </tr>
             @if(count($mentoring_sessions) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
            @forelse ($mentoring_sessions as $session)
                <tr>
                    <td>
                        <p class="mb-0">{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</p>
                    </td>
                    <td>
                        <p class="mb-0">{{ $session->educator->fullname() }}</p>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        @if(in_array($session->id,$already_booked_sessions) && count($session->students) > 1)
                            <button class="btn-enrolled">Already Booked</button>
                        @elseif(count($session->students) >= 1)
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                            @if($permissions['mentoring'])
                                <form action="{{ route('book-session',$session->id) }}" method="POST" id="mentoring-session-form-{{ $session->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <button class="btn-enroll">Confirm Appointments</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">At the moment, there are no personal sessions scheduled.</td>
                </tr>
            @endforelse

            {{-- Coaching Sessions --}}
            <tr>
                <th colspan="4">
                    <h5>College & Career Coaching</h5>
                </th>
                <th></th>
            </tr>
            @if(count($coaching_sessions) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th></th>
                    <th></th>
                </tr>
            @endif
            @forelse ($coaching_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td>{{ $session->educator->fullname() }}</td>
                    <td></td>
                    <td class="text-right">
                        @if(in_array($session->id,$already_booked_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @elseif(count($session->students) > 1)
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                            @if($permissions['coaching'])
                                <form action="{{ route('book-session',$session->id) }}" method="POST" id="coaching-session-form-{{ $session->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <button class="btn-enroll">Confirm Appointments</button>
                                </form>
                           @endif
                        @endif
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">At the moment, there are no coaching sessions scheduled.</td>
                    </tr>
            @endforelse

             {{-- Coaching Sessions --}}
            <tr>
                <th colspan="4">
                    <h5>Personal Tutoring Sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($academic_hours) > 0)
                <tr>
                    <th>Date</th>
                    <th>Educator</th>
                    <th>Subject</th>
                    <th></th>
                    
                </tr>
            @endif
            @forelse ($academic_hours as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td>{{ $session->educator->fullname() }}</td>
                    <td>{{ $session->course->title }}</td>
                    <td class="text-right">
                        @if(in_array($session->id,$already_booked_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @elseif(count($session->students) > 1)
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                            @if($permissions['coaching'])
                                <form action="{{ route('book-session',$session->id) }}" method="POST" id="coaching-session-form-{{ $session->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <button class="btn-enroll">Confirm Appointments</button>
                                </form>
                           @endif
                        @endif
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">At the moment, there are no coaching sessions scheduled.</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection