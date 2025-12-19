<nav role='navigation'>
    <div id="menuToggle">
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>

      <ul id="menu" style="padding-left:15px !important; padding-top: 80px!important;">
        <li id="mySidebar" class="sidenav text-left" style="width: 260px;">
        
            <hr>
            @if(!Auth::user())
                <a class="btn contact_btn_header" style="background: #025297;color:white;" href="">REGISTER</a>
            @else
                <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{route('admin-dashboard')}}">DASHBOARD</a>
            @endif
            <hr>
            <a class="btn contact_btn_header" style="background: #EE6123;color:white;" href="">CONTACT</a>
            <hr>
  
           
              <!-- About -->
              <a style="text-transform: uppercase;display:flex;align-items:center;" data-toggle="collapse" href="#study_programs" role="button" aria-expanded="false">ABOUT<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="study_programs">
                  <div class="card card-body hamburger_under">
                    <div class="card card-body hamburger_under">
                      <a href="{{ route('school-overview')}}" style="text-transform: uppercase;">School Overview</a>
                      <hr class="m-0">
                      <a href="{{ route('mission-statement') }}" style="text-transform: uppercase;">Mission Statement</a>
                      <hr class="m-0">
                      <a href="{{ route('accreditation') }}" style="text-transform: uppercase;">Accreditation</a>
                      <hr class="m-0">
                      <a href="{{ route('leadership') }}" style="text-transform: uppercase;">Leadership</a>
                      <hr class="m-0">
                      <a href="{{ route('academics') }}" style="text-transform: uppercase;">Faculty & Mentors</a>
                      <hr class="m-0">
                      <a href="{{ route('students-in-spotlight') }}" style="text-transform: uppercase;">Students in Spotlight</a>
                      <hr class="m-0">
                      <a href="{{ route('partnership') }}" style="text-transform: uppercase;">Partnership</a>
                      <hr class="m-0">
                    </div>
                  </div>
              </div>
              
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#text_services" role="button" aria-expanded="false">ACADEMICS<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="text_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('highschool-programs') }}" style="text-transform: uppercase;">High School Diploma Tracks</a>
                      <hr class="m-0">
                      <a href="{{ route('graduation-requirements') }}" style="text-transform: uppercase;">Graduation Requirements</a>
                      <hr class="m-0">
                      <a href="{{ route('credit-recovery') }}" style="text-transform: uppercase;">Credit Recovery</a>
                      <hr class="m-0">
                      <a href="{{ route('credit-transfer') }}" style="text-transform: uppercase;">Credit Transfer</a>
                      <hr class="m-0">
                      <a href="{{ route('awards') }}" style="text-transform: uppercase;">Awards</a>
                      <hr class="m-0">
                      <a href="{{ route('international-students') }}" style="text-transform: uppercase;">International Students</a>
                      <hr class="m-0">
                  </div>
              </div>
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#bind_services" role="button" aria-expanded="false">CURRICULUM<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="bind_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('standard-high-school') }}" style="text-transform: uppercase;">High School Diploma Tracks</a>
                      <hr class="m-0">
                      <a href="{{ route('transfer-program') }}" style="text-transform: uppercase;">High School International Transfer Program</a>
                      <hr class="m-0">
                      <a href="{{ route('honors-high-school') }}" style="text-transform: uppercase;">Module & Honors Courses</a>
                      <hr class="m-0">
                      <a href="{{ route('psat') }}" style="text-transform: uppercase;">PSAT/SAT/PreACT/ACT Prep-Courses</a>
                      <hr class="m-0">
                      <a href="{{ route('advanced-placement') }}" style="text-transform: uppercase;">Advances Placement Courses</a>
                      <hr class="m-0">
                      <a href="{{ route('cte') }}" style="text-transform: uppercase;">CTE Prep-Courses</a>
                      <hr class="m-0">
                      <a href="{{ route('clep') }}" style="text-transform: uppercase;">CLEP Prep-Courses</a>
                      <hr class="m-0">
                      <a href="{{ route('esol') }}" style="text-transform: uppercase;">English Courses (ESOL)</a>
                      <hr class="m-0">
                      <a href="{{ route('learning-mentoring') }}" style="text-transform: uppercase;">Learning/Mentoring/Coaching</a>
                      <hr class="m-0">
                  </div>
              </div>
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#study_guides_services" role="button" aria-expanded="false">ADMISSIONS<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="study_guides_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('admission-process') }}" style="text-transform: uppercase;">Admission process</a>
                      <hr class="m-0">
                      <a href="{{ route('enrollment-criteria') }}" style="text-transform: uppercase;">Enrollment criteria</a>
                      <hr class="m-0">
                      <a href="{{ route('enrollment-options') }}" style="text-transform: uppercase;">Enrollment options</a>
                      <hr class="m-0">
                      <a href="{{ route('tuition') }}" style="text-transform: uppercase;">Tuition</a>
                      <hr class="m-0">
                      <a href="{{ route('tuition-assistance') }}" style="text-transform: uppercase;">Tuition Assistance (PEP)</a>
                      <hr class="m-0">
                      <a href="{{ route('ambassador-program') }}" style="text-transform: uppercase;">Ambassador Program</a>
                      <hr class="m-0">
                  </div>
              </div>
        </li>
      </ul>
    </div>
  </nav>
