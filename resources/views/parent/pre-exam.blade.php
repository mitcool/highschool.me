@extends('parent.dashboard')

@section('content')
<div class="container my-5">
    <div class="graduation-card p-4">
        <h1 class="text-center page-headings">{{ $exam->course->course->title }}</h1>
        <h2 class="text-center">{{ $exam->student->fullname() }}</h2>
        <h5 class="text-center">Pre-Exam Submission</h5>

        @foreach ($answers as $key => $answer)
            <div class="shadow p-3 my-3">
                <h5 class="font-weight-bold mb-0" style="color: #045397">Question {{ $key + 1 }}</h5>
                <p class="font-italic">{{ optional($answer->question)->question }}</p>
                <h5 class="font-weight-bold mb-0" style="color: #045397">Answer {{ $key + 1 }}</h5>
                <p class="font-italic">{{ $answer->answer }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
