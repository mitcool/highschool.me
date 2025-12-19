@extends('parent.dashboard')

@section('content')
    <div class="container jumbotron bg-white">
        <h2 class="font-weight-bold text-center" style="color:#003A6B;">Submit Inquiry</h2>
        <div class="shadow" style="padding:20px;">
            <form action="{{ route('parent.send-inquiry') }}" method="POST">
                {{ csrf_field() }}
                <label class="font-weight-bold mb-0 mt-2" for="" class="d-block" >Title</label>
                <input type="text" class="form-control" name="title" required />
                <label class="font-weight-bold mb-0 mt-2" for="">Message</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10" required></textarea>
                <div class="mt-2">
                    <button class="orange-button">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection