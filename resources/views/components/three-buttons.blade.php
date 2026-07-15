<div class="row">
    <div class="col-xl-8 offset-xl-2">
        <div class="row mx-auto" style="margin-top:20px;">
            <div class="col-xl-4 text-center my-2">
                <a href="{{ route('register') }}" class=" orange-button btn btn-lg" style="padding-left: 30px; padding-right: 30px; font-weight: 600;">{{ $texts['apply'] }}</a>
            </div>
            <div class="col-xl-4 text-center my-2">
                <a href="{{ route('student-advisory-service') }}" class=" blue-button btn btn-lg call-us-btn" style="padding-left: 30px; padding-right: 30px; font-weight: 600;">{{ $texts['call'] }}</a>
            </div>
            <div class="col-xl-4 text-center my-2">
                <a href="{{ asset('dummy.pdf') }}" class="mx-auto orange-button-outline btn btn-lg" download target="_blank" style="padding-left: 30px; padding-right: 30px; font-weight: 600;">{{ $texts['brochure'] }}</a>
            </div> 
        </div>
    </div>
</div>

