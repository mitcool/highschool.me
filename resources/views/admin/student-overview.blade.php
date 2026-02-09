@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">List of students</h2>
    <hr>
    <table class="table table-striped">
        <tr>
            
            <th colspan="5" class="text-left">
                <form action="{{ route('admin-student-overview') }}" class="d-flex">
                    <input type="text" class="form-control mr-2" name="search">
                    <div>
                        <button class="btn btn-info">Search</button>
                    </div>
                </form>
            </th>
        </tr>
        <tr>
            <th>Date</th>
            <th class="text-center">Id</th>
            <th class="text-center">Student</th>
            <th class="text-center">Parent</th>
            <th class="text-center">Link</th>
        </tr>
        @foreach ($students as $student )
            <tr>
                <td>{{ $student->created_at->format('d.m.Y') }}</td>
                <td class="text-center">{{ $student->student_id() }}</td> 
                <td class="text-center">{{ $student->fullname() }}</td>
                <td class="text-center">{{ $student->student_details->parent->fullname() }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.single-student',$student->id) }}">View...</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection