@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection
	

@section('content')

<div class="container my-3 p-3">
	<form action=" {{route('change-text')}}" method="POST">
	@csrf
		<div class="row">
			<div class="col-md-12 text-center">
				<h2>Edit {{$texts[0]->slug}} page</h2>
				<hr>
			</div>
			<div class="col-md-12">
				@foreach($texts as $text)
					<div class="shadow p-3 bg-light my-4">
						<h4 class="font-weight-bold my-3 text-center">{{$text->title}}</h4>
						@if($text->editor == 0)
							{{-- <label class="m-0 font-weight-bold">English</label> --}}
							<input type="text" name="text_en[]" value="{{$text->text_en}}" class="form-control" required/>
							{{-- <label class="m-0 font-weight-bold">Bulgarian</label>
							<input type="text" name="text_bg[]" value="{{$text->text_bg}}" class="form-control" required/>
							<label class="m-0 font-weight-bold">Spanish</label>
							<input type="text" name="text_es[]" value="{{$text->text_es}}" class="form-control" required/> --}}
							{{-- <label class="m-0 font-weight-bold">German</label>
							<input type="text" name="text_de[]" value="{{$text->text_de}}" class="form-control" required/> --}}
							{{-- <label class="m-0 font-weight-bold">Russian</label>
							<input type="text" name="text_ru[]" value="{{$text->text_ru}}" class="form-control" required/> --}}
						@else
							{{-- <label class="m-0 font-weight-bold">English</label> --}}
							<textarea type="text" name="text_en[]" class="ckeditor" required/>{{$text->text_en}}</textarea>
							{{-- <label class="m-0 font-weight-bold">Bulgarian</label>
							<textarea type="text" name="text_bg[]" class="ckeditor" required/>{{$text->text_bg}}</textarea>
							<label class="m-0 font-weight-bold">Spanish</label>
							<textarea type="text" name="text_es[]" class="ckeditor" required/>{{$text->text_es}}</textarea> --}}
							{{-- <label class="m-0 font-weight-bold">German</label>
							<textarea type="text" name="text_de[]" class="ckeditor" required/>{{$text->text_de}}</textarea> --}}
							{{-- <label class="m-0 font-weight-bold">Russian</label>
							<textarea type="text" name="text_ru[]" class="ckeditor" required/>{{$text->text_ru}}</textarea> --}}
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
