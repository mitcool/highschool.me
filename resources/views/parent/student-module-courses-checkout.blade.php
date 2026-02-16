@extends('parent.dashboard')

@section('content')

<div class="container shadow bg-white" style="margin:20px auto;">
    <div class="" style="border-radius:5px;padding:20px;">
        <h1 class="">Confirm your details</h1>
        <p class="h3  mt-2" style="color:#045397;font-weight:bold;">Personal Information</p>
        <form action="{{ route('parent.student.courses-type.pay',$student->id) }}" method="POST">
            {{ csrf_field() }}
            <label for="" class="d-block font-weight-bold mb-0 mt-2">Full Name:</label>
            <input type="text" readonly value="{{ auth()->user()->name }} {{ auth()->user()->surname }}" class="form-control">
            <label for="" class="d-block font-weight-bold mb-0 mt-2">Address:</label>
            <input type="text" readonly value=" {{ auth()->user()->invoice_details->street }} {{ auth()->user()->invoice_details->street_number }} {{ auth()->user()->invoice_details->zip }} {{ auth()->user()->invoice_details->city }} {{ auth()->user()->invoice_details->country_id }}" class="form-control">
            <label for="" class="d-block font-weight-bold mb-0 mt-2">Email:</label>
            <input type="text" readonly value="{{ auth()->user()->email }}" class="form-control">
            <label for="" class="d-block font-weight-bold mb-0 mt-2">Phone:</label>
            <input type="text" readonly name="phone" value="{{ auth()->user()->invoice_details->phone }}" class="form-control">
            <p>Your information will be used solely to process this booking and will be handled in accordance with our Privacy Policy</p>
            <p class="h3  mt-2" style="color:#045397;font-weight:bold;">Service Summary</p>
            <hr>
            @foreach ($course_types as $course_type )
                @if($course_type->course_type_count > 0)
                <div style="font-size:1rem;display:flex;justify-content:space-between;margin-top:4px;">
                    <span>{{ $course_type->name }}  ({{ $course_type->course_type_count }} x ${{ $course_type->price() }})</span>
                    <span class="font-weight-bold">${{ $course_type->formatted_total }}</span>
                </div>
                <hr/>
                @endif
            @endforeach
            <div style="font-size:1.1rem;display:flex;justify-content:space-between;margin-top:4px;">
                <span class="font-weight-bold">Total amount:</span>
                <span class="font-weight-bold">${{ number_format($total,2,'.',',') }}</span>
            </div>
            <hr>
            <input type="checkbox" name="agree" required>&nbsp;I confirm that the information provided is accurate and that I agree to the processing of my information for this booking.
            <div class="text-right">
            <button class="orange-button mt-3">Proceed to Payment</button> 
            </div>
        </form>
    </div>
</div>

@endsection