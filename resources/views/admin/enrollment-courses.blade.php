@extends('admin_template')

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
        background-color: #045397;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header text-white d-flex justify-content-between align-items-center cst-head">
                    <h5 class="mb-0">Add New Course</h5>
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

                    <form action="{{ route('add-enrollment-course') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- STEP 1: Curriculum Type --}}
                        <div class="mb-4">
                            <label for="curriculum_type_id" class="form-label fw-semibold">
                                Curriculum Type <span class="text-danger">*</span>
                            </label>
                            <select
                                id="curriculum_type_id"
                                name="curriculum_type_id"
                                class="form-control"
                                required
                            >
                                <option value="" disabled selected>-- Select curriculum type --</option>
                                @foreach($curriculumTypes as $type)
                                    <option
                                        value="{{ $type->id }}"
                                        data-code="{{ $type->code }}"
                                        @selected(old('curriculum_type_id') == $type->id)
                                    >
                                        {{ $type->name }} ({{ $type->code }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">
                                Example: CORE, ELECTIVE, AP, CLEP, ESOL, etc.
                            </div>
                        </div>

                        <hr>

                        {{-- STEP 2: Common course info (CatalogCourse) --}}
                        <h6 class="text-uppercase text-muted mb-3">Course Catalog Information</h6>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label for="fldoe_course_code" class="form-label">
                                    FLDOE Course Code
                                </label>
                                <input
                                    type="text"
                                    id="fldoe_course_code"
                                    name="fldoe_course_code"
                                    value="{{ old('fldoe_course_code') }}"
                                    class="form-control"
                                    placeholder="e.g. 1001310"
                                >
                            </div>

                            <div class="col-md-4">
                                <label for="course_number" class="form-label">
                                    Course Number
                                </label>
                                <input
                                    type="text"
                                    id="course_number"
                                    name="course_number"
                                    value="{{ old('course_number') }}"
                                    class="form-control"
                                    placeholder="Internal code (optional)"
                                >
                            </div>

                            <div class="col-md-4">
                                <label for="default_credits" class="form-label">
                                    Default Credits
                                </label>
                                <input
                                    type="number"
                                    step="0.5"
                                    min="0"
                                    id="default_credits"
                                    name="default_credits"
                                    value="{{ old('default_credits', 1) }}"
                                    class="form-control"
                                    placeholder="e.g. 1.0"
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">
                                Course Title <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                class="form-control"
                                placeholder="e.g. English 1 - Literature & Composition"
                                required
                            >
                        </div>

                        <hr>

                        {{-- STEP 3: Curriculum link (CurriculumCourse) --}}
                        <h6 class="text-uppercase text-muted mb-3">Curriculum Placement</h6>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">
                                    Course Category
                                </label>
                                <select
                                    id="category_id"
                                    name="category_id"
                                    class="form-control"
                                >
                                    <option value="">-- Optional category --</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            data-type-id="{{ $category->curriculum_type_id }}"
                                            @selected(old('category_id') == $category->id)
                                        >
                                            {{ $category->name }} ({{ $category->curriculumType->code ?? '' }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    List is not auto-filtered here, but you can optionally filter client-side later.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="required_flag" class="form-label">
                                    Required Course?
                                </label>
                                <select
                                    id="required_flag"
                                    name="required_flag"
                                    class="form-control"
                                >
                                    <option value="0" @selected(old('required_flag', '0') == '0')>No (Elective)</option>
                                    <option value="1" @selected(old('required_flag') == '1')>Yes (Required)</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="credits_override" class="form-label">
                                    Credits (Override)
                                </label>
                                <input
                                    type="number"
                                    step="0.5"
                                    min="0"
                                    id="credits_override"
                                    name="credits_override"
                                    value="{{ old('credits_override') }}"
                                    class="form-control"
                                    placeholder="Leave empty to use default"
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="requirement_text" class="form-label">
                                Requirement Description
                            </label>
                            <input
                                type="text"
                                id="requirement_text"
                                name="requirement_text"
                                value="{{ old('requirement_text') }}"
                                class="form-control"
                                placeholder="e.g. Required subject – alternative (choice of one)"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="form-label">
                                Internal Notes
                            </label>
                            <textarea
                                id="notes"
                                name="notes"
                                rows="3"
                                class="form-control"
                                placeholder="Any extra information for counselors / admins…"
                            >{{ old('notes') }}</textarea>
                        </div>

                        {{-- STEP 4: Type-specific sections --}}
                        <hr>
                        <h6 class="text-uppercase text-muted mb-3">Program-Specific Details</h6>

                        {{-- AP FIELDS --}}
                        <div id="ap-fields" class="type-section card border-0 mb-3 d-none">
                            <div class="card-body bg-light rounded">
                                <h6 class="fw-semibold mb-3">
                                    AP Details
                                    <span class="badge bg-info ms-2">AP</span>
                                </h6>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="ap_subject_code" class="form-label">
                                            AP Subject Code
                                        </label>
                                        <input
                                            type="text"
                                            id="ap_subject_code"
                                            name="ap_subject_code"
                                            value="{{ old('ap_subject_code') }}"
                                            class="form-control"
                                            placeholder="e.g. ENGLANG, BIO, CALCAB"
                                        >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ap_exam_code" class="form-label">
                                            AP Exam Code
                                        </label>
                                        <input
                                            type="text"
                                            id="ap_exam_code"
                                            name="ap_exam_code"
                                            value="{{ old('ap_exam_code') }}"
                                            class="form-control"
                                            placeholder="e.g. 23"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ESOL FIELDS --}}
                        <div id="esol-fields" class="type-section card border-0 mb-3 d-none">
                            <div class="card-body bg-light rounded">
                                <h6 class="fw-semibold mb-3">
                                    ESOL Details
                                    <span class="badge bg-success ms-2">ESOL</span>
                                </h6>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="lld_level" class="form-label">
                                            LLD Level
                                        </label>
                                        <input
                                            type="text"
                                            id="lld_level"
                                            name="lld_level"
                                            value="{{ old('lld_level') }}"
                                            class="form-control"
                                            placeholder="e.g. Entering, Emerging, Developing"
                                        >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cefr_level" class="form-label">
                                            CEFR Level
                                        </label>
                                        <input
                                            type="text"
                                            id="cefr_level"
                                            name="cefr_level"
                                            value="{{ old('cefr_level') }}"
                                            class="form-control"
                                            placeholder="e.g. A1, A2, B1, B2, C1"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CLEP info (no extra fields but a notice) --}}
                        <div id="clep-fields" class="type-section alert alert-warning d-none">
                            <strong>CLEP course:</strong>
                            This course will be marked as a CLEP course. No extra fields are required.
                        </div>

                        {{-- Other types: CORE, ELECTIVE, CTE, PSAT, SAT, PREACT, ACT --}}
                        <div id="generic-fields" class="type-section alert alert-secondary d-none">
                            <strong>Standard course:</strong>
                            Only the common catalog and curriculum fields are needed for this type.
                        </div>

                        {{-- FILES --}}
                        <div class="card border-0 mb-3">
                            <div class="card-body bg-light rounded">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-semibold mb-0">Course Files</h6>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-file-row">
                                        + Add file
                                    </button>
                                </div>
                                <p class="text-muted small mb-3">
                                    Upload PDFs, slides, docs, etc. You can attach multiple files.
                                </p>

                                <div id="file-rows">
                                    {{-- initial file row --}}
                                    <div class="row g-2 align-items-center mb-2 file-row">
                                        <div class="col-md-8">
                                            <input
                                                type="file"
                                                name="resource_files[]"
                                                class="form-control"
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <input
                                                type="text"
                                                name="resource_files_labels[]"
                                                class="form-control"
                                                placeholder="Optional description"
                                                value="{{ old('resource_files_labels.0') }}"
                                            >
                                        </div>
                                        <div class="col-md-1 text-end">
                                            {{-- remove button appears only on cloned rows (via JS) --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- hidden template for file row --}}
                        <template id="file-row-template">
                            <div class="row g-2 align-items-center mb-2 file-row">
                                <div class="col-md-8">
                                    <input
                                        type="file"
                                        name="resource_files[]"
                                        class="form-control"
                                    >
                                </div>
                                <div class="col-md-3">
                                    <input
                                        type="text"
                                        name="resource_files_labels[]"
                                        class="form-control"
                                        placeholder="Optional description"
                                    >
                                </div>
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-file-row">&times;</button>
                                </div>
                            </div>
                        </template>

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
                                            {{-- remove button on clones only --}}
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
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-2">
                                Cancel
                            </a>
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
    document.addEventListener('DOMContentLoaded', function () {
        const typeSelect = document.getElementById('curriculum_type_id');

        const apSection    = document.getElementById('ap-fields');
        const esolSection  = document.getElementById('esol-fields');
        const clepSection  = document.getElementById('clep-fields');
        const genericSection = document.getElementById('generic-fields');

        function updateSections() {
            const option = typeSelect.options[typeSelect.selectedIndex];
            if (!option) return;

            const code = option.getAttribute('data-code');

            // hide all
            [apSection, esolSection, clepSection, genericSection].forEach(function (el) {
                if (el) el.classList.add('d-none');
            });

            switch (code) {
                case 'AP':
                    apSection.classList.remove('d-none');
                    break;
                case 'ESOL':
                    esolSection.classList.remove('d-none');
                    break;
                case 'CLEP':
                    clepSection.classList.remove('d-none');
                    break;
                default:
                    if (code) {
                        genericSection.classList.remove('d-none');
                    }
            }
        }

        typeSelect.addEventListener('change', updateSections);

        // Run on load if there is an old selected value
        if (typeSelect.value) {
            updateSections();
        }

        // ------- dynamic FILE rows -------
        const fileRowsContainer = document.getElementById('file-rows');
        const fileTemplate = document.getElementById('file-row-template');
        document.getElementById('add-file-row').addEventListener('click', function () {
            const clone = fileTemplate.content.cloneNode(true);
            fileRowsContainer.appendChild(clone);
        });
        fileRowsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-file-row')) {
                const row = e.target.closest('.file-row');
                if (row) row.remove();
            }
        });

        // ------- dynamic VIDEO rows -------
        const videoRowsContainer = document.getElementById('video-rows');
        const videoTemplate = document.getElementById('video-row-template');
        document.getElementById('add-video-row').addEventListener('click', function () {
            const clone = videoTemplate.content.cloneNode(true);
            videoRowsContainer.appendChild(clone);
        });
        videoRowsContainer.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-video-row')) {
                const row = e.target.closest('.video-row');
                if (row) row.remove();
            }
        });
    });
</script>
@endsection