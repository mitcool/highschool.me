<div class="progres-bar" style="width:100%;height:50px;border-radius:30px;display:flex;align-items:center;justify-content:space-between;margin-top:20px;background:rgb(230, 235, 231);">
    <div class="progress-bar-inner" style="width:{{ $width }}%;height:50px;border-radius:30px;display:flex;align-items:center;justify-content:center;background: linear-gradient(90deg, rgba(191,225,255,1) 0%, rgba(16,120,142,1) 100%);
;"></div>
    <p class="text-center font-weight-bold m-0">Step {{ $step }} of 15 &nbsp;</p>
</div>

<div class="row justify-content-end">
    <a href="{{ route('programs') }}" class="btn btn-secondary m-2">All Program</a>
</div>