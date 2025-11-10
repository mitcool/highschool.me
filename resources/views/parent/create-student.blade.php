@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">Add child</h1>
    <form action="{{ route('student.add') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Fullname<span class="text-danger">*</span></label>
            <input type="text" required name="name" class="form-control">
        </div>
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Email<span class="text-danger">*</span></label>
            <input type="email" required name="email" class="form-control">
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
        <div class="text-right">
            <button class="shadow orange-button">Send</button>
        </div>
    </form>
</div>
@endsection