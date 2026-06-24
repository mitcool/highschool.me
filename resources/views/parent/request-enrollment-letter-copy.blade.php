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
        <form action="{{ route('enrollment-confirmation-order-payment',[$student->id,'physical']) }}" id="request-copy-form" method="POST" class="confirm-first">
            {{ csrf_field() }}
            <div class="form-group" style="max-width:220px;">
                <label for="copies">Select number of copies:</label>
                <select name="copies" id="copies" class="form-control">
                    @for ($copies = 1; $copies <= 5; $copies++)
                        <option value="{{ $copies }}" {{ $total_copies == $copies ? 'selected' : '' }}>{{ $copies }}</option>
                    @endfor
                </select>
            </div>
        </form>
        <p>Price: ${{ number_format($price_per_copy,2,'.',',') }}</p>
        
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <h5>Total Amount: <span style="color:#ee6123 !important">${{ number_format($total_amount,2,'.',',') }}</span></h5>
        <button class="orange-button" type="submit" form="request-copy-form">Proceed to Payment</button>
    </div>
</div>
@endsection
