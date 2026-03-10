@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    

    <h1>Edit FAQ</h1>
    
    @foreach($faqs as $faq)
        
        <hr>
        <form action="{{ route('edit-faq',$faq->id) }}" method="POST">
            {{ csrf_field() }}
            <input required  name="question" class="form-control" id="ckeditor-{{ $faq->id }}" value="{{$faq->question }}" />
            <label class="font-weight-bold" for="">Answer</label>
            <textarea required name="answer"  class="ckeditor" id="ckeditor-{{ $faq->id }}">{{ $faq->answer }}</textarea>
            {{--
            <label class="font-weight-bold" for="">Meta title</label>
            <textarea class="form-control" name="meta_title">{{ $faq->meta_title }}</textarea>
            <label class="font-weight-bold" for="">Meta description</label>
            <textarea class="form-control" name="meta_description">{{ $faq->meta_description }}</textarea>
            --}}
            <select name="category_id" class="form-control">
                @foreach($faq_categories as $category)
                    <option {{ $category->id == $faq->category_id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->key }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-secondary my-2">SAVE</button>
        </form>
        <form method="POST" action="{{ route('delete-faq', $faq->id) }}">
            <button type="submit" class="btn btn-danger my-2">DELETE</button>
        </form>
        <hr style="border: 2px solid black;">
    @endforeach
@endsection
</div>
