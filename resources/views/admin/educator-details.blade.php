@extends('admin_template')

@section('css')
<style>
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
</style>
@endsection

@section('content')

<div class="container my-3 shadow bg-white p-3">
    <h1 class="text-center">{{ $educator->fullname() }}</h1>
        <div class="profile-picture-field">
            @if(auth()->user()->avatar)
                <img
                    src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}"
                    alt="Profile picture"
                    class="profile-picture-preview"
                >
            @endif
        </div>
    <table class="table">
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="font-weight-bold">Personal Information</h4>
            </th>
        </tr>
        <tr>
            <th>Full Name</th>
            <td>{{ $educator->fullname() }}</td>
        </tr>
        
        <tr>
            <th>Date of Birth</th>
            <td>{{ $educator->educator_details?->date_of_birth ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Place of Birth</th>
            <td>{{ $educator->educator_details?->place_of_birth ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td>{{ $educator->educator_details?->nationality ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Country of residence</th>
            <td>{{ $educator->educator_details?->country_of_residence ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Timezone</th>
            <td>{{ $educator->educator_details?->timezone ?? 'N/a' }}</td>
        </tr>
        
        <tr>
            <th>National id number</th>
            <td>{{ $educator->educator_details?->national_id_number ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Languages</th>
            <td>{{ $educator->educator_details?->languages ?? 'N/a' }}</td>
        </tr>
         <tr>
            <th colspan="2" class="text-center">
                <h4 class="font-weight-bold">Tax Information</h4>
            </th>
        </tr>
        <tr>
            <th>Tax residency (country)</th>
            <td>{{ $educator->tax_details?->tax_country->nicename ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>National tax ID / SSN /ITIN</th>
            <td>{{ $educator->tax_details?->national_id_number ?? 'N/a' }}</td>
        </tr>
       
        <tr>
            <th>U.S. tax resident?</th>
            <td>{{  $educator->tax_details?->us_tax_resident ?? 'N/a'  }}</td>
        </tr>
        <tr>
            <th>Registration number</th>
            <td>{{  $educator->tax_details?->registration_number ?? 'N/a'  }}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="font-weight-bold">Payment Information</h4>
            </th>
        </tr>
        <tr>
            <th>Wise Account Holder Name</th>
            <td>{{ $educator->wise_details?->wise_account ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Wise Account Email</th>
            <td>{{ $educator->wise_details?->wise_account_email ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Wise Option</th>
            <td>{{ $educator->wise_details?->wise_option ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>IBAN</th>
            <td>{{ $educator->wise_details?->iban ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>BIC</th>
            <td>{{ $educator->wise_details?->bic ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Account Number</th>
            <td>{{ $educator->wise_details?->account_number ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Routing Number</th>
            <td>{{ $educator->wise_details?->routing_number ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th>Billing_address</th>
            <td>{{ $educator->wise_details?->billing_address ?? 'N/a' }}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="font-weight-bold">Academic Qualifications</h4>
            </th>
        </tr>
        @foreach($educator->qualifications as $qualification)
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>Degree</th>
                <td>{{ $qualification->degree }}</td>
            </tr>
            <tr>
                <th>Field of study</th>
                <td>{{ $qualification->field_of_study }}</td>
            </tr>
            <tr>
                <th>Institution</th>
                <td>{{ $qualification->institution }}</td>
            </tr>
            <tr>
                <th>Academic Country</th>
                <td>{{ $qualification->academic_country }}</td>
            </tr>
            <tr>
                <th>Year of graduation</th>
                <td>{{ $qualification->year_of_graduation }}</td>
            </tr>
            <tr>
                <th>GPA</th>
                <td>{{ $qualification->gpa }}</td>
            </tr>
             <tr>
        </tr>
        @endforeach

        <th colspan="2" class="text-center">
            <h4 class="font-weight-bold">Teaching Qualifications & Certifications</h4>
        </th>
        @foreach ($educator->certificates as $certificate )
        <tr>
            <td colspan="2">{{ $certificate->name }}</td>
        </tr>
        
        @endforeach

        <th colspan="2" class="text-center">
            <h4 class="font-weight-bold">Professional Experience</h4>
        </th>
        @foreach ($educator->experience as $experience )
        <tr>
            <th>Company</th>
            <td>{{ $experience->company }}</td>
        </tr>
        <tr>
            <th>Position</th>
            <td>{{ $experience->position }}</td>
        </tr>
        <tr>
            <th>Experience Country</th>
            <td>{{ $experience->experience_country }}</td>
        </tr>
        <tr>
            <th>Period</th>
            <td>{{ $experience->from }} - {{ $experience->to }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        @endforeach
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="font-weight-bold">Technical setup</h4>
            </th>
        </tr>
         <tr>
            <th>Camera</th>
            <td>{{ $experience->technical_setup?->camera ?? 'N/a'}}</td>
        </tr>
        <tr>
            <th>Microphone</th>
            <td>{{ $experience->technical_setup?->microphone ?? 'N/a'}}</td>
        </tr>
        <tr>
            <th>Internet Speed</th>
            <td>{{ $experience->technical_setup?->internet_speed ?? 'N/a'}}</td>
        </tr>
        <tr>
            <th>Technical Setup</th>
            <td>{{ $experience->technical_setup?->quiet_place ?? 'N/a'}}</td>
        </tr>
        <tr>
            <th>Platform experience</th>
            <td>{{ $experience->technical_setup?->platform_experience ?? 'N/a'}}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="font-weight-bold">Contact Information</h4>
            </th>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $educator->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>({{ $educator->invoice_details->phone_code }}) {{ $educator->invoice_details->phone }}</td>
        </tr>
        <tr>
            <th colspan="2" class="text-center">
                <h4 class="font-weight-bold">Address Information</h4>
            </th>
        </tr>
        <tr>
            <th>Address 1</th>
            <td>{{ $educator->invoice_details->address }}</td>
        </tr>
        <tr>
            <th>Address 2</th>
            <td>{{ $educator->invoice_details->address_two }}</td>
        </tr>
        <tr>
            <th>ZIP / Postal Code  & City</th>
            <td>{{ $educator->invoice_details->zip }} {{ $educator->invoice_details->city }}</td>
        </tr>
         <tr>
            <th>State / Province / Region (optional)</th>
            <td>{{ $educator->invoice_details->state }}</td>
        </tr>
        <tr>
            <th>Country </th>
            <td>{{ $educator->invoice_details->country_id }}</td>
        </tr>
    </table>
</div>

@endsection