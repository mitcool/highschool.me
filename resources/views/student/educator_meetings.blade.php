@extends('student.dashboard')

@section('css')
<style>
    .h_iframe iframe {
        position:absolute;
        top:0;
        left:0;
        width:80%;
        height:80%;
    }
    .label-hour{
        border:1px solid gray;
        padding:4px;
        cursor: pointer;
    }
    .full{

    }
    #available-dates{
        padding:30px 0;
    }
    .hours-radio{
        display: none;
    }
    .active-hour{
        background: #00A0B2;
        color:white;
    }
    .disabled-hour{
        opacity: 0.3;
        background:#f3f3f3;
        pointer-events: none;
        cursor:not-allowed !important;
    }
</style>
@endsection

@section('content')

<div class="container wrapper">
    <div class="table-container mx-auto">
        <h2 class="text-center h2 page-headings">Book {{ $type->name }}</h2>
    </div>
    <hr>
    <div>
        Educator: <span class="font-weight-bold"> {{ $educator->fullname() }}</span>
    </div>

    @if($permissions[$type->id])
    <div>
        <label for=""> Select Date</label>
        <input type="date" class="form-control" id="date">
    </div>

    <div id="available-dates" class="w-50 row  mx-0"></div>

    <div>
        <hr>
        <form id="book-session" method="POST" action="{{ route('book-session') }}">
            {{ csrf_field() }}
            <button class="orange-button btn">Request Session</button>
            
            <input type="hidden" value="{{ $type->id }}" name="type">
        </form>
    </div>
    @else
    <p>You don't have a permission for this session type</p>
    @endif
</div>
@endsection

@section('scripts')

<script>
    $('#date').on('change',function(){
        let date = $(this).val();
        let educator_id = '{{ $educator->id }}';
        $('#available-dates').html('')
         $.ajax({
                data: {date:date,educator_id:educator_id},
                method: "POST",
                url: "{{route('get-educator-meetings')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(hours) {
                for (const hour of hours) {
                    console.log(hour.is_alredy_booked)
                    const time = new Date(hour.start).toLocaleTimeString([], {
                        hour: "2-digit",
                        minute: "2-digit",
                        hour12: false,
                    });
                    $('#available-dates').append(`
                        <div class="col">
                            <label class="label-hour ${hour.is_alredy_booked ? ' disabled-hour ' : ''}" for="hour-checkbox-${hour.id}">${time}</label>
                            <input name="meeting_id" form="book-session" class="hours-radio" id="hour-checkbox-${hour.id}" type="radio" value="${hour.id}" />
                        </div>
                    `)
                }
            })
    });
    $(document).on('click','.label-hour',function(){
        $('.label-hour').removeClass('active-hour')
        $(this).addClass('active-hour')
    })
</script>
@endsection