@extends('admin_template')

@section('content')
<div class="container-fluid texts_container">
	<form id="add_conference_form" method="POST" action="{{route('publish-new-conference')}}" enctype="multipart/form-data">
	@csrf
		<div class="row mx-2">
			<div class="col-lg-12 heading mt-4">
				<h1>Add New Conference</h1>
			</div>
			<div class="col-lg-12 mt-5">
				<h3>Media</h3>
				<div class="mt-3">
					<label class="btn btn-secondary add-img-btn" for="image">Add Image </label>
					<span class="img-name"></span>
					
						<input id="image" type="file" name="picture" accept="image/*" required/>
					
				</div>
				<span class="text-primary" style="font-size:14px"> *{{trans('messages.up-to-200')}} </span> 
			</div>
			<div class="col-lg-12 mt-5">
				<h3>Info</h3>
				<div class="mt-3">
					<label>Start Date</label>
					<input class="input-text form-control" type="text" name="date_from" onfocus="(this.type='date')" onblur="(this.type='text')" required>
				</div>
				<div class="mt-3">
					<label>End Date</label>
					<input class="input-text form-control" type="text" name="date_to" onfocus="(this.type='date')" onblur="(this.type='text')" required>
				</div>
				<div class="mt-3">
					<label>Deadline</label>
					<input class="input-text form-control" type="text" name="application_deadline" onfocus="(this.type='date')" onblur="(this.type='text')" required>
				</div>
				<div class="mt-3">
					<label>Places</label>
					<input class="input-text form-control" type="text" name="places" required>
				</div>
			</div>
			<div class="col-lg-12 mt-5">
				<h3>Texts</h3><br>
				<div>
					@foreach(Config::get('languages') as $lang => $language)
						<span><strong>Language ({{ $lang }})</span>
						<input required type="text" name="heading_{{ $lang }}" class="form-control my-2" placeholder="Heading({{ $lang }})">
						<textarea rows="10" cols="200" required name="long_description_{{ $lang }}" placeholder="Long description({{ $lang }})"></textarea> 
						<textarea rows="10" cols="200" required name="short_description_{{ $lang }}" placeholder="Short _descriptions({{ $lang }})"></textarea> 
						<input required type="text" name="slug_{{ $lang }}" class="form-control my-2" placeholder="Slug({{ $lang }})">
						<br>
					@endforeach
				</div>
				
			</div>
			<div class="col-lg-12 text-right mt-5">
				<button type="submit" style="background-color: lightgrey; margin-bottom:100px;" class="btn publish-btn">Publish</button>
			</div>
		</div>
	</form>
</div>
@endsection

