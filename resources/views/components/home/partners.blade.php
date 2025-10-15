<section class="row section" style="background-color: #F2F9FF; padding-bottom: 20px;">
    <div class="col-md-8 offset-md-2">
        <h2 class="section-headings">{{ trans('welcome.partners-section-heading') }}</h2>
        <div class="d-flex w-100 justify-content-between" id="partner_box">
            @foreach($partners as $partner)
                <div class="shadow h-100 d-flex flex-column justify-content-around partner-box align-items-stretch" style="margin-bottom:20px;">
                    <a href="{{ route('accreditation-'.app()->currentLocale()).'#'.$partner->id }}">
                        <x-image-component loading="lazy" nickname="partner-{{ $partner->id }}" class="w-100" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>