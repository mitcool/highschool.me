@extends('admin_template')

@section('css')

<style>
    .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }
</style>
@section('content')
<div class="p-3 container shadow bg-light">
	<h1 class="text-center">Create a new meeting</h1>

    <form action="{{ route('meeting.add') }}" method="POST">
        {{ csrf_field() }} 
        <label class="font-weight-bold m-0" for="">Date</label>
        <input name="date" type="date" class="form-control">
        <label class="font-weight-bold m-0" for="">Time</label>
        <input name="time" type="time" class="form-control">
        <label class="font-weight-bold m-0" for="">Family Member</label>
        <select name="parent_id" id="" class="form-control">
            <option value="" disabled selected>Please select</option>
            @foreach ($parents as $parent )
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @endforeach
        </select>
        <label class="font-weight-bold m-0" for="">Educator</label>
        <select name="educator_id" id="" class="form-control">
            <option value="" disabled selected>Please select</option>
            @foreach ($educators as $educator )
                <option value="{{ $educator->id }}">{{ $educator->name }}</option>
            @endforeach
        </select>
        <label class="font-weight-bold m-0" for="">Google Meets Link</label>
        <input name="link" type="text" class="form-control" min="09:00"
  max="18:00">
        <label class="font-weight-bold m-0" for="">Meeting Type</label>
        <select name="type"  class="form-control">
            <option value="1">Type 1</option>
            <option value="2">Type 2</option>
        </select>
        <button class="btn btn-info my-2 mx-auto">Add Meeting</button>
    </form>
</div>
@endsection