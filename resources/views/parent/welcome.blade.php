@extends('parent.dashboard')

@section('css')

@endsection

@section('content')
<div class="shadow container wrapper">    
  <div class="row my-3"  style="padding:30px;">
    <div class="col-md-12">
        <h2 class="text-center">Welcome {{ auth()->user()->fullname() }}</h2>
        <hr>
        <div>
          <p><span class="font-weight-bold">Meetings</span> – List of all scheduled meetings.</p>
          <p><span class="font-weight-bold">My Courses</span> – List of all courses in which you're enrolled.</p>
          <p><span class="font-weight-bold">My Exams</span> – All your exams.</p>
          <p><span class="font-weight-bold">My Diplomas</span> – My diplomas and certificates.</p>
          <p><span class="font-weight-bold">Study Mentor</span> – Your AI mentors.</p>
          <p><span class="font-weight-bold">Ambassador Program</span> – Become ambassador and win amazing prizes.</p>
          <p><span class="font-weight-bold">Help Desk</span> – You have a specific question. Message us.</p>
        </div>
    </div>  
</div>
@endsection

@section('scripts')

@endsection