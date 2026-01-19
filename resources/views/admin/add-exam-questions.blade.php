@extends('admin_template')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container shadow mx-auto" style="padding:30px; margin-top:20px;">
    <form action="{{ route('admin.exam-question-add') }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <h3 class="text-center">Add Exam Question</h3>   
        <div class="row">
            <div class="col-md-12 my-2">
                <label>Select course</label>
                <select class="form-control" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 my-2">
                <label>Your question</label>
                <textarea  rows="5" name="question" required class="form-control" placeholder="Question"></textarea>
            </div>

            <div class="col-md-12 text-center">
                <hr>
                <button class="btn btn-info">Add Question</button>
            </div>
        </div>
        <hr>
        <h3 class="text-center">List with existing questions</h3>
        <ul class="list-group text-center">
            @foreach($questions as $question)
            <a href="{{ route('admin.update-exam-question', $question->id) }}">
                <li class="list-group-item">{{$question->question}}</li>
            </a>
            @endforeach
        </ul>  
    </form>
</div>
@endsection

@section('scripts')

@endsection