@extends('admin_template')

@section('content')

<div class="jumbotron container">
    <h1 class="text-center">Plans</h1>
    <hr>
    <div class="row">
        @foreach ($plans as $plan )
        <div class="col-md-4 text-center">
            <h2>{{ $plan->name }}</h2>
            <form action="{{ route('plans.add') }}" method="POST">
                {{ csrf_field() }}
                @foreach($features as $feature)
                    <div>
                        <input type="checkbox" name="features[]" value="{{ $feature->id }}"> {{ $feature->feature }}
                    </div>
                @endforeach
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                <button class="btn btn-info mt-3">Save Plan Features</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection