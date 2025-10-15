@extends('admin_template')

@section('css')
<style>
    .bg-grey{
        background-color:#EEEEEE;
    }
</style>
@endsection

@section('content')

<div class="container shadow" style="padding:20px;">

    <h1 class="text-center">Phone requests</h1>
    <div class="row border p-3 my-2 font-weight-bold bg-grey">
        <div class="col-md">NAME</div>
        <div class="col-md">EMAIL</div>
        <div class="col-md">PHONE</div>
        <div class="col-md">HOUR</div>
        <div class="col-md">CREATED AT</div>
    </div>
    @foreach ($general_requests as $request)
        <div class="request-wrapper">
            <div class="row border p-3 my-2 ">
                <div class="col-md d-flex align-items-center">{{ $request->name }}</div>
                <div class="col-md d-flex align-items-center">{{ $request->email }}</div>
                <div class="col-md d-flex align-items-center">(+{{ $request->phone_code}}) {{ $request->phonenumber }}</div>
                <div class="col-md d-flex align-items-center">{{ $request->hour}}</div>
                <div class="col-md">{{ $request->created_at->format('d.m.Y') }}</div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
            {{ $general_requests->links() }}
    </div>
</div>
@endsection

