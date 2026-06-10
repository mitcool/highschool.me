@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Diploma Requests</h2>
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Ordered by</th>
            <th>Request</th>
            <th>Student</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($requests as $request)
            <tr>
                <td>{{ $request->created_at->format('d.m.Y') }}</td>
                <td>{{ $request->student->student_details->parent->fullname() }}</td>
                <td>{{ $request->type->name }}</td>
                <td>{{ $request->student->fullname() }}</td>
                <td>${{ number_format($request->type->price,2,'.',',') }}</td>
                <td>{{ $request->status() }}</td>
                <td>
                    <a href="{{ route('admin-single-diploma-request',$request->id) }}">View</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection