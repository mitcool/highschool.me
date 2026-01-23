@extends('student.dashboard')

@section('content')
<div class="container my-5">
    <div class="table-container mx-auto mt-5">
        <h2 class="text-center mb-4">My Exams</h2>
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    <tr class="text-center">
                        <th class="text-left">Subject</th>
                        <th>Date/Time</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                   @foreach($exams as $exam)
                        <tr>
                            <td class="text-left">{{ $exam->course->course->title }}</td>
                            <td>{{ $exam->date->format('d.m.Y')}} {{ $exam->time->format('H:i')}}</td>
                            
                            @if($exam->is_active())
                               
                                <td>
                                    <a href="{{ route('student.single-exam',$exam->id) }}" class="view-link">Start Now</a>
                                </td>
                            @else
                                <td>The exam will be active from {{ $exam->date->format('d.m.Y')}} {{ $exam->time->format('H:i')}}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection