@extends('student.dashboard')

@section('css')
<style>
    .h_iframe iframe {
        position:absolute;
        top:0;
        left:0;
        width:80%;
        height:80%;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="h_iframe">
        <iframe src="https://docs.google.com/spreadsheets/d/1QqOm23j9hM-GtVtPbqEys8iuBcS5zNACKXxGRmYdOMU/edit?usp=sharing"></iframe>
    </div>
</div>
@endsection

@section('scripts')

@endsection