@extends('parent.dashboard')

@section('content')

<div class="shadow container jumbotron bg-white">
    <h1 class="text-center">My Plans</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Plan Type</th>
                <th>Expiration Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student_plans as $plan)
                <tr>
                    <td>{{ $plan->student->name }} {{  $plan->student->surname }}</td>
                    <td>{{ $plan->plan->name }} Plan</td>
                    <td>{{ $plan->expires_at() }}</td>
                    <td>{!! $plan->is_active() 
                        ? '<span class="badge bg-success text-white">Active</span>' 
                        : '<span class="badge bg-danger text-white">Expired</span>' !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
