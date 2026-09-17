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
    <h2 class="text-center font-weight-bold page-headings">Add Country Page Recognition Section</h2>
    <hr>
    <form action="{{ route('add-country-recognition',$country->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="text-center mb-5 mt-4 row">
            <div class="col-md-12">
                @for ($i = 1; $i <= 10; $i++)
                    <div>
                        <label for="">Row {{ $i }} orange label({{ 'en' }})</label>
                        <textarea name="label[]" class="form-control">{{ $country->recogniton[$i-1]->label }}</textarea>
                    </div>
                    <div>
                        <label for="">Row {{ $i }} text({{ 'en' }})</label>
                        <textarea name="text[]" class="ckeditor">{{ $country->recogniton[$i-1]->text }}</textarea>
                        <input type="hidden" name="language[]" value="en">
                    </div>
                 @endfor
               
            </div>
            {{-- @foreach ($country->languages as $language )
                <div class="col-md-6">
                    @for ($i = 1; $i <= 10; $i++)
                        <div>
                            <label for="">Row {{ $i }} orange label({{ $language->language->iso }})</label>
                            <textarea name="label[]" class="form-control"></textarea>
                        </div>
                        <div>
                            <label for="">Row {{ $i }} text({{ $language->language->iso }})</label>
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