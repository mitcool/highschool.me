<section class="row space" style="background-color: #045397;color:white;">
    <div class="col-md-12">
        <h2 class="text-center  section-headings text-white" >{{ $texts['journey-heading'] }}</h2>
        <hr class="white-hr" class="my-4">
        <div class="page-content text-center">
            <p>{{ $texts['journey-content'] }}</p>
        </div>
        
        <div class="container" style="margin-top:40px;">
            <div class="row">
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="text-center">
                        <x-image-component nickname="journey-1" class="welcome-icon w-auto" loading="eager" />
                        {!! $texts['journey-1'] !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="text-center">
                        <x-image-component nickname="journey-2" class="welcome-icon w-auto" loading="eager" />
                        {!! $texts['journey-2'] !!}
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="text-center">
                        <x-image-component nickname="journey-3" class="welcome-icon w-auto" loading="eager" />
                        {!! $texts['journey-3'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

