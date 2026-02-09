<nav class="navbar navbar-expand-lg navbar-light" style="padding: 0rem 0rem !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown"  style="cursor: pointer">
    <ul class="navbar-nav" style="padding-left:0px;">
        
       <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          ABOUT
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('school-overview')}}">School Overview</a></li>
            <li><a class="dropdown-item" href="{{ route('mission-statement') }}">Mission Statement</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">Recognition & Quality Standards</a></li>
            <li><a class="dropdown-item" href="{{ route('leadership') }}">Leadership</a></li>
            <li><a class="dropdown-item" href="{{ route('academics') }}">Faculty & Educators</a></li>
            <li><a class="dropdown-item" href="{{ route('students-in-spotlight') }}">Students in Spotlight</a></li>
            <li><a class="dropdown-item" href="{{ route('partnership') }}">Partners & Providers</a></li>
         </ul>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          ACADEMICS
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('highschool-programs') }}">High School Diploma Tracks</a></li>
            <li><a class="dropdown-item" href="{{ route('graduation-requirements') }}"> Graduation Requirements </a></li>
            <li><a class="dropdown-item" href="{{ route('credit-recovery') }}"> Credit Recovery</a></li> 
            <li><a class="dropdown-item" href="{{ route('credit-transfer') }}"> Credit Transfer</a></li> 
             <li><a class="dropdown-item" href="{{ route('awards') }}"> Awards</a></li> 
              <li><a class="dropdown-item" href="{{ route('international-students') }}"> International Students</a></li> 
         </ul>
      </li>
        <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          CURRICULUM
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('standard-high-school') }}">High School Programs</a></li>
            <li><a class="dropdown-item" href="{{ route('transfer-program') }}">High School International Transfer Program</a></li>
            <li><a class="dropdown-item" href="{{ route('honors-high-school') }}">Module & Honors Courses</a></li>
            <li><a class="dropdown-item" href="{{ route('psat') }}">PSAT/SAT Prep-Courses</a></li>
            <li><a class="dropdown-item" href="{{ route('act') }}">PreACT/ACT Prep-Courses</a></li>
            <li><a class="dropdown-item" href="{{ route('advanced-placement') }}">Advances Placement Courses</a></li>
            <li><a class="dropdown-item" href="{{ route('cte') }}">CTE Prep-Courses</a></li> 
            <li><a class="dropdown-item" href="{{ route('clep') }}">CLEP Prep-Courses</a></li>
            <li><a class="dropdown-item" href="{{ route('esol') }}">English Courses (ESOL)</a></li>
            <li><a class="dropdown-item" href="{{ route('learning-mentoring') }}">Learning/Mentoring/Coaching</a></li> 
         </ul>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          ADMISSIONS
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('admission-process') }}">Admission process</a></li>
            <li><a class="dropdown-item" href="{{ route('enrollment-criteria') }}">Enrollment criteria</a></li>
            <li><a class="dropdown-item" href="{{ route('enrollment-options') }}">Enrollment options</a></li>
            <li><a class="dropdown-item" href="{{ route('tuition') }}">Tuition</a></li>
            <li><a class="dropdown-item" href="{{ route('tuition-assistance') }}">Tuition Assistance (PEP)</a></li>
            {{-- <li><a class="dropdown-item" href="{{ route('apply') }}">Apply</a></li> --}}
            <li><a class="dropdown-item" href="{{ route('ambassador-program') }}">Ambassador Program</a></li> 
            {{-- <li><a class="dropdown-item" href="{{ route('iso') }}">ISO Certification</a></li>  --}}
         </ul>
      </li>
      {{-- <li>
        <a class="font-weight-bold buttonKit" href="{{ route('promotion') }}" style="padding:8px;text-decoration:none;display: inline-flex;text-align: center;">
          {{trans('nav.kit-button')}}
        </a>
      </li>  --}}
    </ul>
    
  </div>
</nav>
