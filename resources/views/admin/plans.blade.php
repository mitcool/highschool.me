@extends('admin_template')

@section('content')

<div class="jumbotron container">
    <h1 class="text-center">Plans</h1>
    <hr>
    <p class="text-danger">* Only developers can add a new plan</p>
    <div class="row">
        @foreach ($plans as $plan )
        <div class="col-md-4 text-center">
            <h2>{{ $plan->name }}</h2>
            <form action="{{ route('plans.edit') }}" method="POST">
                {{ csrf_field() }}
                <input type="text" name="name" required value="{{ $plan->name }}" class="form-control">
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                <button class="btn btn-info mt-3">Save Plan</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection