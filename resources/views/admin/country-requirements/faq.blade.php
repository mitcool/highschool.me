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
    <h2 class="text-center font-weight-bold page-headings">Add Country Page FAQ</h2>
    <form action="{{ route('add-country-faq',$country->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="text-center mb-5 mt-4 row">
            <div class="col-md-12">
                @if(count($country->faqs) > 0)
                    @foreach ($country->faqs as $i => $faq)
                        <div>
                            <label for="">Question {{ $i+1 }}({{ 'en' }})</label>
                            <input name="question[]" class="form-control" value="{{ $faq->question }}">
                            <label for="">Answer {{ $i+1 }}({{ 'en' }})</label>
                            <textarea name="answer[]" class="ckeditor">{{ $faq->answer }}</textarea>
                        </div>
                        <input type="hidden" name="language[]" value="en">
                    @endforeach
                @else
                    @for ($i = 0; $i < 8; $i++)
                        <div>
                            <label for="">Question {{ $i+1 }}({{ 'en' }})</label>
                            <input name="question[]" class="form-control">
                            <label for="">Answer {{ $i+1 }}({{ 'en' }})</label>
                            <textarea name="answer[]" class="ckeditor"></textarea>
                        </div>
                        <input type="hidden" name="language[]" value="en">
                    @endfor
                @endif
            </div>
           
            
            {{-- @foreach ($country->languages as $language )
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
        <div class="text-right">
            <button class="btn-info btn">Save & Continue</button>
        </div>
    </form>
    <div class="text-left py-4">
        <a href="{{ route('single-country-inside',$country->id) }}" class="btn btn-secondary">&larr; Back</a>
    </div>
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