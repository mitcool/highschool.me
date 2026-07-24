@extends('admin_template')

@section('content')
<div class="shadow  wrapper mx-auto" style="width: 80%">    
    <h2 class="text-center">List of study mentors</h2>
    <hr>
    <ul class="list-group">
        <div class="row p-2 border bg-light font-weight-bold">
            <div class="col-md-1">
                Study Mentor
            </div>
            <div class="col-md-3">
               Course
            </div>
             <div class="col-md-4">
               Description
            </div>
            <div class="col-md-3">
                Current Video
            </div>
            <div class="col-md-1">
                Edit
            </div>
        </div>
        @foreach ($course_mentors as $course_mentor )
            <div class="row p-2 align-items-center border">
                <div class="col-md-1">
                    <p class="mb-0">{{ $course_mentor->mentor->name }} </p>
                </div>
              
                <div class="col-md-3">
                     <p class="mb-0">{{ $course_mentor->course->course->title }} {{ $course_mentor->course->curriculumType->code }}</p>
                </div>
                   <div class="col-md-4">
                     <p class="mb-0">{{ $course_mentor->description}} </p>
                </div>
                <div class="col-md-3">
                    @if($course_mentor->video)
                        <a href="{{ asset('study-mentor-videos') }}/{{ $course_mentor->video }}" target="_blank">View</a>
                    @else
                        N/a
                    @endif
                </div>
                <div class="col-md-1">
                    <button class="orange-button btn" data-toggle="modal" data-target="#course-mentor-modal-{{ $course_mentor->id }}">...</button>
                </div>
            </div>
            <div class="modal fade" id="course-mentor-modal-{{ $course_mentor->id }}" tabindex="-1" aria-labelledby="edit-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $course_mentor->course->course->title }} / {{ $course_mentor->mentor->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update-study-mentor-video') }}" method="POST" class="educator-form confirm-first" id="edit-educator-{{ $course_mentor->id }}" enctype="multipart/form-data">
                                <input type="hidden" name="course_id" value="{{ $course_mentor->course_id }}">
                                {{ csrf_field() }}
                                 <label class="font-weight-bold mb-0 d-block" for="">Mentor</label>
                                <select required class="form-control" type="file" name="mentor_id">
                                    @foreach ($mentors as $mentor)
                                        <option {{ $mentor->id == $course_mentor->mentor_id ? ' selected ' : '' }} value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                    @endforeach
                                </select>
                                 <label class="font-weight-bold mb-0 d-block" for="">Description</label>
                                <textarea class="form-control" rows="10" name="description">{{ $course_mentor->description }}</textarea>
                                <input type="hidden" value="{{ $course_mentor->id }}" name="id">
                                <label class="font-weight-bold mb-0 d-block" for="">Video</label>
                                <input class="form-control" type="file" name="video"  /><br>
                                <button class="btn orange-button">Change Video</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                
        @endforeach
    </ul>
</div>
@endsection