@extends('admin_template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
<style>
    label{
        font-weight: bold;
        margin-bottom:0;
        margin-top:10px;
    }
</style>
@endsection

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center page-headings">Family Consultations</h2>
    <table class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Request By</th> 
            <th>Link</th>
            <th></th>
        </tr>
        @foreach ($family_consultations as $request )
            <tr>
                <th>{{ $request->created_at->format('d.m.Y') }}</th>
                <th>{{ $request->parent->name}} {{ $request->parent->surname }}</th>
              
                <th>
                    @if($request->status == 0)
                    <a data-toggle="modal" data-target="#family-consultation-modal-{{ $request->id }}" class="text-underline" style="cursor: pointer">Set</a>
                    @elseif($request->status == 1)
                        Appointed
                    @elseif($request->status == 2)
                        Completed
                    @endif 
                </th>
                <th>
                    @if($request->status == 1)
                        <form action="{{ route('mark-family-consultation-as-completed',$request->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-info">Mark as completed</button>
                        </form>
                    @endif
                </th>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="family-consultation-modal-{{ $request->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Set Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create-family-consultation',$request->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Date</label>
                                <input type="text" name="date" class="form-control datepicker" autocomplete="off">
                            </div>
                             <div class="col-md-6">
                                <label for="">Link</label>
                                <input type="text" name="link" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="">Start</label>
                                <input type="text" name="start" class="form-control timepicker" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="">End</label>
                                <input type="text" name="end" class="form-control timepicker" autocomplete="off">
                            </div>
                           
                            <div class="col-md-6">
                                <label for="">Educator</label>
                                <select name="educator_id" id="" class="form-control">
                                    <option value="" selected disabled> -- Please select --</option>
                                    @foreach ($educators as $educator )
                                        <option value="{{ $educator->id }}">{{ $educator->fullname() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn orange-button mx-auto my-3">Create Family Consultation</button>
                        </div>
                        
                    </form>
                </div>
                
                </div>
            </div>
            </div>
        @endforeach
       
    </table>
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