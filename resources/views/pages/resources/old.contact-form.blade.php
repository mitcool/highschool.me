@extends('template')

@section('seo')
	<title>{{trans('help-desk.meta-title')}}</title>
	<meta name="description" content="{!! trans('help-desk.meta-description') !!}" />
@endsection

@section('content')
<x-image-component nickname="imprint" class="imprint-images main-pictures-pages"/>

<div class="container-fluid main_page_container p-5">
	
	<div class="row justify-content-center" >
		<div class="col-md-10 col-lg-8 container-style">
            <div class="row section" style="padding-top:40px; padding-bottom:40px;">
                <div class="col-md-8 offset-md-2">
                    <div class="shadow bg-white">
                        <h3 style="padding:2rem 1rem">{!! trans('welcome.contact-form-heading') !!}</h3>
                        <form action="{{ route('contact') }}" method="POST">
                            {{ csrf_field() }}
                            <label class="ohnohoney" for="name"></label>
                            <input class="ohnohoney" autocomplete="off" type="text" id="user_name" name="name" placeholder="{{trans('modals.cookies-accept-button')}}">
                            <label class="ohnohoney" for="email"></label>
                            <input class="ohnohoney" autocomplete="off" type="text" id="user_email" name="address" placeholder="{{trans('modals.cookies-accept-button')}}">
                            <input type="hidden" name="age">
                            <div class="row">
                                <div class="col-md-6">
                                    <div  class="row p-3"> 
                                        <div class="col-md">
                                            <input type="radio" value="Mr." name="gender" required> {{ trans('welcome.contact-form-woman-option') }}
                                            <input type="radio" value="Ms." name="gender"> {{ trans('welcome.contact-form-man-option') }}
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-md p-3">
                                            <input  value="{{ old('firstname') }}" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="{{ trans('welcome.contact-form-first-name') }}" required name="firstname">
                                                @error('firstname') <span class="validation-error">{{ $errors->first('firstname') }}</span> @enderror
                                        </div>
                                        <div class="col-md p-3">
                                            <input value="{{ old('surname') }}"  type="text" class="form-control @error('surname') is-invalid @enderror" placeholder="{{ trans('welcome.contact-form-last-name') }}" required name="surname">
                                                @error('surname') <span class="validation-error">{{ $errors->first('surname') }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-md p-3">
                                            <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('welcome.contact-form-email') }}" required name="email" />
                                                @error('email') <span class="validation-error">{{ $errors->first('email') }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-md p-3">
                                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ trans('welcome.contact-form-phone') }}">
                                                @error('phone') <span class="validation-error">{{ $errors->first('phone') }}</span> @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row p-3">
                                        <div class="col-md">
                                        <div class="d-flex">  <input type="checkbox" required/><div class="requestInformationMainPage"> &nbsp;{!! trans('welcome.contact-form-checkbox-one') !!}</div> </div>
                                        <div class="d-flex" > <input type="checkbox" required/><div class="requestInformationMainPage"> &nbsp;{!! trans('welcome.contact-form-checkbox-two') !!}</div>  </div>
                                            <div class="requestInformationMainPage mt-4" > {!! trans('welcome.contact-form-checkbox-additional') !!}</div> 
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="row p-3">
                                        <div class="col-md">
                                            <select name="program" class="form-control" required>
                                                <option value="" >{{ trans('welcome.select-program-option') }}</option>
                                                @foreach ($programs as $program) 
                                                    <option {{ $program->translated->name == old('program') ? 'selected' : '' }}>{{ $program->translated->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                            <div class="requestInformationMainPage">{!! trans('welcome.contact-form-text-after-select-program') !!}</div>

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12 text-right">
                                    
                                    <button class="btn" style="background-color:#025297;color:white;margin:30px;padding-left:30px;padding-right:30px;">{!! trans('welcome.contact-form-request-now') !!}</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

@endsection