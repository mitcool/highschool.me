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
        .btn-enrolled {
            background-color: #f3f3f3;
            color: white;
            border: none;
            font-weight: 600;
            padding: 5px 20px;
            border-radius: 6px;
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
                        <th class="text-left">Subject</th>
                        <th>Grade</th>
                        <th>Mandatory</th>
                        <th>Resources</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($enrolled_courses as $enrolled_course )
                       
                        <tr>
                        <td class="text-left">{{ $enrolled_course->course->title }}</td>
                        <td>{{ auth()->user()->student_details->grade }}</td>
                        <td>{{ $enrolled_course->course->curriculumCourses[0]->required_flag == 1 ? 'Yes' : 'No' }} </td>
                        <td><a href="{{ route('student.single-course',$enrolled_course->course->id) }}" class="view-link">View</a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection