<footer id="footer" class="container-fluid px-0 bg-white" style="padding-bottom:25px;">
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
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('welcome') }}">
						Home
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('school-overview') }}">
						School Overview
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('mission-statement')}}">
						Mission Statement
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
						<a href="{{ route('blog')}}">
						News Explorer
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
						<a href="{{ route('facts-hub')}}">
						Fact Hub
					</a></li>
				</ul>
			</div>
			 <div class="col-md">
				{{-- <p class="footerText" >{{trans('footer.digital-studying')}}</p> --}}
				<ul class="footer-ul">
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('highschool-programs')}}">
						High School Programs
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('academics') }}">
						Faculty & Mentors
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('partnership') }}">
						Partnerships
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('international-students')}}">
						International Students
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accreditation') }}">
						Accreditation
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('starter-kit') }}">
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
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('awards')}}">
						Awards
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('code-of-ethics')}}">
						Code of Ethics
					</a></li>
					<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accessibility')}}">
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