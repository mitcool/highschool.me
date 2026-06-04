@extends('admin_template')

@section('content')

<div class="shadow container wrapper">
  
    <h2 class="text-center font-weight-bold h2" style="margin-top:40px;">List of complaints</h2>
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Student</th>
            <th>Parent</th>
            <th class="text-center">Complaint</th>
        </tr>
        @foreach ($complaints as $complaint)
            <tr>
                <td>{{ $complaint->date->format('d.m.Y') }}</td>
                <td>{{ $complaint->student->fullname() }}</td>
                <td>{{ $complaint->student->student_details->parent->fullname() }}</td>
                <td data-target="#complaint-modal-{{ $complaint->id }}" data-toggle="modal" class="text-center" style="cursor: pointer">View</td>
                <div class="modal fade" id="complaint-modal-{{ $complaint->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Complaint:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $complaint->text }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </tr>
        @endforeach
    </table>
</div>

@endsection