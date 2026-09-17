<div class="container-fluid bg-light">
     <div class="container">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;padding:20px 0;">Inside the ONSITES High School Program</h2>
        <div class="row">
            @foreach($country->inside as $inside_text)
               <div class="col-md-3 mb-2">
                    
                    <div class="shadow h-100 p-3" style="border-radius: 10px;">
                        <span class="orange"> {!! $inside_text->icon !!}</span>
                        <p class="orange font-weight-bold">{{ $inside_text->heading }}</p>
                        <p>{!! $inside_text->text !!}</p>
                    </div>
                </div> 
            @endforeach

            {{--fa fa-book-open orange ,
                fas fa-exchange-alt orange,
                fa fa-bullseye orange 
                fa fa-globe orange
                fas fa-university orange
                fa fa-arrows-rotate orange
            --}}
            
        </div>
        <div class="row" style="margin:30px 0;">
            <div class="col-md"></div>
            <div class="col-md-3">
                 <div class="shadow p-2" style="border-radius: 10px;">
                    <p class="font-weight-bold">FLDOE School Code 5115</p>
                </div>
            </div>
            <div class="col-md-3">
                 <div class="shadow p-2" style="border-radius: 10px;">
                    <p class="font-weight-bold">ISO 9001:2015</p>
                </div>
            </div>
            <div class="col-md-3">
                 <div class="shadow p-2" style="border-radius: 10px;">
                    <p class="font-weight-bold">ISO 21001:2018</p>
                </div>
            </div>
            <div class="col-md"></div>
        </div>
     </div>
</div>