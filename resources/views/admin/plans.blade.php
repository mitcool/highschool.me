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
            <hr>
            <form action="{{ route('plans.edit') }}" method="POST">
                {{ csrf_field() }}
                <label for="" class="mb-0 font-weight-bold">Plan name:</label>
                <input type="text" name="name" required value="{{ $plan->name }}" class="form-control">
                <label for="" class="mb-0 font-weight-bold">Price per month:</label>
                <input type="number" name="price_per_month" required value="{{ $plan->price_per_month }}" class="form-control">
                <label for="" class="mb-0 font-weight-bold">Price per year:</label>
                <input type="number" name="price_per_year" required value="{{ $plan->price_per_year }}" class="form-control">
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                <hr>
                <button class="btn btn-info mt-1">Save Plan</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection