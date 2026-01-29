@extends('admin_template')

@section('css')
<style>
    a.list-group-item {
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<div class="container shadow mx-auto mt-4 p-4">

    {{-- ADD QUESTION FORM --}}
    <form action="{{ route('admin.exam-question-add') }}" method="POST">
        @csrf

        <h3 class="text-center mb-4">Add Exam Question</h3>

        <div class="row">

            <div class="col-md-12 mb-3">
                <label class="mb-0 font-weight-bold">Select course</label>
                <select class="form-control" name="course_id" required>
                    <option value="">-- Select Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label class="mb-0 font-weight-bold">Your question</label>
                <textarea rows="5"
                          name="question"
                          required
                          class="form-control"
                          placeholder="Question"></textarea>
            </div>
             <div class="col-md-12 mb-3">
                <label class="mb-0 font-weight-bold">Select type</label>
                <select class="form-control" name="type" required>
                    <option value="">-- Select Exam Type --</option>
                    <option value="0">Pre-Exam</option>
                    <option value="1">Final Exam</option>
                </select>
            </div>
            <div class="col-md-12 text-center">
                <hr>
                <button class="btn btn-info px-4">Add Question</button>
            </div>

        </div>
    </form>

    {{-- FILTER --}}
    <hr>
    <h3 class="text-center mb-3">Filter Questions by Course</h3>

    <form method="GET" action="{{ route('admin.add-exam-question') }}">
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <select name="course_id"
                        class="form-control"
                        onchange="this.form.submit()">
                    <option value="">-- All Courses --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                            {{ request('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
                <label class="mb-0 font-weight-bold">Select type</label>
                <select  name="type" 
                        class="form-control" 
                        onchange="this.form.submit()">
                        {{-- Null check because of 0 bool check issue --}}
                    <option value="" selected disabled>-- Select Exam Type --</option>
                    <option {{ null != request('type') && request('type') == 0 ? 'selected ' : '' }} value="0">Pre-Exam</option>
                    <option {{ null != request('type') && request('type') == 1 ? 'selected ' : '' }} value="1">Final Exam</option>
                </select>
            </div>
        </div>
    </form>

    {{-- QUESTIONS LIST --}}
    <h3 class="text-center mb-3">Existing Questions</h3>

    <ul class="list-group text-center mb-3">
        @forelse($questions as $question)
            <a href="{{ route('admin.update-exam-question', $question->id) }}"
               class="list-group-item list-group-item-action">
                {{ $question->question }}
            </a>
        @empty
            <li class="list-group-item text-muted">
                No questions found for this course
            </li>
        @endforelse
    </ul>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-center">
        {{ $questions->appends(request()->query())->links() }}
    </div>

</div>
@endsection

@section('scripts')
@endsection
