<nav class="navbar navbar-expand-lg navbar-light" style="padding: 0rem 0rem !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown"  style="cursor: pointer">
    <ul class="navbar-nav" style="padding-left:0px;">
        
       <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          {{ $texts['about'] }}
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('school-overview')}}">{{ $texts['school-overview'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('mission-statement') }}">{{ $texts['mission-statement'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation') }}">{{ $texts['accreditation'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('leadership') }}">{{ $texts['leadership'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('academics') }}">{{ $texts['academics'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('students-in-spotlight') }}">{{ $texts['students-in-spotlight'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('partnership') }}">{{ $texts['partnership'] }}</a></li>
         </ul>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          {{ $texts['academics-point'] }}
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('highschool-programs') }}">{{ $texts['highschool-programs'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('graduation-requirements') }}">{{ $texts['graduation-requirements'] }}  </a></li>
            <li><a class="dropdown-item" href="{{ route('credit-recovery') }}"> {{ $texts['credit-recovery'] }}</a></li> 
            <li><a class="dropdown-item" href="{{ route('credit-transfer') }}">{{ $texts['credit-transfer'] }} </a></li> 
            <li><a class="dropdown-item" href="{{ route('awards') }}">{{ $texts['awards'] }}</a></li> 
            <li><a class="dropdown-item" href="{{ route('international-students') }}"> {{ $texts['international-students'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('starter-kit') }}">{{ $texts['starter-kit'] }}</a>
         </ul>
      </li>
        <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          {{ $texts['curriculum'] }}
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('standard-high-school') }}">{{ $texts['standard-high-school'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('transfer-program') }}">{{ $texts['transfer-program'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('honors-high-school') }}">{{ $texts['honors-high-school'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('psat') }}">{{ $texts['psat'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('act') }}">{{ $texts['act'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('advanced-placement') }}">{{ $texts['advanced-placement'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('cte') }}">{{ $texts['cte'] }}</a></li> 
            <li><a class="dropdown-item" href="{{ route('clep') }}">{{ $texts['clep'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('esol') }}">{{ $texts['esol'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('learning-mentoring') }}">{{ $texts['learning-mentoring'] }}</a></li> 
         </ul>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          {{ $texts['admission'] }}
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('admission-process') }}">{{ $texts['admission-process'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('enrollment-criteria') }}">{{ $texts['enrollment-criteria'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('enrollment-options') }}">{{ $texts['enrollment-options'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('tuition') }}">{{ $texts['tuition'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('tuition-assistance') }}">{{ $texts['tuition-assistance'] }}</a></li>
            <li><a class="dropdown-item" href="{{ route('ambassador-program') }}">{{ $texts['ambassador-program'] }}</a></li> 
         </ul>
      </li>
   
    </ul>
    
  </div>
</nav>
