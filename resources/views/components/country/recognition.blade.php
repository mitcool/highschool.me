<div class="container-fluid ">
     <div class="container">
        <h2 class="font-weight-bold text-dark"  style="margin:40px 0;">Recognition in Bulgaria at a Glance</h2>
     </div>
    <div class="container page-content shadow" style="padding:20px;">
        @foreach ($country->recogniton as $recognition )
            <div class="row">
                <div class="col-md-3 orange border-bottom font-weight-bold">{{ $recognition->label }}</div>
                <div class="col-md-9 border-bottom">
                    {!! $recognition->text !!}
                </div>
            </div>
        @endforeach
    </div>
</div>