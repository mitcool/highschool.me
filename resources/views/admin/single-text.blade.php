@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection
	

@section('content')

<div class="shadow container wrapper">
	@if(Route::has($texts[0]->slug))
	<iframe src="{{ route($texts[0]->slug) }}" class="w-100" style="min-height: 400px;" frameborder="0"></iframe>
	@else
		<iframe src="{{ route('welcome') }}" class="w-100" style="min-height: 400px;" frameborder="0"></iframe>
	@endif
	<form action=" {{route('change-text')}}" method="POST">
	@csrf
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="page-headings">Edit {{$texts[0]->slug}} page</h2>
				<hr>
			</div>
			<div class="col-md-12">
				@foreach($texts as $text)
					<div class="shadow p-3 bg-light my-4">
						<h4 class="font-weight-bold my-3 text-center">{{$text->title}}</h4>
						@if($text->editor == 0)
							<input type="text" name="text_en[]" value="{{$text->text_en}}" class="form-control" required/>
						@else
							<textarea type="text" name="text_en[]" class="ckeditor" required/>{{$text->text_en}}</textarea>
						@endif
						<input type="hidden" name="id[]" value="{{$text->id}}" />
					</div>
				@endforeach
			</div>
	
			<div class="col-md-12 text-center">
				<hr>
				<button class="btn btn-warning orange-button">Update Texts</button>
				
			</div>
		</div>
	</form>
	
</div>
@endsection
