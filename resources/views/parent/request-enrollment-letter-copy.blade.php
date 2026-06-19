@extends('parent.dashboard')

@section('content')

<div class="container shadow wrapper h-100">
    <div class="page-content">
        {{-- Student Details --}}
        <div>
            <div>
                <h4 style="color:#045397">{{ $student->fullname() }}</h4>
                <hr>
            </div>
        </div>
        <h5 style="color:#E9580C">Number of copies of the Enrollment verification</h5>
        <p>This is the description of the service. Lorem ipsum dolor sit amet</p>
        <p>Total number of copies:</p>
        <div class="d-flex justify-content-start align-items-center">
            <form action="{{ route('enrollment-letter-copies','decrease') }}" method="POST">
                {{ csrf_field() }}
                    <button class="btn">-</button>
            </form>
            <span class="total">{{ $total_copies }}</span>
            <form action="{{ route('enrollment-letter-copies','increase') }}" method="POST">
                {{ csrf_field() }}
                    <button class="btn">+</button>
            </form>
        </div>
        <p>Price per copy: ${{ number_format($price_per_copy,2,'.',',') }}</p>
        
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <h5>Total Amount: <span style="color:#ee6123 !important">${{ number_format($total_amount,2,'.',',') }}</span></h5>
        <form action="{{ route('enrollment-confirmation-order-payment',[$student->id,'physical']) }}" id="request-copy-form" method="POST" class="confirm-first">
            {{ csrf_field() }}
            <button class="orange-button">Proceed to Payment</button>
        </form>
    </div>
</div>
@endsection