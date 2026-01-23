@extends('student.dashboard')

@section('css')

@endsection

@section('content')
<div class="container" style="max-width: 900px;">

    {{-- Title --}}
    <h2 class="text-center text-primary fw-bold mb-3">
        Self-assessment Test
    </h2>

    {{-- Description --}}
    <p class="text-muted text-center mb-4">
        Answer the following questions to assess your understanding of this material.
    </p>

    {{-- Timer --}}
    <div class="text-end fw-bold mb-3">
        Time left: <span id="timer">--:--:--</span>
    </div>

    {{-- Questions --}}
    <form method="POST" action="{{ route('student.self-assessment-test-submit', $attempt->id) }}" id="test-form">
        @csrf

        @foreach($questions as $index => $question)
            <div class="card shadow-sm mb-4">
                <div class="card-body">

                    <h5 class="text-primary fw-bold">
                        Question {{ $index + 1 }}
                    </h5>

                    <p class="text-muted">
                        {{ $question->question }}
                    </p>

                    @foreach($question->answers as $answerIndex => $answer)
                        <div class="form-check mb-2">
                            <input class="form-check-input"
                                   type="radio"
                                   name="answers[{{ $question->id }}]"
                                   value="{{ $answer->id }}"
                                   id="answer-{{ $answer->id }}">

                            <label class="form-check-label text-primary"
                                   for="answer-{{ $answer->id }}">
                                <span style="color: black;">{{ chr(65 + $answerIndex) }}/</span> {{ $answer->answer }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach

        <div class="text-center">
            <button class="btn btn-success px-5">
                Submit Test
            </button>
        </div>
    </form>

</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            let secondsLeft = {{ $duration }}; // seconds from controller

            function updateTimer() {

                if (secondsLeft <= 0) {
                    $('#timer').text('00:00:00');
                    $('#test-form').submit(); // auto submit
                    return;
                }

                let hours = Math.floor(secondsLeft / 3600);
                let minutes = Math.floor((secondsLeft % 3600) / 60);
                let seconds = secondsLeft % 60;

                $('#timer').text(
                    String(hours).padStart(2, '0') + ':' +
                    String(minutes).padStart(2, '0') + ':' +
                    String(seconds).padStart(2, '0')
                );

                secondsLeft--;
            }

            // Initial draw
            updateTimer();

            // Update every second
            setInterval(updateTimer, 1000);

        });
    </script>
@endsection