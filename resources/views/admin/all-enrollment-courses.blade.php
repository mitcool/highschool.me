@extends('admin_template')

@section('css')
<style>
    .pagination {
        display: inline-flex!important;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="text-center mb-5 mt-4">
        <h2>All Courses</h2>
    </div>
    <div id="status-message"></div>
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Code</th>
                <th>Course Title</th>
                <th>Mandatory</th>
                <th>Credits</th>
                <th>Edit</th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $course)
                <tr>
                    <!-- Code -->
                    <td>{{ $course->fldoe_course_code }}</td>

                    <!-- Title -->
                    <td>{{ $course->title }}</td>

                    <!-- Activity Type -->
                    <td>
                        @foreach($course->curriculumCourses as $c)
                            {{ $c->required_flag == 1 ? 'Yes' : 'No'}}
                        @endforeach
                    </td>

                    <!-- Link -->
                    <td>
                        {{ $course->default_credits }}
                    </td>

                    <td>
                        <a href="{{ route('edit-enrollment-course', $course->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        {{  $courses->links() }}
    </div>
    <div class="col-md-12 text-right">
        <a href="{{ route('enrollment-courses') }}" class="btn btn-warning">Add Course</a>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection