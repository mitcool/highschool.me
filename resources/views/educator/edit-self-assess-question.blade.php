@extends('educator.dashboard')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 900px;">

        <h3 class="text-center mb-4">
            Edit Self-assessment Question 
        </h3>

        <form method="POST" action="{{ route('educator.self-assessment-update', $question->id) }}">
            @csrf

            {{-- Course --}}
            <div class="mb-3">
                <label class="form-label">Course</label>
                <select class="form-control" id="course_id" name="course_id">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"
                            {{ $course->id == $question->course_id ? 'selected' : '' }}>
                            {{ $course->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Material --}}
            <div class="mb-3">
                <label class="form-label">Material</label>
                <select class="form-control" id="material_id" name="material_id" required>
                    <option value="">Loading materials...</option>
                </select>
            </div>

            {{-- Question --}}
            <div class="mb-3">
                <label class="form-label">Question</label>
                <textarea class="form-control" rows="4" name="question">{{ $question->question }}</textarea>
            </div>

            {{-- Answers --}}
            @foreach($question->answers as $index => $answer)
                <div class="mb-3">
                    <label class="form-label">Option {{ chr(65 + $index) }}</label>
                    <input type="text" class="form-control" name="answers[]" value="{{ $answer->answer }}">
                </div>
            @endforeach

            {{-- Correct --}}
            <div class="mb-4">
                <label class="form-label d-block">Correct Answer</label>
                <div class="d-flex gap-5">
                    @foreach($question->answers as $index => $answer)
                        <div class="form-check ml-5">
                            <input class="form-check-input"
                                   type="radio"
                                   name="correct_answer"
                                   value="{{ $index }}"
                                   {{ $answer->is_correct ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ chr(65 + $index) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-warning px-5 text-white fw-bold">
                    Update Question
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('educator.self-assessment') }}" class="btn btn-danger px-5 text-white fw-bold">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            const currentMaterialId = "{{ $question->material_id }}";

            function loadMaterials(courseId, selectedMaterial = null) {
                let materialSelect = $('#material_id');

                materialSelect.prop('disabled', true);
                materialSelect.html('<option>Loading...</option>');

                $.ajax({
                    url: "{{ route('educator.materials-by-course', ':id') }}".replace(':id', courseId),
                    type: 'GET',
                    dataType: 'json',
                    success: function (materials) {

                        materialSelect.empty();
                        materialSelect.append('<option value="">Select material</option>');

                        $.each(materials, function (_, material) {
                            let option = $('<option>', {
                                value: material.id,
                                text: material.label
                            });

                            if (material.id == selectedMaterial) {
                                option.prop('selected', true);
                            }

                            materialSelect.append(option);
                        });

                        materialSelect.prop('disabled', false);
                    },
                    error: function () {
                        materialSelect.html('<option>Error loading materials</option>');
                    }
                });
            }

            // Initial load (edit page)
            loadMaterials($('#course_id').val(), currentMaterialId);

            // Reload on course change
            $('#course_id').on('change', function () {
                loadMaterials($(this).val());
            });

        });
    </script>


@endsection