@extends('admin_template')

@section('css')
<style>
	 :root{
		--blue-color:#025297;
		--orange-color: #EA580D;
		
	}
</style>
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
@endsection

@section('content')
<div class="container-fluid texts_container bg-light">

	<x-progress-bar step="11" />
	<div class="col-lg-12 text-center pt-4">
		<h2>Career path</h2>
		<hr>
		<form method="POST" action="{{route('add-career-paths')}}" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
				        <label for="" class="font-weight-bold">Main Text</label>
						<textarea name="text" id="" class="ckeditor" cols="30" rows="10">{!! $program->career_paths ? $program->career_paths->text  : old('text')!!}</textarea>
					
				</div>
				<div class="col-md-6">
					<label for="" class="font-weight-bold">Main Text (German)</label>
					<textarea name="text_de" id="" class="ckeditor" cols="30" rows="10">{!! $program->career_paths ? $program->career_paths->text_de : old('text_de') !!}</textarea>
				</div>
				<div class="col-md-12">
					<hr>
					<h5>Categories</h5>
				</div>
				<div class="col-md-4 text-left">
					<span class="font-weight-bold" for="">First Column </span>
					@foreach ($job_categories as $category )
						<div class="category-wrapper">
							<div>
								<hr>
								<input type="radio" value="{{ $category->id }}" name="category[1]" class="category-checkbox">
								<label class="font-weight-bold">{{ $category->name }}</label>
							</div>
							<div class="d-none job-wrapper ml-4">
								<h5>First Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[1]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Second Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[2]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Third Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[3]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Fourth Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[4]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
							</div>
						</div>
					@endforeach
				</div>
				<div class="col-md-4 text-left">
					<span class="font-weight-bold" for="">Second Column </span>
					@foreach ($job_categories as $category )
						<div class="category-wrapper">
							<div>
								<hr>
								<input type="radio" value="{{ $category->id }}" name="category[2]" class="category-checkbox">
								<label class="font-weight-bold">{{ $category->name }}</label>
							</div>
							<div class="d-none job-wrapper ml-4">
								<h5>First Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[5]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Second Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[6]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Third Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[7]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Fourth Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[8]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
							</div>
						</div>
					@endforeach
				</div>
				<div class="col-md-4 text-left">
					<span class="font-weight-bold" for="">Third Column </span>
					@foreach ($job_categories as $category )
						<div class="category-wrapper">
							<div>
								<hr>
								<input type="radio" value="{{ $category->id }}" name="category[3]" class="category-checkbox">
								<label class="font-weight-bold">{{ $category->name }}</label>
							</div>
							<div class="d-none job-wrapper ml-4">
								<h5>First Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[9]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Second Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[10]" class="job-checkbox">
									<label class="text-secondary" for="">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Third Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[11]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
								<h5>Forth  Job</h5>
								@foreach ($category->jobs as $job)
								<div>
									<input type="radio" value="{{ $job->id }}" name="job[12]" class="job-checkbox">
									<label class="text-secondary">{{ $job->name }}</label>
								</div>
								@endforeach
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<input type="hidden" value="{{ $program_id }}" name="program_id" />
			<button class="btn btn-info">Save content</button>
		</form>
		</div>
</div>
@endsection

@section('scripts')
	<script>
		$('.category-checkbox').on('click',function(){
			$(this).closest('.col-md-4').find('.job-wrapper').addClass('d-none');
			$(this).closest('.col-md-4').find('label').css('color','black');
			$(this).closest('div').find('label').css('color','green');
			$(this).closest('.col-md-4').find('.job-checkbox').prop('checked',false);
			$(this).closest('.category-wrapper').find('.job-wrapper').removeClass('d-none')
		})
</script>
@endsection