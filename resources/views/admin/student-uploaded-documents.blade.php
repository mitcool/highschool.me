@extends('admin_template')

@section('css')
<style>
    .documents-card {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .documents-title {
        font-size: 20px;
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 20px;
    }

    .document-row {
        padding: 18px 0;
        border-bottom: 1px solid #ddd;
    }

    .document-row:last-child {
        border-bottom: none;
    }

    .document-label {
        font-weight: 500;
        color: #333;
    }

    .open-link {
        color: #0d6efd;
        font-weight: 500;
        text-decoration: underline;
    }

    .close-btn-wrapper {
        margin-top: 30px;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1>Documents</h1>
    </div>
    <div class="documents-card">
        <div class="mb-4">
            <strong>Student Name:</strong>
            <span class="text-primary fw-bold">
                {{ optional($uploaded_documents->first())->student->name ?? '—' }} {{ optional($uploaded_documents->first())->student->surname ?? '—' }}
            </span>
        </div>

        <div class="documents-title">
            Uploaded Documentation
        </div>

        @php
            $documentTypes = [
                1 => 'Parents IDs (Passports or Government IDs)',
                2 => 'Custody Document (if applicable)',
                3 => 'Proof of Residence',
                4 => 'Student ID (Passport or Government ID)',
                5 => 'Student Birth Certificate',
                6 => 'Latest School Transcript / Report Card',
                7 => 'Withdrawal Confirmation from Previous School (optional)',
                8 => 'IEP / 504 Plan with Medical Documentation (optional)',
            ];
        @endphp

        @foreach($documentTypes as $type => $label)
            <div class="row document-row align-items-center">
                <div class="col-md-8 document-label">
                    {{ $label }}
                </div>

                <div class="col-md-4 text-end">
                    @if(isset($uploaded_documents[$type]))
                        <a href="{{ asset('documents/' . $uploaded_documents[$type]->student_id . '/' . $uploaded_documents[$type]->file) }}"
                           target="_blank"
                           class="open-link">
                            Open
                        </a>
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="close-btn-wrapper">
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary px-4">
                Close
            </a>
        </div>
    </div>
</div>
@endsection