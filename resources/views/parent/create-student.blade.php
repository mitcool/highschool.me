@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">Add a student account</h1>
    <form action="{{ route('student.add') }}" method="POST">
        {{ csrf_field() }}
        <div>
            <label for="" class="font-weight-bold mb-0">Fullname</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div>
            <label for="" class="font-weight-bold mb-0">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <hr>
        <button class="btn btn-info">Create student</button>
    </form>
</div>
@endsection