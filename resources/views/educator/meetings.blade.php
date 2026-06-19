@extends('educator.dashboard')

@section('content')

<div class="shadow container wrapper">
    <h1 class="text-center h2 page-headings">Your Meetings</h1>
    <hr>
   
    <h3 class="text-center">Sessions Schedules</h3>

    <table class="table table-striped">
        <tbody>
           {{-- Group Sessions --}}
            <tr>
                <th colspan="2">
                    <h5>Group Learning Sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($group_sessions) > 0)
            <tr>
                <th>Date</th>
                <th class="text-right">Link</th>
                <th class="text-right">Students</a></th>
            </tr>
            @endif
            @forelse ($group_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td class="text-right">
                        {{ $session->link }}
                    </td>
                    <td class="text-right">
                        <a data-toggle="modal" data-target="#hour-{{ $session->id }}">View</a>
                        <div class="modal fade" id="hour-{{ $session->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Participants </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($session->students  as $student )
                                        <p>{{ $student->student->fullname() }}</p>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button  class="btn orange-button" class="close" data-dismiss="modal" aria-label="Close" >Close</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="4">No group sessions at the moment</td>
            </tr>
            @endforelse
            {{-- Mentoring Sessions --}}
             <tr>
                <th colspan="2">
                    <h5>Personal Mentoring Sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($mentoring_sessions) > 0)
            <tr>
                <th>Date</th>
                <th class="text-right">Link</th>
                <th class="text-right">Students</a></th>
            </tr>
            @endif
            @forelse ($mentoring_sessions as $session)
                <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td class="text-right">
                        {{ $session->link }}
                    </td>
                    <td class="text-right">
                        <a data-toggle="modal" data-target="#hour-{{ $session->id }}">View</a>
                        <div class="modal fade" id="hour-{{ $session->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Select Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 @foreach ($session->students  as $student )
                                        <p>{{ $student->student->fullname() }}</p>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button  class="btn orange-button" form="new-course-form" >Save changes</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
             <tr>
                <td colspan="4">No mentoring sessions at the moment</td>
            </tr>
            @endforelse
              <tr>
                <th colspan="2">
                    <h5>Coaching sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($coaching_sessions) > 0)
            <tr>
                <th>Date</th>
                <th class="text-right">Link</th>
                <th class="text-right">Students</a></th>
            </tr>
            @endif
            @forelse ($coaching_sessions as $session)
                 <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td class="text-right">
                        {{ $session->link }}
                    </td>
                    <td class="text-right">
                        <a data-toggle="modal" data-target="#hour-{{ $session->id }}">View</a>
                        <div class="modal fade" id="hour-{{ $session->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Select Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 @foreach ($session->students  as $student )
                                        <p>{{ $student->student->fullname() }}</p>
                                @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button  class="btn orange-button" form="new-course-form" >Save changes</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
             <tr>
                <td colspan="4">No coaching sessions at the moment</td>
            </tr>
             @endforelse


              <tr>
                <th colspan="2">
                    <h5>Personal Tutoring Sessions</h5>
                </th>
                <th></th>
            </tr>
            @if(count($academic_hours) > 0)
            <tr>
                <th>Date</th>
                <th class="text-right">Link</th>
                <th class="text-right">Students</a></th>
            </tr>
            @endif

            {{-- Academic Hours --}}
            @forelse ($academic_hours as $session)
                 <tr>
                    <td>{{ $session->date->format('F d,Y') }} at {{ $session->start->format('g:iA') }}</td>
                    <td class="text-right">
                        {{ $session->link }}
                    </td>
                    <td class="text-right">
                        <a data-toggle="modal" data-target="#hour-{{ $session->id }}">View</a>
                        <div class="modal fade" id="hour-{{ $session->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Select Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 @foreach ($session->students  as $student )
                                        <p>{{ $student->student->fullname() }}</p>
                                @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button  class="btn orange-button" form="new-course-form" >Save changes</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
             <tr>
                <td colspan="4">No coaching sessions at the moment</td>
            </tr>
             @endforelse
        </tbody>
    </table>
</div>
@endsection

