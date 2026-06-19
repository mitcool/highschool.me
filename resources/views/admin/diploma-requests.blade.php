@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Diploma Requests</h2>
    <table class="table">
        @if(count($requests))
            <tr>
                <th>Date</th>
                <th>Ordered by</th>
                <th>Request</th>
                <th>Student</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        @endif
        @forelse ($requests as $request)
            <tr>
                <td>{{ $request->created_at->format('d.m.Y') }}</td>
                <td>{{ $request->student->student_details->parent->fullname() }}</td>
                <td>{{ $request->type->name }}</td>
                <td>{{ $request->student->fullname() }}</td>
                <td>{{ '$'.number_format($request->price(),2,'.',',') }}</td>
                <td
                    >@if($request->service_type == 2 || $request->service_type == 7)
                        {{ $request->status() }}
                    @else
                        Delivered
                    @endif
                </td>
                <td>
                    @if($request->service_type == 2  || $request->service_type == 7)
                        <a href="{{ route('admin-single-diploma-request',$request->id) }}">View</a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No requests at the moment</td>
            </tr>
        @endforelse
    </table>
    <div class="d-flex justify-content-center">
        {{ $requests->links() }}
    </div>
</div>

@endsection