@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    

    <div class="table-container mx-auto mt-5">
        <h2 class="text-center">Exam Submissions</h2>
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    <tr class="text-center">
                       
                        <th class="text-left">Date/Time</th>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                   @foreach($exams as $exam)
                        <tr>
                            <td class="text-left">{{ $exam->date->format('d.m.Y')}} {{ $exam->time->format('H:i')}}</td>
                            <td>{{ $exam->student->fullname() }}</td>
                            <td>{{ $exam->course->course->title }}</td>
                            <td><a href="{{ route('single-submission',$exam->id) }}" class="view-link">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection