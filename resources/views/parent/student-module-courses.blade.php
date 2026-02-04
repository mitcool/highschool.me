@extends('parent.dashboard')

@section('content')
<div class="bg-white w-75" style="padding:30px;">
    <div class="page-content" style="padding:20px;">
        <h1>Module, Honors & Prep-Courses</h1>
        <h2 class="h5">Access high-quality learning and mentoring options to elevate your educational experience.</h2>
        <hr>
        <h4 class="h4" style="color:#045397">{{ $student->name }} {{ $student->surname }}</h4>
            @if($student->date_of_birth) 
                <p class="mb-0">Born: {{ $student->date_of_birth->format('d.m.Y')}}</p> 
            @endif
        <hr>
       
        <div class="row">
            <div class="col-md-8" >
            @foreach ($course_types as $course_type )
                <div class="shadow" style="border-radius:5px;padding:20px;">
                    <h4 style="color:#E9580C;font-weight:bold">{{ $course_type->name }}</h4>
                    <hr>
                    <p>Fee per Session: ${{ $course_type->price() }}</p>
                    <p>Number of Sessions:</p>
                    <div class="d-flex justify-content-start align-items-center">
                        <form action="{{ route('change-course-type-count',[$course_type->id,'decrease']) }}" method="POST">
                            {{ csrf_field() }}
                                <button class="btn">-</button>
                        </form>
                        <span class="total">{{$course_type->course_type_count ?? 0 }}</span>
                        <form action="{{ route('change-course-type-count',[$course_type->id,'increase']) }}" method="POST">
                            {{ csrf_field() }}
                                <button class="btn">+</button>
                        </form>
                    </div>
                    <p>Total: <span style="color:#E9580C">${{$course_type->formatted_total ?? number_format($course_type->price,2,'.',',') }}</span></p>
                </div>
            @endforeach
            </div>
            <div class="col-md-4">
                <div class="shadow" style="border-radius:5px;padding:20px;">
                <p class="h4 text-center" style="color:#045397;font-weight:bold;">Your Booking Summary</p>
                <hr>
                @foreach ($course_types as $course_type )
                   @if($course_type->course_type_count > 0)
                   <div style="font-size:1rem;display:flex;justify-content:space-between;margin-top:4px;">
                        <span>{{ $course_type->name }}  ({{ $course_type->course_type_count }} x ${{ $course_type->price() }})</span>
                        <span class="font-weight-bold">${{ $course_type->formatted_total }}</span>
                    </div>
                    @endif
                @endforeach
                <hr/>
                <div style="font-size:1.1rem;display:flex;justify-content:space-between;margin-top:4px;">
                    <span class="font-weight-bold">Total amount:</span>
                    <span class="font-weight-bold">${{ number_format($total,2,'.',',') }}</span>
                </div>
                <hr>
               <a class="orange-button" href="{{ route('parent.student.course-type.checkout',$student->id) }}">Proceed to checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection
