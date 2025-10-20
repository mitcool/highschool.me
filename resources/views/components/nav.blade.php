<nav class="navbar navbar-expand-lg navbar-light" style="padding: 0rem 0rem !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown"  style="cursor: pointer">
    <ul class="navbar-nav" style="padding-left:0px;">
  
    <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
        	COURSES
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('about')}}">Course 1</a></li>
            <li><a class="dropdown-item" href="{{ route('about')}}">Course 2</a></li>
            <li><a class="dropdown-item" href="{{ route('about')}}">Course 3</a></li>
            <li><a class="dropdown-item" href="{{ route('about')}}">Course 4</a></li>
            <li><a class="dropdown-item" href="{{ route('about')}}">Course 5</a></li>
         </ul>
      </li>
      
       <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
        	ABOUT
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('school-overview')}}">School Overview</a></li>
            <li><a class="dropdown-item" href="{{ route('mission-statement') }}">Mission Statement</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">Accreditation</a></li>
            <li><a class="dropdown-item" href="{{ route('leadership') }}">Leadership</a></li>
            <li><a class="dropdown-item" href="{{ route('academics') }}">Faculty & Mentors</a></li>
            <li><a class="dropdown-item" href="{{ route('students-in-spotlight') }}">Students in Spotlight</a></li>
            <li><a class="dropdown-item" href="{{ route('partnership') }}">Partnership</a></li>
         </ul>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          ACADEMICS
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('highschool-programs') }}"> High School Programs</a></li>
            <li><a class="dropdown-item" href="{{ route('graduation-requirements') }}"> Graduation Requirements </a></li>
            <li><a class="dropdown-item" href="{{ route('credit-recovery') }}"> Credit Recovery</a></li> 
            <li><a class="dropdown-item" href="{{ route('credit-transfer') }}"> Credit Transfer</a></li> 
             <li><a class="dropdown-item" href="{{ route('awards') }}"> Awards</a></li> 
              <li><a class="dropdown-item" href="{{ route('international-students') }}"> International Students</a></li> 
         </ul>
      </li>
        <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          CIRRUCULUM
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('about') }}">Standard High School</a></li>
			<li><a class="dropdown-item" href="{{ route('code-of-ethics') }}">Honors High School</a></li>
            <li><a class="dropdown-item" href="{{ route('academics') }}">Advanced Placement</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">PSAT/SAT/ACT</a></li>
            <li><a class="dropdown-item" href="{{ route('blog') }}">Baccalaureate</a></li> 
         </ul>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          ADMISSIONS
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('about') }}">Admission process</a></li>
			      <li><a class="dropdown-item" href="{{ route('code-of-ethics') }}">Enrolment criteria</a></li>
            <li><a class="dropdown-item" href="{{ route('academics') }}">Enrolment options</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">Tuition</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">Tuition Assistance (PEP)</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">Apply</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">Loyality Program</a></li> 
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">ISO Certification</a></li> 
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
