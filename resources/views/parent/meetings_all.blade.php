@extends('parent.dashboard')

@section('content')
<div class="shadow container wrapper">
    <h1 class="text-center h2 page-headings" >Your Meetings</h1>

    @if(count(auth()->user()->students) == 0)
    <p class="text-center page-content">You don't have any students yet </p>
    @else
    <p class="font-weight-bold">Please select student to view or schedule meetings or sessions.</p>
    @foreach ($students as $student )
    <div class="row my-3">
        <div class="col-md-6 justify-content-center align-items-center ">
            <div class="" style="text-decoration: none;">
                {{ $student->student->fullname() }}
            </div>
        </div>
       
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="{{ route('parent.student.sessions',$student->student_id) }}" class="btn-lg orange-button btn mx-2 shadow">Buy Meetings</a>
            <a href="{{ route('parent.student.meeting-list',$student->student_id) }}" class="btn-lg btn-primary btn shadow">List of Meetings</a> 
        </div>
    </div>
    @endforeach
    <div class="text-center">
        @if($family_consultation_permission)
            <form action="{{ route('request-family-consultation')}}" class="btn confirm-first" id="request-family-consultation" method="POST">
                {{ csrf_field() }}
                <button class="btn-lg orange-button btn mx-2 shadow" value="">Request family consultation</button>
            </form>
        @endif
    </div>
    @endif
</div>



@endsection