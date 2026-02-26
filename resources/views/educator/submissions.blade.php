@extends('educator.dashboard')

@section('content')

<div class="container wrapper shadow">    

    <div class="table-container mx-auto">
        <h2 class="text-center blue-heading h2">Exam Submissions</h2>
        <div class="table-responsive">
            <table class="table course-table">
                @if(count($exams) > 0)
                <thead>
                    <tr class="text-center">
                       
                        <th class="text-left">Date/Time</th>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>Link</th>
                    </tr>
                </thead>
                @else
                <tr>
                    <td colspan="4" class="text-center">No submissions at the moment</td>
                </tr>
                @endif
                <tbody class="text-center">
                   @foreach($exams as $exam)
                        <tr>
                            <td class="text-left">{{ $exam->date->format('d.m.Y')}} {{ $exam->time->format('H:i')}}</td>
                            <td>{{ $exam->student->fullname() }}</td>
                            <td>{{ $exam->course->course->title }}</td>
                            <td><a href="{{ route('educator.single-submission',$exam->id) }}" class="view-link">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection