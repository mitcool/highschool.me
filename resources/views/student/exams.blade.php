@extends('student.dashboard')

@section('content')
<div class="container my-5">
    <div class="table-container mx-auto mt-5">
        <h2 class="text-center mb-4">My Exams</h2>
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    <tr class="text-center">
                        <th>Date</th>
                        <th>Time</th>
                        <th>Subject</th>
                        <th>Pre-Exam Link</th>
                        <th>Exam Link</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                   @foreach($exams as $exam)
                        <tr>
                            <td>{{ $exam->date->format('d.m.Y')}}</td>
                            <td>{{ $exam->time->format('H:i')}}</td>
                            <td>{{ $exam->course->course->title }}</td>
                            <td>
                                @if($exam->pre_exam == 0)
                                    <a href="{{ route('student.pre-exam',$exam->id) }}">Link &#187;</a>
                                @endif
                            </td>
                            <td>
                                @if($exam->is_active())
                                    @if($exam->status == 0)
                                        <a href="{{ route('student.single-exam',$exam->id) }}" class="view-link">Link&#187;</a>
                                    @elseif($exam->grade)
                                        <a href="{{ route('student.single-exam-results',$exam->id) }}"><span class="badge badge-secondary">Details...</span>
                                        </a>
                                    @else
                                        <span class="badge badge-secondary"> <i class="fas fa-clock"></i> Pending results</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection