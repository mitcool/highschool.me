@extends('student.dashboard')

@section('content')
<div class="container py-4">
    <h4>{{ $file->label ?: 'File' }}</h4>

    <iframe
        src="{{ $iframeUrl }}"
        style="width:100%; height:85vh; border:0;"
        allowfullscreen
    ></iframe>
    {{--
    <div class="mt-3">
        <a href="{{ $file->stored_path }}" target="_blank">
            Open in new tab
        </a>
    </div>
    --}}
</div>
@endsection
