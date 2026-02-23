@extends('educator.dashboard')

@section('content')
<div class="shadow container bg-white my-3">
	<form action="{{ route('educator.update-question-exam', $question->id) }}" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="container" style="padding:30px;">
			<h3 class="text-center page-headings">Edit Question</h3>	
			<div class="row">
				<div class="col-md-12 my-2">
					<label>Your question</label>
            		<textarea  rows="5" name="question" required class="form-control" placeholder="Question">{{ $question->question }}</textarea>
				</div>
					
				<div class="col-md-12 text-center">
					<hr>
					<button class="btn btn-info">Edit Question </button>
				</div>
			</div>
		</div>
	</form>
	<div class="col-md-8 offset-md-2 text-center my-2">
		<form action="{{ route('educator.delete-exam-question') }}" method="POST">
			{{csrf_field()}}
			<input type="hidden" name="id" value="{{$question->id}}">
			<button class="btn btn-danger">Delete Question</button>
		</form>
	</div>
	<div class="col-md-8 offset-md-2 text-center my-2 mt-4">
		<a href="{{ route('educator.add-exam-question') }}" class="btn btn-warning">Cancel</a>
	</div>
</div>
@endsection