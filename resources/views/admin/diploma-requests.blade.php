@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Diploma Requests</h2>
    <table class="table">
        <tr>
            <th>Student</th>
            <th>Date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($diploma_requests as $request)
            <tr>
                <td>{{ $request->user->fullname() }}</td>
                <td>{{ $request->created_at->format('d.m.Y') }}</td>
                <td class="text-center">{{ $request->status() }}</td>
                <td class="text-center">
                    @if($request->status != 2)
                        <form action="{{ route('admin.change-diploma-printing-status',$request->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button class="orange-button">{{ $request->status == 0 ? 'Mark as sent' : 'Mark as delivered' }}</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection