<section class="row">
    <div class="col-md-12">
        <img src="{{ asset('images/main.jpg') }}" alt="" class="w-100">
       {{-- <div id="slogan" style="padding:20px;">
            <h1 class="font-weight-bold "><span class="mb-3 d-inline-block">{{ trans('welcome.slogan-first-part') }}</span><br/>
           {{ trans('welcome.slogan-second-part') }}</h1>
        </div>
        <div id="main-search">
            <p>{{ trans('welcome.program-heading') }}</p>
            <select id="main-program-select" class="form-control-lg">
                <option>{{ trans('welcome.select-program-option') }}</option>
                @foreach($programs as $program)
                <option data-href="{{ route('programs-'.app()->currentLocale(),[$program->study->translated->slug,$program->translated->slug])}}">{{ $program->translated->name }}</option>
                @endforeach
            </select>

        </div> --}}
		
		{{-- <x-image-component rel="preload" fetchpriority="high" decoding="async" nickname="main-image-mobile" class="w-100" id="main_image_mobile" loading="eager"/>
        <x-image-component nickname="main-image" class="w-100 imageDesktop" id="main_image" loading="eager" /> --}}
    </div>

    <div class="col-md-12" style="background-image:url('images/BG_WORMHOLE.png');padding:40px;background-size:cover;">
        <h2 class="section-headings" style="color:#045397">ONSITES High School – Your International Online High School</h2>
        <h3 class="text-center">Learn Anywhere. Achieve Everywhere. <br> Global. Digital. Smart.</h3>
    </div>
</section>