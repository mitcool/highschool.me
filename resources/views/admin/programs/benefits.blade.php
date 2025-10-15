@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="3" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Add Benefits</h2>
		<hr>
		<form method="POST" action="{{route('add-program-benefits')}}" enctype="multipart/form-data">
			@csrf
			
			<div class="row">
				<div class="col-md-4">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[0]->benefit : '' }}" required class="form-control my-2" type="text" name="benefits[]" placeholder="Benefit (English) 1">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[1]->benefit: '' }}" required class="form-control my-2" type="text" name="benefits[]" placeholder="Benefit (English) 2">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[2]->benefit: '' }}" required class="form-control my-2" type="text" name="benefits[]" placeholder="Benefit (English) 3">
					<hr>
				</div>
				<div class="col-md-4">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[0]->benefit_de : '' }}" required class="form-control my-2" type="text" name="benefits_de[]" placeholder="Benefit (German) 1">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[1]->benefit_de: '' }}" required class="form-control my-2" type="text" name="benefits_de[]" placeholder="Benefit (German) 2">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[2]->benefit_de: '' }}" required class="form-control my-2" type="text" name="benefits_de[]" placeholder="Benefit (German) 3">
					<hr>
				</div>
				<div class="col-md-4">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[0]->icon : '' }}" required class="form-control my-2" type="text" name="icons[]" placeholder="Icons 1(exp. <i class='fa-solid fa-chart-simple'></i>)">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[1]->icon : '' }}" required class="form-control my-2" type="text" name="icons[]" placeholder="Icons 2(exp. <i class='fa-solid fa-chart-simple'></i>)">
					<input value ="{{ count($program->benefits) > 2 ? $program->benefits[2]->icon : '' }}" required class="form-control my-2" type="text" name="icons[]" placeholder="Icons 3(exp. <i class='fa-solid fa-chart-simple'></i>)">
					<hr>
				</div>
				
				<div class="col-lg-12 text-center">
					<br>
					<input type="hidden" name="program_id" value="{{ $program_id }}">
					<button type="submit" class="btn btn-info">Add Benefits Now</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

{{-- <div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Video</h4>
					</div>
					<div class="col-lg-6 text-center">
						<div class="form-group">
							<label class="font-weight-bold">Youtube link to main video </label>
							<input type="text" class="form-control" name="video" maxlength="190" required>
						</div>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">General Benefits</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">AI support info</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Facts</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Study program btn-info																																																																																																																																										</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Study requirements</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Required documents</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Tuition Fees</h4>
					</div>

					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Financing</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Career paths</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Where MBA Graduates Successfully Launch Their Careers</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Testimonial Video</h4>
					</div>
					<div class="col-md-12">
						<hr>
						<h4 class="font-weight-bold">Set your knowledge</h4>
					</div> --}}