@extends('parent.dashboard')

@section('content')

<div class="container shadow bg-white" style="margin:50px auto">
    <div class=" page-content" style="padding:20px;">
            <h4 style="color:#045397">{{ $student->fullname() }}</h4>
            @if($student->date_of_birth) <p class="mb-0">Born: {{ $student->date_of_birth->format('d.m.Y')}}</p> @endif
            @if($student->student_details->track == 1 || $student->student_details->track == 2) 
                <p class="mb-0">Grade: {{ $student->student_details->grade }}</p>
            @endif
            <hr>
    </div>
    
    @if($status == 1)
            <h4 style="color:#E9580C">Pending Documentation Approval</h4>
            <p class="mb-0">This account is currently under review. You will be notified once the documents have been reviewed.</p>
            @if($student->student_details->feedback)
            <p class="mb-0 text-danger">{{ $student->student_details->feedback }}</p>
            @endif
    {{-- Pending enrollemnt and plan fee to be paind --}}
    @elseif($status == 2)
        <h4 style="color:#E9580C">Documentation is Approved</h4>
        @if($student->student_details->track == 3)
        <form action="{{ route('parent.transfer-program-pay',$student->id) }}" method="POST">
            {{ csrf_field() }}
            <p>The documentation for this student is approved. You must pay the following fees:</p>
            <input type="radio" checked readonly class="radio"> Enrolment Fee <span style="color:#E9580C">($300.00)</span> 
            <p>Mandatory International Transfer Program Fee:</p>
            <input type="radio" checked name="type" value="1" class="radio"> Per Year  <span style="color:#E9580C">($1900.00)</span><br>
            <input type="radio" name="type"  value="2" class="radio"> Per Month  <span style="color:#E9580C">($190.00)</span>
            <p>Mandatory International Transfer Program Fee:</p>
            <p class="mb-0 font-weight-bold mt-3">You can find more information about the Payment Plans <a href="{{ route('tuition') }}">HERE.</a></p>
            <hr>
            <div class="d-flex justify-content-between">
                <div class="total">
                    Total Fee:  <span>$2249.90</span>
                </div>
                <button class="orange-button">Proceed to Payment</button>
            </div>
        </form>
        @else
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
       
        
        <p class="mb-0 font-weight-bold mt-3">You can find more information about the Payment Plans <a href="{{ route('standard-high-school') }}">HERE.</a></p>
        <hr>
         <div class="d-flex justify-content-between">
            <div class="total">
                Total: <span id="total"></span>
            </div>
            <button class="orange-button">Proceed to Payment</button>
        </div>
       </form>
       @endif
       
    {{-- Active Student --}}
    @elseif($status == 3)
        <x-enrollment-table :student="$student"></x-enrollment-table>
        <h2 class="text-center" style="margin-top:50px;">Enrolled courses</h2>
       @foreach ($student->enrolled_courses as $enrolled_course)
            <div class="d-flex justify-content-between w-100 my-2">
                <p>{{ $enrolled_course->course->course->title }}</p>

                {{-- Status Enrolled -> 0 --}}
                @if($enrolled_course->status == 0)

                <form action="{{ route('update-enrolled-course-status',$enrolled_course->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn btn-outline-secondary"><i class="fas fa-clock"></i> Start Study</button>
                </form>  
                {{-- Status STATUS_START_STUDY -> 1 --}}
                @elseif($enrolled_course->status == 1) 
                <form action="{{ route('update-enrolled-course-status',$enrolled_course->id) }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-info"><i class="fas fa-clock"></i> Ready for Exam</button>
                </form>

                {{-- STATUS_READY_FOR_EXAM -> 2 --}}
                @elseif($enrolled_course->status == 2) 
                    <button class="btn  btn-outline-secondary">Pending Exam Date</button>
                {{-- STATUS_EXAM_APPOINTED -> 3 --}}
                 @elseif($enrolled_course->status == 3) 
                <button class="btn  btn-warning">Exam on date...</button>
                    {{-- STATUS_EXAM_SUBMITED->4  --}}
               @elseif($enrolled_course->status == 4) 
                    <button class="btn  btn-secondary">Pending Exam Results</button>
                    {{--STATUS_COMPLETED  --}}
               @elseif($enrolled_course->status == 5) 
                    <button class="btn  btn-success">Completed</button>
                @endif     

            </div> 
       @endforeach 


    {{-- Reupload documents --}}
    @elseif($status == 4)
    <form action="{{ route('parent.reupload.document',$student->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        @foreach ($student->documents as $document )
            @if($document->is_approved == 2)
            <div class="mb-3 d-flex  justify-content-between">
                <label  class="font-weight-bold mb-0 "> {{ $document->document_type->name }} <span class="text-danger">*</span></label>
                <input name="documents[]" required type="file" id="formFile">
                <input type="hidden" name="types[]" value="{{ $document->type }}">
            </div>
            @endif
        @endforeach
        <p><span class="text-danger">*</span> Required fields</p>
        <hr>
        <div class="text-right">
            <button class="shadow orange-button">Send</button>
        </div>
    </form>
    @endif
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function(){
        let payment_type = $('input[name=payment_type]:checked').val();
        let plan =  $('input[name=plan]:checked').attr('data-price-per-month');
        let total = Number(plan) + 300;
        $('#total').html('$' + total.toFixed(2));
        $('#total-without-enrollment').html('$' + Number(plan).toFixed(2));

        $('.plans').on('click',function(){
            let payment_type = $('input[name=payment_type]:checked').val();
            let plan_price = payment_type == 0 ? $(this).attr('data-price-per-month') : $(this).attr('data-price-per-year');
            let total = Number(plan_price) + 300;
            $('#total').html('$' + total.toFixed(2));
        });

        $('.payment-type').on('click',function(){
            let payment_type = $(this).val();
            let plan =  $('input[name=plan]:checked');
            let plan_price = payment_type == 0 ? plan.attr('data-price-per-month') : plan.attr('data-price-per-year');
            let total = Number(plan_price) + 300;
            $('#total').html('$' + total.toFixed(2));
        })
    })
</script>
@endsection