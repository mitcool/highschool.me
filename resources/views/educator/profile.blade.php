@extends('educator.dashboard')

@section('css')

<style>
    form label{
        margin-bottom: 0;
        font-weight: bold;
        margin-top:10px;
    }  
    .shadow.section{
        padding:20px;
        margin-top:10px;
    }
    .custom-checkbox{
       transform: scale(1.5);
       accent-color: #ff5722; /* Changes the checked background color */
    }
    .add-more-button{
        background:#DCEFFF;
        color:black;
        font-weight: bold;
    }
    .close-experience,
    .close-certificate,
    .close-qualification{
        cursor: pointer;
    }
</style>

@endsection
@section('content')
<div class="container wrapper ">
    <div>
        <h1 style="color:#045397" class="h2 text-center">Hello {{ auth()->user()->name }}, you can edit your profile details here.</h1>
        <form action="{{ route('educator.update-info') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            {{-- Personal Information --}}
            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Personal Information</h3>
                <label for="">First Name*:</label>
                <input name="name"  required type="text" class="form-control" value="{{ auth()->user()->name }}">

                <label for="">Middle Name(optional):</label>
                <input name="middlename"  type="text" class="form-control" value="{{ auth()->user()->middlename }}">

                <label for="">Last Name:</label>
                <input name="email"  required type="text" class="form-control" value="{{ auth()->user()->surname }}">

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Date of Birth:</label>
                        <input name="date_of_birth"  required type="date" class="form-control" @if(auth()->user()->educator_details) value="{{ auth()->user()->educator_details?->date_of_birth }}" @endif>
                    </div>
                    <div class="col-md-6">
                        <label for="">Place of Birth:</label>
                        <input name="place_of_birth"  required type="text" class="form-control" @if(auth()->user()->educator_details) value="{{ auth()->user()->educator_details->place_of_birth }}" @endif>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-6">
                        <label for="">Nationality:</label>
                        <select name="nationality"  required type="text" class="form-control" >
                            <option value="" selected disabled>-- Please select --</option>
                            @foreach ($countries as $country )
                                <option @if(auth()->user()->educator_details) {{ $country->id == auth()->user()->educator_details->nationality ? ' selected ' : '' }} @endif value="{{ $country->id }}">{{ $country->nicename }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Country of residence:</label>
                        <select name="country_of_residence"  required type="text" class="form-control" >
                            <option value="" selected disabled>-- Please select --</option>
                            @foreach ($countries as $country )
                                <option 
                                    @if(auth()->user()->educator_details) {{ $country->id == auth()->user()->educator_details->country_of_residence ? ' selected ' : '' }}  
                                    @endif 
                                    value="{{ $country->id }}">
                                        {{ $country->nicename }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Timezone:</label>
                        <input name="timezone" @if(auth()->user()->educator_details) value="{{ auth()->user()->educator_details->timezone }}" @endif required type="text" class="form-control" >
                    </div>
                    <div class="col-md-6">
                        <label for="">Password / National ID Number:</label>
                        <input name="national_id_number" @if(auth()->user()->educator_details) value="{{ auth()->user()->educator_details->national_id_number }}" @endif required type="text" class="form-control" >
                    </div>
                </div>

                <label for="">Languages (with CEFR level, e. g. English C2, Spanish B2)</label>
                <input name="languages" @if(auth()->user()->educator_details) value="{{ auth()->user()->educator_details->languages }}" @endif required type="text" class="form-control">

                <div class="d-flex mt-4 ">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}" alt="" style="width:40px;height:40px;margin-right:20px;">
                    @endif
                    <div>
                        <label for="" class="d-block">Profile picture:</label>
                        <input type="file" name="avatar">
                    </div>
                </div>
            </div>

            {{-- Tax information  --}}
             <div class="shadow section" >
                 <h3 class="font-weight-bold text-center">Tax Information</h3>
                 <div class="row">
                    <div class="col-md-6">
                        <label for="">Tax residency (country): </label>
                        <select name="tax_residency"  required type="text" class="form-control" >
                            <option value="" selected disabled>-- Please select --</option>
                            @foreach ($countries as $country )
                                <option
                                    @if(auth()->user()->tax_details) {{ auth()->user()->tax_details->tax_residency == $country->id ? ' selected ' : '' }} @endif
                                    value="{{ $country->id }}">
                                        {{ $country->nicename }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">National tax ID / SSN /ITIN:</label>
                        <input name="national_id_number"  required type="text" class="form-control" @if(auth()->user()->tax_details) value="{{ auth()->user()->tax_details->national_id_number }}" @endif>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        <label for="" class="d-block">Are you a U.S. tax resident?</label>
                        <div class="d-flex justify-content-start">
                            <div class="mx-2">
                                <input type="radio" value="0"  @if(auth()->user()->tax_details) {{ auth()->user()->tax_details->us_tax_resident == 0 ? ' checked ' : '' }} @endif required name="us_tax_resident" class="custom-checkbox">&nbsp;&nbsp; Yes (W-9 required)
                            </div>
                            <div class="mx-2">
                                <input type="radio" value ="1" @if(auth()->user()->tax_details)   {{ auth()->user()->tax_details->us_tax_resident == 1 ? ' checked ' : '' }} @endif  required name="us_tax_resident" class="custom-checkbox">&nbsp;&nbsp; No (W-8BEN required)
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Registration number / status</label>
                        <input type="text" name="registration_number" class="form-control" @if(auth()->user()->tax_details) value="{{ auth()->user()->tax_details->registration_number }}" @endif>
                    </div>
                </div>
             </div>

             {{-- Tax information  --}}
             <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Payment Information</h3>
                <label for="">Wise account holder name (must match your legal name)</label>
                <input name="wise_account"  required type="text" class="form-control"  @if(auth()->user()->wise_details) value="{{ auth()->user()->wise_details->wise_account }}" @endif>

                <label for="">Wise account email</label>
                <input name="wise_account_email"  required type="text" class="form-control" @if(auth()->user()->wise_details) value="{{ auth()->user()->wise_details->wise_account_email }}" @endif>
                
                <p>Please provide your Wise account details. Choose one of the following two options, depending on which receiving details your Wise account uses:</p>

                <div>
                    <input type="radio" required name="wise_option" class="custom-checkbox" value="0" @if(auth()->user()->wise_details) {{ auth()->user()->wise_details->wise_option == 0 ? ' checked ' : '' }} @endif>&nbsp; Option A — IBAN system (international / SWIFT)
                </div>

                <label for="">IBAN</label>
                <input name="iban" type="text" class="form-control" @if(auth()->user()->wise_details) value=" {{ auth()->user()->wise_details->iban }}@endif">

                <label for="">BIC / SWIFT</label>
                <input name="bic" type="text" class="form-control" @if(auth()->user()->wise_details)  value="{{ auth()->user()->wise_details->bic }}" @endif>

                <div>
                    <input type="radio" required name="wise_option" value="1" class="custom-checkbox" @if(auth()->user()->wise_details) {{ auth()->user()->wise_details->wise_option == 1 ? ' checked ' : '' }} @endif>&nbsp; Option B — US routing system (ACH / wire)
                </div>

                <label for="">Account number</label>
                <input name="account_number"  type="text" class="form-control" @if(auth()->user()->wise_details) value="{{ auth()->user()->wise_details->account_number }}" @endif>

                <label for="">Routing number(ACH)</label>
                <input name="routing_number" type="text" class="form-control" @if(auth()->user()->wise_details) value="{{ auth()->user()->wise_details->routing_number }}" @endif>

                <label for="">Billing address (if different from residence)</label>
                <input name="billing_address" type="text" class="form-control" @if(auth()->user()->wise_details) value="{{ auth()->user()->wise_details->billing_address }}" @endif>

            </div>

            {{-- Academic Qualifications  --}}
            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Academic Qualifications</h3>
                <div id="academic-qualifications">
                    @if(count(auth()->user()->qualifications) > 0)
                        @foreach (auth()->user()->qualifications as $qualification)
                             <div class="qualification-row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr/>    
                                        <div class="text-right">
                                            <span class="close-qualification">&times;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="d-block">Degree (BA / MA / PhD / other)</label>
                                        <input type="text" class="form-control" value="{{ $qualification->degree }}" name="degree[]" required> 
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Field of study</label>
                                        <input type="text" name="field_of_study[]" value="{{ $qualification->field_of_study }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="d-block">Institution</label>
                                        <input type="text" class="form-control" name="institution[]" required  value="{{ $qualification->institution }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Country</label>
                                        <input type="text" name="academic_country[]" class="form-control" required value="{{ $qualification->academic_country }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="d-block">Year of graduation</label>
                                        <input type="text" name="year_of_graduation[]" class="form-control" required value="{{ $qualification->year_of_graduation }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">GPA / final grade</label>
                                        <input type="text" name="gpa[]" class="form-control" required value="{{ $qualification->gpa }}">
                                    </div>
                                </div>
                             </div>
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="d-block">Degree (BA / MA / PhD / other)</label>
                                <input type="text" class="form-control" name="degree[]" required> 
                            </div>
                            <div class="col-md-6">
                                <label for="">Field of study</label>
                                <input type="text" name="field_of_study[]" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="d-block">Institution</label>
                                <input type="text" class="form-control" name="institution[]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <input type="text" name="academic_country[]" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="d-block">Year of graduation</label>
                                <input type="text" name="year_of_graduation[]" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">GPA / final grade</label>
                                <input type="text" name="gpa[]" class="form-control" required>
                            </div>
                        </div>
                    @endif
                </div>
                <button id="add-more-qualifications" type="button" class="btn mt-2 add-more-button">Add More</button>
            </div>

            {{-- Teaching Qualifications --}}
            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">5. Teaching Qualifications & Certifications</h3>
                <div id="teaching-qualifications">
                    @if(count(auth()->user()->certificates) > 0)
                        @foreach (auth()->user()->certificates as $key => $certificate )
                            <div class="certificate-row">
                                <hr/>    
                                <div class="text-right">
                                    <span class="close-certificate">&times;</span>
                                </div>
                                <label for="">Certificate (name, issuer, year, ID/number)</label>
                                <input type="text" name="certificate[]" class="form-control" value="{{ $certificate->name }}">
                            </div>
                        @endforeach
                    @else
                        <label for="">Certificate  (name, issuer, year, ID/number)</label>
                        <input type="text" name="certificate[]" class="form-control">
                    @endif
                </div>
                 <button id="add-more-certificates" type="button" class="btn mt-2 add-more-button">Add More</button>
            </div>

            {{-- Professional Experience --}}
            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Professional Experience</h3>
                <div id="professional-experience">
                    @if(auth()->user()->experience)
                        @foreach (auth()->user()->experience as $experience)
                            <div class="experience-row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr/>    
                                        <div class="text-right">
                                            <span class="close-experience">&times;</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="d-block">Institution / Company</label>
                                        <input type="text" value="{{ $experience->company }}" name="company[]" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Position / role</label>
                                        <input type="text" value="{{ $experience->position }}" name="position[]" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="d-block">Country</label>
                                        <input type="text" name="experience_country[]" value="{{ $experience->experience_country }}" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">From (MM/YYYY)</label>
                                        <input type="text" name="from[]" value="{{ $experience->from }}" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">To (MM/YYYY)</label>
                                        <input type="text" name="to[]" value="{{ $experience->to }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="d-block">Institution / Company</label>
                                <input type="text" name="company[]" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Position / role</label>
                                <input type="text" name="position[]" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="d-block">Country</label>
                                <input type="text" name="experience_country[]" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">From (MM/YYYY)</label>
                                <input type="text" name="from[]" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">To (MM/YYYY)</label>
                                <input type="text" name="to[]" class="form-control">
                            </div>
                        </div>
                    @endif
                </div>
                 <button id="add-more-experience" type="button" class="btn mt-2 add-more-button">Add More</button>
            </div>

            {{-- Technical setup --}}
            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Technical setup</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="d-block">Webcam (model)</label>
                        <input type="text" name="camera" class="form-control" value="{{ auth()->user()->technical_setup ? auth()->user()->technical_setup->camera : '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Headset / Microphone</label>
                        <input type="text" name="microphone" class="form-control" value="{{ auth()->user()->technical_setup ? auth()->user()->technical_setup->microphone : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="d-block">Internet speed (Mbps down / up)</label>
                        <input type="text" name="internet_speed" class="form-control" value="{{ auth()->user()->technical_setup ? auth()->user()->technical_setup->internet_speed  : ''}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Quiet, professional space?</label>
                        <input type="text" name="quiet_place" class="form-control" value="{{ auth()->user()->technical_setup ? auth()->user()->technical_setup->quiet_place : '' }}">
                    </div>
                    <div class="col-md-12">
                        <label for="">LMS / platform experience (e.g. Canvas, Moodle, Google Classroom, Zoom)</label>
                        <textarea name="platform_experience" class="form-control" rows="5">{{ auth()->user()->technical_setup ? auth()->user()->technical_setup->platform_experience : '' }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Contact Information --}}
            <div class="shadow section" >
                 <h3 class="font-weight-bold text-center">Contact Information</h3>
            
                <label for="">Email:</label>
                <input name="email" required type="text" class="form-control" value="{{ auth()->user()->email }}">

                 <div>
                <label for="" class="d-block">Phone number:</label>
                <div class="row">
                    <div class="col-md-3">
                        <select name="phone_code" id="" class="form-control">
                            <option value="" selected disabled>Please select a phone code</option>
                            @foreach ($countries as $country )
                                <option
                                    @if(auth()->user()->invoice_details)
                                        {{ '+'.$country->phonecode == auth()->user()->invoice_details->phone_code ? ' selected ' : ''}}
                                    @else
                                        {{ '+'.$country->phonecode == old('phone_code') ? ' selected ' : ''}}
                                    @endif
                                    value="+{{ $country->phonecode }}">{{ $country->nicename }} +{{ $country->phonecode }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-9">
                        <input name="phone" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->phone : old('phone') }}">
                    </div>
                </div>
            </div>
            </div>

            {{-- Address Information --}}
              <div class="shadow section" >
                 <h3 class="font-weight-bold text-center">Address Information</h3>
               
                <label for="">Address Line 1*:</label>
                <input name="address" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->address : old('address') }}">
            
            <div>
                <label for="">Address Line 2(optional):</label>
                <input name="address_two"  type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->address_two : old('address_two') }}">
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">Zip code:</label>
                    <input name="zip" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->zip : old('zip') }}">
                </div>
                <div class="col-md-9">
                    <label for="">City:</label>
                    <input name="city" required type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->city : old('city') }}">
                </div>
            </div>
            <div>
                <label for="">State / Province / Region (optional):</label>
                <input name="state" type="text" class="form-control" value="{{ auth()->user()->invoice_details ? auth()->user()->invoice_details->state : old('state') }}">
            </div>
             <label for="">Country:</label>
                <select name="country_id" required type="text" class="form-control">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($countries as $country )
                        <option value="{{ $country->id }}" 
                            @if(auth()->user()->invoice_details)
                                {{  auth()->user()->invoice_details->country_id == $country->id ?' selected ' : ''  }}
                            @else
                                {{  old('country_id') == $country->id ? ' selected ' : '' }}   
                            @endif
                        >
                            {{ $country->nicename }}
                        </option>
                    @endforeach
                </select>
              </div>
            
            {{-- Declarations & Consents --}}
            <div class="shadow section" >
                 <h3 class="font-weight-bold text-center">Declarations & Consents</h3>
                 <div class="row align-items-center my-3 border p-2">
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-checkbox" name="contractor_status" @if(auth()->user()->educator_details) {{ auth()->user()->educator_details->consent == 1 ? 'checked' : '' }} @endif>
                    </div>
                    <div class="col-md-11">
                        <strong>Independent Contractor Status</strong>
                       <p class="mb-0">I confirm that I will provide services as an independent contractor, not as an employee. I am responsible for my own income tax, social security, and any other statutory contributions in my country of tax residence. I am free to accept or decline any session offered to me and may work for other clients.</p>
                    </div>
                 </div>
                 <div class="row align-items-center my-3 border p-2">
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-checkbox" name="background_check_consent" @if(auth()->user()->educator_details) {{ auth()->user()->educator_details->consent == 1 ? 'checked' : '' }} @endif>
                    </div>
                    <div class="col-md-11">
                        <strong>Background Check Consent</strong>
                        <p class="mb-0">I consent to a background check being conducted by the school or a third party engaged by the school, including verification of identity, criminal record, employment history, and academic credentials, to the extent permitted by the law of my country of residence.</p>
                    </div>
                 </div>
                 <div class="row align-items-center my-3 border p-2">
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-checkbox" name="convictions" @if(auth()->user()->educator_details) {{ auth()->user()->educator_details->consent == 1 ? 'checked' : '' }} @endif>
                    </div>
                    <div class="col-md-11">
                        <strong>No Disqualifying Convictions</strong>
                        <p class="mb-0">I declare that I have no criminal convictions, in particular none relating to minors, violence, fraud, or any offence that would disqualify me from working with students. I will inform the school immediately if this changes during our engagement.</p>
                    </div>
                 </div>
                 <div class="row align-items-center my-3 border p-2">
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-checkbox" name="fepra" @if(auth()->user()->educator_details) {{ auth()->user()->educator_details->consent == 1 ? 'checked' : '' }} @endif>
                    </div>
                    <div class="col-md-11">
                        <strong>Student Data Privacy (FERPA)</strong>
                        <p class="mb-0">I acknowledge that I will have access to student education records and that I will comply with the U.S. Family Educational Rights and Privacy Act (FERPA) and the school's data protection policy. I will not disclose, share, or use student information for any purpose other than fulfilling my teaching duties.</p>
                    </div>
                 </div>
                 <div class="row align-items-center my-3 border p-2">
                    <div class="col-md-1">
                        <input type="checkbox" class="custom-checkbox" name="gdpr" @if(auth()->user()->educator_details) {{ auth()->user()->educator_details->consent == 1 ? 'checked' : '' }} @endif>
                    </div>
                    <div class="col-md-11">
                        <strong>Student Data Privacy (FERPA)</strong>
                        <p class="mb-0">I acknowledge that the school will process my personal data (as collected in this form and during my engagement) for the purposes of contracting, payment, accreditation documentation, and personnel administration. Where I reside in the European Union or United Kingdom, processing is carried out in accordance with the GDPR. I have the right to access, correct, or request deletion of my data, subject to legal retention requirements.</p>
                    </div>
                 </div>
            </div>
            <div class="text-center">
                <button class="btn btn-large btn-info">Update info</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(`#add-more-qualifications`).on('click',function(){
            $('#academic-qualifications').append(`
                <div class="qualification-row">
                    <div class="row">
                        <div class="col-md-12">
                            <hr/>    
                            <div class="text-right">
                                <span class="close-qualification">&times;</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="d-block">Degree (BA / MA / PhD / other)</label>
                            <input type="text" class="form-control" name="degree[]" required> 
                        </div>
                        <div class="col-md-6">
                            <label for="">Field of study</label>
                            <input type="text" name="field_of_study[]" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="d-block">Institution</label>
                            <input type="text" class="form-control" name="institution[]" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Country</label>
                            <input type="text" name="academic_country[]" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="d-block">Year of graduation</label>
                            <input type="text" name="year_of_graduation[]" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">GPA / final grade</label>
                            <input type="text" name="gpa[]" class="form-control" required>
                        </div>
                    </div>
                </div>`)
        });

        $(document).on('click','.close-qualification',function(){
            if($('.qualification-row').length > 1){
                $(this).closest('.qualification-row').remove()
            }
            
        });

        $('#add-more-certificates').on('click',function(){
            let count  = $('.certificate-row').length + 2;
            $('#teaching-qualifications').append(`
                    <div class="certificate-row">
                        <hr/>    
                        <div class="text-right">
                            <span class="close-certificate">&times;</span>
                        </div>
                        <label for="">Certificate ${count} (name, issuer, year, ID/number)</label>
                        <input type="text" name="certificate[]" class="form-control">
                    </div>`
            )
        })

         $(document).on('click','.close-certificate',function(){
            if($('.certificate-row').length > 1){
                $(this).closest('.certificate-row').remove()
            }
        });

        $('#add-more-experience').on('click',function(){
            $('#professional-experience').append(`
                <div class="experience-row">
                    <div class="row">
                        <div class="col-md-12">
                            <hr/>    
                            <div class="text-right">
                                <span class="close-experience">&times;</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="d-block">Institution / Company</label>
                            <input type="text" name="company[]" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Position / role</label>
                            <input type="text" name="position[]" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="d-block">Country</label>
                            <input type="text" name="experience_country[]" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">From (MM/YYYY)</label>
                            <input type="text" name="from[]" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">To (MM/YYYY)</label>
                            <input type="text" name="to[]" class="form-control">
                        </div>
                    </div>
                </div>`)

           
        })
        $(document).on('click','.close-experience',function(){
            if($('.experience-row').length > 1){
                $(this).closest('.experience-row').remove()
            }
        });
    </script>
@endsection