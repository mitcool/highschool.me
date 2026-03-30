@extends('parent.dashboard')

@section('content')
<div class="shadow container wrapper">
    <h1 class="text-center h2" style="color:#045397">Meetings</h1>
    <hr>
           @if($group_sessions_left > 0)
           <p>Your students are allowed <span class="font-weight-bold">{{ $group_sessions_left }}</span> Group Learning Sessions</p>
           @endif

           @if($mentoring_sessions_left > 0)
           <p>Your students are allowed <span class="font-weight-bold">{{ $mentoring_sessions_left }}</span> Personal Mentoring Sessions</p> 
           @endif

           @if($coaching_sessions_left > 0)
           <p> Your students are allowed <span class="font-weight-bold">{{ $coaching_sessions_left }}</span> College & Career Coaching </p>
           @endif
      
    <hr>
    <p class="text-center">If you need more sessions click the link below</p>
    <div class="row">
        @foreach ($students as $student )
        <div class="col-md-4">
            <a href="{{ route('parent.student.sessions',$student->student_id) }}" style="text-decoration: none;">
                <div class="box">
                    {{ $student->student->fullname() }}
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection