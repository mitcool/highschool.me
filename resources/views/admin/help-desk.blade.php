@extends('admin_template')

@section('content')

<div class="shadow container jumbotron bg-white">
     <div class="text-left mb-3"> 
        <a href="{{ route('admin.single-help-desk') }}" class=" orange-button mb-3">New Message</a>
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
                <th>Title</th>
                <th>Message</th>
                <th>Date</th>
                <th>Link</th>
            </tr>
            @foreach ($help_desk as $hd)
                <th>{{ $hd->title }}</th>
                <th>{{ $hd->created_at->format('d.m.Y') }}</th>
                <th>{{ $hd->slug }}</th>
                <th><a href="{{ $hd->slug }}">Open</a> </th>
            @endforeach
        </thead>
        <tbody>
        
            
        </tbody>
    </table>

   
</div>
@endsection