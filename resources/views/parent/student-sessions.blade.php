@extends('parent.dashboard')

@section('content')
<div class="bg-white w-75" style="padding:30px;">
    <div class="page-content" style="padding:20px;">
        <h1>Premier Learning Services</h1>
         <h2 class="h5">Access high-quality learning and mentoring options to elevate your educational experience.</h2>
         <hr>
        <h4 class="h4" style="color:#045397">{{ $student->name }} {{ $student->surname }}</h4>
             @if($student->date_of_birth) 
             <p class="mb-0">Born: {{ $student->date_of_birth->format('d.m.Y')}}</p> 
              @endif
        <hr>

        <div class="row">
            <div class="col-md-8" >
            @foreach ($sessions as $session )
                    <div class="shadow" style="border-radius:5px;padding:20px;">
                        <h4 style="color:#E9580C;font-weight:bold">{{ $session->name }}</h4>
                        <hr>
                        <p>Fee per Session: ${{ $session->price() }}</p>
                        <p>Number of Sessions:</p>
                        <div class="d-flex justify-content-start align-items-center">
                            <form action="{{ route('change-session-count',[$session->id,'decrease']) }}" method="POST">
                                {{ csrf_field() }}
                                 <button class="btn">-</button>
                            </form>
                            <span class="total">{{$session->session_count ?? 0 }}</span>
                            <form action="{{ route('change-session-count',[$session->id,'increase']) }}" method="POST">
                                {{ csrf_field() }}
                                 <button class="btn">+</button>
                            </form>
                            
                        </div>
                        <p>Total: <span style="color:#E9580C">${{$session->formatted_total ?? number_format($session->price,2,'.',',') }}</span></p>
                        
                    </div>
                
            @endforeach
            </div>
            <div class="col-md-4">
                <div class="shadow" style="border-radius:5px;padding:20px;">
                <p class="h4 text-center" style="color:#045397;font-weight:bold;">Your Booking Summary</p>
                <hr>
                @foreach ($sessions as $session )
                    @if($session->session_count > 0)
                    <div style="font-size:1rem;display:flex;justify-content:space-between;margin-top:4px;">
                        <span>{{ $session->name }}  ({{ $session->session_count }} x ${{ $session->price() }})</span>
                        <span class="font-weight-bold">${{ $session->formatted_total }}</span>
                    </div>
                    @endif
                @endforeach
                <hr/>
                <div style="font-size:1.1rem;display:flex;justify-content:space-between;margin-top:4px;">
                    <span class="font-weight-bold">Total amount:</span>
                    <span class="font-weight-bold">${{ number_format($total,2,'.',',') }}</span>
                </div>
                <hr>
               <a class="orange-button" href="{{ route('parent.student.sessions.checkout',$student->id) }}">Proceed to checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection