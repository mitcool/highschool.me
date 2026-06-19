@extends('parent.dashboard')

@section('css')
<style>
    .active-price{
        color:#ee6123;
    }
</style>
@endsection
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
            <input id="package" type="radio" checked value="{{ $diploma_package_price }}"> Diploma Package (<span style="color:#ee6123 !important">${{ number_format($diploma_package_price,2,'.',',') }}</span>)
        </div>

         <p class="mb-0 mt-2">I also want to receive notarization and apostille</p>

         <div>
            <input class="type" type="radio" value="1" name="type" form="request-copy-form"> Online notarization only <span class="price">(${{ number_format($prices[0],2,'.',',') }})</span> 
        </div>
         <div>
            <input class="type" type="radio" value="2" name="type" form="request-copy-form"> Online notarization with digital apostille <span class="price">(${{ number_format($prices[1],2,'.',',') }})</span> 
        </div>
         <div>
            <input class="type" type="radio" value="3" name="type" form="request-copy-form"> Online notarization with physical apostille <span class="price">(${{ number_format($prices[2],2,'.',',') }})</span> 
        </div> 
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <h5>Total Amount: <span style="color:#ee6123 !important" id="total">${{ number_format(($diploma_package_price),2,'.',',') }}</span></h5>
        <form action="{{ route('request-copy-post',encrypt($diploma->id)) }}" id="request-copy-form" method="POST" class="confirm-first">
            {{ csrf_field() }}
            <button class="orange-button">Proceed to Payment</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.type').on('click',function(){
        $('.price').removeClass('active-price')
        $(this).closest('div').find('.price').addClass('active-price')
        let prices = {{ json_encode($prices) }};
        let index = $(this).val() - 1;
        let service_price = Number(prices[index]);
        let package_price = Number($('#package').val());
        let total  = (service_price + package_price).toFixed(2)
        $('#total').html('$' + total )
    });
    $('#package').on('click',function(){
        $('.price').removeClass('active-price').prop('checked', false);
        $('.type').prop('checked',false);
        let package_price = Number($('#package').val());
        let total  = package_price.toFixed(2)
        $('#total').html('$' + total )
       
    })
</script>
@endsection