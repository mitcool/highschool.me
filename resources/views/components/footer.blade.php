<footer id="footer" class="container-fluid px-0" style="padding-bottom:25px;">
	<div class="row justify-content-center" style="padding-left:15px;">
		
	
	<div class="col-md-10 col-lg-8">
		<div class="row">
			<div class="col-md">
				
				<ul class="footer-ul">
					<li>Onsites High School</li>
					<li>7901 4th Street North, Unit #17075</li>
					<li>St Petersburg FL 33702</li>
					<li>USA</li>
				</ul>
			</div>
			<div class="col-md">
				{{-- <p class="footerText" >{{trans('footer.research')}}</p> --}}
				<ul class="footer-ul">
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('conferences-and-workshops') }}">
						Home
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('coaching') }}">
						School Overview
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('publishing')}}">
						Mission Statement
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
						<a href="{{ route('newsletter')}}">
						News Explorer
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
						<a href="{{ route('newsletter')}}">
						Fact Hub
					</a></li>
				</ul>
			</div>
			 <div class="col-md">
				{{-- <p class="footerText" >{{trans('footer.digital-studying')}}</p> --}}
				<ul class="footer-ul">
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('about')}}">
						High School Programs
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('about') }}">
						Faculty & Mentors
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('academics') }}">
						Partnerships
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('student-advisory-service')}}">
						International Students
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('study-registration') }}">
						Accreditation
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('study-registration') }}">
						Starter Kit
					</a></li>
				</ul>
			</div>
			<div class="col-md">
				{{-- <p class="footerText" style="">{{trans('footer.collegium-excellentia')}}</p> --}}
				<ul class="footer-ul">
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('faq'
					)}}">
						FAQ
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('code-of-ethics')}}">
						Awards
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('academics')}}">
						Code of Ethics
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accreditation')}}">
						Accessibility
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('blog')}}">
						{{trans('footer.blog')}}
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('facts-hub')}}">
						Terms and Conditions
					</a></li>
					
				</ul>
			</div> 
			<div class="col-md-">
				<x-image-component loading="lazy"  nickname="logo-header" class="logo-header-images logoFooter w-50"/>
			</div>
			</div>		
		</div>
	</div>

</footer>


<div style="background:#045397;color:white;text-align:center;padding:10px;">
	ONSITES High School 2025 All Right Reserved
</div>