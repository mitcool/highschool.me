@extends('admin_template')

@section('content')
    <div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
        <h1 class="text-center page-headings">{{ $exam->course->course->title }}</h1>
        <h2 class="text-center">{{ $exam->student->fullname() }}</h2>
        <h5 class="text-center">Type of exam: <span class="font-weight-bold">{{ $exam->type == 1 ? 'Open Questions Exam' : 'Essay' }}</span></h5>
        @if($exam->status == 2)
            @if($exam->type == 1)
                @foreach ($answers as $key => $answer )
                    <div class="shadow p-2 my-3">
                        <h5 class="font-weight-bold mb-0" style="color: #045397">Question {{ $key + 1 }}</h5>
                        <p class="font-italic">{{ $answer->question->question }}</p>
                        <h5 class="font-weight-bold mb-0" style="color: #045397">Answer {{ $key + 1 }}</h5>
                        <p class="font-italic">{{ $answer->answer }}</p>
                        <h5 class="font-weight-bold mb-0" style="color: #045397">Admin Feedback {{ $key + 1 }}</h5>
                        <p class="font-italic">{{ $answer->comment }}</p>
                    </div>
                @endforeach
            @else
                <div class="text-right">
                    <a class="text-decoration-none btn btn-secondary" href="{{ asset('exams') }}/{{ $exam->id }}/{{ $answers[0]->answer }}" target="_blank" download"><i class="fas fa-download"></i> Download here</a>
                </div>
            @endif
            <div class="shadow p-2 my-3">
                <label for=""class="text-danger mb-0 mt-2">Grade</label>
                <p class="font-italic">{{ $exam->grade }}</p>
                <label for=""class="text-danger mb-0 mt-2">Summary</label>
                <p class="font-italic">{{ $exam->comment }}</p>
            </div>
        
                
        @else
            @if($exam->type == 1)
                <form method="POST" action="{{ route('evaluate-exam',$exam->id) }}">
                    @foreach ($answers as $key => $answer )
                        <div class="shadow p-2">
                            <h5 class="font-weight-bold mb-0" style="color: #045397">Question {{ $key + 1 }}</h5>
                            <p class="font-italic">{{ $answer->question->question }}</p>
                            <h5 class="font-weight-bold mb-0" style="color: #045397">Answer {{ $key + 1 }}</h5>
                            <p class="font-italic">{{ $answer->answer }}</p>
                            <p class="mb-0 text-danger">Add Comment:</p>
                            <textarea required name="answer_comment[{{ $answer->id }}]" id=""  class="form-control"></textarea>
                        </div>
                    @endforeach
                        <label for=""class="text-danger mb-0 mt-2">Grade</label>
                        <input type="number" name="grade" class="form-control" step="0.1" required>
                        <label for=""class="text-danger mb-0 mt-2">Add overall comment</label>
                        <input type="text" name="exam_comment" class="form-control" required>
                        <div class="mt-2 d-flex justify-content-center">
                            <button class="orange-button">SUBMIT</button>
                        </div>
                </form>
            @else
                @foreach ($answers as $answer )
                    <a class="text-decoration-none btn btn-secondary" href="{{ asset('exams') }}/{{ $exam->id }}/{{ $answer->answer }}" target="_blank" download><i class="fas fa-download"></i> Download here</a>

                    <form method="POST" action="{{ route('evaluate-exam',$exam->id) }}">
                            <label for=""class="text-danger mb-0 mt-2">Grade</label>
                            <input type="number" name="grade" class="form-control" required>
                            <label for=""class="text-danger mb-0 mt-2">Add overall comment</label>
                            <input type="text" name="exam_comment" class="form-control" required>
                            <div class="mt-2 d-flex justify-content-center">
                                <button class="orange-button">SUBMIT</button>
                            </div>
                    </form>
                @endforeach
            @endif
        @endif
    </div>
@endsection