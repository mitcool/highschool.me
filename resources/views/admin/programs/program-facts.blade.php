@extends('admin_template')

@section('css')
@endsection

@section('content')
<div class="container texts_container bg-light">
	<x-progress-bar step="2" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Add Youtube Video (link)</h2>
		<hr>
		<form method="POST" action="{{route('add-program-video')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="form-group">
						<label  class="font-weight-bold">Place an embed youtube link</label>
						<input type="text" class="form-control" name="link"  maxlength="190" required value="{{ $program->main_video ? $program->main_video->link :  old('link') }}">
						<input type="text" class="form-control" name="link_de"  maxlength="190" required value="{{ $program->main_video_de ? $program->main_video->link_de :  old('link_de)') }}">
						<input name="program_id" type="hidden" value="{{ $program_id }}">
					</div>
				</div>

				<div class="col-lg-12 text-center">
					<br>
					<button type="submit" class="btn btn-info">Add Video Now</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
