@extends('student.dashboard')

@section('content')
<div class="container my-5">
    <div class="table-container mx-auto mt-5">
        <h2 class="text-center mb-4">My Exams</h2>
        <div class="table-responsive">
            <table class="table course-table">
                <thead>
                    @if(count($exams) > 0)
                    <tr class="text-center">
                        <th>Date</th>
                        
                        <th>Subject</th>
                        <th>Pre-Exam Link</th>
                        <th>Exam Link</th>
                    </tr>
                    @endif
                </thead>
                <tbody class="text-center">
                   @forelse($exams as $exam)
                        <tr>
                            <td>{{ $exam->localdate()}}</td>
                         
                            <td>{{ $exam->course->course->title }}</td>
                            <td>
                                @if($exam->pre_exam == 0 && $exam->status == 0)
                                    <a href="{{ route('student.pre-exam',$exam->id) }}">Link &#187;</a>
                                @endif
                            </td>
                            <td>
                               
                                @if($exam->status == 0 && $exam->is_active())
                                    <a href="{{ route('student.single-exam',$exam->id) }}" class="view-link">Link&#187;</a>
                                @elseif($exam->status == 0 && !$exam->is_active())                                
                                    Exam starts on {{ $exam->localdate() }} ({{ session('timezone') }})
                                @elseif($exam->status == 2)
                                    <a href="{{ route('student.single-exam-results',$exam->id) }}"><span class="badge badge-secondary">Details...</span>
                                    </a>
                                @else
                                    <span class="badge badge-secondary"> <i class="fas fa-clock"></i> Pending results</span>
                                @endif
                              
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"> No exams at the moment</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection