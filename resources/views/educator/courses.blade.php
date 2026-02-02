@extends('educator.dashboard')

@section('content')
<div class="shadow container jumbotron bg-white">
    <h1 class="text-center page-headings">Courses</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Course Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->course->fldoe_course_code }}</td>
                    <td>{{ $course->course->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection