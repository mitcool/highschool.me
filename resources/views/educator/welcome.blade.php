@extends('educator.dashboard')

@section('content')
<div class="shadow container wrapper">    
  <div class="row my-3"  style="padding:30px;">
    <div class="col-md-12">
        <h2 class="text-center">Welcome {{ auth()->user()->fullname() }}</h2>
        <hr>
        <div>
          <p><span class="font-weight-bold">Your Courses</span> – List of all the courses which you're teaching!</p>
          <p><span class="font-weight-bold">Your Meetings</span> – List of all scheduled meetings.</p>
          <p><span class="font-weight-bold">Exams</span> – All available exams.</p>
          <p><span class="font-weight-bold">Exam Questions</span> – List of all previously added questions and also adding new questions.</p>
          <p><span class="font-weight-bold">Self Assesment Questions</span> – Add assessment questions.</p>
          <p><span class="font-weight-bold">Submitted Exams</span> – All exams submitted from the students for the respective course.</p>
          <p><span class="font-weight-bold">Credit Memos</span> – All credit memos for you.</p>
        </div>
    </div>	
</div>
@endsection