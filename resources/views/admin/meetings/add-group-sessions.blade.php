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
    <h2 class="text-center page-headings">Set educator sessions</h2>
    <form action="{{ route('create-group-session') }}" method="POST" id="add-session" class="confirm-first">
        {{ csrf_field() }}
        
        <div class="row my-2 align-items-center w-100">
            <div class="col-md-12">
                <label for="" class="d-block mb-0 font-weight-bold" >Select Educator</label>
                <select name="educator_id" class="form-control" required id="educator-select">
                    <option value="" selected disabled>Please select educator</option>
                    @foreach ($educators as $educator)
                        <option value="{{ $educator->id }}">{{ $educator->fullname() }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="table" id="educator-hours">
            
        </table>
        <div class="row mt-3">
            <div class="col-md-12 text-right" >
                <button class="orange-button">Confirm</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')

<script>
    $('#educator-select').on('change',function(){
        let educator_id = $(this).val();
        $('#educator-hours').html('')
        $.ajax({
                data: {educator_id: educator_id},
                method: "POST",
                url: "{{route('get-educator-hours')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(hours) {
                let html = ``; //<h4 class="my-2 text-center">Please set the meetings </h4>
                for (let index = 0; index < hours.length; index++) {
                    const date = new Date(hours[index].date);
                    const start = new Date(hours[index].start);
                    const end = new Date(hours[index].end);
                    const date_formatted = date.toLocaleString('en-GB', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                       
                    });
                     const start_formatted = start.toLocaleString('en-GB', {
                        
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    const end_formatted = end.toLocaleString('en-GB', {
                        
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    html += `
                        <tr>>
                            <td class="col-md-3">${date_formatted}</td>
                            <td class="col-md-3">${start_formatted}</td>
                            <td class="col-md-3">${end_formatted}</td>
                            <td class="col-md-3">
                                <select class="form-control" name="session_type[${hours[index].id}]" required>
                                    <option selected disabled value="">Please select meeting type</option>
                                    <option value="1">Group Session</option>
                                    <option value="2">Personal Mentoring Session</option>
                                    <option value="3">Career Coaching</option>
                                    <option value="4">Academic Office Hours</option>
                                    <option value="5">Family Consultation</option>
                                </select>
                            </td>
                        </tr>`
                }
                $('#educator-hours').append(html)
            }); 
    })
   
</script>
@endsection