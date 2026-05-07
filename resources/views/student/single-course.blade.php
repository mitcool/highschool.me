@extends('student.dashboard')

@section('css')
<style>
    body {
        background: #fcfcfc;
        color: #212529;
    }

    .materials-card {
        background: #fff;
        border: 1px solid #e6e6e6;
        border-radius: 8px;
        padding: 26px 28px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        max-width: 920px;
        margin: 0 auto;
    }

    .materials-title {
        color: #004c99;
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 22px;
    }

    .materials-desc {
        color: #8a8a8a;
        margin-bottom: 18px;
        line-height: 1.35;
    }

    .materials-divider {
        border-top: 1px solid #dcdcdc;
        margin: 10px 0 6px;
    }

    .material-row {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid #dcdcdc;
    }

    .material-row:last-of-type {
        border-bottom: 0;
    }

    .material-name {
        flex: 1;
        font-weight: 500;
        color: #2b2b2b;
    }

    .self-link {
        min-width: 150px;
        text-align: right;
        font-size: 13px;
        color: #0b63c7;
        text-decoration: underline;
        font-weight: 500;
        white-space: nowrap;
    }

    .self-link:hover {
        color: #084f9e;
    }

    .self-link.disabled {
        color: #cfcfcf !important;
        pointer-events: none;
        text-decoration: none;
    }

    .btn-open {
        background: #e65100;
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 8px;
        padding: 10px 18px;
        min-width: 74px;
        box-shadow: 0 6px 14px rgba(230,81,0,0.25);
    }

    .btn-open:hover {
        background: #cf4900;
        color: #fff;
    }
    .btn-open.disabled,
    .btn-open.disabled:hover {
        background: #cfcfcf;
        color: #fff;
        box-shadow: none;
        pointer-events: none;
        cursor: not-allowed;
    }

    .btn-close-big {
        background: #e65100;
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 8px;
        padding: 12px 34px;
        box-shadow: 0 6px 14px rgba(230,81,0,0.25);
    }

    .btn-close-big:hover {
        background: #cf4900;
        color: #fff;
    }

    .bottom-actions {
        text-align: center;
        margin-top: 26px;
    }

    .section-spacing {
        margin-top: 40px;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4 page-headings">{{ $enrolled_course->course->course->title }}</h2>

    <div class="materials-card">
        <div class="materials-title">Materials</div>
        <div class="materials-desc">
            Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque.
            Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet.
        </div>

        <div class="materials-divider"></div>

        {{-- MATERIALS --}}
        @forelse($materials as $material)
            @php
                $materialState = $materialStates->get($material->id);
            @endphp

            <div class="material-row">
                <div class="material-name">{{ $material->label }}</div>

                @if($materialState && $materialState['can_take_self_assessment'])
                    <a class="self-link"
                       href="{{ route('student.self-assessment-test', $material->id) }}">
                        {{ $materialState['self_assessment_completed'] ? 'Self Assessment Completed' : 'Self Assessment' }}
                    </a>
                @elseif($materialState && $materialState['self_assessment_completed'])
                    <span class="self-link disabled">Self Assessment Completed</span>
                @elseif($materialState && !$materialState['has_self_assessment'])
                    <span class="self-link disabled">No Self Assessment</span>
                @elseif($materialState && !$materialState['is_unlocked'])
                    <span class="self-link disabled">Self Assessment Locked</span>
                @else
                    <span class="self-link disabled">Self Assessment</span>
                @endif

                @if($materialState && $materialState['is_unlocked'])
                    <a class="btn btn-open"
                       href="{{ route('student.course-material', $material->id) }}">
                        Open
                    </a>
                @else
                    <span class="btn btn-open disabled">Locked</span>
                @endif
            </div>
        @empty
            <p class="text-muted text-center my-4">No materials available for this course.</p>
        @endforelse


        {{-- VIDEOS SECTION --}}
        <div class="materials-title section-spacing">Videos</div>
        <div class="materials-divider"></div>

        @forelse($videos as $video)
            <div class="material-row">
                <div class="material-name">{{ $video->title }}</div>

                <a class="btn btn-open"
                   href="{{ route('student.course-video', $video->id) }}">
                    Open
                </a>
            </div>
        @empty
            <p class="text-muted text-center my-4">No videos available for this course.</p>
        @endforelse


        <div class="bottom-actions">
            <a href="{{ url()->previous() }}" class="btn btn-close-big">
                Close
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
