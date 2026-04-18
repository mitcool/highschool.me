<section class="row space" style="background-color: #045397;">
    <div class="col-md-10 offset-md-1" >
        <!-- <div class="d-flex" id="benefit_wrapper"> -->
        <div class="text-center page-content text-white">
            <h2 class="text-white section-headings">
                {{ $texts['benefits-heading'] }}
            </h2>
            <hr class="white-hr">
            <p>{{ $texts['benefits-content'] }}</p><br>
        </div>
        <div class="row col-md-12 ml-0 mr-0 mb-2" >
            <div class="col-xl-3  text-center mt-2 ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/benefit-1.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['benefits-box-1'] }} </h3>
                    <!-- Removing <p></p> becuase ck3 editor put <p> and become 3x time more -->
                </div>
            </div>
            <div class="col-xl-3 text-center mt-2 ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/benefit-2.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['benefits-box-2'] }} </h3>
                </div>
            </div>
            <div class="col-xl-3 text-center mt-2">
                <div class="benefit-box">
                     <img src="{{ asset('images/icons/benefit-3.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['benefits-box-3'] }} </h3>
                </div>
            </div>
             <div class="col-xl-3 text-center mt-2 ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/benefit-4.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">{{ $texts['benefits-box-4'] }} </h3>
                </div>
            </div>
        </div>
    </div>
</section>