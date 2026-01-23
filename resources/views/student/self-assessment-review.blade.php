@extends('student.dashboard')

@section('css')

@endsection

@section('content')
<div class="container" style="max-width: 900px;">

    <h2 class="text-center text-primary fw-bold mb-4">
        Self-assessment Test – Review
    </h2>

    @foreach($attemptQuestions as $index => $aq)
        @php
            $question = $aq->question;
            $selectedAnswerId = $aq->selected_answer_id;
            $correctAnswerId = $question->answers->firstWhere('is_correct', true)?->id;
            $isCorrect = $selectedAnswerId == $correctAnswerId;
        @endphp

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                {{-- Question title --}}
                <h5 class="fw-bold {{ $isCorrect ? 'text-success' : 'text-danger' }}">
                    Question {{ $index + 1 }}
                </h5>

                {{-- Question text --}}
                <p class="{{ $isCorrect ? 'text-success' : 'text-danger' }}">
                    {{ $question->question }}
                </p>

                {{-- Answers --}}
                @foreach($question->answers as $answerIndex => $answer)
                    @php
                        $isSelected = $answer->id == $selectedAnswerId;
                        $isCorrectAnswer = $answer->is_correct;
                    @endphp

                    <div class="form-check mb-2">
                        <input class="form-check-input"
                               type="radio"
                               disabled
                               {{ $isSelected ? 'checked' : '' }}>

                        <label class="form-check-label
                            {{ $isCorrectAnswer ? 'fw-bold text-success' : '' }}
                            {{ $isSelected && !$isCorrectAnswer ? 'text-danger' : '' }}">
                            {{ chr(65 + $answerIndex) }}/ {{ $answer->answer }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <p class="fw-bold mb-0">
                Correct answers:
                <span class="text-primary">
                    {{ $correctAnswers }} from {{ $totalQuestions }}
                </span>
            </p>

            <p class="fw-bold mb-0">
                Final result:
                <span class="text-primary">
                    {{ $totalPoints }} points
                </span>
            </p>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('student.my-courses') }}"
           class="btn btn-warning text-white px-5">
            Back to Courses
        </a>
    </div>

</div>
@endsection
