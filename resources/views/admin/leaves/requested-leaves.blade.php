@extends('admin_template')

@section('css')
<style>
    .cst-badge {
        font-size: 12px;
    }
</style>
@endsection

@section('content')
<div class="container" style="max-width:980px;">
    <h2 class="text-center font-weight-bold mb-4 mt-5" style="color:#0b4aa6;">Leave Requests</h2>

    <div class="table-responsive">
        <table class="table table-borderless" style="font-size:13px;">
            <thead>
                <tr style="border-bottom:2px solid #cfcfcf;">
                    <th class="text-left">Date</th>
                    <th class="text-left">Student</th>
                    <th class="text-left">Type</th>
                    <th class="text-left">Start Date</th>
                    <th class="text-left">End Date</th>
                    <th class="text-left">Link</th>
                    <th class="text-left">Status</th>
                </tr>
            </thead>

            <tbody>
            @foreach($leaveRequests as $leave)
                <tr style="border-bottom:1px solid #d8d8d8;">
                    <td>{{ ($leave->created_at)->format('d.m.Y') }}</td>
                    <td>{{ ($leave->student)->name ?? '—' }}</td>
                    <td>
                        {{ $leave->type === 1 ? 'Medical' : 'Personal' }}
                    </td>
                    <td>{{ ($leave->start_date)->format('d.m.Y') }}</td>
                    <td>{{ ($leave->end_date)->format('d.m.Y') }}</td>

                    <td>
                        <a href="{{ route('admin.single-leave-reuqest', $leave->id) }}">View</a>
                    </td>

                    <td>
                        <span class="badge cst-badge badge-{{ $leave->status_color }}">
                            {{ $leave->status_text }}
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $leaveRequests->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection