@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<style>
    .pay-educator-card {
        max-width: 860px;
        border-radius: 0;
    }
    .pay-educator-title {
        color: #111;
        font-size: 2.1rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }
    .pay-educator-label {
        color: #222;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }
    .pay-educator-input {
        min-height: 48px;
        border: 1px solid #4a4a4a;
        border-radius: 10px;
        box-shadow: none !important;
        font-size: 1rem;
    }
    .pay-educator-textarea {
        min-height: 110px;
        resize: vertical;
        padding-top: 0.75rem;
    }
</style>
@endsection

@section('content')
<div class="container my-4 shadow bg-white p-4 pay-educator-card">
    <h1 class="text-center pay-educator-title">Pay Educator</h1>
    <p class="text-center text-muted mb-4">{{ $educator->fullname() }}</p>

    @if(session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if(!$educator->invoice_details)
        <div class="alert alert-warning">
            This educator does not have invoice details yet. Add the billing details first before creating a credit memo.
        </div>
    @endif

    <form action="{{ route('store-pay-to-educator', $educator->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="font-weight-bold pay-educator-label" for="issue_date">Date of issue</label>
                <input type="date" class="form-control pay-educator-input" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" required>
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold pay-educator-label" for="due_date">Due Date</label>
                <input type="date" class="form-control pay-educator-input" id="due_date" name="due_date" value="{{ old('due_date') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold pay-educator-label" for="description">Description</label>
            <textarea class="form-control pay-educator-input pay-educator-textarea" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="font-weight-bold pay-educator-label" for="amount">Amount</label>
            <input type="number" step="0.01" min="0.01" class="form-control pay-educator-input" id="amount" name="amount" value="{{ old('amount') }}" required>
        </div>

        <div class="text-center pt-4 pb-2">
            <button type="submit" class="btn btn-info" {{ !$educator->invoice_details ? 'disabled' : '' }}>Confirm Payment</button>
        </div>
    </form>

    @if($educator->invoice_details)
        <div class="mt-3 text-muted small">
            Billing details: {{ $educator->invoice_details->street }} {{ $educator->invoice_details->street_number }}, {{ $educator->invoice_details->city }} {{ $educator->invoice_details->zip }}
        </div>
    @endif
</div>
@endsection

@section('scripts')

@endsection
