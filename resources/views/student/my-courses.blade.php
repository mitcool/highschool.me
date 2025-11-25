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
            color: orange;
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

        /* Custom Chevron using ::after on the button */
        .custom-accordion .btn-header::after {
            content: '';
            width: 16px;
            height: 16px;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23004c99'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: contain;
            transition: transform 0.2s;
        }

        /* Rotate chevron when collapsed (BS4 logic: collapsed class is added when closed) */
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
            background-color: #cc4400;
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
    
    <ul class="nav nav-pills custom-tabs mb-3" id="enrollTabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="core-tab" data-toggle="pill" href="#core" role="tab">Core</a></li>
        <li class="nav-item"><a class="nav-link" id="elective-tab" data-toggle="pill" href="#elective" role="tab">Elective</a></li>
        <li class="nav-item"><a class="nav-link" id="ap-tab" data-toggle="pill" href="#ap" role="tab">AP</a></li>
        <li class="nav-item"><a class="nav-link" id="cte-tab" data-toggle="pill" href="#cte" role="tab">CTE</a></li>
    </ul>

    <div class="tab-content" id="enrollTabsContent">
        
        <div class="tab-pane fade show active" id="core" role="tabpanel">
            
            <div class="accordion custom-accordion" id="coreAccordion">
                
                <div class="card">
                    <div class="card-header" id="headingEnglish">
                        <button class="btn btn-header" type="button" data-toggle="collapse" data-target="#collapseEnglish" aria-expanded="true" aria-controls="collapseEnglish">
                            English Language Arts
                        </button>
                    </div>
                    <div id="collapseEnglish" class="collapse show" aria-labelledby="headingEnglish" data-parent="#coreAccordion">
                        <div class="card-body pt-0">
                            <div class="course-row d-flex justify-content-between align-items-center">
                                <div>English 1 - Lit & Comp <span class="credit-text">(1.0 Credit)</span></div>
                                <button class="btn btn-enroll">Enroll</button>
                            </div>
                            <div class="course-row d-flex justify-content-between align-items-center">
                                <div>English 2 - Read & Rhetoric <span class="credit-text">(1.0 Credit)</span></div>
                                <button class="btn btn-enroll">Enroll</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingMath">
                        <button class="btn btn-header collapsed" type="button" data-toggle="collapse" data-target="#collapseMath" aria-expanded="false" aria-controls="collapseMath">
                            Mathematics
                        </button>
                    </div>
                    <div id="collapseMath" class="collapse" aria-labelledby="headingMath" data-parent="#coreAccordion">
                        <div class="card-body">
                            <p class="text-muted p-3 mb-0">Mathematics courses available...</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingScience">
                        <button class="btn btn-header collapsed" type="button" data-toggle="collapse" data-target="#collapseScience" aria-expanded="false" aria-controls="collapseScience">
                            Science
                        </button>
                    </div>
                    <div id="collapseScience" class="collapse" aria-labelledby="headingScience" data-parent="#coreAccordion">
                        <div class="card-body">
                            <p class="text-muted p-3 mb-0">Science courses available...</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="tab-pane fade" id="elective" role="tabpanel"><p class="text-center pt-3">Elective Content...</p></div>
        <div class="tab-pane fade" id="ap" role="tabpanel"><p class="text-center pt-3">AP Content...</p></div>
        <div class="tab-pane fade" id="cte" role="tabpanel"><p class="text-center pt-3">CTE Content...</p></div>
    </div>
</div>
@endsection

@section('scripts')

@endsection