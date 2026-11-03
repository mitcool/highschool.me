@extends('admin_template')

@section('content')

<div class="shadow container wrapper">

    <h2 class="text-center page-headings">Discounts</h2>

    <form action="{{ route('admin.discounts.add') }}" method="POST" class="confirm-first" id="add-discount">
        {{ csrf_field() }}
        <label for="code" class="font-weight-bold my-2">Code</label>
        <input class="form-control" type="text" name="code" id="code" value="{{ old('code') }}" required>
        <label for="expired_at" class="font-weight-bold my-2">Expires at <small class="text-muted">(leave empty for no expiry)</small></label>
        <input class="form-control" type="datetime-local" name="expired_at" id="expired_at" value="{{ old('expired_at') }}">
        <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
            <label class="form-check-label font-weight-bold" for="is_active">Active</label>
        </div>
        <hr>
        <div class="text-center">
            <button class="btn btn-info">Add Discount</button>
        </div>
    </form>
    <hr>
    <h2 class="text-center page-headings">Current discounts</h2>
    @forelse ($discounts as $discount)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $discount->code }}</strong>
                @if($discount->isValid())
                    <span class="badge badge-success">Valid</span>
                @elseif(!$discount->is_active)
                    <span class="badge badge-secondary">Inactive</span>
                @else
                    <span class="badge badge-danger">Expired</span>
                @endif
                <br>
                <small class="text-muted">
                    Created: {{ optional($discount->created_at)->format('d.m.Y H:i') ?? '-' }}
                    &middot;
                    Expires: {{ $discount->expired_at ? $discount->expired_at->format('d.m.Y H:i') : 'Never' }}
                </small>
            </div>
            <div class="d-flex">
                <form action="{{ route('admin.discounts.toggle',$discount->id) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-warning">{{ $discount->is_active ? 'Deactivate' : 'Activate' }}</button>
                </form> &nbsp;
                <form action="{{ route('admin.discounts.delete',$discount->id) }}" class="confirm-first" method="POST" id="delete-form-{{ $discount->id }}">
                    {{ csrf_field() }}
                    <button class="btn btn-danger">Delete Discount</button>
                </form>
            </div>
        </li>
    @empty
        <p class="text-center text-muted">No discounts yet.</p>
    @endforelse
</div>

@endsection
