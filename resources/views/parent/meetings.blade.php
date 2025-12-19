@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    <h1 class="text-center h2" style="color:#045397">Select Your Time Slot</h1>
    <hr>
   
    <h3 class="text-center">Sessions Schedules</h3>

    <table class="table table-striped">
        <tbody>
           
            <tr>
                <th colspan="2">
                    <h5>Group Learning Sessions</h5>
                </th>
                <th></th>
            </tr>
            @foreach ($group_sessions as $session)
                <tr>
                   
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                     <td>     
                        @if(!in_array($session->id,$user_group_sessions))   
                        <select name="student_id"  required class="form-control" form="session-form-{{ $session->id }}">
                            <option value="" selected disabled>Please select student</option>
                            @foreach (auth()->user()->students as $student )
                                <option value="{{ $student->student_id }}">{{ $student->student->name }} {{ $student->student->name }}</option>
                            @endforeach
                        </select>           
                        @endif
                    </td>
                    <td class="text-right">
                        @if(in_array($session->id,$user_group_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                        <form action="{{ route('book-group-session',$session->id) }}" method="POST" id="session-form-{{ $session->id }}">
                            {{ csrf_field() }}
                            <button class="btn-enroll">Confirm Appointments</button>
                        </form>
                        @endif
                    </td>
                </tr>
           
            @endforeach
             <tr>
                <th colspan="2">
                    <h5>Personal Mentoring Sessions</h5>
                </th>
                <th></th>
            </tr>
            @foreach ($mentoring_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td>          
                        @if(!in_array($session->id,$user_mentoring_sessions))   
                        <select name="student_id"  required class="form-control" form="mentoring-session-form-{{ $session->id }}">
                            <option value="" selected disabled>Please select student</option>
                            @foreach (auth()->user()->students as $student )
                                <option value="{{ $student->student_id }}">{{ $student->student->name }} {{ $student->student->name }}</option>
                            @endforeach
                        </select>           
                        @endif     
                    </td>
                    <td class="text-right">
                        @if(in_array($session->id,$user_mentoring_sessions))
                            <button class="btn-enrolled">Already Booked</button>
                        @else
                        <form action="{{ route('book-mentoring-session',$session->id) }}" method="POST" id="mentoring-session-form-{{ $session->id }}">
                            {{ csrf_field() }}
                            <button class="btn-enroll">Confirm Appointments</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @foreach (auth()->user()->students as $student )
        <div>
            <a href="{{ route('parent.student.sessions',$student->student_id) }}">{{ $student->student->name }} {{ $student->student->name }}</a>
        </div>
    @endforeach

</div>
@endsection