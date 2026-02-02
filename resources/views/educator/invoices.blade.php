@extends('educator.dashboard')

@section('css')
<style>
	body {
		background-color: #fafafa;
		font-family: 'Poppins', sans-serif;
    }
    .invoice-container {
		max-width: 1000px;
		margin: 60px auto;
    }
    .invoice-header {
		text-align: center;
		color: #004aad;
		font-weight: 600;
    }
    .invoice-row {
		background: #fff;
		border-radius: 10px;
		box-shadow: 0 2px 6px rgba(0,0,0,0.05);
		margin-bottom: 12px;
		padding: 10px 20px;
		display: flex;
		justify-content: space-between;
		align-items: center;
    }
    .invoice-row span {
      	min-width: 120px;
    }
    .invoice-date {
      	color: #ff5a00;
      	font-weight: 500;
    }
    .invoice-number {
      	font-weight: 600;
    }
    .invoice-amount {
    	text-align: center;
      	color: #444;
    }
    .view {
		background-color: #ff5a00;
		color: #fff;
		border: none;
		border-radius: 8px;
		padding: 6px 16px;
		font-weight: 500;
		transition: 0.3s;
    }
    .view:hover {
     	background-color: #e24e00;
     	text-decoration: none;
     	color: #fff;
    }
</style>
@endsection

@section('content')
<div class="invoice-container col-md-12">
    <h3 class="invoice-header mb-4">Invoices</h3>
    <div class="d-flex justify-content-between fw-bold mb-2 text-secondary px-2">
		<span>Date</span>
		<span>Invoice #</span>
		<span>Amount</span>
		<span></span>
    </div>
    <!-- Example invoice rows -->
    @foreach($invoices as $invoice)
    <div class="invoice-row">
		<span class="invoice-date">{{ $invoice->created_at->format('d.m.Y') }}</span>
		<span class="invoice-number">{{ $invoice->invoice_number }}</span>
		<span class="invoice-amount">${{ number_format($invoice->price,2,'.',',') }}</span>
		<a class="view" href="{{ route('parent.single-invoice', $invoice->id) }}">View</a>
    </div>
    @endforeach
</div>
@endsection

@section('footerScripts')

@endsection