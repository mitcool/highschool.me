@extends('student.dashboard')

@section('css')
<style>
    .h_iframe iframe {
        position:absolute;
        top:0;
        left:0;
        width:80%;
        height:80%;
    }
    .ts-dropdown, .ts-dropdown.form-control, .ts-dropdown.form-select {
        background: white !important;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

@endsection

@section('content')
<div class="container wrapper">
    <div class="table-container mx-auto">
        <h2 class="text-center h2 page-headings">Book {{ $type->name }}</h2>
        <hr>
    </div>
    
    @if($permissions[$type->id])
        <div class="row">
            <div class="col-md-12">
                <label for="" class="mb-0 font-weight-bold">Select Subject</label>
                <form action="{{ route('book-meetings',$type->slug) }}" class="d-flex">
                    <select name="course_id" 
                            id="courses" 
                            class="form-control selectpicker"
                            data-live-search="true"
                            data-width="100%">
                        <option value="">-- Please select --</option>
                        @foreach ($curriculum_courses as  $course)
                            <option value="{{ $course->id }}">{{ $course->course->title }}</option>
                        @endforeach
                    </select>
                    <div class="mx-2">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        
        <hr>
        <label for="" class="mb-0 font-weight-bold">Available Educators</label>
      
        @foreach ($educators as $educator)
            <div class="row font-weight-bold my-2 py-2">
                <div class="col-md-6 d-flex align-items-center">
                    <p class="mb-0">{{ $educator->educator->fullname() }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('book-educator-meetings',[$type->slug,$educator->educator_id]) }}" class="btn btn-info">Request Session</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="page-content">
             <p class="text-center">You don't have permission</p>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>
@endsection