@extends($template)

@section('content')

<div class=" container wrapper shadow h-100"> 
     <div class="text-left mb-3"> 
        <a href="{{ route('new-help-desk') }}" class=" orange-button mb-3">New Message</a>
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
                <th>Date</th>
                <th>Ticket</th>
                <th>Link</th>
            </tr>
            @foreach ($help_desk as $hd)
            <tr>
                <th>
                    @if($hd[0]->is_new == 1 )
                        <i class="fa fa-envelope" style="color:#045397" aria-hidden="true"></i> 
                    @else 
                        <i class="fa fa-envelope-open" style="color:#E9580E" aria-hidden="true"></i> 
                    @endif {{ $hd[0]->title }}
                </th>
                <th>{{ $hd[0]->created_at->format('d.m.Y') }}</th>
                <th>{{ $hd[0]->slug }}</th>
                <th><a href="{{ route('single-help-desk',$hd[0]->slug)  }}">Open</a> </th>
            </tr>
                
            @endforeach
        </thead>
    </table>
</div>
@endsection