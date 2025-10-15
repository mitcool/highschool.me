<nav role='navigation'>
    <div id="menuToggle">
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>

      <ul id="menu" style="padding-left:15px !important;">
        <li id="mySidebar" class="sidenav text-left" style="width: 260px;">

            @yield('language-switcher')
        
            <hr>
            @if(!Auth::user())
                <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{ route('student-advisory-service-'.app()->currentLocale()) }}">{{trans('nav.advice')}}</a>
            @else
                <a class="btn contact_btn_header" style="background: #025297;color:white;" href="{{route('admin-dashboard')}}">DASHBOARD</a>
            @endif
            <hr>
            <a class="btn contact_btn_header" style="background: #EE6123;color:white;" href="{{ route('study-registration-'.app()->currentLocale()) }}">{{trans('nav.study-registration')}}</a>
            <hr>
  
           
              <!-- Study programs -->
              <a style="text-transform: uppercase;display:flex;align-items:center;" data-toggle="collapse" href="#study_programs" role="button" aria-expanded="false">{{ trans('nav.study-programs-link') }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="study_programs">
                  <div class="card card-body hamburger_under">
                      @foreach($studies as $key => $study)
                          <div class="card card-body hamburger_under">
                              <a style="text-transform: uppercase;" data-toggle="collapse" href="#{{$study->key}}" role="button" aria-expanded="false">{{$study->translated->name}}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
                              <hr class="m-0">
                              <div class="collapse" id="{{$study->key}}">
                                  <div class="card card-body hamburger_under_program">
                                        <a  href="{{ route('studies-'.app()->currentLocale(),$study->translated->slug)}}">
                                            {{trans('nav.overview')}}
                                            <!-- {{$study->translated->name}}  -->
                                        </a>
                                        <hr class="m-0">
                                      @foreach($study->programs as $single_program)
                                        
                                          <a href="{{route('programs-'.app()->currentLocale(),[$study->translated->slug,$single_program->translated->slug])}}"  style="text-transform: uppercase;">
                                          {{$single_program->translated->name}}
                                          </a>
                                          <hr class="m-0">
                                      @endforeach
  
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
              
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#text_services" role="button" aria-expanded="false">{{ trans('nav.digital-study-link') }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="text_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{route('digital-studies-'.app()->currentLocale())}}" style="text-transform: uppercase;">{{ trans('nav.digital-studies') }}</a>
                      <hr class="m-0">
                      <a href="{{ route('recognition-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{trans('nav.recognition')}}</a>
                      <hr class="m-0">
                      <a href="{{ route('study-financing-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{trans('nav.study-financing')}}</a>
                      <hr class="m-0">
                      <a href="{{ route('student-advisory-service-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{trans('nav.student-advisory-service')}}</a>
                      <hr class="m-0">
                      
                  </div>
              </div>
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#bind_services" role="button" aria-expanded="false">{{ trans('nav.research-link') }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="bind_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('conferences-and-workshops-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{ trans('nav.conferences-and-workshops-link') }}</a>
                      <hr class="m-0">
                      <a href="{{ route('coaching-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{ trans('nav.coaching-link') }}</a>
                      <hr class="m-0">
                      <a href="{{ route('publishing-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{ trans('nav.publishing-link') }}</a>
                      <hr class="m-0">
                  </div>
              </div>
              <a style="text-transform: uppercase;" data-toggle="collapse" href="#study_guides_services" role="button" aria-expanded="false">{{ trans('nav.onsites-school') }}<i class="fas fa-chevron-right" style="margin-left:5px;"></i></a>
              <div class="collapse" id="study_guides_services">
                  <div class="card card-body hamburger_under">
                      <a href="{{ route('about-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{trans('nav.about')}}</a>
                      <hr class="m-0">
                      <a href="{{ route('academics-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{trans('nav.academics')}}</a>
                      <hr class="m-0">
                      <a href="{{ route('accreditation-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{trans('nav.accreditation')}}</a>
                      <hr class="m-0">
                      <a href="{{ route('blog-'.app()->currentLocale()) }}" style="text-transform: uppercase;">{{trans('nav.blog')}}</a>
                      <hr class="m-0">
                  </div>
              </div>
            <a class="font-weight-bold buttonKit" style="text-transform: uppercase;"  href="{{ route('promotion-'.app()->currentLocale()) }}" role="button" aria-expanded="false">
                {{trans('nav.kit-button')}}
                <i class="fas fa-chevron-right" style="margin-left:5px;"></i>
            </a>
        </li>
      </ul>
    </div>
  </nav>
