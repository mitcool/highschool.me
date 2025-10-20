<section class="row section" style="padding-top:20px; padding-bottom:20px;background-image:url('images/BG_WORMHOLE.png')">
    <div class="col-md-8 offset-md-2">
        <div>
            <div class="p-3">
                <h2 class="section-headings">{{ trans('welcome.news-section-heading') }}</h2>
                <div class="row section" id="news_box">
                    
                    @foreach($last_three_news as $news)
                    <div class="col-lg-4">
                        <div class="bg-white h-100 d-flex align-items-stretch flex-column news-container"> 
                            <img loading="lazy"  
                                src="{{ asset('news_images') }}/{{ $news->main_image->image_src->content }}" 
                                class="h-auto w-100" 
                                alt="{{ $news->main_image->attributes ? $news->main_image->attributes->alt() : '' }}"
								title="{{ $news->main_image->attributes ? $news->main_image->attributes->title() : '' }}"
                            />
                           
                                <br><h3 class="news_heading bold my-2 text-center h5">{{$news->sections[0]->translated->content}}</h3>
							<div class="minutes d-block text-right">
                                        {{-- <p class="font-weight-bold"><i class="fas fa-clock"></i> {{ $news->minutes }} min.</p> --}}
                                    </div>
                                
                                <div>
                                    {{-- <form action="{{ route('blog-'.app()->currentLocale()) }}">
                                        <input type="hidden" name="author" value="{{ $news->author->translated->slug}}">
                                        <button class="btn btn-link text-left text-dark font-weight-bold">
                                            {{ $news->author->translated->name }}
                                        </button>
                                    </form> --}}
                                </div>
                                <div class="text-right mt-auto">
                                    <hr/>
                                    <a style="background-color:#EA580D" href="{{ route('single-article',$news->translated->slug) }}" class="btn read-more">{{ trans('welcome.read-more') }}</a>
                                </div>  
                                         
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                {{-- <div class="col-lg-12 my-3 text-center">
                    <a href="{{route('blog-'.app()->currentLocale())}}" class="read-more btn" style="background-color:#EA580D">{{ trans('welcome.view-all-button') }}</a>
                </div> --}}
            </div>
        </div>
    </div>
</section>