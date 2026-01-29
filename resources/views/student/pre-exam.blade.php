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
   
    <div class="page-content table-container mx-auto mt-5">
        <h2 class="text-center mb-4"></h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam pariatur, magnam cupiditate quod consequuntur aperiam soluta debitis enim quae omnis et sequi nobis beatae nesciunt voluptatibus! Quisquam sit sapiente voluptatibus!</p>
        <div class="col-12 text-right mt-2">
			<div class="font-weight-bold">
                <span class="highlighted_text">Time left:</span>
                <span id="timer"></span>
            </div>
		</div>
        <form action="{{ route('submit-exam',0) }}" method="POST" enctype="multipart/form-data" id="exam-form">
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
       
    </div>
    
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
 let timeRemaining = 90 * 60; // 60 minutes in seconds

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

    <script>
        
        let violations = 0;
        const MAX_VIOLATIONS = 5;

        function handleViolation(reason) {
            violations++;

            if(violations == 1 || violations == 2){
               
                alert('First Warning')
            }
            if(violations == 3 || violations == 4){
               
                alert('Second Warning')
            }
            if (violations >= MAX_VIOLATIONS) {
                //Auto-submit or lock exam
                $.ajax({
                        method: "POST",
                        url: "{{route('fail-exam', 0)}}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function(response) {
                        window.location.reload();
                    });
            }
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

@endsection