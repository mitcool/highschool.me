@extends('admin_template')

@section('content')
<div class="jumbotron container shadow bg-white h-100">
    <h2 class="text-center" style="color:#045397;margin:30px 0">Family Consultations</h2>
    <table class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Request By</th> 
            <th>Link</th>
            <th></th>
        </tr>
        @foreach ($family_consultations as $request )
            <tr>
                <th>{{ $request->created_at->format('d.m.Y') }}</th>
                <th>{{ $request->parent->name}} {{ $request->parent->surname }}</th>
              
                <th>
                    @if($request->status == 0)
                    <a href="{{ route('add-family-consultation',$request->id) }}" class="text-underline">Set</a>
                    @elseif($request->status == 1)
                        Appointed
                    @elseif($request->status == 2)
                        Completed
                    @endif 
                </th>
                <th>
                    @if($request->status == 1)
                        <form action="{{ route('mark-family-consultation-as-completed',$request->id) }}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-info">Mark as completed</button>
                        </form>
                    @endif
                </th>
            </tr>
        @endforeach
       
    </table>
</div>
@endsection