@extends('admin_template')

@section('content')

<div class="shadow container wrapper">    
    <h2 class="text-center">List of pending approvement students applications</h2>
    <hr>
    <ul class="list-group">
        @forelse ($students as $student )
            <li class="list-group-item d-flex align-items-center my-1 justify-content-between">
                <p class="mb-0 font-weight-bold">{{ $student->student->fullname() }} </p>
                <a href="{{ route('single-student-documents',$student->student->id) }}">Check documents</a>
            </li>
        @empty
            <li class="text-center text-primary">No pending requests</li> 
        @endforelse
    </ul>
</div>
@endsection

