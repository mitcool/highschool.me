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
    <h2 class="text-center font-weight-bold page-headings">Add Country Page Diploma</h2>
    <form action="{{ route('add-country-diploma',$country->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="text-center mb-5 mt-4 row">
            <div class="col-md-12">
                <div>
                    <label for="">First Section({{ 'en' }})</label>
                    <textarea name="first_section[]" class="ckeditor">{{ $country->diploma->first_section }}</textarea>
                </div>
                <div>
                    <label for="">Second Section({{ 'en' }})</label>
                    <textarea name="second_section[]" class="ckeditor">{{ $country->diploma->second_section }}</textarea>
                </div>
                <div>
                    <label for="">Third Section({{ 'en' }})</label>
                    <textarea name="third_section[]" class="ckeditor">{{ $country->diploma->third_section }}</textarea>
                </div>
                 <div>
                    <label for="">Fourth Section({{ 'en' }})</label>
                    <textarea name="fourth_section[]" class="ckeditor">{{ $country->diploma->fourth_section }}</textarea>
                </div>
                 <div>
                    <label for="">Fifth Section({{ 'en' }})</label>
                    <textarea name="fifth_section[]" class="ckeditor">{{ $country->diploma->fifth_section }}</textarea>
                </div>
                <input type="hidden" name="language[]" value="en">
            </div>
            {{-- @foreach ($country->languages as $language )
                <div class="col-md-6">
                    <div>
                        <label for="">First Section({{ $language->language->iso }})</label>
                        <textarea name="first_section[]" class="ckeditor"></textarea>
                    </div>
                    <div>
                        <label for="">Second Section({{ $language->language->iso }})</label>
                        <textarea name="second_section[]" class="ckeditor"></textarea>
                    </div>
                    <div>
                        <label for="">Third Section({{ $language->language->iso }})</label>
                        <textarea name="third_section[]" class="ckeditor"></textarea>
                    </div>
                    <div>
                        <label for="">Fourth Section({{ $language->language->iso }})</label>
                        <textarea name="fourth_section[]" class="ckeditor"></textarea>
                    </div>
                    <div>
                        <label for="">Fifth Section({{ $language->language->iso }})</label>
                        <textarea name="fifth_section[]" class="ckeditor"></textarea>
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