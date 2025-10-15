<footer id="footer" class="container-fluid px-0" style="padding-bottom:25px;">
	<div class="row justify-content-center" style="padding-left:15px;">
		
	<div class="col-md-10 col-lg-2">
		<x-image-component loading="lazy" nickname="logo-header" class="logo-header-images logoFooter"/>
	</div>
	<div class="col-md-10 col-lg-8">
		<div class="row">
			{{-- <div class="col-md">
				<p class="footerText" >{{trans('footer.study-programs')}}</p>
				<ul class="footer-ul">
					@foreach($studies as $study)
					<li class="text-capitalize" onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{route('studies-'.app()->currentLocale(),$study->translated->slug)}}">{{$study->translated->name}}
					</a></li>
					@endforeach
					
				</ul>
			</div> --}}
			{{-- <div class="col-md">
				<p class="footerText" >{{trans('footer.research')}}</p>
				<ul class="footer-ul">
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('conferences-and-workshops-'.app()->currentLocale()) }}">
						{{trans('footer.conferences-and-workshops')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('coaching-'.app()->currentLocale()) }}">
						{{ trans('footer.coaching')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('publishing-'.app()->currentLocale())}}">
						{{trans('footer.publishing')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
						<a href="{{ route('newsletter-'.app()->currentLocale())}}">
						{{trans('footer.newsletter')}}
					</a></li>
				</ul>
			</div> --}}
			{{-- <div class="col-md">
				<p class="footerText" >{{trans('footer.digital-studying')}}</p>
				<ul class="footer-ul">
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('digital-studies-'.app()->currentLocale())}}">
						{{ trans('footer.digital-studies') }}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('recognition-'.app()->currentLocale()) }}">
						{{ trans('footer.recognition') }}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('study-financing-'.app()->currentLocale()) }}">
						{{ trans('footer.study-financing') }}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('student-advisory-service-'.app()->currentLocale())}}">
						{{ trans('footer.student-advisory-service') }}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('study-registration-'.app()->currentLocale()) }}">
						{{ trans('footer.study-registration') }}
					</a></li>
				</ul>
			</div>
			<div class="col-md">
				<p class="footerText" style="">{{trans('footer.collegium-excellentia')}}</p>
				<ul class="footer-ul">
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('about-'.app()->currentLocale())}}">
						{{trans('footer.about')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('code-of-ethics-'.app()->currentLocale())}}">
						{{trans('footer.code-of-ethics')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('academics-'.app()->currentLocale())}}">
						{{trans('footer.academics')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accreditation-'.app()->currentLocale())}}">
						{{trans('footer.accreditation')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('blog-'.app()->currentLocale())}}">
						{{trans('footer.blog')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('facts-hub-'.app()->currentLocale())}}">
						Facts Hub
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('press-release-'.app()->currentLocale())}}">
						Press Release
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('student-advisory-service-'.app()->currentLocale()) }}">
						{{trans('nav.advice')}}
					</a></li>
				</ul>
			</div> --}}
			{{-- <div class="col-md">
				<p class="footerText">{{trans('footer.resources')}}</p>
				<ul class="footer-ul"> --}}
					{{-- <li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('help-desk-'.app()->currentLocale()) }}">
						{{trans('footer.help-desk')}}
					</a></li> --}}
					{{-- <li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('faq-'.app()->currentLocale()) }}">
						{{trans('footer.faq')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('terms-and-conditions-'.app()->currentLocale()) }}">
						{{trans('footer.terms and conditions')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('examination-rules-'.app()->currentLocale()) }}">
						{{trans('footer.examination-rules')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('privacy-policy-'.app()->currentLocale()) }}">
						{{trans('footer.gdpr')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accessibility-'.app()->currentLocale()) }}">
						{{trans('footer.accessibility')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><span data-toggle="modal" data-target="#cookie_modal">
						{{trans('footer.cookies')}}
					</span></li>
					
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('imprint-'.app()->currentLocale()) }}">
						{{trans('footer.imprint')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('sitemap-'.app()->currentLocale()) }}">
						{{trans('footer.sitemap')}}
					</a></li> --}}
				</ul>
			</div>
		</div>
	</div>
	
