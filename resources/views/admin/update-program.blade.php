@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<style>
	#main-div .jumbotron{
		background: #bfe1ff;
		font-weight: bold;
		font-size:1.2rem;
		color:black;
	}
	#main-div .jumbotron:hover{
		color:blue;
	}
</style>
@endsection

@section('content')
		<div class=" mx-auto w-75">
			<h2 class="text-center">{{ $program_to_update->translated->name }}</h2>
		<hr>
		<div class="row" id="main-div">
			<div class="col-md-4">
				<a href="{{ route('edit-single-program',$program_to_update->id) }}"><div class="jumbotron">Program Main Info</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('program-video',$program_to_update->id) }}"><div class="jumbotron">Program Video</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('program-benefits',$program_to_update->id) }}"><div class="jumbotron">Program Benefits</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('iso-certificate',$program_to_update->id) }}"><div class="jumbotron">ISO Certification</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('ai-support',$program_to_update->id) }}"><div class="jumbotron">AI Support</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('program-facts',$program_to_update->id) }}"><div class="jumbotron">Facts</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('study-program-content',$program_to_update->id) }}"><div class="jumbotron">Study Program Content</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('study-requirements',$program_to_update->id) }}"><div class="jumbotron">Study Requirements</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('required-documents',$program_to_update->id) }}"><div class="jumbotron">Required Documents</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('tuition-fees',$program_to_update->id) }}"><div class="jumbotron">Tuition Fees</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('financing',$program_to_update->id) }}"><div class="jumbotron">Financing</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('career-paths',$program_to_update->id) }}"><div class="jumbotron">Career Paths</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('partners',$program_to_update->id) }}"><div class="jumbotron">Partners</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('testimonials',$program_to_update->id) }}"><div class="jumbotron">Testimonials</div></a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('knowledge-for-success',$program_to_update->id) }}"><div class="jumbotron">Knowledge for success</div></a>
			</div>
		</div>
		</div>
		
@endsection
