<div class="container">
    <h2  class="font-weight-bold text-dark"  style="margin:20px 0;padding:20px 0;">Frequently Asked Questions About {{ $country->nicename }}</h2>
    @foreach ($country->faqs as $key => $faq)
        <div class="service-wrapper bg-white pl-3 pr-3">
            <div class="d-flex justify-content-between" style="padding:10px 0;font-size:1.1rem;font-weight:bold">
                <div class="orange">{{ $faq->question }}</div>
                <div>
                    <i class="fas {{ $key == 0 ? ' fa-times ' : ' fa-plus ' }} service-icon"></i>
                </div>
            </div>
            <div class="{{ $key == 0 ? ' d-flex ' : ' d-none ' }}  service-action">
                <div class="justify-content-between">
                    {!! $faq->answer !!}
                </div>
            </div>
        </div>
    @endforeach
</div>