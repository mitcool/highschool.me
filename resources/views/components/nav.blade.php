<nav class="navbar navbar-expand-lg navbar-light row" style="padding: 0rem 0rem !important;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown"  style="cursor: pointer">
    <ul class="navbar-nav" style="padding-left:0px;">
  
      <li class="" style="position: relative" id="program-page-link-wrapper">
        <div id="program-page-link" class="nav-link dropdown-toggle font-weight-bold header-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
           {{ trans('nav.study-programs-link') }}
        </div>
         <div class="program-dropdown-menu border p-3 mt-0 row d-none bg-white" style="position: absolute;left:-20px;">
            @foreach($studies as $key => $study)
                <div class="col-md my-2">
                  <a 
                    class="text-capitalize study-links" 
                    style="padding-left:20px;"
                    href="{{ route('studies-'.app()->currentLocale(),$study->translated->slug)}}">{{$study->translated->name}}

                  </a>
                  <ul class="" style="list-style:none;">
                    @foreach($study->programs as $single_program)
                        <li>
                          <a 
                            class="program-links"
                            href="{{route('programs-'.app()->currentLocale(),[$study->translated->slug,$single_program->translated->slug])}}"
                            >
                            {{$single_program->translated->name}} {{-- @if($single_program->fast_track == 1 )<sup class="text-danger font-weight-bold" style="display:inline-block;font-size:10px;margin-top:-15px;">FAST TRACK</sup> @endif @if($single_program->is_new == 1 )<sup class="text-danger font-weight-bold" style="display:inline-block;font-size:10px;margin-top:-15px;">NEW</sup> @endif --}}
                          </a>
                        </li>
                      @endforeach
                  </ul>
                </div>
              @endforeach
          </div>
      </li>
      
       <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
        	{{ trans('nav.digital-study-link') }}
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('digital-studies-'.app()->currentLocale())}}">{{ trans('nav.digital-studies') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('recognition-'.app()->currentLocale()) }}">{{trans('nav.recognition')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('study-financing-'.app()->currentLocale()) }}">{{trans('nav.study-financing')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('student-advisory-service-'.app()->currentLocale()) }}">{{trans('nav.student-advisory-service')}}</a></li>
            
         </ul>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          {{ trans('nav.research-link') }}
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('conferences-and-workshops-'.app()->currentLocale()) }}"> {{ trans('nav.conferences-and-workshops-link') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('coaching-'.app()->currentLocale()) }}"> {{ trans('nav.coaching-link') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('publishing-'.app()->currentLocale()) }}"> {{ trans('nav.publishing-link') }}</a></li> 
         </ul>
      </li>
        <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle font-weight-bold header-link"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex; text-align: center;">
          {{ trans('nav.onsites-school') }}
        </div>
         <ul class="dropdown-menu p-0 mt-0">
            <li><a class="dropdown-item" href="{{ route('about-'.app()->currentLocale()) }}">{{trans('nav.about')}}</a></li>
			<li><a class="dropdown-item" href="{{ route('code-of-ethics-'.app()->currentLocale()) }}">{{trans('nav.code-of-ethics')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('academics-'.app()->currentLocale()) }}">{{trans('nav.academics')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('accreditation-'.app()->currentLocale()) }}">{{trans('nav.accreditation')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('blog-'.app()->currentLocale()) }}">{{trans('nav.blog')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('facts-hub-'.app()->currentLocale()) }}">FACTS HUB</a></li> 
            <li><a class="dropdown-item" href="{{ route('press-release-'.app()->currentLocale()) }}">PRESS RELEASE</a></li> 
         </ul>
      </li>
      <li>
        <a class="font-weight-bold buttonKit" href="{{ route('promotion-'.app()->currentLocale()) }}" style="padding:8px;text-decoration:none;display: inline-flex;text-align: center;">
          {{trans('nav.kit-button')}}
        </a>
      </li> 
    </ul>
    
  </div>
</nav>




