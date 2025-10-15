@extends('admin_template')

@section('css')
<style>
    .bg-grey{
        background-color:#EEEEEE;
    }
</style>
@endsection

@section('content')

<div class="w-75 mx-auto shadow" style="padding:20px;">

    <h1 class="text-center">Free fact requests</h1>
    <div class="row border p-3 my-2 font-weight-bold bg-grey">
        <div style="width:10%;" class="d-flex align-items-center">NAME</div>
        <div style="width:20%;" class="d-flex align-items-center">EMAIL</div>
        <div style="width:20%;" class="d-flex align-items-center">PHONE</div>
        <div style="width:30%;" class="d-flex align-items-center">PROGRAM</div>
        <div style="width:10%;" class="d-flex align-items-center">LANGUAGE</div>
        <div style="width:10%;" class="d-flex align-items-center">CREATED AT</div>
    </div>
    @foreach ($general_requests as $request)
        <div class="request-wrapper">
            <div class="row border p-3 my-2" style="text-overflow: ellipsis;">
                <div style="width:10%;" class="d-flex align-items-center">{{ $request->firstname }} {{ $request->surname }}</div>
                <div style="width:20%;" class="d-flex align-items-center">{{ $request->email }}</div>
                <div style="width:20%;" class="d-flex align-items-center">(+{{ $request->phonecode}}) {{ $request->phone }}</div>
                <div style="width:30%;" class="d-flex align-items-center">{{ $request->program}}</div>
                <div style="width:10%;" class="d-flex align-items-center">{{ $request->communication_language}}</div>
                <div style="width:10%;" class="d-flex align-items-center">{{ $request->created_at->format('d.m.Y') }}</div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
            {{ $general_requests->links() }}
    </div>
</div>
@endsection

