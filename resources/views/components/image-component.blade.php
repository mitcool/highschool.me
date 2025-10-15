<img 
    src="{{ asset($image->src) }}"
    @if($id!="") id ="{{ $id }}" @endif
    class = "{{ $class }}"
    alt ="{{ $image->translated->alt }}"
    title="{{ $image->translated->title }}"
    style="{{ $style }}"
	width= "{{ $width }}"
	height="{{ $height }}"
	loading="{{ $loading }}"
/>


   
