<section class="row section mt-0" style="background-color:#045397">
    <div class="col-md-8 offset-md-2">
        <div class="p-3">
            <h2 class="text-center text-white section-headings">Latest Updates & News</h2>
            <hr class="white-hr">
            <div class="page-content text-white text-center">
                <p>Fresh moves. Fresh facts. Fresh edge.</p>
            </div>
            <div class="row section" id="news_box">
            @foreach($last_three_news as $news)
                <div class="col-lg-4 my-3">
                    <div class="bg-white h-100 d-flex align-items-stretch flex-column news-container"> 
                        <img loading="lazy" src="{{ asset('images/news') }}/{{ $news->image }}" 
                            class="h-auto w-100" 
                        />
                        <br>
                        <div class="news-info">
                            <h3 class="news_heading bold my-2 h5">{{$news->sections[0]->content}}</h3>
                            <p class="news_heading bold my-2">{!! $news->sections[1]->content !!}</p>
                            <div class="text-right mt-auto">
                                <hr/>
                                <a style="background-color:#EA580D" href="{{ route('single-article',$news->slug) }}" class="btn read-more">{{ trans('welcome.read-more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>
    </div>
</section>