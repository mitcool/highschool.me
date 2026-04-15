@extends('template')

@section('seo')

	<title>{{ $texts['meta-title'] }}</title>
	<meta itemprop="description" name="description" content="{{ $texts['meta-description'] }}" />
	<meta itemprop="title" property="og:title" content="{{ $texts['meta-title'] }}"/>
	<meta property="og:type" content="website"/>
	<meta itemprop="url" property="og:url" content="{{ route('early-registration')}}"/>
	<meta property="og:description" content="{{ $texts['meta-description'] }}"/>

@endsection

@section('headCSS')
	<style>
        #reg-form{
            padding:20px;
        }
        #reg-form label{
            display: block;
            text-align: left;
            margin-bottom:5px;
            margin-top:20px;
            font-weight: bold;
        }
        .validation-error{
            text-align: left;
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
<div class="container-fluid main_page_container pt-0">
	<div class="row justify-content-center">
		<div class="col-md-12">
            <h1 class="page-headings">{{ $texts['heading'] }}</h1>
			<p class="text-center">
                {{ $texts['subheading'] }}
            </p>
        </div>
		<div class="col-md-9 col-lg-7 mb-4 text-center bg-white">
			<form action="{{ route('early-registration-submit') }}" method="POST" id="reg-form" class="confirm-first shadow">
                {{ csrf_field() }}

                <label for="">{{ $texts['first-name'] }}</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                @error('name') <div class="text-left"><span class="validation-error">{{ $errors->first('name') }}</span></div>  @enderror

                <label for="">{{ $texts['second-name'] }}</label>
                <input type="text" name="middlename" class="form-control" value="{{ old('middlename') }}">
                @error('middlename') <div class="text-left"><span class="validation-error">{{ $errors->first('middlename') }}</span> </div> @enderror

                <label for="">{{ $texts['family-name'] }}</label>
                <input type="text" name="surname" class="form-control" required value="{{ old('surname') }}">
                @error('surname') <div class="text-left"><span class="validation-error">{{ $errors->first('surname') }}</span> </div> @enderror

                <label for="">{{ $texts['email'] }}</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                @error('email') <div class="text-left"><span class="validation-error">{{ $errors->first('email') }}</span> </div> @enderror
                
                <label for="country_id">{{ $texts['country'] }}</label>
                <select name="country_id" class="form-control" id="country_id" required>
                    <option value="" selected disabled>{{ $texts['please-select'] }}</option>
                    @foreach ($allowed_countries as $country)
                        <option {{ $country->id == old('country_id') ? ' selected ' : '' }} value="{{ $country->id }}">{{ $country->nicename }}</option>
                    @endforeach
                </select>
                 @error('country_id') <div class="text-left"><span class="validation-error">{{ $errors->first('country_id') }}</span> </div> @enderror

                <label for="">{{ $texts['interested-in'] }}</label>
                <select name="education_option" class="form-control" required>
                    <option value="" selected disabled>{{ $texts['please-select'] }}</option>
                    <option {{ old('education_option') == 1 ? ' selected ' : '' }} value="1">{{ $texts['track-1'] }}</option>
                    <option {{ old('education_option') == 2 ? ' selected ' : '' }} value="2">{{ $texts['track-2'] }}</option>
                    <option  {{ old('education_option') == 3 ? ' selected ' : '' }} value="3">{{ $texts['track-3'] }}</option>
                    <option {{ old('education_option') == 4 ? ' selected ' : '' }} value="4">{{ $texts['track-4'] }}</option>
                    <option {{ old('education_option') == 5 ? ' selected ' : '' }} value="5">{{ $texts['track-5'] }}</option>
                </select>
                @error('education_option') <div class="text-left"> <span class="validation-error">{{ $errors->first('education_option') }}</span> </div> @enderror

                <label for="">{{ $texts['message'] }}</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10">{{ old('message') }}</textarea>
                @error('message') <div class="text-left"> <span class="validation-error">{{ $errors->first('message') }}</span> </div> @enderror

                <div class="text-left">
                    <input type="checkbox" name="agree" required> {{ $texts['agree'] }}
                </div>
                <p class="text-danger text-left">{{ $texts['restricted-countries'] }} @foreach($restricted_countries as $country) {{ $country->nicename }}@endforeach</p>
                {{-- reCAPTCHA --}}
                    <div class="form-group text-center mt-4 mb-4">
                        <div class="g-recaptcha d-inline-block"
                             data-sitekey="{{ config('services.recaptcha.key') }}">
                        </div>
                    </div>

					<button class="orange-button btn mt-3">{{ $texts['submit'] }}</button>
            </form>
		</div>
	</div>
	
</div>
@endsection