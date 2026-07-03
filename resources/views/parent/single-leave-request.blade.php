@extends('parent.dashboard')

@section('css')
<style>
    .leave-detail-wrap{
        max-width:980px;
        margin:0 auto;
        padding:28px 0 40px;
    }
    .leave-detail-title{
        text-align:center;
        color:#111827;
        font-size:2rem;
        font-weight:800;
        margin-bottom:22px;
    }
    .leave-detail-card{
        background:#fff;
        border:1px solid #ececec;
        border-radius:14px;
        box-shadow:0 2px 10px rgba(0,0,0,.06);
        padding:22px 20px 26px;
    }
    .leave-detail-label{
        font-weight:700;
        color:#111827;
        margin-bottom:6px;
    }
    .leave-detail-value{
        color:#303030;
        margin-bottom:18px;
    }
    .leave-detail-message{
        white-space:pre-line;
        color:#303030;
        line-height:1.35;
        margin-bottom:22px;
    }
    .leave-status-badge{
        display:inline-block;
        min-width:88px;
        text-align:center;
        border-radius:999px;
        padding:5px 12px;
        color:#fff;
        font-size:.82rem;
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
    .leave-outline-btn{
        border:1px solid #2f7be8;
        color:#0b5ed7;
        background:#fff;
        border-radius:10px;
        padding:10px 22px;
        box-shadow:0 3px 8px rgba(47,123,232,.12);
    }
    .leave-submit-btn{
        background:#f05a00;
        border-color:#f05a00;
        color:#fff;
        border-radius:10px;
        padding:10px 22px;
        box-shadow:0 6px 14px rgba(240,90,0,.2);
    }
    .leave-action-row{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:16px;
        flex-wrap:wrap;
        margin-top:18px;
    }
</style>
@endsection

@section('content')
<div class="container leave-detail-wrap">
    <h1 class="leave-detail-title">Leave Request Details</h1>

    <div class="leave-detail-card">
        <div class="leave-detail-label">Child</div>
        <div class="leave-detail-value">{{ $leaveRequest->student ? $leaveRequest->student->fullname() : 'N/A' }}</div>

        <div class="leave-detail-label">Type</div>
        <div class="leave-detail-value">Leave of Absence ({{ $leaveRequest->type_text }})</div>

        <div class="leave-detail-label">File</div>
        <div class="leave-detail-value">
            @if($leaveRequest->file)
                <a href="{{ asset('/documents/leave_requests/'.$leaveRequest->file) }}" target="_blank" class="text-primary">
                    {{ $leaveRequest->file }}
                </a>
            @else
                No attachment
            @endif
        </div>

        <div class="leave-detail-label">Status</div>
        <div class="leave-detail-value">
            <span class="leave-status-badge leave-status-{{ $leaveRequest->status_color }}">
                {{ $leaveRequest->status_text }}
            </span>
        </div>

        <div class="leave-detail-label">Message</div>
        <div class="leave-detail-message">{{ $leaveRequest->message }}</div>

        <div class="row">
            <div class="col-md-6">
                <div class="leave-detail-label">Start date</div>
                <div class="leave-detail-value mb-md-0">{{ optional($leaveRequest->start_date)->format('d.m.Y') }}</div>
            </div>
            <div class="col-md-6">
                <div class="leave-detail-label">End date</div>
                <div class="leave-detail-value mb-0">{{ optional($leaveRequest->end_date)->format('d.m.Y') }}</div>
            </div>
        </div>

        <div class="leave-action-row">
            <a href="{{ route('parent.request-leave') }}" class="btn leave-outline-btn">Back</a>
            <a href="{{ route('parent.leave-requests.edit', $leaveRequest->id) }}" class="btn leave-submit-btn">Edit</a>
        </div>
    </div>
</div>
@endsection
