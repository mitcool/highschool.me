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
    <h2 class="text-center font-weight-bold page-headings">Add Country Diploma's steps</h2>
    <hr>
    <form action="{{ route('add-country-steps',$country->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="text-center mb-5 mt-4 row">
            <div class="col-md-12" id="steps-container">
                <div class="step-row">
                    <label for="">Intro</label>
                    <textarea name="intro" class="ckeditor">{{ $country->steps_intro?->text }}</textarea>
                </div>

                @php $stepCount = min(count($country->steps), 5); $stepCount = $stepCount > 0 ? $stepCount : 1; @endphp
                @for ($i = 1; $i <= $stepCount; $i++)
                    <div class="step-row">
                        <label for="">Row {{ $i }} text({{ 'en' }})</label>
                        <textarea name="text[]" id="step-text-{{ $i }}" class="ckeditor">{{ isset($country->steps[$i-1]) ? $country->steps[$i-1]->text : '' }}</textarea>
                        <input type="hidden" name="language[]" value="en">
                    </div>
                 @endfor

            </div>
            {{-- @foreach ($country->languages as $language )
                <div class="col-md-6">
                    @for ($i = 1; $i <= 5; $i++)
                         <div>
                            <label for="">Row {{ $i }} text({{ $language->language->iso }})</label>
                            <textarea name="text[]" class="ckeditor"></textarea>
                            <input type="hidden" name="language[]" value="{{ $language->language->iso }}">
                        </div>
                @endfor

                </div>
            @endforeach --}}
        </div>
        <div class="text-right mb-4">
            <button type="button" id="add-step" class="btn-secondary btn">+ Add step</button>
            <button type="button" id="remove-step" class="btn-danger btn">- Remove step</button>
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
    var MAX_STEPS = 10;
    var stepCount = $('#steps-container .step-row').length;

    function updateStepButtons(){
        $('#add-step').prop('disabled', stepCount >= MAX_STEPS);
        $('#remove-step').prop('disabled', stepCount <= 1);
    }

    function addStep(){
        if (stepCount >= MAX_STEPS) {
            return;
        }

        stepCount++;

        var html = '<div class="step-row">'
            + '<label for="">Row ' + stepCount + ' text(en)</label>'
            + '<textarea name="text[]" id="step-text-' + stepCount + '" class="ckeditor"></textarea>'
            + '<input type="hidden" name="language[]" value="en">'
            + '</div>';

        var $row = $(html).appendTo('#steps-container');

        CKEDITOR.replace('step-text-' + stepCount);

        updateStepButtons();
    }

    function removeStep(){
        if (stepCount <= 1) {
            return;
        }

        var $lastRow = $('#steps-container .step-row').last();
        var textareaId = $lastRow.find('textarea').attr('id');

        if (CKEDITOR.instances[textareaId]) {
            CKEDITOR.instances[textareaId].destroy(true);
        }

        $lastRow.remove();

        stepCount--;

        updateStepButtons();
    }

    $(document).ready(function(){
        $('.ckeditor').each(function(){
            CKEDITOR.replace($(this).attr('id'));
        });

        updateStepButtons();

        $('#add-step').on('click', addStep);
        $('#remove-step').on('click', removeStep);
    });
	</script>
@endsection