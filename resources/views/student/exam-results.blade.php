@extends('student.dashboard')

@section('content')
<div class="container my-5">
    <div class=" graduation-card p-4">
       <h1 class="text-center page-headings">{{ $exam->course->course->title }}</h1>
        <h2 class="text-center">{{ $exam->student->fullname() }}</h2>
        <h5 class="text-center">Type of exam: <span class="font-weight-bold">{{ $exam->type == 1 ? 'Open Questions Exam' : 'Essay' }}</span>()</h5>
         @if($exam->type == 1)
                @foreach ($answers as $key => $answer )
                    <div class="shadow p-2 my-3">
                        <h5 class="font-weight-bold mb-0" style="color: #045397">Question {{ $key + 1 }}</h5>
                        <p class="font-italic">{{ $answer->question->question }}</p>
                        <h5 class="font-weight-bold mb-0" style="color: #045397">Answer {{ $key + 1 }}</h5>
                        <p class="font-italic">{{ $answer->answer }}</p>
                        <h5 class="font-weight-bold mb-0" style="color: #045397">Educator Feedback {{ $key + 1 }}</h5>
                        <p class="font-italic">{{ $answer->comment }}</p>
                    </div>
                @endforeach
            @else
                <div class="text-right">
                    <a class="text-decoration-none btn btn-secondary" href="{{ asset('exams') }}/{{ $exam->id }}/{{ $answers[0]->answer }}" target="_blank" download"><i class="fas fa-download"></i> Download here</a>
                </div>
            @endif
            <div class="shadow p-2 my-3" style="font-size:1.3rem;">
                <label for=""class="text-danger mb-0 mt-2">Grade</label>
                <p class="font-italic" >{{ $exam->grade }}</p>
                <label for=""class="text-danger mb-0 mt-2">Summary</label>
                <p class="font-italic">{{ $exam->comment }}</p>
            </div>
    </div>
</div>
@endsection