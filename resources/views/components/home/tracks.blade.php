<section class="row space" style="background-color: #E9580C;color:white;">   
     <div class="col-md-12">
        <h2 class="text-center section-headings text-white" >{{ $texts['tracks-heading'] }}</h2>
        <hr class="white-hr" class="mt-4">
        <div class="page-content text-center page-content">
            {!! $texts['tracks-content'] !!}
         </div>
        
        <div class="container" style="margin-top:40px;">
            <div class="row">
        <div class="col-md-3 col-sm-6 mt-3">
        <div class="text-center">
            <x-image-component nickname="track-2" class="welcome-icon w-auto" loading="eager" />          
            <p class="h5">{{ $texts['tracks-1'] }}</p>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mt-3">
        <div class="text-center">
            <x-image-component nickname="track-1" class="welcome-icon w-auto" loading="eager" />
            <p class="h5">{{ $texts['tracks-2'] }}</p>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mt-3">
        <div class="text-center">
            <x-image-component nickname="track-3" class="welcome-icon w-auto" loading="eager" />
            <p class="h5">{{ $texts['tracks-3'] }} </p>
        </div>
    </div>
   
    <div class="col-md-3 col-sm-6 mt-3">
        <div class="text-center">
            <x-image-component nickname="track-4" class="welcome-icon w-auto" loading="eager" />
            <p class="h5">{{ $texts['tracks-4'] }}
            </p>
        </div>
    </div>

</div>
            
        </div>
    </div>
    
</section>

