@extends('student.dashboard')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">{{ $video->title }}</h4>

    <iframe
        src="{{ $embedUrl }}"
        style="width:100%; height:90vh; border:0;"
        loading="lazy"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen
        referrerpolicy="strict-origin-when-cross-origin"
    ></iframe>
    {{--
    <div class="mt-3">
        <a href="{{ $video->url }}" target="_blank">
            Open on YouTube
        </a>
    </div>
    --}}
</div>
@endsection
