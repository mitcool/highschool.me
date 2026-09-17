@extends('admin_template')

@section('css')
<style>
    .pagination {
        display: inline-flex!important;
    }
    label{
        font-weight: bold;
        margin-bottom: 0;
        margin-top:20px;
    }
</style>
@endsection

@section('content')
<div class="shadow container wrapper">   
    <h2 class="text-center font-weight-bold page-headings">Add Country Page Sources Section</h2>
    <hr>
    <form action="{{ route('add-country-sources',$country->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="text-center mb-5 mt-4 row">
            <div class="col-md-12">
                <label for="">Intro({{ 'en' }})</label>
                <textarea name="intro[]" class="ckeditor">{!! $country->sources->intro !!}</textarea>
                <label for="">Text({{ 'en' }})</label>
                <textarea name="text[]" class="ckeditor">{!! $country->sources->text !!}</textarea>
                <input type="hidden" name="language[]" value="en">
                    
            </div>
            {{-- @foreach ($country->languages as $language )
                <div class="col-md-6">
                    <label for="">Text({{ 'en' }})</label>
                    <textarea name="text[]" class="ckeditor"></textarea>
                    <input type="hidden" name="language[]" value="{{ $language->iso }}"> 
                </div>
            @endforeach --}}
        </div>
        <div class="text-center">
            <button class="btn-info btn">Add Sources Text</button>
        </div>
    </form>
    
</div>

@endsection

@section('scripts')
	<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

	<script>   
    $(document).ready(function(){
        $('.ckeditor').each(function(){
            CKEDITOR.replace($(this).attr('id'),);
        });
    });
	</script>
@endsection