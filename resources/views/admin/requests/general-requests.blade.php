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

    <h1 class="text-center">General requests</h1>
    <div class="row border p-3 my-2 font-weight-bold bg-grey">
        <div class="col-md">NAME</div>
        <div class="col-md">EMAIL</div>
        <div class="col-md">SUBJECT</div>
        <div class="col-md">REQUEST TYPE</div>
        <div class="col-md"></div>
    </div>
    @foreach ($general_requests as $request)
        <div class="request-wrapper">
            <div class="row border p-3 my-2 ">
                <div class="col-md d-flex align-items-center">{{ $request->name }}</div>
                <div class="col-md d-flex align-items-center">{{ $request->email }}</div>
                <div class="col-md d-flex align-items-center">{{ $request->subject}}</div>
                <div class="col-md d-flex align-items-center">{{ $request->request_type}}</div>
                <div class="col-md">
                    <button class="btn btn-link text-primary details-link">Details...</button>
                </div>
            </div>
            <div class="d-none details">
                <div class="row border bg-grey p-3">
                    <div class="col-md"><span class="font-weight-bold">Name: </span>{{ $request->name }}</div>
                </div>
                <div class="row border bg-grey p-3">
                    <div class="col-md"><span class="font-weight-bold">Email: </span>{{ $request->email }}</div>
                </div>
                <div class="row border bg-grey p-3">
                    <div class="col-md"><span class="font-weight-bold">Subject: </span>{{ $request->subject}}</div>
                </div>
                <div class="row border bg-grey p-3">
                    <div class="col-md"><span class="font-weight-bold">Request Type: </span>{{ $request->request_type}}</div>
                </div>
                <div class="row border bg-grey p-3">
                    <div class="col-md"><span class="font-weight-bold">Message: </span>{{ $request->message}}</div>
                </div>
                <div class="row border bg-grey p-3">
                    <div class="col-md"><span class="font-weight-bold">Created at: </span>{{ $request->created_at->format('d.m-Y') }}</div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
            {{ $general_requests->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){ 
        $('.details-link').on('click', function(){
            if( $(this).closest('.request-wrapper').find('.details').hasClass('d-none')){
                $(this).closest('.request-wrapper').find('.details').removeClass('d-none');
            }
            else{
                $(this).closest('.request-wrapper').find('.details').addClass('d-none');
            }
            
        })
     })
</script>
@endsection