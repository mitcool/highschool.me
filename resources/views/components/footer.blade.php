<footer id="footer" class="container-fluid px-0 bg-light" style="padding-bottom:25px;">
	<div class="row justify-content-center" style="padding-left:15px;">
		<div class="col-md-12 col-lg-10">
			<div class="row">
				<div class="col-md logo-address-container">
					<x-image-component loading="lazy"  nickname="logo-header" class="logo-header-images logoFooter w-50"/>
					<ul class="footer-ul px-0 company-details">
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; cursor: context-menu;">ONSITES High School - Main Campus</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">100 Southeast 2nd Street</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">Miami Tower, Suite 2000-1005</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">Miami, Florida 33131</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">USA</li>
						<li class="footer-company-address-detail" style="cursor: context-menu;">Phone: +1 (305) 404-5125</li>
					</ul>
					<div class="d-flex align-items-center" style="gap:10px;margin-top:8px;">
						<a href="/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" style="color:#045397;">
							<i class="fab fa-facebook-f" style="font-size:20px;"></i>
						</a>
						<a href="/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" style="color:#045397;">
							<i class="fab fa-instagram" style="font-size:20px;"></i>
						</a>
						<a href="/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" style="color:#045397;">
							<i class="fab fa-linkedin-in" style="font-size:20px;"></i>
						</a>
						<a href="/" target="_blank" rel="noopener noreferrer" aria-label="YouTube" style="color:#045397;">
							<i class="fab fa-youtube" style="font-size:20px;"></i>
						</a>
					</div>
				</div>
				<div class="col-md">
					<ul class="footer-ul">
						<h6 class="text-uppercase">About</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('school-overview') }}">
							School Overview
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('mission-statement')}}">
							Mission Statement
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accreditation') }}">
							Recognition & Quality Standards
						</a></li>
							<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('leadership') }}">
							Leadership
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('academics') }}">
							Faculty & Mentors
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('students-in-spotlight') }}">
							Students in Spotlight
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('partnership') }}">
							Partners and Providers
						</a></li>
					</ul>
				</div>
			 
				<div class="col-md">
					<ul class="footer-ul">
						<h6 class="text-uppercase">Academics</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('highschool-programs'
						)}}">
							High School Diploma Tracks
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('graduation-requirements')}}">
							Graduation Requirements
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('credit-recovery')}}">
							Credit Recovery
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('credit-transfer')}}">
							Credit Transfer
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('awards')}}">
							Awards
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('international-students')}}">
							International Students
						</a></li>
						
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('starter-kit') }}">
							Freshman Kit
						</a></li>
					</ul>
				</div>
				<div class="col-md">  
					<ul class="footer-ul px-0">
						<h6 class="text-uppercase">Curriculum</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('standard-high-school')}}">
							High School Programs
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('transfer-program')}}">
							High School International Transfer Program
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('honors-high-school')}}">
							Module & Honors Courses
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('psat')}}">
							PSAT/SAT Prep-Courses
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('act')}}">
							PreACT/ACT Prep-Courses
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('advanced-placement')}}">
							Advanced Placement Courses
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('cte')}}">
							CTE Prep-Courses
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('clep')}}">
							CLEP Prep-Courses
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('esol')}}">
							English Courses (ESOL)
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('learning-mentoring')}}">
							Live Sessions & Coaching
						</a></li>
					</ul>
				</div> 
				<div class="col-md">  
					<ul class="footer-ul px-0">
						<h6 class="text-uppercase">Admissions</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('admission-process') }}">
							Admission process
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('enrollment-criteria') }}">
							Enrollment criteria
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('enrollment-options') }}">
							Enrollment options
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('tuition') }}">
							Tuition
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('tuition-assistance') }}">
							Tuition Assistance (PEP)
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('ambassador-program') }}">
							Ambassador Program
						</a></li>
					</ul>
					
				</div> 
				<div class="col-md">
					<ul class="footer-ul">
						<h6 class="text-uppercase">Resources</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('faq'
						)}}">
							FAQ
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('code-of-ethics')}}">
							Code of Conduct
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accessibility')}}">
							Accessibility
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('terms-and-conditions')}}">
							Terms and Conditions
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('blog')}}">
							News Explorer
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('facts-hub')}}">
							Fact Hub
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('press-release')}}">
							Press Release
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="#" data-toggle="modal" data-target="#cookie_modal">
							Cookies
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="/">
							Sitemap
						</a></li>
					</ul>
				</div>
			</div>		
		</div>
	</div>
</footer>

<div style="background:#045397;color:white;text-align:center;padding:10px;width:100%">
	&#169; <?php echo date("Y");?> ONSITES High School. All Rights Reserved.
</div>
