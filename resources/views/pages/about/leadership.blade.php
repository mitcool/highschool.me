@extends('template')

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Leadership</li>
	</ol>
</div>
<section class="row space">
  <div class="p-4 text-center mx-auto mx-auto" >
    <div class="page-content">
      <div class="">
        <h2 class="text-center">Lorem Ipsum</h2>
        <hr class="white-hr">
        <div class="w-75 centered text-justify p-20 mx-auto">
        Earn real high school credits through a recognized curriculum that meets national academic standards.
        </div>
        <div class="video mt-3">
                    <iframe height="600" width=100%" src="https://www.youtube.com/embed/FbXEqmzu05I?si=wYLlYX3WT1ENmdOd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection