@extends('student.dashboard')

@section('css')
<style>
    @media print {
    body {
        display: none !important;
    }
}
</style>
@endsection
@section('content')
<div class="container my-5">
    @if($exam->status == 0)
    <div class="page-content table-container mx-auto mt-5">
        <h2 class="text-center mb-4">{{ $exam->course->course->title }}</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam pariatur, magnam cupiditate quod consequuntur aperiam soluta debitis enim quae omnis et sequi nobis beatae nesciunt voluptatibus! Quisquam sit sapiente voluptatibus!</p>
        <div class="col-12 text-right mt-2">
			<div class="font-weight-bold">
                <span class="highlighted_text">Time left:</span>
                <span id="timer"></span>
            </div>
		</div>
        @if($exam->type == 1)
             <form action="{{ route('submit-exam',$exam->id) }}" method="POST" enctype="multipart/form-data" id="exam-form">
                {{ csrf_field() }}
                @foreach ($questions as $key => $question)
                <div class="shadow p-3">
                    <h4 style="color: #045397;">Question {{ $key+1 }}</h4>
                    <p class="font-weight-bold">{{ $question->question }}</p>
                    <textarea required name="answers[{{ $question->id }}]" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
             @endforeach
             
            <div class="d-flex justify-content-center mt-3">
                <button class="orange-button">Submit Exam</button>
            </div>
            </form>
        @else
            <form action="{{ route('submit-exam',$exam->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <hr>
                <input type="file" name="essay" required>
                <hr>
                <div class="d-flex justify-content-center mt-3">
                    <button class="orange-button">Submit Exam</button>
                </div>
            </form>
        @endif
    </div>
    @elseif($exam->status==1)
     <div class="page-content table-container mx-auto mt-5">
        <h2 class="text-center mb-4">{{ $exam->course->course->title }}</h2>
        <p class="text-center">Your exam was successfully submitted, you will be informed when your grade is ready</p>
    @else
    <div class="page-content table-container mx-auto mt-5">
        <h2 class="text-center mb-4">{{ $exam->course->course->title }}</h2>
        <p class="text-center">
            {{ $exam->grade() }}
        </p>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
function blockEvent(e, reason) {
    e.preventDefault();
    console.warn(reason);
}
document.addEventListener("copy", e => blockEvent(e, "Copy blocked"));
document.addEventListener("cut", e => blockEvent(e, "Cut blocked"));
document.addEventListener("paste", e => blockEvent(e, "Paste blocked"));
 let timeRemaining = 60; // 60 minutes in seconds

  function updateTimer() {
    const hours = Math.floor(timeRemaining / 3600);
    const minutes = Math.floor((timeRemaining % 3600) / 60);
    const seconds = timeRemaining % 60;

    document.getElementById("timer").textContent =
      String(hours).padStart(2, "0") + ":" +
      String(minutes).padStart(2, "0") + ":" +
      String(seconds).padStart(2, "0");

    if (timeRemaining > 0) {
      timeRemaining--;
    } else {
      document.getElementById('exam-form').submit();
     
      return;
    }
  }
  updateTimer(); // initial render
  const timerInterval = setInterval(updateTimer, 1000);
</script>
@if($exam->status == 0 && $exam->type == 1)
    <script>
        
        let violations = 0;
        const MAX_VIOLATIONS = 1;

        function handleViolation(reason) {
            violations++;


            // if (violations >= MAX_VIOLATIONS) {
            //     //Auto-submit or lock exam
            //     $.ajax({
            //             method: "POST",
            //             url: "{{route('fail-exam', $exam->id)}}",
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         }).done(function(response) {
            //             window.location.reload();
            //         });
            // }
        }

        // Detect tab switch or minimize
        document.addEventListener("visibilitychange", (e) => {
            e.preventDefault();
            // alert('works')
            if (document.hidden) {
                handleViolation("Tab switched or page hidden");
            }
        });

        // // Detect window focus loss
        window.addEventListener("blur", (e) => {
            e.preventDefault();
            // alert('works')
            handleViolation("Window lost focus");
        });
        
     
    </script>
@endif
@endsection