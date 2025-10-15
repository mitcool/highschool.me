<div>
    <div class="row ">
        <div class="col-md-1"></div>
        <div class="col-md-10"  style="background:var(--orange-color);color:white;padding:30px;text-align:center;border-radius:20px">
            <h3 class="text-center mb-0">{{$program->translated->name}}</h3>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row" style="margin-top:-10px;">
                @foreach($categories as $category)
                <div class="col-md-4 mb-2">
                    <a href="">
                        <div style="background:var(--blue-color);color:white;border-radius:10px;">
                            <h5 class="text-center" style="padding:10px;font-size:0.9rem;">{{ $category->category->name }}</h5>
                        </div>
                        @foreach ($category->jobs as $key => $job)
                            <a href="">
                                <div @if($key < 6) class="blue-box" @endif style="background:var(--blue-color);color:white;border-radius:10px;">
                                    <h5 class="text-center" style="padding:10px;font-size:0.9rem;">{{ $job->job->name }}</h5>
                                </div>
                            </a>
                        @endforeach
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>