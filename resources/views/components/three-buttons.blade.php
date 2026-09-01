<section class="three-buttons-wrapper">
    <div class="mx-2">
        <a href="{{ route('register') }}" class=" orange-button btn btn-lg" >{{ $texts['apply'] }}</a>
    </div>

    <div class="mx-2">
        <a href="{{ route('student-advisory-service') }}" class=" blue-button btn btn-lg call-us-btn" >{{ $texts['call'] }}</a>
    </div>

    <div class="mx-2">
        <a href="{{ asset('dummy.pdf') }}" class="mx-auto orange-button-outline btn btn-lg" download target="_blank" >{{ $texts['brochure'] }}</a>
    </div>
</section>

