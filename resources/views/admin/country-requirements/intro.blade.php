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
    <h2 class="text-center font-weight-bold page-headings">Add Country Page Intro</h2>
    <form action="{{ route('add-country-intro',$country->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="text-center mb-5 mt-4 row">
            <div class="col-md-12">
                <div>
                    <label for="">Meta title({{ 'en' }})</label>
                    <textarea name="meta_title[]" class="form-control">{{ $country->intro->meta_title }}</textarea>
                </div>
                <div>
                    <label for="">Meta description({{ 'en' }})</label>
                    <textarea name="meta_description[]" class="form-control">{{ $country->intro->meta_description }}</textarea>
                </div>
                <div>
                    <label for="">Intro({{ 'en' }})</label>
                    <textarea name="intro[]" class="ckeditor">{{ $country->intro->intro }}</textarea>
                </div>
                <input type="hidden" name="language[]" value="en">
            </div>
            {{-- @foreach ($country->languages as $language )
                <div class="col-md-6">
                    <div>
                        <label for="">Meta title({{ $language->language->iso }})</label>
                        <textarea name="meta_title[]" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="">Meta description({{ $language->language->iso }})</label>
                        <textarea name="meta_description[]" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="">Intro({{ $language->language->iso }})</label>
                        <textarea name="intro[]" class="ckeditor"></textarea>
                    </div>
                    <input type="hidden" name="language[]" value="{{ $language->language->iso }}">
                </div>
            @endforeach --}}
        </div>
        <div class="text-center">
            <button class="btn-info btn">Add Intro</button>
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