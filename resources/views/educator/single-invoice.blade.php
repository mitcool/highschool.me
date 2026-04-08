@extends('educator.dashboard')

@section('css')
<style>
    body {
      background-color: #fafafa;
      font-family: 'Poppins', sans-serif;
    }
    .invoice-container {
      min-width: 800px;
      max-width: 1100px;
      max-height: 1000px;
      background: #fff;
      margin: 50px auto;
      border-radius: 8px;
      box-shadow: 0 3px 12px rgba(0,0,0,0.08);
      padding: 50px 70px;
    }
    .invoice-header {
      border-bottom: 3px solid #ff5a00;
      padding-bottom: 15px;
      margin-bottom: 30px;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    .invoice-header h4 {
      color: #004aad;
      font-weight: 600;
      font-size: 22px;
    }
    .invoice-info span {
      display: block;
      font-size: 14px;
      color: #444;
      margin-bottom: 4px;
    }
    .section-title {
      font-weight: 600;
      color: #000;
      font-size: 15px;
      margin-bottom: 8px;
    }
    .amount-due {
      color: #0a2458;
      font-weight: 700;
      font-size: 18px;
      margin-top: 20px;
    }
    table {
      font-size: 14px;
      margin-top: 40px;
    }
    th {
      color: #444;
      font-weight: 600;
      border-bottom: 2px solid #ccc !important;
    }
    td {
      color: #333;
      vertical-align: top;
    }
    .btn-print {
      background: #fff;
      color: #004aad;
      border: 2px solid #004aad;
      padding: 8px 22px;
      border-radius: 8px;
      font-weight: 500;
      margin-right: 8px;
    }
    .btn-print:hover {
      background-color: #004aad;
      color: #fff;
    }
    .btn-close {
      background-color: #ff5a00;
      color: #fff;
      border: none;
      padding: 8px 22px;
      border-radius: 8px;
      font-weight: 500;
    }
    .btn-close:hover {
      background-color: #e24e00;
    }

    @page { margin: 10mm; }

    @media print {
      html, body {
        margin: 0 !important;
        padding: 0 !important;
        background: #fff !important;
        height: auto !important;
        overflow: visible !important;
      }

      header,
      #wrapper,
      footer,
      #footer,
      .scroll-to-top,
      body > div[style*="background:#045397"] {
        display: none !important;
      }

      body * {
        visibility: hidden !important;
      }

      .invoice-container,
      .invoice-container * {
        visibility: visible !important;
      }

      .invoice-container {
        position: fixed !important;
        left: 0 !important;
        top: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 15mm !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        height: auto !important;
        max-height: none !important;
      }

      .invoice-container .row {
        display: flex !important;
        flex-wrap: nowrap !important;
      }

      .invoice-container .col-md-6 {
        flex: 0 0 50% !important;
        max-width: 50% !important;
      }

      .btn-print,
      .btn-close {
        display: none !important;
      }
    }
</style>
@endsection

@section('content')
<div class="invoice-container">
    <div class="invoice-header">
      <div>
        <h4 class="invoice-title">{{ !empty($invoice->is_memo) ? 'Credit Memo' : 'Invoice' }}</h4>
        <div class="invoice-info mt-3">
          <span><strong>Invoice number:</strong> {{ $invoice->invoice_number }}</span>
          <span><strong>Date of issue:</strong> {{ $invoice->created_at->format('d.m.Y') }}</span>
          <span><strong>Due date:</strong> {{ !empty($invoice->due_date) ? \Carbon\Carbon::parse($invoice->due_date)->format('d.m.Y') : $invoice->created_at->format('d.m.Y') }}</span>
        </div>
      </div>
      <div class="company-logo">
        <x-image-component rel="preload" fetchpriority="high" decoding="async" nickname="logo-header" class="logo-header-images logoMainPage" />
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <h6 class="section-title">From</h6>
        <p>
          ONSITES HIGH SCHOOL LLC<br>
          100 Southeast 2nd Street<br>
          Suite 2000-1005<br>
          Miami, FL 33131<br>
          USA<br>
          finance@highschool.me<br>
          Tax ID (EIN): 37-2186116
        </p>
      </div>
      <div class="col-md-6">
        <h6 class="section-title">Bill To</h6>
        <p>
          {{ $invoice->name }} {{ $invoice->surname }}<br>
          {{ $invoice->street }}, {{ $invoice->street_number }}<br>
          {{ $invoice->city }}, {{ $invoice->ZIPcode }}<br>
          {{ optional($invoice->country)->name }}<br>
          {{ $invoice->user_email }}<br>
        </p>
      </div>
    </div>

    <h5 class="amount-due mt-3">${{ $invoice->formatted_price() }}</h5>

    <table class="table table-bordered mt-4">
      <thead>
        <tr>
          <th>Description</th>
          <th class="text-center">Qty</th>
          <th class="text-center">Unit Price</th>
          <th class="text-center">Tax</th>
          <th class="text-center">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $invoice->description }}</td>
          <td class="text-center">1</td>
          <td class="text-center">${{ $invoice->formatted_price() }}</td>
          <td class="text-center">0%</td>
          <td class="text-center">${{ $invoice->formatted_price() }}</td>
        </tr>
      </tbody>
    </table>

    <div class="text-end mt-3">
      <p><strong>TOTAL</strong> &nbsp;&nbsp; ${{ $invoice->formatted_price() }}</p>
      <p><strong>Amount Due</strong> &nbsp;&nbsp; ${{ $invoice->formatted_price() }}</p>
    </div>

    <div class="text-end mt-4">
      <button class="btn btn-print me-2" onclick="window.print()">Print</button>
      <a class="btn btn-close" href="{{ route('educator.invoices') }}">Close</a>
    </div>
</div>
@endsection

@section('footerScripts')

@endsection
