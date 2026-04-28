@extends('parent.dashboard')

@section('css')
<style>
    .protocol-page {
        width: 100%;
        max-width: 1200px;
        margin: 38px auto 80px;
        padding: 0 20px;
    }
    .protocol-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.08);
        padding: 34px 38px 28px;
    }
    .protocol-heading {
        text-align: center;
        margin-bottom: 30px;
    }
    .protocol-heading h1 {
        margin: 0 0 8px;
        color: #111827;
        font-size: 2.05rem;
        font-weight: 700;
    }
    .protocol-heading h2 {
        margin: 0;
        color: #111827;
        font-size: 1.8rem;
        font-weight: 700;
    }
    .protocol-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 28px;
    }
    .protocol-column-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    .protocol-column-table thead th {
        padding: 0 0 8px;
        border-bottom: 2px solid #cbd5e1;
        color: #1f355d;
        font-size: 1rem;
        font-weight: 700;
        text-align: left;
    }
    .protocol-column-table tbody td {
        padding: 7px 0;
        border-bottom: 2px solid #d1d5db;
        color: #475569;
        font-size: 0.96rem;
        line-height: 1.15;
    }
    .protocol-column-table tbody td:last-child,
    .protocol-column-table thead th:last-child {
        text-align: right;
    }
    .protocol-empty {
        color: #6b7280;
        font-size: 1rem;
        text-align: center;
        padding: 28px 0 8px;
    }
    .protocol-actions {
        display: flex;
        gap: 12px;
        margin-top: 22px;
        padding-left: 6px;
    }
    .protocol-action-button {
        height: 38px;
        padding: 0 18px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
    }
    .protocol-action-button.print-button {
        background: #fff;
        border: 1px solid #3b82f6;
        color: #2563eb;
        box-shadow: 0 8px 14px rgba(59, 130, 246, 0.12);
    }
    .protocol-action-button.print-button:hover {
        background: #eff6ff;
        color: #1d4ed8;
    }
    .protocol-action-button.close-button {
        background: #f97316;
        border: 1px solid #f97316;
        color: #fff;
        box-shadow: 0 10px 18px rgba(249, 115, 22, 0.24);
    }
    .protocol-action-button.close-button:hover {
        background: #ea580c;
        color: #fff;
    }
    @media (max-width: 1100px) {
        .protocol-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 640px) {
        .protocol-page {
            padding: 0 12px;
        }
        .protocol-card {
            padding: 24px 18px 20px;
        }
        .protocol-heading h1 {
            font-size: 1.55rem;
        }
        .protocol-heading h2 {
            font-size: 1.4rem;
        }
        .protocol-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }
        .protocol-actions {
            flex-direction: column;
            padding-left: 0;
        }
        .protocol-action-button {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
@php
    $chunkSize = 30;
    $protocolColumns = $login_attempts->chunk($chunkSize);
@endphp

<div class="parent-page-content">
    <div class="protocol-page">
        <div class="protocol-card" id="protocolPrintArea">
            <div class="protocol-heading">
                <h1>Protocol of Attendance for {{ $selected_year }}</h1>
                <h2>{{ trim($student->fullname()) }}</h2>
            </div>

            @if($login_attempts->isEmpty())
                <div class="protocol-empty">No successful login attempts were found for this student in the selected year.</div>
            @else
                <div class="protocol-grid">
                    @foreach($protocolColumns as $column)
                        <table class="protocol-column-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($column as $attempt)
                                    <tr>
                                        <td>{{ optional($attempt->verified_at)->format('d.m.Y') }}</td>
                                        <td>{{ optional($attempt->verified_at)->format('G:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="protocol-actions">
            <button type="button" class="protocol-action-button print-button" onclick="printProtocol()">Print</button>
            <a
                href="{{ route('parent.protocols.index', ['year' => $selected_year, 'search' => $search]) }}"
                class="protocol-action-button close-button"
            >
                Close
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function printProtocol() {
        const protocolArea = document.getElementById('protocolPrintArea');

        if (!protocolArea) {
            window.print();
            return;
        }

        const printWindow = window.open('', '_blank', 'width=1100,height=900');

        if (!printWindow) {
            window.print();
            return;
        }

        printWindow.document.open();
        printWindow.document.write(`
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <title>Protocol of Attendance</title>
                <style>
                    @page {
                        size: A4 portrait;
                        margin: 10mm;
                    }
                    * {
                        box-sizing: border-box;
                    }
                    html, body {
                        margin: 0;
                        padding: 0;
                        background: #ffffff;
                        color: #111827;
                        font-family: Arial, Helvetica, sans-serif;
                    }
                    .protocol-card {
                        width: 100%;
                        border: 1px solid #d1d5db;
                        border-radius: 10px;
                        padding: 18px 20px 14px;
                    }
                    .protocol-heading {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .protocol-heading h1 {
                        margin: 0 0 6px;
                        font-size: 22px;
                        font-weight: 700;
                    }
                    .protocol-heading h2 {
                        margin: 0;
                        font-size: 18px;
                        font-weight: 700;
                    }
                    .protocol-grid {
                        display: grid;
                        grid-template-columns: repeat(4, minmax(0, 1fr));
                        gap: 18px;
                    }
                    .protocol-column-table {
                        width: 100%;
                        border-collapse: collapse;
                        table-layout: fixed;
                    }
                    .protocol-column-table thead th {
                        padding: 0 0 6px;
                        border-bottom: 1px solid #cbd5e1;
                        color: #1f355d;
                        font-size: 13px;
                        font-weight: 700;
                        text-align: left;
                    }
                    .protocol-column-table thead th:last-child,
                    .protocol-column-table tbody td:last-child {
                        text-align: right;
                    }
                    .protocol-column-table tbody td {
                        padding: 5px 0;
                        border-bottom: 1px solid #d1d5db;
                        color: #475569;
                        font-size: 12px;
                        line-height: 1.1;
                    }
                    .protocol-empty {
                        text-align: center;
                        color: #6b7280;
                        font-size: 14px;
                        padding: 18px 0 6px;
                    }
                </style>
            </head>
            <body>
                ${protocolArea.outerHTML}
            </body>
            </html>
        `);
        printWindow.document.close();
        printWindow.focus();

        setTimeout(function () {
            printWindow.print();
            printWindow.close();
        }, 250);
    }
</script>
@endsection
