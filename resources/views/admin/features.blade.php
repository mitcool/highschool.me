@extends('admin_template')

@section('content')

<div class="jumbotron container">
    <h2 class="text-center">Add Feature</h2>
    <form action="{{ route('feature.add') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="feature" class="form-control">
        <div class="text-center">
            <button class="btn my-2 btn-info" >Add feature</button>
        </div>  
    </form>
    <hr>
    <ul class="list-group">
        <h2 class="text-center">Current Features</h2>
        @foreach ($features as $feature )
             <li class="list-group-item d-flex w-100 align-center justify-content-between"><h3>{{ $feature->feature }}</h3> <form class="m-0 text-right" action="{{ route('feature.delete',$feature->id) }}" method="POST">
                <button class="btn btn-danger m-0" >Delete feature</button> </form>
            </li>
        @endforeach
       
    </ul>
</div>


@endsection