@extends('parent.dashboard')

@section('content')


<div class="container shadow wrapper h-100 page-content">
    <h1 class="text-center h2 page-headings">Your Plans</h1>
   
        <div class="d-flex justify-content-between w-100 flex-column">
            <div>
                <h4 style="color:#045397">{{ $student->fullname() }} </h4>
                @if($student->date_of_birth) 
                    <p class="mb-0">Born: {{ $student->date_of_birth()}}</p> 
                @endif
                @if($student->student_details->track == 1 || $student->student_details->track == 2) 
                    <p class="mb-0">Grade: {{ $student->student_details->grade }}</p>
                 @endif
                <hr>
            </div>
          
            <div class="d-flex justify-content-between w-100">
                <div>
                   <form action="{{ route('parent.update-plan',$student->id) }}" method="POST" class="confirm-first" id="change-plan">
                {{ csrf_field() }}
                
                <p class="mb-0 font-weight-bold mt-3">Please select your preferred Package:</p>
                 @foreach($plans as $key => $plan)
                    <div>
                        <input  
                            class="plans" 
                            value="{{ $plan->id }}" 
                            type="radio" {{ $key == 0 ? ' checked ' : '' }} 
                            name="plan" 
                            data-price-per-year="{{ $plan->price_per_year }}" 
                            data-price-per-month="{{ $plan->price_per_month }}"
                        /> {{ $plan->name }} Package <span class="orange-price" {{ $key==0 ? 'style=color:#ee6123 ' : "" }}>(${{ $plan->price_per_month() }})</span>
                    </div> 
                @endforeach
                <p class="mb-0 font-weight-bold mt-3">Please select Monthly or Yearly Plan:</p>
                <div>
                    <input type="radio" checked name="payment_type" class="payment-type" value="0"> Monthly Fee 
                </div>
                <div>
                    <input type="radio" name="payment_type" class="payment-type" value="1"> Yearly Fee 
                </div>
                <p class="mb-0 font-weight-bold mt-3">You can find more information about the Payment Plans <a target="_blank" href="{{ route('standard-high-school') }}">HERE.</a></p>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="total">
                        Total Fee:  <span id="price" class="font-weight.bold">$190.00</span>
                    </div>
                    <button class="orange-button mt-3">Proceed to Payment</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    $('.plans').on('click',function(){
        let type = $('.payment-type:checked').val();
        let price = type == 0 
            ? $(this).attr('data-price-per-month') 
            : $(this).attr('data-price-per-year');
        
        const formatted_price = Number(price).toLocaleString('en-US', {
            style: 'currency',
            currency: 'USD'
        });

        $('.orange-price').css('color','black');
        $(this).closest('div').find('.orange-price').css('color','#ee6123 ')

        $('#price').html(formatted_price)
    });


    $('.payment-type').on('click',function(){
        let type = $(this).val();
        let price = type == 0 
            ? $('.plans:checked').attr('data-price-per-month') 
            : $('.plans:checked').attr('data-price-per-year');
        
        const formatted_price = Number(price).toLocaleString('en-US', {
            style: 'currency',
            currency: 'USD'
        });

        $('#price').html(formatted_price);

        
        $('.plans').each(function(){
            let orange_price = type == 0 
                ? $(this).attr('data-price-per-month') 
                : $(this).attr('data-price-per-year');
            
            const formatted_orange_price = Number(orange_price).toLocaleString('en-US', {
            style: 'currency',
            currency: 'USD'
        });

            $(this).closest('div').find('.orange-price').html(`(${formatted_orange_price})`)
        })
      
    })
</script>

@endsection