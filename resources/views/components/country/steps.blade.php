<div class="container-fluid bg-light">
     <div class="container page-content">
        {!! $country->steps_intro->text !!}
    
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