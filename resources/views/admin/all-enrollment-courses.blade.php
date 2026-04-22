@extends('admin_template')

@section('css')
<style>
    .pagination {
        display: inline-flex!important;
    }
</style>
@endsection

@section('content')
<div class="shadow container wrapper">    
    <div class="text-center mb-5 mt-4">
        <h2 class="page-headings">All Courses</h2>
    </div>
    <div id="status-message"></div>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link {{ !request()->segment(3) ? 'font-weight-bold  text-primary ' : '' }}" href="{{ route('all-enrollment-courses')}}">All</a>
        </li>
        @foreach ($curriculum_types as $type )
            <div class="col">
               <li class="nav-item">
                    <a class="nav-link {{ request()->segment(3) == $type->id ? ' font-weight-bold text-primary ' : '' }}" href="{{ route('all-enrollment-courses', $type->id ) }}">{{ $type->code }}</a>
                </li>
            </div>
        @endforeach
    </ul>
     
  </div>
</nav>
   <form class="d-flex p-3" role="search" action="{{ route('all-enrollment-courses') }}">
        <input
            name="search"
            class="form-control me-2" 
            type="search" 
            placeholder="Search course by FLDOE Course Code or Course name..." 
            aria-label="Search"
        >
        <button class="btn btn-primary" type="submit">
            Search
        </button>
    </form>
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Code</th>
                <th>Course Title</th>
                <th>Course Type</th>
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

                    
                    {{-- Type --}}
                    <td>
                        @foreach ($course->curriculumTypes as $type)
                            {{ $type->name }}
                        @endforeach
                    </td>

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