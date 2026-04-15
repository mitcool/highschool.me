<footer id="footer" class="container-fluid px-0 bg-light" style="padding-bottom:25px;">
	<div class="row justify-content-center" style="padding-left:15px;">
		<div class="col-md-12 col-lg-10">
			<div class="row">
				<div class="col-md logo-address-container">
					<x-image-component loading="lazy"  nickname="logo-header" class="logo-header-images logoFooter w-50"/>
					<ul class="footer-ul px-0 company-details">
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; cursor: context-menu;">{{ $texts['campus'] }}</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">{{ $texts['address-1'] }}</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">{{ $texts['address-2'] }}</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">{{ $texts['address-3'] }}</li>
						<li class="footer-company-address-detail" style="margin-bottom: 0px!important; margin-top: 0px!important; cursor: context-menu;">{{ $texts['address-4'] }}</li>
						<li class="footer-company-address-detail" style="cursor: context-menu;">{{ $texts['phone'] }}</li>
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
						<h6 class="text-uppercase">{{ $texts['about'] }}</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('school-overview') }}">
							{{ $texts['school-overview'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('mission-statement')}}">
							{{ $texts['mission-statement'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accreditation') }}">
							{{ $texts['accreditation'] }}
						</a></li>
							<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('leadership') }}">
							{{ $texts['leadership'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('academics') }}">
							{{ $texts['academics'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('students-in-spotlight') }}">
							{{ $texts['students-in-spotlight'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('partnership') }}">
							{{ $texts['partnership'] }}
						</a></li>
					</ul>
				</div>
			 
				<div class="col-md">
					<ul class="footer-ul">
						<h6 class="text-uppercase">{{ $texts['academics-point'] }}</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('highschool-programs'
						)}}">
							{{ $texts['highschool-programs'] }} 
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('graduation-requirements')}}">
							{{ $texts['graduation-requirements'] }} 
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('credit-recovery')}}">
							{{ $texts['credit-recovery'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('credit-transfer')}}">
							{{ $texts['credit-transfer'] }} 
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('awards')}}">
							{{ $texts['awards'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('international-students')}}">
							{{ $texts['international-students'] }} 
						</a></li>
						
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('starter-kit') }}">
							{{ $texts['starter-kit'] }}
						</a></li>
					</ul>
				</div>
				<div class="col-md">  
					<ul class="footer-ul px-0">
						<h6 class="text-uppercase">{{ $texts['curriculum'] }}</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('standard-high-school')}}">
							{{ $texts['standard-high-school'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('transfer-program')}}">
							{{ $texts['transfer-program'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('honors-high-school')}}">
							{{ $texts['honors-high-school'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('psat')}}">
							{{ $texts['psat'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('act')}}">
							{{ $texts['act'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('advanced-placement')}}">
							{{ $texts['advanced-placement'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('cte')}}">
							{{ $texts['cte'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('clep')}}">
							{{ $texts['clep'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('esol')}}">
							{{ $texts['esol'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('learning-mentoring')}}">
							{{ $texts['learning-mentoring'] }}
						</a></li>
					</ul>
				</div> 
				<div class="col-md">  
					<ul class="footer-ul px-0">
						<h6 class="text-uppercase">{{ $texts['admission'] }}</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('admission-process') }}">
							{{ $texts['admission-process'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('enrollment-criteria') }}">
							{{ $texts['enrollment-criteria'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('enrollment-options') }}">
							{{ $texts['enrollment-options'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('tuition') }}">
							{{ $texts['tuition'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('tuition-assistance') }}">
							{{ $texts['tuition-assistance'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('ambassador-program') }}">
							{{ $texts['ambassador-program'] }}
						</a></li>
					</ul>
					
				</div> 
				<div class="col-md">
					<ul class="footer-ul">
						<h6 class="text-uppercase">{{ $texts['resources'] }}</h6>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('faq'
						)}}">
							{{ $texts['faq'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('code-of-ethics')}}">
							{{ $texts['code-of-conduct'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('accessibility')}}">
							{{ $texts['accessibility'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)"><a href="{{ route('terms-and-conditions')}}">
							{{ $texts['terms'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('blog')}}">
							{{ $texts['news-explorer'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('facts-hub')}}">
							{{ $texts['facts-hub'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="{{ route('press-release')}}">
							{{ $texts['press-release'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="#" data-toggle="modal" data-target="#cookie_modal">
							Cookies{{ $texts['cookies'] }}
						</a></li>
						<li onmouseover="mousein(event)" onmouseout="mouseout(event)">
							<a href="/">
							{{ $texts['sitemap'] }}
						</a></li>
					</ul>
				</div>
			</div>		
		</div>
	</div>
</footer>

<div style="background:#045397;color:white;text-align:center;padding:10px;width:100%">
	&#169; <?php echo date("Y");?> {{ $texts['copyright'] }}
</div>
