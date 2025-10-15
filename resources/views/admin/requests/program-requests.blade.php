@extends('admin_template')

@section('css')
<style>
    .bg-grey{
        background-color:#EEEEEE;
    }
</style>
@endsection

@section('content')

<div class="shadow w-75 mx-auto" style="padding:20px;">

    <h1 class="text-center">Phone requests</h1>
    <div class="row border p-3 my-2 font-weight-bold bg-grey">
        <div style="width:15%" class="d-inline">NAME</div>
        <div style="width:15%" class="d-inline">EMAIL</div>
        <div style="width:15%" class="d-inline">PHONE</div>
        <div style="width:25%" class="d-inline">PROGRAM</div>
        <div style="width:10%" class="d-inline">CHANNEL</div>
        <div style="width:10%" class="d-inline">LANGUAGE</div>
        <div style="width:10%" class="d-inline">CREATED AT</div>
    </div>
    @foreach ($general_requests as $request)
        <div class="request-wrapper">
            <div class="row border p-3 my-2 ">
                <div style="width:15%;word-wrap:break-word;" class="d-inline">{{ $request->name }} {{ $request->last_name }}</div>
                <div style="width:15%;word-wrap:break-word;" class="d-inline">{{ $request->mail }}</div>
                <div style="width:15%;word-wrap:break-word;" class="d-inline">(+{{ $request->phonecode}}) {{ $request->phone_number }}</div>
                <div style="width:25%;word-wrap:break-word;" class="d-inline">{{ $request->program_name}}</div>
                <div style="width:10%;word-wrap:break-word;" class="d-inline">{{ $request->how_did_you_find}}</div>
                <div style="width:10%;word-wrap:break-word;" class="d-inline">{{ $request->communication_language}}</div>
                <div style="width:10%;word-wrap:break-word;" class="d-inline">{{ $request->created_at->format('d.m.Y') }}</div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
            {{ $general_requests->links() }}
    </div>
</div>
@endsection

