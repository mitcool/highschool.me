@extends('admin_template')

@section('content')

<div class="jumbotron container bg-white shadow">
    <h2 class="text-center">List of students</h2>
    <hr>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th class="text-center">Grade</th>
            <th class="text-center">Date of birth</th>
            <th class="text-center">Progress</th>
        </tr>
        @foreach ($students as $student )
            <tr>
                <td>{{ $student->name }} {{ $student->surname }}</td>
                <td>{{ $student->email }}</td>
                <td class="text-center">{{ $student->student_details->grade }}</td>
                <td class="text-center">{{ $student->student_details->date_of_birth() }}</td>
                <td class="text-center">
                    <a href="">See...</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection