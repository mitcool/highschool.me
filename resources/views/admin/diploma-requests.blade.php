@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Diploma Requests</h2>
    <table class="table">
        <tr>
            <th>Student</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        @foreach ($diploma_requests as $request)
            <tr>
                <td>{{ $request->user->fullname() }}</td>
                <td>{{ $request->created_at->format('d.m.Y') }}</td>
                <td>{{ $request->status() }}</td>
            </tr>
        @endforeach
    </table>
</div>

@endsection