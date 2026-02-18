@extends('parent.dashboard')

@section('css')
<style>
    .activity-wrapper{
        max-width: 900px;
        margin: 0 auto;
    }

    .activity-title{
        text-align:center;
        font-size: 2rem;
        font-weight: 700;
        color:#0b4f9b;
        margin: 10px 0 18px 0;
    }

    .activity-actions{
        display:flex;
        justify-content:flex-end;
        margin-bottom: 10px;
    }

    .btn-remove-all{
        border: 1px solid #dc3545;
        color:#dc3545;
        background: #fff;
        padding: 6px 14px;
        border-radius: 3px;
        font-size: .85rem;
        box-shadow: 0 2px 6px rgba(0,0,0,.08);
    }
    .btn-remove-all:hover{
        background:#dc3545;
        color:#fff;
    }

    .activity-table{
        width:100%;
        border-collapse: collapse;
        font-size: .9rem;
        color:#1f2d3d;
    }

    .activity-table thead th{
        text-align:left;
        font-weight: 700;
        padding: 10px 8px;
        border-top: 1px solid #8a8a8a;
        border-bottom: 1px solid #8a8a8a;
        color:#12284b;
    }

    .activity-table tbody td{
        padding: 8px;
        border-bottom: 1px solid #8a8a8a;
        vertical-align: top;
        color:#2b3a55;
    }

    .col-date{ width: 105px; }
    .col-time{ width: 80px; }
    .col-remove{ width: 80px; }

    .remove-link{
        background:none;
        border:none;
        padding:0;
        margin:0;
        color:#0d6efd;
        text-decoration: underline;
        font-size: .9rem;
        cursor:pointer;
    }
    .remove-link:hover{
        color:#084298;
    }

    .activity-pagination{
        display:flex;
        justify-content:center;
        margin-top: 26px;
    }

    .activity-pagination .pagination{
        margin:0;
        border:1px solid #8a8a8a;
        border-radius: 6px;
        overflow:hidden;
    }
    .activity-pagination .page-item .page-link{
        border:0;
        border-right:1px solid #8a8a8a;
        color:#1f2d3d;
        padding: 8px 12px;
        min-width: 38px;
        text-align:center;
    }
    .activity-pagination .page-item:last-child .page-link{
        border-right:0;
    }
    .activity-pagination .page-item.active .page-link{
        background:#fff;
        font-weight:700;
        color:#1f2d3d;
    }
    .activity-pagination .page-item.disabled .page-link{
        color:#6c757d;
        background:#fff;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="activity-wrapper">
        <div class="activity-title">Activity</div>

        <div class="activity-actions">
            <form method="POST" action="{{ route('admin.delete-notifications') }}">
                @csrf
                <button type="submit" class="btn-remove-all">Remove all</button>
            </form>
        </div>

        <table class="activity-table">
            <thead>
                <tr>
                    <th class="col-date">Date</th>
                    <th class="col-time">Time</th>
                    <th>Message</th>
                    <th class="col-remove">Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notifications as $n)
                    <tr>
                        <td class="col-date">{{ optional($n->created_at)->format('d.m.Y') }}</td>
                        <td class="col-time">{{ optional($n->created_at)->format('H:i') }}</td>
                        <td>{{ $n->message }}</td>
                        <td class="col-remove">
                            <form method="POST" action="{{ route('admin.delete-single-notification', $n->id) }}">
                                @csrf
                                <button type="submit" class="remove-link">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            No notifications yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="activity-pagination">
            {{ $notifications->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@endsection
