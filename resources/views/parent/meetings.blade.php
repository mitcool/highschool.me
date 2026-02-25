@extends('parent.dashboard')

@section('content')

<div class="shadow container wrapper h-100">
    <h1 class="text-center h2" style="color:#045397">Select Your Time Slot</h1>
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
            @forelse ($group_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                     <td></td>
                    <td class="text-right">
                        @if(in_array($session->session_id,$user_group_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                            @if($permissions['group'])
                                <form action="{{ route('book-group-session',$session->id) }}" method="POST" id="session-form-{{ $session->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <button class="btn-enroll">Confirm Appointments</button>
                                </form>
                            @else
                                <a href="{{ route('parent.student.sessions',$student_id) }}">
                                    <button class="btn-enroll">Buy now</button>
                                </a>
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
                <th colspan="2">
                    <h5>Personal Mentoring Sessions</h5>
                </th>
                <th></th>
            </tr>
            @forelse ($mentoring_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td></td>
                    <td class="text-right">
                        @if(in_array($session->id,$user_mentoring_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                            @if($permissions['mentoring'])
                                <form action="{{ route('book-mentoring-session',$session->id) }}" method="POST" id="mentoring-session-form-{{ $session->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <button class="btn-enroll">Confirm Appointments</button>
                                </form>
                            @else
                                <a href="{{ route('parent.student.sessions',$student_id) }}" class="btn-enroll">Buy now</a>
                            @endif
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">At the moment, there are no personal sessions scheduled.</td>
                </tr>
            @endforelse

            {{-- Coaching Sessions --}}
            <tr>
                <th colspan="2">
                    <h5>Coaching sessions</h5>
                </th>
                <th></th>
            </tr>
            @forelse ($coaching_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td></td>
                    <td class="text-right">
                        @if(in_array($session->id,$user_coaching_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                            @if($permissions['coaching'])
                                <form action="{{ route('book-coaching-session',$session->id) }}" method="POST" id="coaching-session-form-{{ $session->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                                    <button class="btn-enroll">Confirm Appointments</button>
                                </form>
                            @else
                                <a href="{{ route('parent.student.sessions',$student_id) }}" class="btn-enroll">Buy now</a>
                            @endif
                        @endif
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3">At the moment, there are no coaching sessions scheduled.</td>
                    </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection