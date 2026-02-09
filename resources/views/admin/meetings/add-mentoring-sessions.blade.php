@extends('admin_template')

@section('content')


<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Mentoring Session for Students</h2>
    <form action="{{ route('create-mentoring-session') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <label for="" class="d-block mb-0 font-weight-bold" >Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="" class="d-block mb-0 font-weight-bold" >Start time</label>
                <input type="time" name="start" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="" class="d-block mb-0 font-weight-bold" >End time</label>
                <input type="time" name="end" class="form-control" required>
            </div>
        
            <div class="col-md-12">
                <label for="" class="d-block mb-0 font-weight-bold" >Link</label>
                <input type="text" name="link" class="form-control" required>
            </div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-md-12">
                <label for="" class="d-block mb-0 font-weight-bold" >Add Educator</label>
                <select name="educator_id" class="form-control" required>
                    <option value="" selected disabled>Please select educator</option>
                    @foreach ($educators as $educator)
                        <option value="{{ $educator->id }}">{{ $educator->fullname() }} </option>
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