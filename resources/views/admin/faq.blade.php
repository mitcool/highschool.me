@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    

    <h2 class="text-center">Add New FAQ</h2>
    <hr/>
     <form action="{{ route('add-faq') }}" method="post" >
        {{ csrf_field() }}
        @foreach(Config::get('languages') as $lang => $language)
            <label class="font-weight-bold" for="">Question({{ $lang }})</label>
            <input required class="form-control" name="question_{{ $lang }}" />
            <label class="font-weight-bold" for="">Answer({{ $lang }})</label>
            <textarea required class="ckeditor" name="answer_{{ $lang }}" id="ckeditor"></textarea>
            <label class="font-weight-bold" for="">Meta title({{ $lang }})</label>
            <textarea required class="form-control" name="meta_title_{{ $lang }}"></textarea>
            <label class="font-weight-bold" for="">Meta description({{ $lang }})</label>
            <textarea required class="form-control" name="meta_description_{{ $lang }}"></textarea>
        @endforeach

        <label class="font-weight-bold" for="">Category</label>
        <select required name="category_id" class="form-control my-2">
            @foreach($faq_categories as $category)
                <option value="{{ $category->id }}">{{ $category->key }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-secondary my-2">SAVE</button>
    </form>

    <hr style="border-top:10px solid black">
    <h1>Edit existing faqs</h1>
    <span style="color: red;">
        <h6>*Choose from the categories to open questions and answers in this category</h6>
    </span>
    <hr/>

    @foreach($faq_categories as $category)
        @php
            $category_for_format = htmlentities($category->key, null, 'utf-8');
            $formatedCategory = str_replace("&nbsp;", "", $category_for_format);
            $formatedCategory = html_entity_decode($formatedCategory);
        @endphp
        <h2>
            <a href="{{ route('edit-faq-by-category', $category->id) }}">
                <span class="font-italic text-primary">
                    {{ $formatedCategory }}
                </span>
            </a>
        </h2>
    @endforeach
@endsection
</div>
