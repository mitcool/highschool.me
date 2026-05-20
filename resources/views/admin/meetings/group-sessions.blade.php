@extends('admin_template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
    <style>
        input{
            cursor: pointer;
        }
        label{
            margin-top:10px;
        }
    </style>
@endsection

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center page-headings">Set sessions</h2>
    <form action="{{ route('create-group-session') }}" method="POST">
        {{ csrf_field() }}
        
        <div class="row my-2 align-items-center w-100">
            <div class="col-md-12">
                <label for="" class="d-block mb-0 font-weight-bold">Date</label>
                <input type="text" class="form-control datepicker" id="date" name="date">
                <div id="educator-details" class="d-none">
                    <label for="" class="d-block mb-0 font-weight-bold" >Select Educator</label>
                    <select name="educator_id" class="form-control" required id="educator-select">
                        <option value="" selected disabled>Please select educator</option>
                        @foreach ($educators as $educator)
                            <option value="{{ $educator->id }}">{{ $educator->fullname() }}</option>
                        @endforeach
                    </select>
                 </div>
                 <h4 class="font-weight-bold my-4 text-danger text-center" id="educator-hours"></h4>
                 <div id="meeting-details" class="d-none">
                     <div class="text-right"><button class="btn-info btn" id="add-meeting" type="button">+ Add Meeting</button></div>
                     <div class="row meeting-row" >
                        <div class="col-md-6">
                            <label for="" class="d-block mb-0 font-weight-bold">Start (UTC)</label>
                            <input type="text" name="start[]" class="form-control timepicker">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="d-block mb-0 font-weight-bold">End (UTC)</label>
                            <input type="text" name="end[]" class="form-control timepicker">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="d-block mb-0 font-weight-bold">Link</label>
                            <input type="text" name="link[]" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="d-block mb-0 font-weight-bold">Type</label>
                            <select name="type[]" class="form-control" required>
                                <option value="">-- Please Select --</option>
                                <option value="12">Group Session</option>
                                <option value="13">Personal Mentoring Session</option>
                                <option value="14">Career Coaching</option>
                                <option value="15">Academic Office Hours</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                     </div>
                    
                 </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-12 text-center" >
                <button class="orange-button btn-lg btn">Confirm</button>
            </div>
        </div>
    </form>
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

    $('#date').on('change',function(){
        $("#educator-details").removeClass('d-none');
        $('#educator-hours').html('');
        $('#educator-select').val('')
    })
    $('#educator-select').on('change',function(){
        let educator_id = $(this).val();
        let date = $('#date').val();
        $('#educator-hours').html('')
        $.ajax({
                data: {educator_id: educator_id,date:date},
                method: "POST",
                url: "{{route('get-educator-hours')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(hours) {
                
                let html = ``;
                if(hours.length == 0){
                    html += 'Educator has a day off'
                }
                else{
                    html += `Educator working time: `
                    for (const hour of hours) {
                        let start_date = new Date(hour.start);
                        let end_date = new Date(hour.end)
                        const start = `${String((start_date).getUTCHours()).padStart(2, '0')}:${String((start_date).getUTCMinutes()).padStart(2, '0')}`;
                        const end = `${String((end_date).getUTCHours()).padStart(2, '0')}:${String((end_date).getUTCMinutes()).padStart(2, '0')}`;
                        html+= `${start} - ${end}`
                    };
                    $('#meeting-details').removeClass('d-none')
                }
                $('#educator-hours').html(html);

            }); 
    });
    $('#add-meeting').on('click',function(){
        $('#meeting-details').append(`
            <div class="row meeting-row" >
                <div class="col-md-12 text-right"><button class="btn close-meeting" type="button">&times;</div>
                <div class="col-md-6">
                    <label for="" class="d-block mb-0 font-weight-bold">Start (UTC)</label>
                    <input type="text" name="start[]" class="form-control timepicker">
                </div>
                <div class="col-md-6">
                    <label for="" class="d-block mb-0 font-weight-bold">End (UTC)</label>
                    <input type="text" name="end[]" class="form-control timepicker">
                </div>
                <div class="col-md-6">
                    <label for="" class="d-block mb-0 font-weight-bold">Link</label>
                    <input type="text" name="link[]" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="" class="d-block mb-0 font-weight-bold">Type</label>
                    <select name="type[]" class="form-control" required>
                        <option value="">-- Please Select --</option>
                        <option value="12">Group Session</option>
                        <option value="13">Personal Mentoring Session</option>
                        <option value="14">Career Coaching</option>
                        <option value="15">Academic Office Hours</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>`)});

        $(document).on('click','.close-meeting',function(){
            $(this).closest('.meeting-row').remove();
        })
</script>
@endsection