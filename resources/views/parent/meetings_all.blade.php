@extends('parent.dashboard')

@section('content')
<div class="shadow container wrapper">
    <h1 class="text-center h2 page-headings" >Your Meetings</h1>
    <p>Please select student to view or schedule meetings or sessions.</p>
    @foreach ($students as $student )
    <div class="row">
        <div class="col-md-6">
            <div class="box" style="text-decoration: none;">
                {{ $student->student->fullname() }}
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center align-items-center">
             <a href="{{ route('parent.student.sessions',$student->student_id) }}" class="orange-button btn">Buy Meetings</a>
        </div>
        <div class="col-md-3 d-flex justify-content-center align-items-center">
            <a href="" class="btn-primary btn">List of Meetings</a> 
        </div>
    </div>
    @endforeach
</div>

@endsection