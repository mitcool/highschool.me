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
        <h5>Request Copy</h5>
        <p>lorem ipsum</p>
        <div>
            <input type="radio" checked> Diploma Package (<span style="color:#ee6123 !important">${{ number_format($diploma_package_price,2,'.',',') }}</span>)
        </div>

         <p>I also want to receive notarization and apostille (Optional)</p>

         <div><input type="radio" value="1" checked name="type" form="request-copy-form" required> Online notarization only (${{ number_format($prices[0],2,'.',',') }})</div>
         <div><input type="radio" value="2" name="type" form="request-copy-form" required> Online notarization with digital apostille (${{ number_format($prices[1],2,'.',',') }})</div>
         <div><input type="radio" value="3" name="type" form="request-copy-form" required> Online notarization with physical apostille (${{ number_format($prices[2],2,'.',',') }})</div> 
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <h5>Total Amount: <span style="color:#ee6123 !important">${{ number_format($diploma_package_price,2,'.',',') }} </span></h5>
        <form action="{{ route('request-copy-post',encrypt($diploma->id)) }}" id="request-copy-form" method="POST">
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