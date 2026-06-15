@extends('admin_template')

@section('content')

<div class="shadow container wrapper">    

    <div class="table-container mx-auto mt-5">
        <h2 class="text-center">Exam Submissions</h2>
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    @if(count($exams) > 0)
                        <tr class="text-center">
                            <th class="text-left">Date/Time (UTC)</th>
                            <th>Student Name</th>
                            <th>Subject</th>
                            <th>Link</th>
                        </tr>
                    @endif
                </thead>
                <tbody class="text-center">
                   @forelse($exams as $exam)
                        <tr>
                            <td class="text-left">{{ $exam->datetime->format('d.m.Y H:i')}}</td>
                            <td>{{ $exam->student->fullname() }}</td>
                            <td>{{ $exam->course->course->title }}</td>
                            <td><a href="{{ route('single-submission',$exam->id) }}" class="view-link">View</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="4">No submissions at the moment</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection