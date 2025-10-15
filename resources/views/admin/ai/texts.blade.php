@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content') 
    <div class="container shadow p-3 mt-3 text-center bg-light">
    <h2>Edit texts</h2>
    <form action="{{ route('edit-ai-text') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            @foreach($texts as $text)
                <div class="col-md-6">
                    <label for="" class="font-weight-bold">{{ $text->title }}</label>
                    <textarea required name="text_en[]" id="" cols="30" rows="10" class="{{ $text->editor == 1 ? 'ckeditor' : 'form-control' }}">{!! $text->text_en !!}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="" class="font-weight-bold">{{ $text->title }}</label>
                    <textarea required name="text_de[]" id="" cols="30" rows="10" class="{{ $text->editor == 1 ? 'ckeditor' : 'form-control' }}">{!! $text->text_de !!}</textarea>
                </div>
                <input type="hidden" value="{{ $text->id }}" name="ids[]">
            @endforeach
        </div>

        <div class="text-center">
            <hr>
            <button class="btn btn-info">Edit texts</button>
        </div>
       
    </form>
    
</div> 
@endsection