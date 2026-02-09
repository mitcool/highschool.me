@extends('admin_template')

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 900px;">
        <h3 class="text-center mb-4">
            Add Self-assessment Question
        </h3>

        <form method="POST" action="{{ route('admin.add-asses-question') }}">
            @csrf

            {{-- Course --}}
            <div class="mb-3">
                <label class="form-label">Select Course</label>
                <select class="form-control" id="course_id" name="course_id" required>
                    <option value="">Select course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Material (Filtered by course) --}}
            <div class="mb-3">
                <label class="form-label">Select Material</label>
                <select class="form-control" id="material_id" name="material_id" required disabled>
                    <option value="">Select material</option>
                </select>
                <small class="text-muted d-block mt-1" id="material_help" style="display:none;">
                    Loading materials...
                </small>
            </div>

            {{-- Question --}}
            <div class="mb-3">
                <label class="form-label">Your Question</label>
                <textarea
                    class="form-control"
                    rows="4"
                    name="question"
                    required
                ></textarea>
            </div>

            {{-- Options --}}
            <div class="mb-3">
                <label class="form-label">Option A</label>
                <input type="text" class="form-control" name="answers[]" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Option B</label>
                <input type="text" class="form-control" name="answers[]" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Option C</label>
                <input type="text" class="form-control" name="answers[]" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Option D</label>
                <input type="text" class="form-control" name="answers[]" required>
            </div>

            {{-- Correct Answer --}}
            <div class="mb-4">
                <label class="form-label d-block">Correct Answer:</label>

                <div class="d-flex gap-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="correct_answer" value="0" required>
                        <label class="form-check-label">A</label>
                    </div>

                    <div class="form-check ml-5">
                        <input class="form-check-input" type="radio" name="correct_answer" value="1">
                        <label class="form-check-label">B</label>
                    </div>

                    <div class="form-check ml-5">
                        <input class="form-check-input" type="radio" name="correct_answer" value="2">
                        <label class="form-check-label">C</label>
                    </div>

                    <div class="form-check ml-5">
                        <input class="form-check-input" type="radio" name="correct_answer" value="3">
                        <label class="form-check-label">D</label>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button class="btn btn-warning px-5 text-white fw-bold">
                    Add Question
                </button>
            </div>

        </form>
    </div>

    <div class="card shadow-sm p-4 mx-auto mt-5" style="max-width: 900px;">

        <h3 class="text-center mb-4">
            List with existing questions
        </h3>

        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Course</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $question)
                    <tr>
                        <td>{{ \Illuminate\Support\Str::limit($question->question, 70) }}</td>
                        <td>{{ $question->course->title ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.edit-single-self-assessment-question', $question->id) }}">Edit</a>
                        </td>
                        <td class="text-center">
                            <form method="POST"
                                  action="{{ route('admin.delete-self-asses-question', $question->id) }}"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                <button class="btn btn-link p-0 text-danger">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No questions found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $questions->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $('#course_id').on('change', function () {
                let courseId = $(this).val();
                let materialSelect = $('#material_id');

                materialSelect.prop('disabled', true);
                materialSelect.html('<option value="">Loading...</option>');

                if (!courseId) {
                    materialSelect.html('<option value="">Select material</option>');
                    return;
                }

                $.ajax({
                    url: "{{ route('admin.materials-by-course', ':id') }}".replace(':id', courseId),
                    type: 'GET',
                    dataType: 'json',
                    success: function (materials) {

                        materialSelect.html('<option value="">Select material</option>');

                        if (materials.length === 0) {
                            materialSelect.html('<option value="">No materials found</option>');
                            return;
                        }

                        $.each(materials, function (index, material) {
                            materialSelect.append(
                                $('<option>', {
                                    value: material.id,
                                    text: material.label
                                })
                            );
                        });

                        materialSelect.prop('disabled', false);
                    },
                    error: function () {
                        materialSelect.html('<option value="">Error loading materials</option>');
                    }
                });
            });

        });
    </script>
@endsection