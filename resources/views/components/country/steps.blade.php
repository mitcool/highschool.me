<div class="container-fluid bg-light">
     <div class="container page-content">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;padding:20px 0;">How the Recognition Process Works, Step by Step</h2>
        <p>Five steps separate the American diploma from the Bulgarian recognition certificate. Two take place in the United States, three in Bulgaria, and all of them can be arranged remotely.</p>
    
        @foreach($country->steps as $key => $step)
            <div class="row">
                <div class="col-md-1 orange border-bottom font-weight-bold"><p class="h2">0{{ $key+1 }}</p></div>
                <div class="col-md-11 border-bottom">
                    <p class="mb-0 font-weight-bold">{!! $step->text !!}</p>
                </div>
            </div>
        @endforeach
       
    </div>
</div>