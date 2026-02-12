@extends('admin_template')

@section('css')
<style>
    .leave-wrap{
        max-width: 920px;
        min-width: 750px;
        margin: 0 auto;
        padding: 18px 12px 30px;
    }
    .leave-title{
        text-align:center;
        color:#0b4aa6;
        font-weight:800;
        margin: 10px 0 18px;
        font-size: 26px;
    }
    .leave-card{
        background:#fff;
        border:1px solid #e6e6e6;
        border-radius:8px;
        box-shadow:0 2px 6px rgba(0,0,0,.06);
        padding:26px 28px;
    }
    .hr-soft{
        border:0;
        border-top:1px solid #8c8c8c;
        opacity:.65;
        margin:18px 0;
    }
    .k{ color:#222; }
    .v-strong{
        color:#0b4aa6;
        font-weight:800;
        font-size: 24px;
        line-height: 1.1;
    }
    .btn-outline-blue{
        border:1px solid #2f7be8;
        color:#0b5ed7;
        background:#fff;
        border-radius:8px;
        padding:10px 18px;
    }
    .msg{
        color:#0b4aa6;
        font-style:italic;
        line-height:1.35;
        margin-top:6px;
    }
    .btn-accept{
        background:#25b000;
        border-color:#25b000;
        color:#fff;
        border-radius:6px;
        padding:10px 18px;
    }
    .btn-deny{
        background:#e00000;
        border-color:#e00000;
        color:#fff;
        border-radius:6px;
        padding:10px 18px;
    }
    .footer-actions{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-top: 22px;
    }
    .right-actions{
        display:flex;
        gap:12px;
        align-items:center;
    }
</style>
@endsection

@section('content')
<div class="leave-wrap">
    <div class="leave-title">
        {{ $leaveRequest->type === 1 ? 'Leave of Absence (Medical) Request' : 'Leave of Absence (Personal) Request' }}
    </div>

    <div class="leave-card">
        <div class="row">
            <div class="col-md-12">
                <div class="k">Student Name: <span class="v-strong">{{ $leaveRequest->student->name ?? '—' }} {{ $leaveRequest->student->surname ?? '—' }}</span></div>
                <div class="k">Born: {{ $leaveRequest->student->date_of_birth->format('F d, Y') ?? '—' }}</div>
                <div class="k">Date of Submission: {{ ($leaveRequest->created_at)->format('F d, Y') }}</div>
            </div>
        </div>

        <hr class="hr-soft">

        <div class="row">
            <div class="col-md-12">
                @if($leaveRequest->file)
                    <a class="btn btn-outline-blue"
                    href="{{ asset('/documents/leave_requests/'.$leaveRequest->file) }}"
                    target="_blank">
                        Open Attached documentation
                    </a>
                @else
                    <span class="text-muted">No attachment</span>
                @endif
            </div>
        </div>

        <hr class="hr-soft">

        <div class="row">
            <div class="col-md-12">
                <div class="k">Message:</div>
                <div class="msg">
                    {!! nl2br(e($leaveRequest->message ?? '—')) !!}
                </div>
            </div>
        </div>

        <hr class="hr-soft">

        <div class="row">
            <div class="col-md-6">
                <div class="k">Start date: {{ $leaveRequest->start_date->format('F d, Y') }}</div>
            </div>
            <div class="col-md-6 text-md-right">
                <div class="k">End Date: {{ $leaveRequest->end_date->format('F d, Y') }}</div>
            </div>
        </div>

        <div class="footer-actions">
            <a href="{{ route('admin.all-requested-leaves') }}" class="btn btn-outline-blue">Close</a>

            <div class="right-actions">
                {{-- Only show actions if still pending (optional) --}}
                @if($leaveRequest->status === 0)
                    <div class="d-flex" style="gap:12px;">
                        {{-- Accept trigger --}}
                        <button
                            type="button"
                            class="btn btn-success"
                            data-toggle="modal"
                            data-target="#confirmModal"
                            data-action="{{ route('admin.leave_requests.approve', $leaveRequest->id) }}"
                            data-title="Approve request?"
                            data-message="Are you sure you want to approve this leave request?"
                            data-confirm-text="Accept"
                            data-confirm-class="btn-success"
                        >
                            Accept
                        </button>

                        {{-- Deny trigger --}}
                        <button
                            type="button"
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#confirmModal"
                            data-action="{{ route('admin.leave_requests.deny', $leaveRequest->id) }}"
                            data-title="Deny request?"
                            data-message="Are you sure you want to deny this leave request?"
                            data-confirm-text="Deny"
                            data-confirm-class="btn-danger"
                        >
                            Deny
                        </button>
                    </div>
                @else
                    <span class="badge badge-{{ $leaveRequest->status_color ?? 'secondary' }}" style="font-size:14px;">
                        {{ $leaveRequest->status_text ?? '—' }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:10px;">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalTitle">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="confirmModalBody">
                Are you sure?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

                {{-- This form gets its action filled dynamically --}}
                <form id="confirmModalForm" method="POST" action="">
                    @csrf
                    @method('PATCH')
                    <button type="submit" id="confirmModalBtn" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#confirmModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        var action = button.data('action');
        var title = button.data('title') || 'Confirm';
        var message = button.data('message') || 'Are you sure?';
        var confirmText = button.data('confirm-text') || 'Confirm';
        var confirmClass = button.data('confirm-class') || 'btn-primary';

        $('#confirmModalTitle').text(title);
        $('#confirmModalBody').text(message);

        $('#confirmModalForm').attr('action', action);

        var $btn = $('#confirmModalBtn');
        $btn.text(confirmText);
        $btn.removeClass('btn-primary btn-success btn-danger').addClass(confirmClass);
    });
</script>
@endsection