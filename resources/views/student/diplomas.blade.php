@extends('student.dashboard')

@section('css')
<style>
    body {
        background-color: #fcfcfc;
        color: #212529;
    }

    h2, h3, h4 {
        color: #004c99;
        font-weight: 700;
    }

    .section-spacer {
        margin-top: 60px;
        margin-bottom: 40px;
        border-top: 2px dashed #ddd;
        padding-top: 40px;
    }

    /* =========================================
        MY COURSES TABLE
        ========================================= */
    .table-container {
        max-width: 650px;
        margin: 0 auto;
    }

    .course-table {
        width: 100%;
    }

    .course-table thead th {
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 10px;
        font-weight: 500;
        color: #495057;
        border-top: none;
    }

    .course-table tbody tr {
        border-bottom: 1px solid #dee2e6;
    }

    .course-table tbody tr:last-child {
        border-bottom: none;
    }

    .course-table tbody td {
        padding: 12px 0;
        border-top: none !important; 
    }

    .view-link {
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }
    .view-link:hover { text-decoration: underline; }

    /* =========================================
        PROGRESS BAR
        ========================================= */

    .graduation-card {
        border-radius: 14px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        border: none;
    }

    .graduation-progress {
        height: 18px;
        border-radius: 10px;
        background: #f1f1f1;
    }
    .graduation-progress .progress-bar { border-radius: 10px; }

    .credits-label{
        position:absolute;
        top:-2px;
        right:0;
        font-size:13px;
        font-weight:600;
        padding-right: 7px;
    }

    .accordion-card { border: 0; border-radius: 10px; overflow: hidden; }
    .accordion-header {
        background: transparent;
        border: 0;
        padding: 0;
    }

    .accordion-toggle{
        padding: 12px 0;
        font-weight: 600;
        color: #0d6efd;
        text-decoration: none !important;
        outline: none !important;
        box-shadow: none !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .accordion-toggle:hover{ text-decoration:none; }

    .accordion-toggle .chev { transition: transform .2s ease; color:#0d6efd; }
    .chev { font-size: 30px; }
    .accordion-toggle.collapsed .chev { transform: rotate(180deg); }

    .badge-wrap { gap: 14px; }

    .completed-pill, .progress-pill{
        font-size: 13px;
        padding: 10px 14px;
        border-radius: 6px;
        font-weight: 500;
        white-space: normal;
    }

    .completed-pill{ background:#19a319; color:#fff; }
    .progress-pill{ background:#f3f3f3; color:#000; }

    .accordion-card {
        border: 1px solid #00000029;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="card graduation-card p-4">
        <h2 class="text-center mb-4">Degree Transcripts</h2>
        
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    <tr class="text-center">
                        <th class="text-left">Date</th>
                        <th>Digital Degree</th>
                        <th>Transcipt</th>
                        <th>Diploma</th>
                        <th>Request Copy*</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <td>
                             
                    </td>
                    <td>
                        {{ $student->student_details->track_name() }}
                    </td>
                    <td>
                         <a href="{{ route('student.generate-pdf-transcript',auth()->id()) }}">Link</a>
                    </td>
                    <td>
                        <a href="{{ route('student.generate-pdf-diploma',auth()->id()) }}">Link</a>
                    </td>
                    <td>
                        @if($diploma_request)
                            @if($diploma_request->status == 0)
                                <button class="orange-button">Requested</button>
                            @elseif($diploma_request->status == 1)
                                <button class="orange-button">Sent</button>
                            @elseif($diploma_request->status == 2)
                                <button class="orange-button">Delivered</button>
                            @endif
                        @else
                            <form action="{{ route('request-diploma-copy') }}" class="confirm-first" method="POST">
                                {{ csrf_field() }}
                                <button class="orange-button">Request copy</button>
                            </form>
                         @endif   
                    </td>
                </tbody>
            </table>
            <p>* Charges may apply for receiving a physical copy</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection