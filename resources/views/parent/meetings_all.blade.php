@extends('parent.dashboard')

@section('content')
<div class="shadow container wrapper">
    <h1 class="text-center h2" style="color:#045397">Meetings</h1>
    <hr>

    @foreach ($additional_courses as $key => $courses)
        @if($key == 12)
           <p>Your students are allowed <span class="font-weight-bold">{{ count($courses) }}</span> Group Learning Sessions</p> 
        @endif

        @if($key == 13)
           <p>Your students are allowed <span class="font-weight-bold">{{ count($courses) }}</span> Personal Mentoring Sessions</p> 
        @endif

        @if($key == 14)
           <p> Your students are allowed <span class="font-weight-bold">{{ count($courses) }}</span> College & Career Coaching </p>
        @endif
    @endforeach
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