@extends('template')

@section('seo')
<title></title>
<meta itemprop="description" name="description" content="" />

<meta itemprop="name" property="og:title" content=""/>
<meta property="og:type" content="website"/>
<meta itemprop="url" property="og:url" content=""/>
<meta property="og:description" content=""/>
<x-meta-image itemprop="image" nickname="academics-cover"/>

@endsection

@section('headCSS')
<style type="text/css">
	.single-academic-card {
		background: #ffffff;
		border: 1px solid #b9b9b9;
		border-radius: 14px;
		padding: 28px 30px 34px;
		margin: 0 auto 36px;
	}
	.single-academic-top {
		display: flex;
		align-items: flex-start;
		gap: 28px;
		margin-bottom: 28px;
	}
	.single-academic-image {
		width: 205px;
		max-width: 100%;
		flex: 0 0 205px;
		display: block;
	}
	.single-academic-name {
		color: #045397;
		font-size: 2.25rem;
		font-weight: 700;
		line-height: 1.1;
		margin-bottom: 18px;
	}
	.single-academic-intro,
	.single-academic-content {
		color: #2f2f2f;
		font-size: 1.05rem;
		line-height: 1.35;
	}
	.single-academic-content p:last-child {
		margin-bottom: 0;
	}
	.single-academic-actions {
		display: flex;
		justify-content: center;
		margin-top: 26px;
	}
	.single-academic-button {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		min-width: 98px;
		height: 42px;
		padding: 0 22px;
		border-radius: 999px;
		background: #045397;
		color: #ffffff !important;
		font-size: 1.35rem;
		font-weight: 700;
		text-decoration: none !important;
		line-height: 1;
	}
	.single-academic-button:hover {
		background: #03457c;
		color: #ffffff !important;
	}
	@media (max-width: 767px) {
		.single-academic-card {
			padding: 20px 18px 24px;
		}
		.single-academic-top {
			flex-direction: column;
			gap: 18px;
			margin-bottom: 20px;
		}
		.single-academic-image {
			width: 100%;
			max-width: 240px;
			flex-basis: auto;
		}
		.single-academic-name {
			font-size: 1.8rem;
			margin-bottom: 14px;
		}
	}
</style>
@endsection

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('academics') }}">Academics</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $teacher->name }}</li>
	</ol>
</div>

<div class="container-fluid main_page_container" style="background:#F3F3F3;">
	<div class="row justify-content-center">
		<div class="col-md-12 col-lg-10" style="padding:30px;">
			<div class="single-academic-card">
				<div class="single-academic-top">
					<x-image-component nickname="academic-{{$teacher->id}}" class="single-academic-image" />
					<div class="single-academic-intro">
						<h1 class="single-academic-name">{{ $teacher->name }}</h1>
						{!! $teacher->single_page_description !!}
					</div>
				</div>
			</div>
			<div class="single-academic-actions">
				<a href="{{ route('academics') }}" class="single-academic-button">Show All</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footerScripts')
<script>
	
</script>
@endsection
