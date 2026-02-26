@extends('educator.dashboard')

@section('css')
<style>
    .pagination .page-link {
    color: #AB0050!important; /* your color */
}

/* Hover state */
.pagination .page-link:hover {
    color: #ffffff !important;
    background-color: #AB0050!important;
    border-color: #AB0050!important;
}

/* Active page */
.pagination .page-item.active .page-link {
    background-color: #AB0050!important;
    border-color: #AB0050!important;
    color: #ffffff !important;
}

/* Disabled buttons */
.pagination .page-item.disabled .page-link {
    color: #999999;
}
</style>
@endsection

@section('content')
<div class="shadow container wrapper">
    <h1 class="text-center h2 blue-heading">Courses</h1>
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

    <div class="d-flex justify-content-center">{{ $courses->links() }}</div>
</div>
@endsection