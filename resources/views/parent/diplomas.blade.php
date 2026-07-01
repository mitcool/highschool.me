@extends('parent.dashboard')

@section('content')
    <div class="shadow  mx-auto wrapper h-100" style="width:80%;">
        <h1 class="text-center h2 page-headings" style="color:#045397">Diplomas</h1>
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Digital Degree</th>
                <th>Student</th>
                <th class="text-center">Diploma</th>
                <th class="text-center">Digital Transcript</th>
                <th class="text-center">Verification of Graduation</th>
                <th class="text-center">Request Copy*</th>
            
            </tr>
            @forelse ($diplomas  as $diploma )
                <tr>
                    <td>{{ $diploma->created_at->format('d.m.Y') }}</td>
                    <td>{{ $diploma->track() }}</td>
                    <td>{{ $diploma->student->fullname() }}</td>
                    <td  class="text-center">
                        <a href="{{ route('student.generate-pdf-diploma',$diploma->student_id) }}" target="_blank">Link</a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('student.generate-pdf-transcript',$diploma->student_id) }}" target="_blank">Link</a>
                    </td>
                    <td class="text-center">
                        {{-- @if($diploma->verification_of_graduation)
                            <a href="{{ route('parent.request-verification-of-graduation-pdf',$diploma->student_id) }}" target="_blank">Link</a>
                        @else --}}
                            <a href="{{ route('parent.request-verification-of-graduation',$diploma->student_id) }}">Link</a>
                        {{-- @endif --}}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('request-copy',encrypt($diploma->id)) }}" class="btn orange-button">Request</a>
                    </td>
                    
                </tr>
            @empty
                @foreach (auth()->user()->students as $student)
                    <tr>
                        <td> - </td>
                        <td>{{ $student->student->student_details->track_name() }}</td>
                        <td>{{ $student->student->fullname() }}</td>
                        <td  class="text-center">
                            -
                        </td>
                        <td class="text-center">
                            <a href="{{ route('student.generate-pdf-transcript',$student->student_id) }}" target="_blank">Link</a>
                        </td>
                        <td class="text-center"> - </td>
                        <td class="text-center"> - </td>
                    </tr>
                @endforeach
                
            @endforelse

        </table>
        @if(count($diplomas) > 0)
            <p>* - The package includes a folder with a certified diploma with an apostille certified by the school principal.</p>
        @endif
    </div>
@endsection