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
                <th>Materials</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->course->fldoe_course_code }}</td>
                    <td>{{ $course->course->title }}</td>
                    <td>
                        <a href="{{ route('educator.course-materials',$course->id) }}" target="_blank">Edit Materials</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">{{ $courses->links() }}</div>

    <div class="text-right">
        <button class="orange-button" data-toggle="modal" data-target="#new-course-modal">Request New Course</button>
        <div class="modal fade" id="new-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('educator.request-new-course') }}" id="new-course-form" method="POST">
                        {{ csrf_field() }}
                        <div class="row text-left">
                            @foreach ($course_categories as $course_category )
                               {{-- Only categories that he doesnt have already --}}
                                @if(!in_array($course_category->id,$categories))
                                    <div class="col-md-6">
                                        <input type="checkbox" value="{{ $course_category->id }}" name="categories[]"> {{ $course_category->name }}
                                    </div>
                                @endif 
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button  class="btn orange-button" form="new-course-form" >Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection