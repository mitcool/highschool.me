@extends('parent.dashboard')

@section('css')
<style>
    .leave-page-wrap{
        padding: 24px 0 40px;
    }
    .leave-card{
        background:#fff;
        border:1px solid #ececec;
        border-radius:14px;
        box-shadow:0 2px 10px rgba(0,0,0,.06);
        padding:24px;
        margin-bottom:28px;
    }
    .leave-card-title{
        text-align:center;
        color:#045397;
        font-weight:800;
        font-size:2rem;
        margin-bottom:22px;
    }
    .leave-form label{
        font-weight:600;
        margin-bottom:6px;
    }
    .leave-form .form-control{
        border-radius:8px;
        border-color:#333;
    }
    .leave-form textarea.form-control{
        min-height:150px;
        resize:none;
    }
    .leave-form .custom-file {
        max-width: 520px;
    }
    .leave-date-input{
        width: 180px;
    }
    .leave-btn-cancel{
        border:1px solid #2f7be8;
        color:#0b5ed7;
        background:#fff;
        border-radius:10px;
        padding:10px 22px;
        box-shadow:0 3px 8px rgba(47,123,232,.12);
    }
    .leave-btn-submit{
        background:#f05a00;
        border-color:#f05a00;
        color:#fff;
        border-radius:10px;
        padding:10px 22px;
        box-shadow:0 6px 14px rgba(240,90,0,.2);
    }
    .leave-form-actions{
        display:flex;
        justify-content:flex-end;
        align-items:center;
        gap:16px;
    }
    .leave-table{
        margin-bottom:0;
    }
    .leave-table thead th{
        border-top:none;
        border-bottom:1px solid #bdbdbd;
        color:#303030;
        font-weight:700;
        font-size:.95rem;
        white-space:nowrap;
    }
    .leave-table td{
        vertical-align:middle;
        color:#515151;
        border-top:1px solid #d8d8d8;
        font-size:.95rem;
    }
    .leave-link{
        color:#2f7be8;
        font-weight:500;
    }
    .leave-link:hover{
        color:#0b5ed7;
        text-decoration:none;
    }
    .leave-link-disabled{
        color:#9ca3af;
        cursor:default;
        pointer-events:none;
    }
    .leave-status-badge{
        display:inline-block;
        min-width:78px;
        text-align:center;
        border-radius:999px;
        padding:4px 12px;
        color:#fff;
        font-size:.8rem;
        line-height:1.2;
    }
    .leave-status-secondary{
        background:#7c7c84;
    }
    .leave-status-primary{
        background:#045397;
    }
    .leave-status-danger{
        background:#e00000;
    }
    .leave-pagination .pagination{
        justify-content:center;
        margin-top:22px;
        margin-bottom:0;
    }
    .leave-empty{
        text-align:center;
        color:#6b7280;
        padding:22px 0 8px;
    }
    @media (max-width: 767px) {
        .leave-card{
            padding:18px 14px;
        }
        .leave-card-title{
            font-size:1.6rem;
        }
        .leave-date-input{
            width:100%;
        }
        .leave-form-actions{
            justify-content:flex-start;
            width:100%;
        }
    }
</style>
@endsection

@section('content')
<div class="container leave-page-wrap">
    <div class="leave-card">
        <h1 class="leave-card-title">Request Leave For A Child</h1>

        <form action="{{ route('parent.store-leave') }}" method="POST" enctype="multipart/form-data" class="confirm-first leave-form" id="store-leave">
            @csrf

            <div class="form-group">
                <label for="children">Child</label>
                <select id="children" class="form-control" name="student_id" required>
                    @foreach (auth()->user()->students as $student)
                        <option value="{{ $student->student_id }}" {{ old('student_id') == $student->student_id ? 'selected' : '' }}>
                            {{ $student->student->name }} {{ $student->student->surname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="leaveType">Type</label>
                <select id="leaveType" class="form-control" name="leave_type" required>
                    <option value="1" {{ old('leave_type') == 1 ? 'selected' : '' }}>Leave of Absence (Medical)</option>
                    <option value="2" {{ old('leave_type') == 2 ? 'selected' : '' }}>Leave of Absence (Personal)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="leaveFile">File</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="leaveFile" name="file" required>
                    <label class="custom-file-label" for="leaveFile">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <label for="leaveMessage">Message</label>
                <textarea id="leaveMessage" class="form-control" name="message" required>{{ old('message') }}</textarea>
            </div>

            <div class="d-flex align-items-end justify-content-between flex-wrap">
                <div class="d-flex flex-wrap" style="gap:24px;">
                    <div class="form-group mb-0">
                        <label for="startDate">Start date</label>
                        <input id="startDate" type="date" class="form-control leave-date-input" name="start_date" value="{{ old('start_date') }}" required>
                    </div>
                    <div class="form-group mb-0">
                        <label for="endDate">End date</label>
                        <input id="endDate" type="date" class="form-control leave-date-input" name="end_date" value="{{ old('end_date') }}" required>
                    </div>
                </div>

                <div class="leave-form-actions mt-3 mt-md-0">
                    <button type="reset" class="btn leave-btn-cancel">Cancel</button>
                    <button type="submit" class="btn leave-btn-submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div class="leave-card">
        <h2 class="leave-card-title mb-4">Leave Requests</h2>

        @if($leaveRequests->count())
            <div class="table-responsive">
                <table class="table leave-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Student</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaveRequests as $leaveRequest)
                            <tr>
                                <td>{{ optional($leaveRequest->created_at)->format('d.m.Y') ?? optional($leaveRequest->start_date)->format('m.d.Y') }}</td>
                                <td>{{ $leaveRequest->student ? $leaveRequest->student->fullname() : 'N/A' }}</td>
                                <td>{{ $leaveRequest->type_text }}</td>
                                <td>{{ optional($leaveRequest->start_date)->format('d.m.Y') }}</td>
                                <td>{{ optional($leaveRequest->end_date)->format('d.m.Y') }}</td>
                                <td>
                                    @if($leaveRequest->file)
                                        <a class="leave-link" href="{{ asset('/documents/leave_requests/'.$leaveRequest->file) }}" target="_blank">View</a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="leave-status-badge leave-status-{{ $leaveRequest->status_color }}">
                                        {{ $leaveRequest->status_text }}
                                    </span>
                                </td>
                                <td>
                                    @if((int) $leaveRequest->status === \App\LeaveRequest::STATUS_PENDING)
                                        <a class="leave-link" href="{{ route('parent.leave-requests.edit', $leaveRequest->id) }}">Edit</a>
                                    @else
                                        <span class="leave-link leave-link-disabled">Edit</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="leave-pagination">
                {{ $leaveRequests->links() }}
            </div>
        @else
            <p class="leave-empty">No leave requests have been submitted yet.</p>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#leaveFile').on('change', function () {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(fileName || 'Choose file');
    });
</script>
@endsection
