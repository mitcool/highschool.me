@extends('parent.dashboard')

@section('content')
<div class="shadow container jumbotron bg-white">
    <h1 class="text-center h2" style="color:#045397">Select Student</h1>
    <hr>
    @foreach ($students as $student )
        <a href="{{ route('parent.meetings.student',$student->student_id) }}">
            <div class="box">
                {{ $student->student->fullname() }}
            </div>
        </a>
    @endforeach
</div>

@endsection