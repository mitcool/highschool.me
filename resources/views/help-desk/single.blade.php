@extends($template)

@section('content')
   <div class="container jumbotron bg-white">
        <h2 class="font-weight-bold text-center" style="color:#003A6B;margin-bottom:20px;"><i class="fa fa-envelope-open" aria-hidden="true"></i> Message</h2>
        @foreach($help_desk_messages as $hd)
            <div class="shadow {{ $hd->is_admin==1 ? ' bg-light ' : '' }}" style="padding:20px;margin-top:10px;" >   
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-bold mb-0">From: {{ $hd->user->fullname() }}</h5>
                    <p class="mb-0">{{ $hd->created_at->format('d.m.Y') }}</p>
                </div>
                <hr>
                <p><span>Title:</span> {{ $hd->title }}</p>
                <p><span>Message:</span> {{ $hd->message }}</p>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('help-desk') }}" class="blue-button-outline btn btn-lg mx-3">Close</a>
            <a href="{{ route('new-help-desk',$help_desk_messages[0]->slug) }}" class="orange-button btn-lg btn mx-3">Reply</a>
        </div>
    </div>
@endsection