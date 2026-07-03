@extends('parent.dashboard')

@section('css')
<style>
    .leave-edit-wrap{
        max-width:980px;
        margin:0 auto;
        padding:28px 0 40px;
    }
    .leave-edit-title{
        text-align:center;
        color:#111827;
        font-size:2rem;
        font-weight:800;
        margin-bottom:22px;
    }
    .leave-edit-card{
        background:#fff;
        border:1px solid #ececec;
        border-radius:14px;
        box-shadow:0 2px 10px rgba(0,0,0,.06);
        padding:22px 20px 26px;
        margin-bottom:20px;
    }
    .leave-edit-label{
        font-weight:700;
        color:#111827;
        margin-bottom:6px;
    }
    .leave-edit-value{
        color:#303030;
        margin-bottom:18px;
    }
    .leave-edit-message{
        white-space:pre-line;
        color:#303030;
        line-height:1.35;
        margin-bottom:28px;
    }
    .leave-edit-input{
        max-width:180px;
        border-radius:8px;
        border-color:#333;
    }
    .leave-edit-actions{
        display:flex;
        justify-content:flex-end;
        gap:12px;
        align-items:center;
        flex-wrap:wrap;
        margin-top:10px;
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
    .leave-danger-btn{
        background:#e00000;
        border-color:#e00000;
        color:#fff;
        border-radius:10px;
        padding:12px 22px;
        box-shadow:0 6px 14px rgba(224,0,0,.18);
    }
</style>
@endsection

@section('content')
<div class="container leave-edit-wrap">
    <h1 class="leave-edit-title">Edit Leave Request</h1>

    <div class="leave-edit-card">
        <div class="leave-edit-label">Child</div>
        <div class="leave-edit-value">{{ $leaveRequest->student ? $leaveRequest->student->fullname() : 'N/A' }}</div>

        <div class="leave-edit-label">Type</div>
        <div class="leave-edit-value">Leave of Absence ({{ $leaveRequest->type_text }})</div>

        <div class="leave-edit-label">File</div>
        <div class="leave-edit-value">
            @if($leaveRequest->file)
                <a href="{{ asset('/documents/leave_requests/'.$leaveRequest->file) }}" target="_blank" class="text-primary">
                    {{ $leaveRequest->file }}
                </a>
            @else
                No attachment
            @endif
        </div>

        <div class="leave-edit-label">Message</div>
        <div class="leave-edit-message">{{ $leaveRequest->message }}</div>

        <form action="{{ route('parent.leave-requests.update', $leaveRequest->id) }}" method="POST" class="confirm-first" id="update-leave-request">
            @csrf
            @method('PATCH')

            <div class="row align-items-end">
                <div class="col-md-3">
                    <div class="leave-edit-label">Start date</div>
                    <div class="leave-edit-value mb-0">{{ optional($leaveRequest->start_date)->format('d.m.Y') }}</div>
                </div>
                <div class="col-md-3 mt-3 mt-md-0">
                    <label for="end_date" class="leave-edit-label">End date</label>
                    <input
                        id="end_date"
                        type="date"
                        name="end_date"
                        class="form-control leave-edit-input @error('end_date') is-invalid @enderror"
                        value="{{ old('end_date', optional($leaveRequest->end_date)->toDateString()) }}"
                        required
                    >
                    @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="leave-edit-actions mt-3 mt-md-0">
                        <a href="{{ route('parent.leave-requests.show', $leaveRequest->id) }}" class="btn leave-outline-btn">Cancel</a>
                        <button type="submit" class="btn leave-submit-btn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <form action="{{ route('parent.leave-requests.delete', $leaveRequest->id) }}" method="POST" class="confirm-first" id="delete-leave-request">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn leave-danger-btn">Cancel Request</button>
    </form>
</div>
@endsection
