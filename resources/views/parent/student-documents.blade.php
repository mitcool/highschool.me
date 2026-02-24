@extends('parent.dashboard')

@section('css')

<style>
    .custom-form-label{
        border:1px solid lightgray;
        padding:8px;
        margin-right: 10px;
        border-radius: 8px;
        cursor: pointer;
    }
    .custom-file-input{
        position: absolute;
        left: -9999px;  
    }
    label{
        margin-bottom: 0!important;
    }
    .error-message{
        color:red;
        font-size:0.7rem;
    }
</style>
@endsection
@section('content')
<div class="shadow container my-3 bg-white">
    <h1 class="text-center page-headings">Documents</h1>
    <form action="{{ route('parent.student.documents.submit') }}" method="POST" enctype="multipart/form-data" id="document-form">
        {{ csrf_field() }}
        <div  class="mb-3">
            <label for="" class="font-weight-bold mb-0">Applies for:<span class="text-danger">*</span></label>
            @if($student->student_details->track == 3)
            <select type="email" required name="grade" class="form-control" readonly>
                <option value="0" selected disabled>International Transfer Program</option>
            </select>
            @else
          
            <select type="email" required name="grade" class="form-control">
                <option value="" selected disabled>Please select</option>
                <option {{ old('grade') == 9 ? ' selected ' : '' }} value="9">9th Grade</option>
                <option {{ old('grade') == 10 ? ' selected ' : '' }} value="10">10th Grade</option>
                <option {{ old('grade') == 11 ? ' selected ' : '' }} value="11">11th Grade</option>
                <option {{ old('grade') == 12 ? ' selected ' : '' }} value="12">12th Grade</option>
            </select>
            @endif
        </div>
        <div style="padding:10px 0 ;">
            <h4 style="color:#045397;font-weight-bold">Upload Documentation</h4>
            <p>Please ensure that the files are uploaded in PDF format</p>
        </div>
        {{-- Parent ID --}}
         <div class="mb-3 d-flex justify-content-between">
            <div>
                <p class="font-weight-bold mb-0">Parents IDs (Passports or Government IDs) <span class="text-danger">*</span></p>
                <span class="error-message" id="parent_id_error"></span>
            </div>
            <label for="parent_id" class="custom-form-label">
               <i class="fas fa-upload"></i> Upload File
            </label>
            <input class="custom-file-input" name="parent_id"  type="file" id="parent_id" accept="application/pdf">
        </div>

        {{-- Custody Document --}}
        <div class="mb-3 d-flex justify-content-between">
            <div>
                <p class="font-weight-bold mb-0 ">Custody Document (if applicable) <span class="text-danger">*</span></p>
                <span class="error-message" id="custody_document_error"></span>
            </div>
            <label for="custody_document" class="custom-form-label">
                <i class="fas fa-upload"></i> Upload File
            </label>
            <input class="custom-file-input" name="custody_document" type="file" id="custody_document" accept="application/pdf">
        </div>

        {{-- Proof of residence --}}
        <div class="mb-3 d-flex justify-content-between">
            <div>
                <p class="font-weight-bold mb-0">Proof of Residence <span class="text-danger">*</span></p>
                <span class="error-message" id="proof_of_residence_error"></span>
            </div>
            <label for="proof_of_residence" class="custom-form-label">
                <i class="fas fa-upload"></i> Upload File
            </label>
            <input name="proof_of_residence" class="custom-file-input"  type="file" id="proof_of_residence" accept="application/pdf">
        </div>

        {{-- Student ID --}}
         <div class="mb-3 d-flex justify-content-between">
            <div>
                <p class="font-weight-bold mb-0 ">Student ID (Passport or Government ID) <span class="text-danger">*</span></p>
                <span class="error-message" id="student_id_error"></span>
            </div>
            
            <label for="student_id" class="custom-form-label">
                  <i class="fas fa-upload"></i> Upload File
            </label>
            <input name="student_id" class="custom-file-input" type="file" id="student_id" accept="application/pdf">
        </div>

        {{-- Birth Certificate --}}
        <div class="mb-3 d-flex justify-content-between">
            <div>
                 <p  class="font-weight-bold mb-0 ">Student Birth Certificate <span class="text-danger">*</span></p>
                 <span class="error-message" id="birth_certificate_error"></span>
            </div>
            <label for="birth_certificate" class="custom-form-label">
                <i class="fas fa-upload"></i> Upload File
            </label>
            <input name="birth_certificate" type="file" class="custom-file-input" id="birth_certificate" accept="application/pdf">
        </div>

        {{-- School Transcript --}}
        <div class="mb-3 d-flex justify-content-between">
            <div>
                <p  class="font-weight-bold mb-0 ">Latest School Transcript / Report Card <span class="text-danger">*</span></p>
                <span class="error-message" id="school_transcript_error"></span>
            </div>
            <label for="school_transcript" class="custom-form-label">
                  <i class="fas fa-upload"></i> Upload File
            </label>
            <input name="school_transcript" class="custom-file-input" type="file" id="school_transcript" accept="application/pdf">
        </div>

        {{-- Withdrawal Confirmation  --}}
         <div class="mb-3 d-flex justify-content-between">
            <div>
                <p  class="font-weight-bold mb-0 ">Withdrawal Confirmation from Previous School (optional)</p>
                <span class="error-message" id="withdrawal_confirmation_error"></span>
            </div> 
            <label for="withdrawal_confirmation" class="custom-form-label">
                  <i class="fas fa-upload"></i> Upload File
            </label>
            <input name="withdrawal_confirmation" class="custom-file-input"  type="file" id="withdrawal_confirmation" accept="application/pdf">
        </div>

        {{-- IEP --}}
        <div class="mb-3 d-flex justify-content-between">
            <div>
                <p  class="font-weight-bold mb-0 ">IEP / 504 Plan with Medical Documentation (optional)</p>
                <span class="error-message" id="iep_error"></span>
            </div>
            <label for="iep" class="custom-form-label">
                  <i class="fas fa-upload"></i> Upload File
            </label>
            <input name="iep" class="custom-file-input"  type="file" id="iep" accept="application/pdf">
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.custom-file-input').on('change',function(){
                var file = this.files[0];
                $('.error-message').html('')
                if (file) {
                    var fileName = file.name;          
                    var fileExtension = fileName.split('.').pop(); 
                    if(fileExtension != 'pdf'){
                        alert('Please upload pdf file');
                    }
                    else{
                        if(fileName.length > 10){
                            fileName = fileName.substring(0,8)+'...'+fileExtension
                        }
                        $(this).closest('div').find('.custom-form-label')
                                .css('color','#fff')
                                .css('background','#28a745')
                                .html(fileName)
                    }
                }
                else{
                    return;
                }
            })
  
        });
       
        document.getElementById('document-form').addEventListener('submit', function (e) {
           
            if ($('#parent_id').get(0).files.length === 0) {
                e.preventDefault();
                $('#parent_id_error').html('Please upload parent ID');
            }
            if ($('#custody_document').get(0).files.length === 0) {
                e.preventDefault();
                $('#custody_document_error').html('Please upload custody document');
            }
            if ($('#proof_of_residence').get(0).files.length === 0) {
                e.preventDefault();
                $('#proof_of_residence_error').html('Please upload proof of residence');
            }
            if ($('#student_id').get(0).files.length === 0) {
                e.preventDefault();
                $('#student_id_error').html('Please upload student ID');
            }
            if ($('#birth_certificate').get(0).files.length === 0) {
                e.preventDefault();
                $('#birth_certificate_error').html('Please upload birth certificate');
            }
            if ($('#school_transcript').get(0).files.length === 0) {
                e.preventDefault();
                $('#school_transcript_error').html('Please upload school transript');
            }
        })
     
    </script>
@endsection