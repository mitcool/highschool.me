@extends('parent.dashboard')

@section('content')

<div class="container jumbotron bg-white">
    <div class="shadow page-content" style="padding:20px;">
            <h4 style="color:#045397">{{ $student->name }} {{ $student->surname }}</h4>
            <p class="mb-0">Born:</p>
            <p class="mb-0">Grade: {{ $student->grade }}</p>
            <hr>
    {{-- Pending documention --}}
     @if($status == 0)
            <h4 style="color:#E9580C">Pending Documentation Approval</h4>
            <p class="mb-0">This account is currently under review. You will be notified once the documents have been reviewed.</p>
       
    {{-- Pending enrollemnt and plan fee to be paind --}}
    @elseif($status == 1)
        <h4 style="color:#E9580C">Documentation is Approved</h4>
        <p>The documentation for this student is approved. Please select your plan:</p>
        <p class="mb-0 font-weight-bold mt-3">You must pay mandatory Enrolment Fee:</p>
        <form action="{{ route('parent.pay.plan',$student->id) }}" method="POST">
            {{ csrf_field() }}
            <input type="radio" checked readonly class="radio"> Enrolment Fee <span style="color:#E9580C">($300.00)</span> 

        <p class="mb-0 font-weight-bold mt-3">Please select your preferred Package:</p>

        @foreach($plans as $key => $plan)
            <div>
                <input class="plans" value="{{ $plan->id }}" type="radio" {{ $key == 0 ? ' checked ' : '' }} name="plan" data-price-per-year="{{ $plan->price_per_year }}" data-price-per-month="{{ $plan->price_per_month }}"> {{ $plan->name }} Package (${{ $plan->price_per_year() }})
            </div> 
        @endforeach
     

        <p class="mb-0 font-weight-bold mt-3">Please select Monthly or Yearly Plan:</p>
        <div>
            <input type="radio" checked name="payment_type" class="payment-type" value="0"> Monthly Fee 
        </div>
        <div>
            <input type="radio" name="payment_type" class="payment-type" value="1"> Yearly Fee 
        </div>
       
        
        <p class="mb-0 font-weight-bold mt-3">You can find more information about the Payment Plans <a href="{{ route('tuition') }}">HERE.</a></p>
        <hr>
         <div class="d-flex justify-content-between">
            <div class="total">
                Total: <span id="total"></span>
            </div>
            <button class="orange-button">Proceed to Payment</button>
        </div>
       </form>
    {{-- Pending --}}
    @elseif($status == 2)
        <h1 class="text-center">Student is active</h1>
        
    @endif
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function(){
        let payment_type = $('input[name=payment_type]:checked').val();
        let plan =  $('input[name=plan]:checked').attr('data-price-per-month');
        let total = plan/100 + 300;
        
     $('#total').html('$' + total.toFixed(2));
        // Note price is in cents
        $('.plans').on('click',function(){
            let payment_type = $('input[name=payment_type]:checked').val();
            let plan_price = payment_type == 0 ? $(this).attr('data-price-per-month') : $(this).attr('data-price-per-year');
            let total = plan_price/100 + 300;
            $('#total').html('$' + total.toFixed(2));
        });

        $('.payment-type').on('click',function(){
            let payment_type = $(this).val();
            let plan =  $('input[name=plan]:checked');
            let plan_price = payment_type == 0 ? plan.attr('data-price-per-month') : plan.attr('data-price-per-year');
            let total = plan_price/100 + 300;
            $('#total').html('$' + total.toFixed(2));
        })
    })
</script>
@endsection