<nav role='navigation'>
    <div id="menuToggle">
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>

      <ul id="menu" style="padding-left:15px !important; padding-top: 80px!important;">
        <li id="mySidebar" class="sidenav text-left" style="width: 300px;">

            <hr>
            @if(!Auth::user())
                <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{ route('register') }}">{{ $texts['register'] }}</a>
                <a class="btn contact_btn_header mt-2" style="background: #025297;color:white;" href="{{ route('login') }}">{{ $texts['login'] }}</a>
            @else
                @if(auth()->user()->role_id == 1)
                    <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{route('admin-dashboard')}}">{{ $texts['dashboard'] }}</a>
                @elseif(auth()->user()->role_id == 2)
                    <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{route('parent.dashboard')}}">{{ $texts['dashboard'] }}</a>
                @elseif(auth()->user()->role_id == 4)
                    <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{route('student.dashboard')}}">{{ $texts['dashboard'] }}</a>
                @elseif(auth()->user()->role_id == 5)
                    <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{route('educator.dashboard')}}">{{ $texts['dashboard'] }}</a>
                @endif
            @endif
            <hr>
            <a class="btn contact_btn_header" style="background: #EE6123;color:white;" href="{{ route('student-advisory-service') }}">{{ $texts['contact'] }}</a>
            <hr>


              <!-- About -->
              <a style="text-transform: uppercase;display:flex;align-items:center;" data-toggle="collapse" href="#study_programs" role="button" aria-expanded="false">{{ $texts['about'] }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="study_programs">
                  <div class="card card-body hamburger_under">
                    <div class="card card-body hamburger_under">
                      <a href="{{ route('school-overview')}}" style="text-transform: uppercase;">{{ $texts['school-overview'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('mission-statement') }}" style="text-transform: uppercase;">{{ $texts['mission-statement'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('accreditation') }}" style="text-transform: uppercase;">{{ $texts['accreditation'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('leadership') }}" style="text-transform: uppercase;">{{ $texts['leadership'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('academics') }}" style="text-transform: uppercase;">{{ $texts['academics'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('students-in-spotlight') }}" style="text-transform: uppercase;">{{ $texts['students-in-spotlight'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('partnership') }}" style="text-transform: uppercase;">{{ $texts['partnership'] }}</a>
                      <hr class="m-0">
                    </div>
                  </div>
              </div>

              <a style="text-transform: uppercase;" data-toggle="collapse" href="#text_services" role="button" aria-expanded="false">{{ $texts['academics-point'] }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="text_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('highschool-programs') }}" style="text-transform: uppercase;">{{ $texts['highschool-programs'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('graduation-requirements') }}" style="text-transform: uppercase;">{{ $texts['graduation-requirements'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('credit-recovery') }}" style="text-transform: uppercase;">{{ $texts['credit-recovery'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('credit-transfer') }}" style="text-transform: uppercase;">{{ $texts['credit-transfer'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('awards') }}" style="text-transform: uppercase;">{{ $texts['awards'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('country-requirements') }}" style="text-transform: uppercase;">International Diploma Recognition</a>
                      <hr class="m-0">
                      <a href="{{ route('international-students') }}" style="text-transform: uppercase;">{{ $texts['international-students'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('starter-kit') }}" style="text-transform: uppercase;">{{ $texts['starter-kit'] }}</a>
                      <hr class="m-0">
                  </div>
              </div>
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#bind_services" role="button" aria-expanded="false">{{ $texts['curriculum'] }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="bind_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('standard-high-school') }}" style="text-transform: uppercase;">{{ $texts['standard-high-school'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('transfer-program') }}" style="text-transform: uppercase;">{{ $texts['transfer-program'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('honors-high-school') }}" style="text-transform: uppercase;">{{ $texts['honors-high-school'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('psat') }}" style="text-transform: uppercase;">{{ $texts['psat'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('act') }}" style="text-transform: uppercase;">{{ $texts['act'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('advanced-placement') }}" style="text-transform: uppercase;">{{ $texts['advanced-placement'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('cte') }}" style="text-transform: uppercase;">{{ $texts['cte'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('clep') }}" style="text-transform: uppercase;">{{ $texts['clep'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('esol') }}" style="text-transform: uppercase;">{{ $texts['esol'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('learning-mentoring') }}" style="text-transform: uppercase;">{{ $texts['learning-mentoring'] }}</a>
                      <hr class="m-0">
                  </div>
              </div>
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#study_guides_services" role="button" aria-expanded="false">{{ $texts['admission'] }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="study_guides_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('admission-process') }}" style="text-transform: uppercase;">{{ $texts['admission-process'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('enrollment-criteria') }}" style="text-transform: uppercase;">{{ $texts['enrollment-criteria'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('enrollment-options') }}" style="text-transform: uppercase;">{{ $texts['enrollment-options'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('tuition') }}" style="text-transform: uppercase;">{{ $texts['tuition'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('tuition-assistance') }}" style="text-transform: uppercase;">{{ $texts['tuition-assistance'] }}</a>
                      <hr class="m-0">
                      <a href="{{ route('ambassador-program') }}" style="text-transform: uppercase;">{{ $texts['ambassador-program'] }}</a>
                      <hr class="m-0">
                  </div>
              </div>
        </li>
      </ul>
    </div>
  </nav>
