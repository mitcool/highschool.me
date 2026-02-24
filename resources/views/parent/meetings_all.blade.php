@extends('parent.dashboard')

@section('content')
<div class="shadow container wrapper h-100">
    <h1 class="text-center h2" style="color:#045397">Select Student</h1>
    <hr>
    <div class="row">
        @foreach ($students as $student )
        <div class="col-md-4">
            <a href="{{ route('parent.meetings.student',$student->student_id) }}" style="text-decoration: none;">
                <div class="box">
                    {{ $student->student->fullname() }}
                </div>
            </a>
        </div>
        @endforeach
    </div>
    
</div>

@endsection