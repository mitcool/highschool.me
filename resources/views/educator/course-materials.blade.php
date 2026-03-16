@extends('educator.dashboard')

@section('css')
<style>
    .type-section {
        transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out;
    }
    .type-section:not(.d-none) {
        opacity: 1;
        transform: translateY(0);
    }
    .cst-head {
        background-color: #7B0039!important;
    }

    /* Chrome, Safari, Edge, Opera */
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header text-white d-flex justify-content-between align-items-center cst-head">
                    <h5 class="mb-0">Add New Course Materials</h5>
                    <small class="text-white-50">highschool.me</small>
                </div>

                <div class="card-body">
                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6 class="fw-bold">Please fix the following errors:</h6>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('educator.add-course-material') }}" method="POST" enctype="multipart/form-data" class="confirm-first">
                        @csrf

                         {{-- hidden template for file row --}}
                        <template id="file-row-template">
                            <div class="row g-2 align-items-center mb-2 file-row">
                                <div class="col-md-8">
                                    <input
                                        type="text"
                                        name="resource_files[]"
                                        class="form-control"
                                        placeholder="https://..."
                                    >
                                </div>
                                <div class="col-md-3">
                                    <input
                                        type="text"
                                        name="resource_files_labels[]"
                                        class="form-control"
                                        placeholder="Name"
                                    >
                                </div>
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-file-row">&times;</button>
                                </div>
                            </div>
                        </template>

                        {{-- FILES --}}
                        <div class="card border-0 mb-3">
                            <div class="card-body bg-light rounded">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-semibold mb-0">Course Files</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-file-row">
                                        + Add link to file
                                    </button>
                                </div>
                                <p class="text-muted small mb-3">
                                    Upload links to PDFs, slides, docs, etc. You can attach multiple links.
                                </p>

                                @if($course_files)
                                  @foreach ($course_files as $file)
                                       
                                       <div class="row g-2 align-items-center mb-2 file-row">
                                        <div class="col-md-8">
                                            <input
                                                type="text"
                                                name="resource_files[]"
                                                class="form-control"
                                                value="{{ $file->stored_path }}"
                                                
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <input
                                                type="text"
                                                name="resource_files_labels[]"
                                                class="form-control"
                                                placeholder="Name"
                                                value="{{ $file->label }}"
                                                
                                            >
                                        </div>
                                        <div class="col-md-1 text-end">
                                           <button type="button" class="btn btn-sm btn-outline-danger remove-file-row">&times;</button>
                                        </div>
                                    </div>
                                  @endforeach
                                @endif

                                <div id="file-rows">
                                    {{-- initial file row --}}
                                    <div class="row g-2 align-items-center mb-2 file-row">
                                        <div class="col-md-8">
                                            <input
                                                type="text"
                                                name="resource_files[]"
                                                class="form-control"
                                                placeholder="https://..."
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <input
                                                type="text"
                                                name="resource_files_labels[]"
                                                class="form-control"
                                                placeholder="Name"
                                                value="{{ old('resource_files_labels.0') }}"
                                            >
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <button type="button" class="btn btn-sm btn-outline-danger remove-file-row">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        {{-- VIDEOS --}}
                        <div class="card border-0 mb-3">
                            <div class="card-body bg-light rounded">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-semibold mb-0">Video Links</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-video-row">
                                        + Add video
                                    </button>
                                </div>
                                <p class="text-muted small mb-3">
                                    Add links to external videos (YouTube, Vimeo, etc.) and give each a friendly name.
                                </p>
                                 @if($course_videos)
                                  @foreach ($course_videos as $video)
                                    
                                     <div class="row g-2 align-items-center mb-2 video-row">
                                        <div class="col-md-4">
                                            <input
                                                type="text"
                                                name="video_titles[]"
                                                class="form-control"
                                                placeholder="Video title"
                                                value="{{ $video->title}}"
                                                
                                            >
                                        </div>
                                        <div class="col-md-7">
                                            <input
                                                type="url"
                                                name="video_urls[]"
                                                class="form-control"
                                                placeholder="https://..."
                                                value="{{ $video->url}}"
                                                
                                            >
                                        </div>
                                        <div class="col-md-1 text-end">
                                           <button type="button" class="btn btn-sm btn-outline-danger remove-video-row">&times;</button>
                                        </div>
                                    </div>  
                            
                                  @endforeach
                                @endif
                                <div id="video-rows">
                                    {{-- initial video row --}}
                                    <div class="row g-2 align-items-center mb-2 video-row">
                                        <div class="col-md-4">
                                            <input
                                                type="text"
                                                name="video_titles[]"
                                                class="form-control"
                                                placeholder="Video title"
                                                value="{{ old('video_titles.0') }}"
                                            >
                                        </div>
                                        <div class="col-md-7">
                                            <input
                                                type="url"
                                                name="video_urls[]"
                                                class="form-control"
                                                placeholder="https://..."
                                                value="{{ old('video_urls.0') }}"
                                            >
                                        </div>
                                        <div class="col-md-1 text-end">
                                            <button type="button" class="btn btn-sm btn-outline-danger remove-video-row">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- hidden template for video row --}}
                        <template id="video-row-template">
                            <div class="row g-2 align-items-center mb-2 video-row">
                                <div class="col-md-4">
                                    <input
                                        type="text"
                                        name="video_titles[]"
                                        class="form-control"
                                        placeholder="Video title"
                                    >
                                </div>
                                <div class="col-md-7">
                                    <input
                                        type="url"
                                        name="video_urls[]"
                                        class="form-control"
                                        placeholder="https://..."
                                    >
                                </div>
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-video-row">&times;</button>
                                </div>
                            </div>
                        </template>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{route('educator.courses')}}" class="btn btn-outline-secondary me-2">
                                Cancel
                            </a>
                            <input type="hidden" value="{{ $course->course->id }}" name="course_id">
                            <button type="submit" class="btn btn-primary" style="margin-left: 30px;">
                                Save Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
   
    // ------- dynamic FILE rows -------
    const fileRowsContainer = document.getElementById('file-rows');
    const fileTemplate = document.getElementById('file-row-template');
    document.getElementById('add-file-row').addEventListener('click', function () {
        const clone = fileTemplate.content.cloneNode(true);
        fileRowsContainer.appendChild(clone);
    });

    $(document).on('click','.remove-file-row',function(){
        $(this).closest('.file-row').remove();
    })

    // ------- dynamic VIDEO rows -------
    const videoRowsContainer = document.getElementById('video-rows');
    const videoTemplate = document.getElementById('video-row-template');
    document.getElementById('add-video-row').addEventListener('click', function () {
        const clone = videoTemplate.content.cloneNode(true);
        videoRowsContainer.appendChild(clone);
    });
   
    $(document).on('click','.remove-video-row',function(){
        $(this).closest('.video-row').remove();
    })
   
</script>
@endsection