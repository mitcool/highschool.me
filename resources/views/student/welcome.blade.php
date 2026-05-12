@extends('student.dashboard')

@section('content')
<div class="container wrapper">    
  <div class="row my-3"  style="padding:30px;">
    <div class="col-md-12">
        <h2 class="text-center">Welcome {{ auth()->user()->fullname() }}</h2>
        <hr>
        <div>
          {{-- <p><span class="font-weight-bold">Meetings</span> – List of all scheduled meetings.</p>
          <p><span class="font-weight-bold">My Courses</span> – List of all courses in which you're enrolled.</p>
          <p><span class="font-weight-bold">My Exams</span> – All your exams.</p>
          <p><span class="font-weight-bold">My Diplomas</span> – My diplomas and certificates.</p>
          <p><span class="font-weight-bold">Study Mentor</span> – Your AI mentors.</p>
          <p><span class="font-weight-bold">Ambassador Program</span> – Become ambassador and win amazing prizes.</p>
          <p><span class="font-weight-bold">Help Desk</span> – You have a specific question. Message us.</p> --}}
          <div class="shadow w-50 mx-auto d-flex" style="padding:20px;">
              <div class="image">
                  <img src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}" alt="" style="width:140px;display:block">
                  <img src="{{ asset('images/logo.svg') }}" alt="" style="width:140px;display:block;margin-top:10px;">
              </div>
              <div class="info" style="margin-left:20px;">
                  <p style="font-size: 1.7rem;color:#045397;margin-bottom:0;font-weight:600;">{{ auth()->user()->fullname() }}</p>
                  <hr class="mt-0">
                  
                  <p class="mb-0">Date of Birth:</p>
                  <p class="font-weight-bold">{{ auth()->user()->date_of_birth() }}</p>
                  <p class="mb-0">Enrolled:</p>
                  <p class="font-weight-bold">{{ auth()->user()->created_at->format('d.m.Y') }}</p>
                  @if(auth()->user()->student_details->track == 1 || auth()->user()->student_details->track == 2 )
                  <p class="mb-0">Current Grade:</p>
                  <p class="font-weight-bold">{{ auth()->user()->student_details->grade }}</p>
                  @endif
                  <p class="mb-0">Student ID:</p>
                  <p class="font-weight-bold">{{ auth()->user()->student_id() }}</p>
              </div>
          </div>
        </div>
    </div>  
</div>
@endsection