@extends('educator.dashboard')

@section('content')
<div class="shadow container wrapper">
    <h1 class="text-center h2 page-headings">Courses</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Course Title</th>
                <th>Course Type</th>
                <th>Materials</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->course->fldoe_course_code }}</td>
                    <td>{{ $course->course->title }}</td>
                    <td>{{ $course->curriculumType->name }}</td>
                    <td>
                        <a href="{{ route('educator.course-materials',$course->id) }}" target="_blank">Edit Materials</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">{{ $courses->links() }}</div>

    <div class="text-right">
        <a class="orange-button" href="{{ route('educator.new-corses') }}">Request New Course</a>
    </div>
</div>
@endsection