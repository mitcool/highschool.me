@extends($template)

@section('content')

<div class="shadow container jumbotron bg-white">
     <div class="text-left mb-3"> 
        <a href="{{ auth()->user()->role_id == 2 
            ? route('parent.new-help-desk') 
            : route('student.new-help-desk') }}" class=" orange-button mb-3">New Message</a>
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
            <tr>
                <th>
                    @if($hd->is_new == 1 )
                        <i class="fa fa-envelope" style="color:#045397" aria-hidden="true"></i> 
                    @else 
                        <i class="fa fa-envelope-open" style="color:#E9580E" aria-hidden="true"></i> 
                    @endif {{ $hd->title }}</th>
                <th>{{ $hd->created_at->format('d.m.Y') }}</th>
                <th>{{ $hd->slug }}</th>
                {{-- <th><a href="{{ route('single-help-desk',$hd->slug)  }}">Open</a> </th> --}}
            </tr>
                
            @endforeach
        </thead>
        <tbody>
        
            
        </tbody>
    </table>
</div>
@endsection