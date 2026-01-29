@extends('parent.dashboard')

@section('content')
<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">Documents</h1>
    <form action="{{ route('parent.student.documents.submit') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Applies for:<span class="text-danger">*</span></label>
            <select type="email" required name="grade" class="form-control">
                <option value="" selected disabled>Please select</option>
                <option {{ old('grade') == 9 ? ' selected ' : '' }} value="9">9th Grade</option>
                <option {{ old('grade') == 10 ? ' selected ' : '' }} value="10">10th Grade</option>
                <option {{ old('grade') == 11 ? ' selected ' : '' }} value="11">11th Grade</option>
                <option {{ old('grade') == 12 ? ' selected ' : '' }} value="12">12th Grade</option>
            </select>
        </div>
        <div style="padding:10px 0 ;">
            <h4 style="color:#045397;font-weight-bold">Upload Documentation</h4>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore temporibus distinctio a voluptatibus provident quisquam!</p>
        </div>
        
         <div class="mb-3 d-flex  justify-content-between">
            <label  class="font-weight-bold mb-0 ">Parents IDs (Passports or Government IDs) <span class="text-danger">*</span></label>
            <input name="parent_id" required type="file" id="formFile">
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label  class="font-weight-bold mb-0 ">Custody Document (if applicable) <span class="text-danger">*</span></label>
            <input name="custody_document" required type="file" id="formFile">
        </div>
        <div class="mb-3 d-flex justify-content-between"">
            <label  class="font-weight-bold mb-0 ">Proof of Residence <span class="text-danger">*</span></label>
            <input name="proof_of_residence" required type="file" id="formFile">
        </div>
         <div class="mb-3 d-flex justify-content-between">
            <label  class="font-weight-bold mb-0 ">Student ID (Passport or Government ID) <span class="text-danger">*</span></label>
            <input name="student_id" required type="file" id="formFile">
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label  class="font-weight-bold mb-0 ">Student Birth Certificate <span class="text-danger">*</span></label>
            <input name="birth_certificate" required type="file" id="formFile">
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label  class="font-weight-bold mb-0 ">Latest School Transcript / Report Card <span class="text-danger">*</span></label>
            <input name="school_transcript" required type="file" id="formFile">
        </div>
         <div class="mb-3 d-flex    justify-content-between">
            <label  class="font-weight-bold mb-0 ">Withdrawal Confirmation from Previous School (optional)</label>
            <input name="withdrawal_confirmation"  type="file" id="formFile">
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label  class="font-weight-bold mb-0 ">IEP / 504 Plan with Medical Documentation (optional)</label>
            <input name="iep"  type="file" id="formFile">
        </div> 
        <p><span class="text-danger">*</span> Required fields</p>
        <hr>
        <input type="radio" checked readonly style="accent-color: #E9580C; "> Documentation Approval Fee <span style="color:#E9580C">($150.00)</span>
        <div class="text-center">
            <input type="hidden" value="{{ $student->id }}" name="id" />
            <button class="shadow orange-button">Proceed</button>
        </div>
    </form>
</div>
</div>
@endsection