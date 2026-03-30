@extends('admin_template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
    <style>
        input{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')


<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Mentoring Session for Students</h2>
     <p class="text-center text-danger">Please use UTC time</p>
    <form action="{{ route('create-mentoring-session') }}" method="POST">
        {{ csrf_field() }}
        <div class="row" id="meetings">
            <div class="col-md-4">
                <label for="" class="d-block mb-0 font-weight-bold" >Date</label>
                <input type="text" name="date[]" class="form-control datepicker bg-white"  readonly required>
            </div>
            <div class="col-md-4">
                <label for="" class="d-block mb-0 font-weight-bold" >Start time (UTC)</label>
                <input type="text" name="start[]" class="form-control timepicker bg-white" readonly  required>
            </div>
            <div class="col-md-4">
                <label for="" class="d-block mb-0 font-weight-bold" >End time (UTC)</label>
                <input type="text" name="end[]" class="form-control timepicker bg-white" readonly  required>
            </div>
        
            <div class="col-md-12">
                <label for="" class="d-block mb-0 font-weight-bold" >Link</label>
                <input type="text" name="link[]" class="form-control" required>
            </div>
        </div>
        <div class="text-right mt-2">
            <button class="btn btn-secondary" type="button" id="add-meeting">+ Add Meeting</button>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-md-12">
                <label for="" class="d-block mb-0 font-weight-bold" >Add Educator</label>
                <select name="educator_id" class="form-control" required>
                    <option value="" selected disabled>Please select educator</option>
                    @foreach ($educators as $educator)
                        <option value="{{ $educator->id }}">{{ $educator->fullname() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-right" >
                <button class=" orange-button">Confirm</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')


<script src="{{ asset('js/datetimepicker.js') }}"></script>
<script>
    $('.datepicker').datetimepicker({minDate:new Date(),allowTimes:[],format:'d-m-Y',dateFormat: 'd-m-Y',timepicker:false});
    $('.timepicker').datetimepicker({minDate:new Date(),allowTimes:[],format:'H:i',dateFormat: 'H:i',timepicker:true,datepicker:false,step:15});
    	
    $('#add-meeting').on('click',function(){
        $('#meetings').append(`
            <div class="col-md-12">
                <hr>    
            </div>
            <div class="col-md-4 my-2">
                <label for="" class="d-block mb-0 font-weight-bold" >Date </label>
                <input type="text" name="date[]" class="form-control datepicker bg-white" required readonly>
            </div>
            <div class="col-md-4 my-2">
                <label for="" class="d-block mb-0 font-weight-bold" >Start time (UTC)</label>
                <input type="text" name="start[]" class="form-control timepicker bg-white" required readonly>
            </div>
            <div class="col-md-4 my-2">
                <label for="" class="d-block mb-0 font-weight-bold" >End time (UTC)</label>
                <input type="text" name="end[]" class="form-control timepicker bg-white" required readonly>
            </div>
        
            <div class="col-md-12">
                <label for="" class="d-block mb-0 font-weight-bold" >Link</label>
                <input type="text" name="link[]" class="form-control" required>
            </div>
        `);
        $('.datepicker').datetimepicker(
            {
                minDate:new Date(),
                allowTimes:[],
                format:'d-m-Y',
                dateFormat: 'd-m-Y',
                timepicker:false
            }
        );
        $('.timepicker').datetimepicker(
            {
                minDate:new Date(),
                allowTimes:[],
                format:'H:i',
                dateFormat: 'H:i',
                timepicker:true,
                datepicker:false,
                step:15
            });
    });
</script>
@endsection