@extends('parent.dashboard')

@section('content')


<div class="container shadow wrapper h-100 page-content">
    <h1 class="text-center h2">Your Plans</h1>
    @foreach ($parent_students as $student )
        <div class="d-flex justify-content-between w-100 flex-column">
            <div>
                <h4 style="color:#045397">{{ $student->student->fullname() }} </h4>
                @if($student->date_of_birth) 
                    <p class="mb-0">Born: {{ $student->date_of_birth()}}</p> 
                @endif
                @if($student->track == 1 || $student->track == 2) 
                    <p class="mb-0">Grade: {{ $student->grade }}</p>
                @endif
                <hr>
            </div>
        
            <div class="d-flex justify-content-between w-100">
                <div>
                    @if($student->student->active_plan)
                    <p class="nb-0">Current Plan: <span style="color:#E9580C;font-weight-bold">{{ $student->student->active_plan->plan->name }} Package</span></p>
                        <small>This student is currently subscribed to the  {{ $student->student->active_plan->plan->name }} Package Plan</small>
                    @else
                        <small>This student is has no current plan</small>
                    @endif
                </div>
                <div class="text-right">
                    @if($student->student->active_plan)
                        <form action="{{ route('terminate-plan',$student->student->active_plan->id) }}" method="POST" class="my-1 confirm-first">
                            {{ csrf_field() }}
                            <button style="background:black;color:white;" class="btn">Terminate Plan</button>
                        </form>
                    @endif
                    @if($student->student->active_plan)
                        <a href="{{ route('change-plan',$student->student_id) }}"  class="orange-button-outline btn">Request Change</a>
                    @else
                        <a href=""  class="orange-button-outline btn">Start Now</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

 

@endsection