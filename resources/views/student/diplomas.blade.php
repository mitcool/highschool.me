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
    .course-pill {
        display: inline-block;
        min-width: 92px;
        text-align: center;
        border-radius: 6px;
        padding: 5px 10px;
        font-size: .82rem;
        font-weight: 600;
        line-height: 1.2;
        border: none;
    }
    .course-pill-self-pending,
    .course-pill-action-pending {
        background: #d9d9d9;
        color: #fff;
    }
    .course-pill-self-results {
        background: #13b7c8;
        color: #fff;
    }
    .course-pill-action-start {
        background: #045397;
        color: #fff;
    }
    .course-pill-action-ready {
        background: #f36a10;
        color: #fff;
    }
    .course-pill-action-date {
        background: #f7b348;
        color: #fff;
    }
    .course-pill-action-results {
        background: #2dbb16;
        color: #fff;
    }
    .course-pill-empty {
        color: #a8b0bf;
        font-size: .9rem;
    }
    .course-action-form {
        margin: 0;
    }
    .course-action-button {
        cursor: pointer;
    }
    .course-action-cell {
        text-align: right;
        white-space: nowrap;
    }
</style>
@endsection

@section('content')
<div class="container wrapper">
    <h2 class="text-center h2 page-headings">Degree Transcripts</h2>
    <div class="card graduation-card p-4">
        
         
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    @if(count($diplomas))
                        <tr class="text-center">
                            <th >Date</th>
                            <th>Digital Degree</th>
                            <th>Diploma</th>
                            <th>Transcript</th>
                        </tr>
                    @else
                    <div class="page-content">
                        <p class="text-center mb-0">No diplomas available at the moment</p>
                    </div>
                    @endif
                </thead>
                <tbody class="text-center">
                   @foreach ($diplomas as $diploma)
                        <tr class="text-center">
                            <td >{{ $diploma->created_at->format('d-m-Y') }}</td>
                            <td>{{ auth()->user()->student_details->track_name() }}</td>
                            <td>
                                <a href="{{ route('student.generate-pdf-diploma',auth()->id()) }}">Link</a>
                            </td>
                            <td>
                                <a href="{{ route('student.generate-pdf-transcript',auth()->id()) }}">Link</a>
                            </td>
                        </tr>
                   @endforeach
                    
                </tbody>
            </table>
            
                {{-- <p class="text-center">Your diploma cannot be issued at this time because some required courses remain incomplete.</p> --}}
            {{-- @endif --}}
           
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection