@extends('template')

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
    <ol class="bg-white breadcrumb mb-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Enrollment Criteria</li>
    </ol>
</div>

<img src="{{ asset('images/enrollment-criteria.png') }}" alt="" class="w-100" />

<div class="container-fluid bg-white box">
    <div class="container">
        <div class="text-center">
            <h1 class="page-headings">Enrollment Criteria</h1>
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