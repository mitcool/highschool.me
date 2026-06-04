@extends('parent.dashboard')

@section('content')
<div class="container shadow wrapper h-100">
    <div class="page-content">
        {{-- Student Details --}}
        <div class="d-flex justify-content-between">
            <div>
                <h4 style="color:#045397">{{ $student->fullname() }} </h4>
                <hr>
            </div>
        </div>
        @if($student->student_details->digitalVerificationOfGraduation)
            <a href="{{ route('parent.request-verification-of-graduation-pdf',$student->id) }}" class="btn my-3 mr-3 blue-button-outline"><i class="fas fa-download"></i> Download  Graduation Letter</a>
        @endif
        <h5 style="color:#E9580C;">Request Verification of Graduation Letter</h5>
        <p>This is the description of the service. Lorem ipsum dolor sit amet</p>
         <p>I also want to receive notarization and apostille (Optional)</p>
        @if(!$student->student_details->digitalVerificationOfGraduation)
            <div>
                <input class="type" type="radio" value="1" checked name="type" form="verification-of-graduation-form" required>Verification of Graduation Letter(digital) <span style="color:#E9580C">($30.00)</span> 
            </div>
        @endif
         <div>
            <input class="type" type="radio" value="2" name="type" form="verification-of-graduation-form" required>Verification of Graduation Letter(physical) <span style="color:#E9580C">($180.00)</span> 
        </div>

        <div class="number-copies" style="display:none">
            <p class="mb-0">Number of copies</p>
            <div class="d-flex justify-content-start align-items-center">
                <button class="btn minus">-</button>
                <span class="total" id="copies">{{ $copies }}</span>
                <button class="btn plus">+</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between align-items-center">
        <h5>Total Amount: <span style="color:#ee6123 !important" id="total">$30.00</span></h5>
        <form action="{{ route('parent.request-verification-of-graduation-payment',$student->id) }}" id="verification-of-graduation-form">
            {{ csrf_field() }}
            <input type="hidden" name="total" id="total-amount-input" value="30">
            <input type="hidden" name="copies" id="copies-input" value="1">
            <button class="orange-button">Proceed to Payment</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.type').on('click',function(){
        if($(this).val() == 1){
            $('.number-copies').css('display','none')
            $('#total').html('$30.00');
            $('#total-amount-input').val(total);
            $('#copies-input').val(1)
            
        }
        else{
            $('.number-copies').css('display','block')
            let copies = $('#copies').html();
            let total = copies * 180;
            $('#total-amount-input').val(total);
            $('#total').html('$'+total.toFixed(2))
            $('#copies-input').val(copies)
        }
    });

    $('.plus').on('click',function(){
        let copies = $('#copies').html();
        copies ++;
        let total = copies * 180;
        $('#copies').html(copies)
         $('#total').html('$'+total.toFixed(2))
        $('#total-amount-input').val(total);
        $('#copies-input').val(copies)
    })

    $('.minus').on('click',function(){
        let copies = $('#copies').html();
        copies --;
        if(copies < 1){
            copies = 1;
        }
        let total = copies * 180;
        $('#copies').html(copies)
         $('#total').html('$'+total.toFixed(2))
        $('#total-amount-input').val(total);
        $('#copies-input').val(copies)
    })
</script>
@endsection