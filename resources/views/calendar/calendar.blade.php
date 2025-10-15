@extends('calendar.layout')

@section('language-switcher')
<div class="dropdown">
	<button class="btn dropdown-toggle text-uppercase" style="background: #025297;color:white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	  {{ app()->currentLocale() }}
	  </button>
	  <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
		<div>
			<a href="{{ route('calendar-en') }}" class="text-uppercase btn d-inline-block bg-transparent">EN</a>
		</div>
		<div>
			<a href="{{ route('calendar-de') }}" class="text-uppercase btn d-inline-block bg-transparent">DE</a>
		</div>
	  </div> 
  </div>
@endsection

@section('right-side')
<div class="row text-white">
    <div class="col-3 d-flex justify-content-start align-items-center">
        <a class="btn" href="{{ route('calendar-'.app()->currentLocale()) }}">Today</a>
    </div>
    <div class="col-6">
        <h4 class="text-center">{{ $month_name }} {{ $year_name }}</h4>
    </div>
    <div class="col-3 d-flex justify-content-end align-items-center">
        <a href="{{ route('calendar-'.app()->currentLocale(),$last) }}" rel="nofollow">
            <i class="fas fa-chevron-left"></i>
        </a>
        &nbsp;
        <a href="{{ route('calendar-'.app()->currentLocale(),$next) }}" rel="nofollow">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
</div>

<hr class="gold-line">
<div class="row  calendar-label">
    {{-- <div class="col w-100"><span class="date">WN</span></div> --}}
    <div class="col w-100"><span class="date top">M</span></div>
    <div class="col w-100"><span class="date top">T</span></div>
    <div class="col w-100"><span class="date top">W</span></div>
    <div class="col w-100"><span class="date top">T</span></div>
    <div class="col w-100"><span class="date top">F</span></div>
    <div class="col w-100"><span class="date top">S</span></div>
    <div class="col w-100"><span class="date top">S</span></div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr class="gold-line">
    </div>
</div>
@foreach($current_month_weeks as $week => $days)
   
    <div class="row text-center"  >
        @if(count($days->calendar_days) < 7 && !$loop->last )
            @for($i = count($days->calendar_days); $i<7;$i++)
                <div class="col w-100"></div>
            @endfor
        @endif
        @foreach ($days->calendar_days as $day)
          
           <div class="col w-100">
                @if($day->is_past() && $day->is_weekend())
                <button class="weekend date-past" >
                    {{ $day->calendar_date }}
                </button>
                @elseif($day->is_past())
                <button class="date-past" >
                    {{ $day->calendar_date }}
                </button>
                @else
                <button  class="date {{ $day->is_weekend() ? ' weekend ' : '' }} {{ $day->is_today() ? ' today ' : '' }}" data-toggle="modal" data-target="#date-modal-{{ $day->calendar_date }}">
                    {{ $day->calendar_date }}
                </button>
                <div class="modal fade" tabindex="-1" role="dialog" id="date-modal-{{ $day->calendar_date }}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-title">
                            <button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          @foreach ($day->calendar_hours as $hour) 
                              @if($hour->is_reserved  || $hour->is_hour_past())
                                <label class="reserved">
                                    {{ $hour->formatted_time() }}
                                </label>
                              @else
                              <label for="hour-{{ $hour->id }}" class="hour-label" data-value="{{ $hour->id }}">
                                   {{ $hour->formatted_time() }}
                              </label>
                              @endif
                             
                          @endforeach
                          <div class="text-right">
                            <form action="{{ route('appoint-hour') }}" id="appointment-form-{{ $day->calendar_date }}" class="appointment-form" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="hour">
                                <button class="btn orange-button">Continue</button>
                              </form>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        @endforeach
        @if(count($days->calendar_days) < 7 && $loop->last )
            @for($i = count($days->calendar_days); $i<7;$i++)
                <div class="col w-100"></div>
            @endfor
        @endif
    </div>
@endforeach
</div>
@endsection

@section('calendar-scripts')
<script>
    $(document).ready(function(){
        $('.hour-label').on('click', function(){
            let value = ($(this).attr('data-value'))
            $('.hour-label').css('background','#025297').css('color','#ffffff');
            $(this).css('background','#EA580D').css('color','black');
            $(this).closest('.modal-body').find('.appointment-form').css('display','block');
            $(this).closest('.modal-body').find('[name=hour]').val(value);
        })
    })
   
</script>
@endsection