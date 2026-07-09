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

<div class="w-100">
<div class="bg-white" style="margin:50px auto;padding:20px;width:80%;">    
    <h2 class="text-center page-headings">Requested meetings</h2>
    <hr>
    <div class="row p-2  text-white border" style="background:#AB4400;">
        <div class="col-md-1 font-weight-bold">
            Date
        </div>
        <div class="col-md-1 font-weight-bold">
            Time
        </div>
        <div class="col-md-3 font-weight-bold">
            Meeting Type
        </div>
        <div class="col-md-3 font-weight-bold">
            Educator
        </div>
        <div class="col-md-3 font-weight-bold">
            Student
        </div>
        <div class="col-md-1 font-weight-bold text-center">
            Link
        </div>
    </div>
    @foreach ($meetings as $meeting)
        <div class="row p-2 bg-light border">
            <div class="col-md-1">
                {{ $meeting->local_date() }}
            </div>
            <div class="col-md-1">
                {{ $meeting->local_time() }}
            </div>
            <div class="col-md-3">
                {{ $meeting->curriculum_type?->name  ?? 'Not Booked Yet'}}
            </div>
            <div class="col-md-3">
                {{ $meeting->educator->fullname() }}
            </div>
            <div class="col-md-3">
                Student Student
            </div>
            <div class="col-md-1 text-center">
                <button class="btn btn-info" data-toggle="modal" data-target="#session-{{ $meeting->id }}">Link </button>
            </div>
        </div>
        <div class="modal fade" id="session-{{ $meeting->id }}" aria-labelledby="request-category-modal-label">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="request-category-modal-label">Please add a 'Discord' meeting link:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('set-meeting-link') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="link" required>
                    <input type="hidden" value="{{ $meeting->id }}" name="meeting_id">
                    <br>
                    <button class="btn btn-info mx-auto">Add Link</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    @endforeach
</div>

<div class="bg-white" style="margin:50px auto;padding:20px;width:80%;">    
    <h2 class="text-center page-headings">Schedualed and passed meetings</h2>
    <hr>
    <div class="row p-2  text-white border" style="background:#AB4400;">
        <div class="col-md-1 font-weight-bold">
            Date
        </div>
        <div class="col-md-1 font-weight-bold">
            Time
        </div>
        <div class="col-md-3 font-weight-bold">
            Meeting Type
        </div>
        <div class="col-md-3 font-weight-bold">
            Educator
        </div>
        <div class="col-md-3 font-weight-bold">
            Student
        </div>
        <div class="col-md-1 font-weight-bold text-center">
            Link
        </div>
    </div>
    @foreach ($meetings as $meeting)
        <div class="row p-2 bg-light border">
            <div class="col-md-1">
                {{ $meeting->local_date() }}
            </div>
            <div class="col-md-1">
                {{ $meeting->local_time() }}
            </div>
            <div class="col-md-3">
                {{ $meeting->curriculum_type?->name  ?? 'Not Booked Yet'}}
            </div>
            <div class="col-md-3">
                {{ $meeting->educator->fullname() }}
            </div>
            <div class="col-md-3">
                Student Student
            </div>
            <div class="col-md-1 text-center">
               {{ $meeting->link }}
            </div>
        </div>
        
    @endforeach
</div>
</div>
@endsection

