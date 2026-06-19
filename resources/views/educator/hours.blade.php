@extends('educator.dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
    <style>
        input{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
<div class="container wrapper">
    <h1 class="text-center h2 page-headings">Set Work Hours</h1>
    <form action="{{ route('add-working-hour') }}" method="POST" class="confirm-first" id="add-hours">
        {{ csrf_field() }}
        <div class="row shadow align-items-center" style="padding:20px;">
            <div class="col-md-3"> 
                <input class="form-control datepicker" type="text" placeholder="Date" required name="date"> 
            </div>
            <div class="col-md-3"> 
                <input class="form-control timepicker" type="text" placeholder="Start time" required name="start"> 
            </div>
            <div class="col-md-3"> 
                <input class="form-control timepicker" type="text" placeholder="End time" required name="end"> 
            </div>
            <div class="col-md-3"><button class="orange-button">Add</button></div>
        </div>
    </form>
    <div class="row shadow" style="margin-top:50px;">
        <div class="col-md-12">
            <h2 class="text-center h2 blue-heading font-weight-bold" style="margin:40px 0;">Work Hours</h2>
        </div>
        <table class="table " style="padding:20px;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th class="text-center">Start Time</th>
                    <th class="text-center">End Time</th>
                </tr>
            </thead>
            
             @foreach($educator_hours as $hour)
            <tr>
                <td>{{ $hour->date->format('d.m.Y') }}</td>
                <td class="text-center">{{ $hour->start->format('H:i') }}</td>
                <td class="text-center">{{ $hour->end->format('H:i') }}</td>
            </tr>
        @endforeach
        </table>
        
        <div class="d-flex justify-content-center w-100">{{ $educator_hours->links() }}</div>
    </div>
    
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/datetimepicker.js') }}"></script>
<script>  
    $('.datepicker').datetimepicker({
        minDate:new Date(),
        allowTimes:[],
        format:'d-m-Y',
        dateFormat: 'd-m-Y',
        timepicker:false
    });
    $('.timepicker').datetimepicker({
        minDate:new Date(),
        allowTimes:[],
        format:'H:i',
        dateFormat: 'H:i',
        timepicker:true,
        datepicker:false,
        step:30
    });
</script>
@endsection