@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
     <div class="text-left mb-3"> 
        <a href="{{ route('parent.new-inquiry') }}" class=" orange-button mb-3">New Inquiry</a>
    </div>
    <table class="table">
        <thead>
            <tr style="background: #045397;color:white;border-top-right-radius:15px;">
                <th style="border-top-left-radius:10px;">Inbox</th>
                <th>Sent</th>
                <th></th>
                <th style="border-top-right-radius:10px;"></th>
            </tr>
            <tr>
                <th>Headline</th>
                <th>Sender</th>
                <th>Date</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
        
            
        </tbody>
    </table>

   
</div>
@endsection