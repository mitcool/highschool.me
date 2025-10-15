@extends('admin_template')

<style>
    @media print{
        * {
            display:inline;
        }
        script, style { 
            display:none; 
        }
        div {
            page-break-inside:avoid;
        }
    }
   
</style>
@section('content')
<div class="container shadow myContainer" style="padding:20px;" id="areaForPrint">
    <h1 class="text-center">Application details</h1>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Name</div>
        <div class="col-md-6">{{ $application->name }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Email</div>
        <div class="col-md-6">{{ $application->mail }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Program</div>
        <div class="col-md-6">{{ $application->program->translated->name }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Duration</div>
        <div class="col-md-6">{{ $application->learning_period }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Starting Date</div>
        <div class="col-md-6">{{ date('d.m.Y', strtotime($application->starting_date)) }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Birthday</div>
        <div class="col-md-6">{{ date('d.m.Y', strtotime($application->birthday)) }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Place Of Birth</div>
        <div class="col-md-6">{{ $application->place_of_birth }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Gender</div>
        <div class="col-md-6">{{ $application->gender }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Phone</div>
        <div class="col-md-6">+{{ $application->phone_number }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Country</div>
        <div class="col-md-6">{{ $application->country }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">City</div>
        <div class="col-md-6">{{ $application->city }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Address</div>
        <div class="col-md-6">{{ $application->address }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">ZIP</div>
        <div class="col-md-6">{{ $application->zip }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">How you learn about us</div>
        <div class="col-md-6">{{ $application->how_you_learn_about_us }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Why did you choose us</div>
        <div class="col-md-6">{{ $application->why_did_you_chose_us }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Payment option</div>
        <div class="col-md-6">{{ $application->payment_option }}</div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Passport</div>
        <div class="col-md-6">  
            <a download href="{{ asset('files/passport') }}/{{ $application->passport }}">Download</a>
        </div>    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">CV</div>
        <div class="col-md-6">  
            <a download href="{{ asset('files/cv') }}/{{ $application->cv }}">Download</a>
        </div>
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Degrees</div>
        <div class="col-md-6">  
            <a download href="{{ asset('files/degrees') }}/{{ $application->degrees }}">Download</a>
        </div>    
    </div>
    <div class="row border p-3 my-2">
        <div class="col-md-6 font-weight-bold">Reference Letter</div>
        <div class="col-md-6">  
            <a download href="{{ asset('files/reference_letter') }}/{{ $application->reference_letter }}">Download</a>
        </div>    
    </div>
 
</div>

<div class="row p-3 my-2 d-flex align-items-center justify-content-center">
    <button id="print" onclick="printPageArea('areaForPrint')" class="btn contact_btn_header" style="background: #025297;color:white;">Print</buttom>
</div>
@endsection

@section('scripts')
<script>
    function printPageArea(areaID){
        var printContent = document.getElementById(areaID).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContents;
        setTimeout(function () {
            location.reload();
        }, 500);
    }
</script>
@endsection
