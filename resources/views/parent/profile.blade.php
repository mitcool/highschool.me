@extends('parent.dashboard')

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
    .profile-picture-field {
        margin-top: 20px;
    }
    .profile-picture-label {
        display: block;
        margin-top: 0;
        margin-bottom: 14px;
    }
    .profile-picture-preview {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #9ca3af;
        display: block;
        margin-bottom: 18px;
    }
    .guardian-section-title {
        font-weight: bold;
        text-align: center;
        margin-bottom: 12px;
    }
    .guardian-conditional {
        display: none;
    }
    .guardian-help-text {
        color: #6b7280;
        font-size: 0.95rem;
        margin-top: 10px;
    }
</style>

@endsection
@section('content')
<div class="container wrapper ">
    @php
        $selectedGuardianRelationship = old('guardian_relationship', optional($guardianProfile)->relationship_type);
        $selectedCanMakeEducationalDecisions = old('can_make_educational_decisions');
        if (is_null($selectedCanMakeEducationalDecisions) && !is_null(optional($guardianProfile)->can_make_educational_decisions)) {
            $selectedCanMakeEducationalDecisions = (string) ((int) $guardianProfile->can_make_educational_decisions);
        }

        $selectedHasOtherGuardianWithRights = old('has_other_guardian_with_rights');
        if (is_null($selectedHasOtherGuardianWithRights) && !is_null(optional($guardianProfile)->has_other_guardian_with_rights)) {
            $selectedHasOtherGuardianWithRights = (string) ((int) $guardianProfile->has_other_guardian_with_rights);
        }
    @endphp
    <div>
        <h1 class="text-center h2 page-headings">Hello {{ auth()->user()->name }}, you can edit your profile details here.</h1>
        <form action="{{ route('parent.update-info') }}" method="POST" enctype="multipart/form-data" id="confirm-first" class="confirm-first">
            {{ csrf_field() }}

            <div class="shadow section" >
                <h3 class="font-weight-bold text-center">Personal Information</h3>
                <label for="">First Name*:</label>
                <input name="name" readonly required type="text" class="form-control" value="{{ auth()->user()->name }}">

                <label for="">Middle Name(optionals):</label>
                <input name="middlename" readonly required type="text" class="form-control" value="{{ auth()->user()->middlename }}">

                <label for="">Last Name:</label>
                <input name="email" readonly required type="text" class="form-control" value="{{ auth()->user()->surname }}">

                <div class="profile-picture-field">
                    <label for="avatar" class="profile-picture-label">Profile picture:</label>
                    @if(auth()->user()->avatar)
                        <img
                            src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}"
                            alt="Profile picture"
                            class="profile-picture-preview"
                        >
                    @endif
                    <div>
                        <input id="avatar" type="file" name="avatar">
                    </div>
                </div>
            </div>
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

            <div class="shadow section">
                <h3 class="guardian-section-title">Parent / Guardian Information</h3>

                <label for="guardian_relationship">Relationship to Student *</label>
                <select name="guardian_relationship" id="guardian_relationship" class="form-control" required>
                    <option value="" disabled {{ $selectedGuardianRelationship ? '' : 'selected' }}>-- Select your relationship to Student --</option>
                    <option value="mother" {{ $selectedGuardianRelationship === 'mother' ? 'selected' : '' }}>Mother</option>
                    <option value="father" {{ $selectedGuardianRelationship === 'father' ? 'selected' : '' }}>Father</option>
                    <option value="legal_guardian" {{ $selectedGuardianRelationship === 'legal_guardian' ? 'selected' : '' }}>Legal Guardian</option>
                    <option value="other" {{ $selectedGuardianRelationship === 'other' ? 'selected' : '' }}>Other</option>
                </select>

                <div id="guardian_relationship_other_wrapper" class="guardian-conditional">
                    <label for="guardian_relationship_other">Please specify relationship *</label>
                    <input
                        id="guardian_relationship_other"
                        name="guardian_relationship_other"
                        type="text"
                        class="form-control"
                        value="{{ old('guardian_relationship_other', optional($guardianProfile)->relationship_other) }}"
                    >
                </div>

                <label for="can_make_educational_decisions">Authorized to make educational decisions? *</label>
                <select name="can_make_educational_decisions" id="can_make_educational_decisions" class="form-control" required>
                    <option value="" disabled {{ is_null($selectedCanMakeEducationalDecisions) ? 'selected' : '' }}>-- Yes/No --</option>
                    <option value="1" {{ $selectedCanMakeEducationalDecisions === '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $selectedCanMakeEducationalDecisions === '0' ? 'selected' : '' }}>No</option>
                </select>

                <label for="has_other_guardian_with_rights">Is there another parent/legal guardian with educational rights? *</label>
                <select name="has_other_guardian_with_rights" id="has_other_guardian_with_rights" class="form-control" required>
                    <option value="" disabled {{ is_null($selectedHasOtherGuardianWithRights) ? 'selected' : '' }}>-- Yes/No --</option>
                    <option value="1" {{ $selectedHasOtherGuardianWithRights === '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $selectedHasOtherGuardianWithRights === '0' ? 'selected' : '' }}>No</option>
                </select>

                <div id="other_guardian_fields" class="guardian-conditional">
                    <label for="other_guardian_full_name">Full Name *</label>
                    <input
                        id="other_guardian_full_name"
                        name="other_guardian_full_name"
                        type="text"
                        class="form-control"
                        value="{{ old('other_guardian_full_name', optional($guardianProfile)->other_guardian_full_name) }}"
                    >

                    <label for="other_guardian_email">Email Address *</label>
                    <input
                        id="other_guardian_email"
                        name="other_guardian_email"
                        type="email"
                        class="form-control"
                        value="{{ old('other_guardian_email', optional($guardianProfile)->other_guardian_email) }}"
                    >

                    <label for="other_guardian_phone">Phone Number *</label>
                    <input
                        id="other_guardian_phone"
                        name="other_guardian_phone"
                        type="text"
                        class="form-control"
                        value="{{ old('other_guardian_phone', optional($guardianProfile)->other_guardian_phone) }}"
                    >
                </div>

                <p class="guardian-help-text">
                    <span class="font-weight-bold">Legal notice:</span>
                    Additional documentation may be requested in specific legal or administrative situations.*
                </p>
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
    function toggleGuardianRelationshipOther() {
        var relationship = $('#guardian_relationship').val();
        if (relationship === 'other') {
            $('#guardian_relationship_other_wrapper').show();
        } else {
            $('#guardian_relationship_other_wrapper').hide();
            $('#guardian_relationship_other').val('');
        }
    }

    function toggleOtherGuardianFields() {
        var hasOtherGuardian = $('#has_other_guardian_with_rights').val();
        if (hasOtherGuardian === '1') {
            $('#other_guardian_fields').show();
        } else {
            $('#other_guardian_fields').hide();
            $('#other_guardian_full_name').val('');
            $('#other_guardian_email').val('');
            $('#other_guardian_phone').val('');
        }
    }

    $(function () {
        toggleGuardianRelationshipOther();
        toggleOtherGuardianFields();

        $('#guardian_relationship').on('change', toggleGuardianRelationshipOther);
        $('#has_other_guardian_with_rights').on('change', toggleOtherGuardianFields);
    });
</script>
@endsection
