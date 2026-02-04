@extends('template')

@section('content')

<img src="{{ asset('images/enrollment-options.png') }}" alt="" />

<div class="container-fluid bg-white box">
    <div class="container">
        <div class="text-center">
            <h1 class="page-headings">Enrollment Options</h1>
            <div class="page-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, dolores vero! Impedit aliquid nesciunt alias labore accusamus, modi incidunt itaque.</p>
            </div>
        </div>
    </div>

    <x-three-buttons/>
</div>
@endsection