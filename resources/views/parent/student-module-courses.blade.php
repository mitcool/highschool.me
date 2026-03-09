@extends('parent.dashboard')

@section('content')
<div class="container shadow wrapper h-100">
    <div class="page-content" style="padding:20px;">
        <h1 class="h2 text-center" style="color:#045397">Module, Honors & Prep-Courses</h1>
        <p class="h5 text-center">Access high-quality learning and mentoring options to elevate your educational experience.</p>
        <hr>
        <h4 class="h4" style="color:#045397">{{ $student->name }} {{ $student->surname }}</h4>
            @if($student->date_of_birth) 
                <p class="mb-0">Born: {{ $student->date_of_birth->format('d.m.Y')}}</p> 
            @endif
        <hr>
       
        <div class="row">
            <div class="col-md-8" >
            @foreach ($course_types as $course_type )
                <div class="border my-1" style="border-radius:5px;padding:20px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color:#E9580C;font-weight:bold">{{ $course_type->name }}</h4>
                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#courseTypeModal{{ $course_type->id }}">
                            View all
                        </button>
                    </div>
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
                <div class="border" style="border-radius:5px;padding:20px;">
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
</div>

@foreach ($course_types as $course_type)
    <div class="modal fade" id="courseTypeModal{{ $course_type->id }}" tabindex="-1" role="dialog" aria-labelledby="courseTypeModalLabel{{ $course_type->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="courseTypeModalLabel{{ $course_type->id }}">{{ $course_type->name }} - All Courses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php($courses = $course_type->courses->sortBy('title'))

                    @if($courses->count() > 0)
                        <ul class="mb-0 pl-3">
                            @foreach($courses as $course)
                                <li class="mb-1">{{ $course->title }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">No courses available for this type.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
