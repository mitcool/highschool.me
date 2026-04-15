@extends('template')
@section('seo')
	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description']}}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('admission-process') }}"/>
	<meta property="og:description" content="{{ $texts['meta-description']}}"/>
	<x-meta-image itemprop="image" nickname="study_registration"/>
@endsection

@section('headCSS')
<style>
    :root{
		--c1:#1875c5;
		--c2:#045397;
		--c3:#003a6b;
		--c4:#00294b;
    }

    body{
		margin:0;
		font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
    }

    .steps{ width:100%; }

    .step-strip{
		width:100%;
		min-height:186px;
		display:flex;
		align-items:center;
		color:#fff;
		border-top:1px solid rgba(255,255,255,.10);
    }
    .step-strip:first-child{ border-top:0; }

    .step-inner{
		width:100%;
		max-width:1140px;
		margin:0 auto;
		display:flex;
		align-items:center;
	}

    .step-num{
		flex:0 0 250px;
		display:flex;
		align-items:center;
		justify-content:center;
		position:relative;
    }

    .step-num .n{
		font-weight:800;
		font-size:75px;
		line-height:1;
		letter-spacing:-2px;
		margin:0;
		color:#fff;
		transform:translateY(2px);
		white-space:nowrap;
    }

    .step-num:after{
		content:"";
		position:absolute;
		right:0;
		top:17%;
		height:66%;
		width:2px;
		background:#fff;
		opacity:.95;
    }

    .step-content{
		padding-left:26px;
		padding-right:24px;
		max-width:980px;
    }

    .step-title{
		margin:0 0 10px 0;
		font-weight:800;
		font-size:28px;
		color:#fff;
    }

    .step-text{
		margin:0;
		font-size:14px;
		line-height:1.6;
		color:#fff!important;
		opacity:.95;
    }

    @media (max-width: 767.98px){
		.step-strip{
			padding:34px 16px;
			min-height:auto;
		}

		.step-inner{
			flex-direction:column;
			justify-content:center;
			text-align:center;
		}

		.step-num{
			flex:0 0 auto;
			width:100%;
			padding-bottom:22px;
		}

		.step-num:after{
			display: none;
		}

		.step-num .n{
			font-size:86px;
		}

		.step-content{
			padding-left:0;
			padding-right:0;
			max-width:640px;
		}

		.step-title{
			font-size:26px;
		}
    }
  </style>
@endsection

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
    <ol class="bg-white breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $texts['heading'] }}</li>
    </ol>
</div>

<img src="{{ asset('images/admission-process.png') }}" alt="" class="w-100"/>

<div class="container-fluid bg-white box pl-0 pr-0 page-content">
    <div class="container">
        <div class="text-center">
            <h1 class="page-headings">{{ $texts['heading'] }}</h1>
            <div class="page-content">
				{!! $texts['intro'] !!}
            </div>
        </div>
    </div>

	<section class="steps">

		<div class="step-strip" style="background:var(--c1);">
			<div class="step-inner">
				<div class="step-num">
					<span class="n">1.</span>
				</div>
				<div class="step-content">
					{!! $texts['step-1'] !!}
				</div>
			</div>
		</div>

		<div class="step-strip" style="background:var(--c2);">
			<div class="step-inner">
				<div class="step-num">
					<span class="n">2.</span>
				</div>
				<div class="step-content">
					{!! $texts['step-2'] !!}
				</div>
			</div>
		</div>

		<div class="step-strip" style="background:var(--c3);">
			<div class="step-inner">
				<div class="step-num">
					<span class="n">3.</span>
				</div>
				<div class="step-content">
					{!! $texts['step-3'] !!}
				</div>
			</div>
		</div>

		<div class="step-strip" style="background:var(--c4);">
			<div class="step-inner">
				<div class="step-num">
					<span class="n">4.</span>
				</div>
				<div class="step-content">
					{!! $texts['step-4'] !!}
				</div>
			</div>
		</div>

	</section>

    <x-three-buttons/>
</div>
@endsection