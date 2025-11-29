@extends('student.dashboard')

@section('css')
<style>
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
           4. MY COURSES TABLE
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
           5. ENROLL PAGE (Tabs & Accordion)
           ========================================= */
        /* Tabs */
        .custom-tabs {
            justify-content: center;
            margin-bottom: 20px;
        }

        /* BS4 Nav Pills spacing */
        .custom-tabs .nav-item {
            margin: 0 4px;
        }

        .custom-tabs .nav-link {
            background-color: white;
            color: #004c99;
            font-weight: 600;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 8px 16px;
        }

        .custom-tabs .nav-link.active {
            background-color: #e65100;
            color: #fff;
        }

        /* Accordion - Adapted for BS4 Card Structure */
        .custom-accordion .card {
            border: none;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .custom-accordion .card-header {
            background-color: white;
            border-bottom: none;
            padding: 0;
        }

        .custom-accordion .btn-header {
            color: #004c99;
            font-size: 1.1rem;
            font-weight: 500;
            text-decoration: none;
            width: 100%;
            text-align: left;
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-accordion .btn-header:hover, 
        .custom-accordion .btn-header:focus {
            text-decoration: none;
            box-shadow: none;
        }

        .custom-accordion .btn-header::after {
            content: '';
            width: 16px;
            height: 16px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23004c99'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: contain;
            transition: transform 0.2s;
        }

        .custom-accordion .btn-header.collapsed::after {
            transform: rotate(-90deg);
        }

        .course-row {
            padding: 15px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .course-row:last-child { border-bottom: none; }

        .credit-text { color: #4dabf7; font-weight: 400; }

        .btn-enroll {
            background-color: #cc4400;
            color: white;
            border: none;
            font-weight: 600;
            padding: 5px 20px;
            border-radius: 6px;
        }
        .btn-enroll:hover {
            background-color: #b33b00;
            color: white;
        }
</style>
@endsection

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">My Courses</h2>
    <div class="table-container mx-auto">
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    <tr class="text-center">
                        <th>Subject</th>
                        <th>Grade</th>
                        <th>Mandatory</th>
                        <th>Resources</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Math</td>
                        <td>11</td>
                        <td>Yes</td>
                        <td><a href="#" class="view-link">View</a></td>
                    </tr>
                    <tr>
                        <td>Biology</td>
                        <td>12</td>
                        <td>No</td>
                        <td><a href="#" class="view-link">View</a></td>
                    </tr>
                    <tr>
                        <td>History</td>
                        <td>11</td>
                        <td>Yes</td>
                        <td><a href="#" class="view-link">View</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="section-spacer"></div>
    
    <h2 class="text-center mb-4">Enroll</h2>

    @php
        $typeLabels = [
            'CORE'   => 'Core',
            'ELECTIVE' => 'Elective',
            'AP'     => 'AP',
            'CTE'    => 'CTE',
            'CLEP'   => 'CLEP',
            'PSAT'   => 'PSAT',
            'SAT'    => 'SAT',
            'PREACT' => 'PreACT',
            'ACT'    => 'ACT',
            'ESOL'   => 'ESOL',
        ];

        $displayTypes = $curriculumTypes->filter(function ($type) use ($typeLabels) {
            return isset($typeLabels[$type->code]);
        });
    @endphp

    {{-- Tabs --}}
    <ul class="nav nav-pills custom-tabs mb-3" id="enrollTabs" role="tablist">
        @foreach($displayTypes as $type)
            @php $tabId = strtolower($type->code); @endphp
            <li class="nav-item">
                <a
                    class="nav-link {{ $loop->first ? 'active' : '' }}"
                    id="{{ $tabId }}-tab"
                    data-toggle="pill"
                    href="#{{ $tabId }}"
                    role="tab"
                    aria-controls="{{ $tabId }}"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                >
                    {{ $typeLabels[$type->code] }}
                </a>
            </li>
        @endforeach
    </ul>

    {{-- Tab content --}}
    <div class="tab-content" id="enrollTabsContent">
        @foreach($displayTypes as $type)
            @php
                $tabId = strtolower($type->code);

                // curriculum_courses that have NO category
                $uncategorized = $type->curriculumCourses
                    ->where('category_id', null)
                    ->sortBy('course.title');
            @endphp

            <div
                class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                id="{{ $tabId }}"
                role="tabpanel"
                aria-labelledby="{{ $tabId }}-tab"
            >
                @if($type->categories->count() || $uncategorized->count())
                    <div class="accordion custom-accordion" id="{{ $tabId }}Accordion">

                        {{-- CATEGORY CARDS --}}
                        @foreach($type->categories as $category)
                            @php
                                $collapseId = $tabId . '-cat-' . $category->id;
                                $hasCourses = $category->curriculumCourses->count() > 0;
                            @endphp

                            <div class="card">
                                <div class="card-header" id="heading-{{ $collapseId }}">
                                    <button
                                        class="btn btn-header {{ $loop->first ? '' : 'collapsed' }}"
                                        type="button"
                                        data-toggle="collapse"
                                        data-target="#collapse-{{ $collapseId }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="collapse-{{ $collapseId }}"
                                    >
                                        {{ $category->name }}
                                    </button>
                                </div>
                                <div
                                    id="collapse-{{ $collapseId }}"
                                    class="collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="heading-{{ $collapseId }}"
                                    data-parent="#{{ $tabId }}Accordion"
                                >
                                    <div class="card-body pt-0">
                                        @if($hasCourses)
                                            @foreach($category->curriculumCourses as $cc)
                                                @php
                                                    $course  = $cc->course;
                                                    $credits = $cc->credits_override ?? $course->default_credits;
                                                @endphp
                                                <div class="course-row d-flex justify-content-between align-items-center">
                                                    <div>
                                                        {{ $course->title }}
                                                        @if(!is_null($credits))
                                                            <span class="credit-text">
                                                                ({{ number_format($credits, 1) }} Credit{{ $credits == 1 ? '' : 's' }})
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <button class="btn btn-enroll">Enroll</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted p-3 mb-0">No courses available in this category yet.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- UNCATEGORIZED COURSES CARD (e.g. CLEP) --}}
                        @if($uncategorized->count())
                            @php
                                $otherCollapseId = $tabId . '-other';
                                $headerTitle = ($type->code === 'CLEP')
                                    ? 'CLEP Courses'
                                    : 'Other Courses';
                            @endphp

                            <div class="card">
                                <div class="card-header" id="heading-{{ $otherCollapseId }}">
                                    <button
                                        class="btn btn-header {{ $type->categories->count() ? 'collapsed' : '' }}"
                                        type="button"
                                        data-toggle="collapse"
                                        data-target="#collapse-{{ $otherCollapseId }}"
                                        aria-expanded="{{ $type->categories->count() ? 'false' : 'true' }}"
                                        aria-controls="collapse-{{ $otherCollapseId }}"
                                    >
                                        {{ $headerTitle }}
                                    </button>
                                </div>
                                <div
                                    id="collapse-{{ $otherCollapseId }}"
                                    class="collapse {{ $type->categories->count() ? '' : 'show' }}"
                                    aria-labelledby="heading-{{ $otherCollapseId }}"
                                    data-parent="#{{ $tabId }}Accordion"
                                >
                                    <div class="card-body pt-0">
                                        @foreach($uncategorized as $cc)
                                            @php
                                                $course  = $cc->course;
                                                $credits = $cc->credits_override ?? $course->default_credits;
                                            @endphp
                                            <div class="course-row d-flex justify-content-between align-items-center">
                                                <div>
                                                    {{ $course->title }}
                                                    @if(!is_null($credits))
                                                        <span class="credit-text">
                                                            ({{ number_format($credits, 1) }} Credit{{ $credits == 1 ? '' : 's' }})
                                                        </span>
                                                    @endif
                                                </div>
                                                <button class="btn btn-enroll">Enroll</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                @else
                    <p class="text-muted text-center py-4 mb-0">
                        No courses available for {{ $typeLabels[$type->code] }} yet.
                    </p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')

@endsection