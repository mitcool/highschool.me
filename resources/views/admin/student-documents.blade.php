@extends('admin_template')

@section('content')

<div class="jumbotron container">
    <h2 class="text-center">List of pending approvement students applications</h2>
    <hr>
    @forelse ($students as $student )
        <div class="d-flex align-items-center my-3 justify-content-between">
             <p class="mb-0 font-weight-bold">{{ $student->student->name }}</p>
        </div>
        <ul class="list-group">
            @foreach ($student->student->documents as $document )
                <li class="list-group-item d-flex justify-content-between">
                    <span class="font-weight-bold">{{ $document->document_type->name }}:</span> 
                    <a target="_blank" href="{{ asset('documents') }}/{{ $student->student_id }}/{{ $document->file }}">{{ $document->file }}</a>
                </li>
            @endforeach
        </ul>
      
        <hr>
          <form action="{{ route('approve.student',$student->student_id) }}" method="POST" class="text-center my-3">
            {{ csrf_field() }}
            <div>
                <input type="checkbox" name="is_disabled"> Is disabled
            </div>
            <button class="btn btn-info">Approve</button>
        </form>
    @empty
        <h4 class="text-center text-primary">No pending requests</h4> 
    @endforelse

</div>
@endsection