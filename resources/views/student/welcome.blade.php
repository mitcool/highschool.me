@extends('student.dashboard')

@section('css')
<style>
  .student-digital-card {
    width: 50%;
    padding: 20px;
  }
  .student-digital-card-image img,
  .student-digital-card-image i {
    width: 140px;
    display: block;
  }
  .student-digital-card-logo {
    margin-top: 10px;
  }
  .student-digital-card-info {
    margin-left: 20px;
    min-width: 0;
  }
  .student-digital-card-name {
    font-size: 1.7rem;
    color: #045397;
    margin-bottom: 0;
    font-weight: 600;
    line-height: 1.2;
    word-break: break-word;
  }
  @media (max-width: 1199px) {
    .student-digital-card {
      width: 70%;
    }
  }
  @media (max-width: 991px) {
    .student-digital-card {
      width: 100%;
      max-width: 640px;
    }
  }
  @media (max-width: 767px) {
    .student-digital-card {
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 18px 16px;
    }
    .student-digital-card-image img,
    .student-digital-card-image i {
      margin-left: auto;
      margin-right: auto;
    }
    .student-digital-card-info {
      margin-left: 0;
      margin-top: 18px;
      width: 100%;
    }
    .student-digital-card-info hr {
      margin-left: auto;
      margin-right: auto;
    }
  }
  @media (max-width: 480px) {
    .student-digital-card-name {
      font-size: 1.35rem;
    }
    .student-digital-card-image img,
    .student-digital-card-image i {
      width: 110px;
      font-size: 110px !important;
    }
  }
</style>
@endsection

@section('content')
<div class=" container wrapper">    
  <div class="row">
    <div class="col-md-12">
        <h2 class="text-center page-headings">Welcome {{ auth()->user()->fullname() }}</h2>
        <hr>
        <div>
          {{-- <p><span class="font-weight-bold">Meetings</span> – List of all scheduled meetings.</p>
          <p><span class="font-weight-bold">My Courses</span> – List of all courses in which you're enrolled.</p>
          <p><span class="font-weight-bold">My Exams</span> – All your exams.</p>
          <p><span class="font-weight-bold">My Diplomas</span> – My diplomas and certificates.</p>
          <p><span class="font-weight-bold">Study Mentor</span> – Your AI mentors.</p>
          <p><span class="font-weight-bold">Ambassador Program</span> – Become ambassador and win amazing prizes.</p>
          <p><span class="font-weight-bold">Help Desk</span> – You have a specific question. Message us.</p> --}}
          <div class="shadow mx-auto d-flex student-digital-card">
              <div class="image student-digital-card-image">
                  @if(auth()->user()->avatar)
                    <img src="{{ asset('images/avatars') }}/{{ auth()->id() }}/{{ auth()->user()->avatar }}" alt="">
                  @else
                    <i class="fas fa-user-circle" style="font-size: 140px;color: #045397;"></i>
                  @endif
                  <img src="{{ asset('images/logo.svg') }}" alt="" class="student-digital-card-logo">
              </div>
              <div class="info student-digital-card-info">
                  <p class="student-digital-card-name">{{ auth()->user()->fullname() }}</p>
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
