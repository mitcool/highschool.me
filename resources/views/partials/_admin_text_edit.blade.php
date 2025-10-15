<h4>Texts English</h4>
	@foreach($texts_en as $text)
		<form action="/admin-dashboard/change-text/en" method="POST">
			{{csrf_field()}}
			@if(strlen($text->text)>50)
			<textarea class="ckeditor" name="text" id="test_{{$text->id}}">{!!$text->text!!}</textarea>
			@else
			<input type="text" class="form-control" name="text" value="{{$text->text}}">
			@endif
			<input type="hidden" name="id" value="{{$text->id}}">
			<button class="btn publish-btn my-2">Save New Text</button>
		</form>
		<hr>
	@endforeach

	<h4>Texts German</h4>
	@foreach($texts_de as $text)
		<form action="/admin-dashboard/change-text/de" method="POST">
			{{csrf_field()}}
			@if(strlen($text->text)>50)
			<textarea class="ckeditor" name="text" id="test_{{$text->id}}">{!!$text->text!!}</textarea>
			@else
			<input type="text" class="form-control" name="text" value="{{$text->text}}">
			@endif
			<input type="hidden" name="id" value="{{$text->id}}">
			<button class="btn publish-btn my-2">Save New Text</button>
		</form>
		<hr>
	@endforeach

	<h4>Texts Bulgarian</h4>
	@foreach($texts_bg as $text)
		<form action="/admin-dashboard/change-text/bg" method="POST">
			{{csrf_field()}}
			@if(strlen($text->text)>50)
			<textarea class="ckeditor" name="text" id="test_{{$text->id}}">{!!$text->text!!}</textarea>
			@else
			<input type="text" class="form-control" name="text" value="{{$text->text}}">
			@endif
			<input type="hidden" name="id" value="{{$text->id}}">
			<button class="btn publish-btn my-2">Save New Text</button>
		</form>
		<hr>
	@endforeach