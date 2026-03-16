@extends('student.dashboard')

@section('content')
<div class="container" style="padding: 40px;">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3>Please select a mentor</h3>
			<hr>
		</div>
        @foreach ($study_mentors as $study_mentor)
            <div class="col-md-4 my-2">
                <a href="{{ route('student.single-study-mentor',$study_mentor->slug) }}" style="text-decoration: none;color:black;">
                    <div class="shadow text-center text-capitalize" style="border-radius:5px;padding:30px;background: #045397;color:white">
                        <h5>{{ $study_mentor->name }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection