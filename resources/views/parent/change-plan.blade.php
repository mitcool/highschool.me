@extends('parent.dashboard')

@section('content')


<div class="container shadow wrapper h-100 page-content">
    <h1 class="text-center h2">Your Plans</h1>
   
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
                   <form action="{{ route('parent.update-plan',$student->id) }}" method="POST">
                {{ csrf_field() }}
                
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
                <p class="mb-0 font-weight-bold mt-3">You can find more information about the Payment Plans <a target="_blank" href="{{ route('standard-high-school') }}">HERE.</a></p>
                <hr>
                <div class="d-flex justify-content-between">
                    <div class="total">
                        Total Fee:  <span id="total-transfer-program">$2200.00</span>
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