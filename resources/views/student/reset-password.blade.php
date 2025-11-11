@extends('student.dashboard')

@section('content')
<div class="col-md-10">
    <div>
        <label for="email" value="Email" />
        <input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
    </div>
</div>
@endsection