{{-- <div class="container-fluid" id="bottom_footer">
	<div class="container" >
		<div class="row text-center" id="bottom_footer_row">
			<div class="col-md-6">
				<p class="font-weight-bold">{{trans('footer.copyright')}}</p>
			</div>
			<div class="col-md-6">
				  <button style="background: none;border: 0px;" onclick="window.location.href='https://www.facebook.com/graduateme23?locale=bg_BG';" aria-label="Facebook" target="_blank"><i style="font-size:28px;" class="fab fa-facebook-f  p-2"></i></button>
				  <button style="background: none;border: 0px;" onclick="window.location.href='https://www.instagram.com/graduate.me';" aria-label="Instagram" target="_blank"><i style="font-size:28px;" class="fab fa-instagram  p-2"></i></button>
				  <button style="background: none;border: 0px;" onclick="window.location.href='https://www.linkedin.com/company/101229203/admin/feed/posts/?feedType=following';" aria-label="Linkedin" target="_blank"><i style="font-size:28px" class="fab fa-linkedin-in  p-2"></i></button>
				  <button style="background: none;border: 0px;" onclick="window.location.href='https://www.youtube.com/@ONSITESGraduateSchool';" aria-label="Youtube" target="_blank"><i style="font-size:28px;" class="fab fa-youtube  p-2"></i></button>
			</div>
		</div>
	</div>
</div>
<div id="phone-box" style="position: fixed;bottom:80px;right:20px;max-width:400px;border:2px solid black;border-radius: 20px; margin-left: 20px;" class="bg-white d-none">

	<div class="w-100" style="position:relative;">
		<span style="font-size:30px;position:absolute;top:-5px;right:15px;" id="close-phone-box">&times;</span>
	</div>
	<form action="{{route('phone-contact')}}" method="post" enctype="multipart/form-data" style="padding:30px 20px;" id="phone-contact">
		{{ csrf_field() }}

		<label class="ohnohoney"></label>
		<input class="ohnohoney" autocomplete="off" type="text"  name="username" placeholder="{{trans('modals.cookies-accept-button')}}">
		<label class="ohnohoney"></label>
		<input class="ohnohoney" autocomplete="off" type="text"  name="address" placeholder="{{trans('modals.cookies-accept-button')}}">
		<input type="hidden" name="age">
		<p class="font-weight-bold m-0" style="font-size:1.1rem">{{ trans('footer.phone-box-heading') }}</p>
		<p>{{ trans('footer.phone-box-subheading') }}</p>
		<div class="row">
			<div class="col-md-12 my-2">
				<label for="phone-box-name"> {{ trans('footer.phone-box-name-placeholder') }}</label>
				<input value="{{ old('name') }}" id="phone-box-name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"  style="background-color:#EFEFEF;" required>
				@error('name')<span class="validation-error">{{ $errors->first('name') }}</span>@enderror
			</div>
			<div class="col-md-6 my-2">
				<label for="phone-box-country"> {{ request()->segment(1) == 'en' ? 'Country' : 'Land'}}</label>
				<select name="phone_code" class="form-control" style="background-color:#EFEFEF;" required id="phone-box-country">
					@if(request()->segment(1) == 'en')
					<option value="">Country</option>	
					<optgroup label="">
							
							@foreach ($top_countries as $country)
								<option value="{{ $country->phonecode }}">{{ $country->nicename }}</option>
							@endforeach
						</optgroup>
						<optgroup label="{{ trans('footer.all_countries_label') }}">
							@foreach ($countries as $country)
								<option value="{{ $country->phonecode }}">{{ $country->nicename }}</option>
							@endforeach
						</optgroup>
					@else
					<option value="">Land</option>
						<optgroup label="">
							
							@foreach ($top_countries as $country)
								<option value="{{ $country->phonecode }}">{{ $country->nicename_de }}</option>
							@endforeach
						</optgroup>
						<optgroup label="{{ trans('footer.all_countries_label') }}">
							@foreach ($countries as $country)
								<option value="{{ $country->phonecode }}">{{ $country->nicename_de }}</option>
							@endforeach
						</optgroup>
					@endif
				</select>
				
			</div>
			<div class="col-md-6 my-2">
				<label for="phone-box-telephone">{{ trans('footer.phone-box-phone-placeholder') }}</label>
				<input id="phone-box-telephone" value="{{ old('phonenumber') }}" type="number" name="phonenumber" class="form-control @error('name') is-invalid @enderror" style="background-color:#EFEFEF;" required>
				@error('phonenumber')<span class="validation-error">{{ $errors->first('phonenumber') }}<</span>@enderror
			</div>
			<div class="col-md-12 my-2">
				<label for="phone-box-hour">{{ trans('footer.phone-box-time-label') }}</label>
				<select name="hour" class="form-control" style="background-color:#EFEFEF;" id="phone-box-hour">
					<option {{ old('hour') == trans('footer.phone-box-period-one') ? ' selected' : ''}}>{{ trans('footer.phone-box-period-one') }}</option>
					<option {{ old('hour') == trans('footer.phone-box-period-two') ? ' selected' : ''}}>{{ trans('footer.phone-box-period-two') }}</option>
					<option {{ old('hour') == trans('footer.phone-box-period-three') ? ' selected' : ''}}>{{ trans('footer.phone-box-period-three') }}</option>
					<option {{ old('hour') == trans('footer.phone-box-period-four') ? ' selected' : ''}}>{{ trans('footer.phone-box-period-four') }}</option>
					<option {{ old('hour') == trans('footer.phone-box-period-five') ? ' selected' : ''}}>{{ trans('footer.phone-box-period-five') }}</option>
				</select>
			</div>
			<div class="col-md-12 my-2">
				<label for="phone-box-email">{{ request()->segment(1) == 'en' ? 'Email' : 'E-Mail' }}</label>
				<input id="phone-box-email" type="email" style="background-color:#EFEFEF;"  name="email" required class="form-control @error('name') is-invalid @enderror"/> 
			</div>
			<div class="col-md-12 my-2 d-flex align-items-center" id="phone-contact-agree">
				<input type="checkbox" name="agree" required />&nbsp;{!! trans('footer.phone-box-checkbox') !!}
			</div>
			<div class="col-md-12 text-center">
				<input type="submit" value="{{ trans('footer.phone-box-send-btn') }}" class="btn w-100" style="background:#025297; color:white; "/> 
			</div>
		</div>
	</form>	
</div>
<x-image-component nickname="phone-icon" id="phone-icon" class="phone-icon" style="position: fixed;bottom:10px;right:20px;width:60px;cursor:pointer;"/>	

<span id="myBtn" onclick="topFunction()" style=" width:40px;"><x-image-component nickname="up-icon" id="up-icon" class="up-icon" style="position: fixed;bottom:10px; width:40px;cursor:pointer;"/></span> --}}

</footer>


