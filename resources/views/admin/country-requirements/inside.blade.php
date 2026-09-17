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
    <h2 class="text-center font-weight-bold page-headings">Add Country Page Inside Table</h2>
    <form action="{{ route('add-country-inside',$country->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="text-center mb-5 mt-4 row">
            <div class="col-md-12">
                @for ($i = 0; $i < 8; $i++)
                    <div>
                        <label for="">Icon {{ $i+1 }}({{ 'en' }})</label>
                        <input name="icon[]" class="form-control" value="{{ $country->inside[$i]->icon }}">
                        <label for="">Orange Heading {{ $i+1 }}({{ 'en' }})</label>
                        <input name="heading[]" class="form-control" value="{{ $country->inside[$i]->heading }}">
                        <label for="">Box Text {{ $i+1 }}({{ 'en' }})</label>
                        <textarea name="text[]" class="ckeditor">{!! $country->inside[$i]->text !!}</textarea>
                    </div>
                    <input type="hidden" name="language[]" value="en">
                @endfor
            </div>
           
{{--             
            @foreach ($country->languages as $language )
                <div class="col-md-6">
                     @for ($i = 0; $i < 8; $i++)
                        <div>
                            <label for="">Icon {{ $i+1 }}({{ $language->language->iso }})</label>
                            <input name="icon" class="form-control">
                            <label for="">Box {{ $i+1 }}({{ $language->language->iso }})</label>
                            <textarea name="text[]" class="ckeditor"></textarea>
                        </div>
                        <input type="hidden" name="language[]" value="{{ $language->language->iso }}">
                   @endfor
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