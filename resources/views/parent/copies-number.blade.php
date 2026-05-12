@extends('parent.dashboard')

@section('content')
<div class="container shadow wrapper h-100">
    <div class="page-content">
        {{-- Student Details --}}
        <div class="d-flex justify-content-between">
            <div>
                <h4 style="color:#045397">{{ $diploma->student->fullname() }} </h4>
                <hr>
            </div>
        </div>
        <h5 style="color:#E9580C">Number of copies of the physical apostille</h5>
        <p>This is the description of the service. Lorem ipsum dolor sit amet</p>
        <p>Total number of copies:</p>
         <div class="d-flex justify-content-start align-items-center">
            <form action="{{ route('change-diploma-copies-count',[$diploma->id,'decrease']) }}" method="POST">
                {{ csrf_field() }}
                    <button class="btn">-</button>
            </form>
            <span class="total">{{  Cookie::get('diploma-'.$diploma->id); }}</span>
            <form action="{{ route('change-diploma-copies-count',[$diploma->id,'increase']) }}" method="POST">
                {{ csrf_field() }}
                    <button class="btn">+</button>
            </form>
        </div>
        <p>Price per copy: <span style="color:#E9580C">$50.00</span></p>
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <h5>Total Amount: <span style="color:#ee6123 !important">${{ $total }}</span></h5>
        <form action="{{ route('request-physical-copy-post',$diploma->id) }}" id="request-copy-form" method="POST">
            {{ csrf_field() }}
            <button class="orange-button">Proceed to Payment</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection