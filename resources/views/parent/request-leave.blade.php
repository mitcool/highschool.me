@extends('parent.dashboard')

@section('css')
<style>
    label{
        font-weight: 500;
        margin-bottom: 6px;
    }
    .form-control{
        border-radius: 6px;
        border-color:#333;
    }
    textarea.form-control{
        height: 150px;
        resize: none;
    }
    .file-row .custom-file { max-width: 520px; }
    .date-input{
        width: 110px;
    }
    .btn-cancel{
        border:1px solid #2f7be8;
        color:#0b5ed7;
        background:#fff;
        border-radius: 10px;
        padding: 10px 22px;
    }
    .btn-submit{
        background:#f05a00;
        border-color:#f05a00;
        color:#fff;
        border-radius: 10px;
        padding: 10px 22px;
    }
    .actions{
        display:flex;
        justify-content:flex-end;
        align-items:center;
        gap: 16px;
    }
</style>
@endsection

@section('content')
<div class="container jumbotron bg-white">
    <form action="{{ route('parent.store-leave') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="shadow page-content" style="padding:20px;">
            <div class="form-group">
                <label for="children">Children</label>
                <select id="children" class="form-control" name="student_id" required>
                    @foreach (auth()->user()->students as $student )
                        <option value="{{ $student->student_id }}">{{ $student->student->name }} {{ $student->student->surname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="leaveType">Type</label>
                <select id="leaveType" class="form-control" name="leave_type" required>
                    <option value="1">Leave of Absence (Medical)</option>
                    <option value="2">Leave of Absence (Personal)</option>
                </select>
            </div>

            <div class="form-group file-row">
                <label>File</label>
                <div class="d-flex align-items-center">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="leaveFile" name="file" required>
                        <label class="custom-file-label" for="leaveFile">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="leaveMessage">Message:</label>
                <textarea id="leaveMessage" class="form-control" name="message" required></textarea>
            </div>

            <div class="d-flex align-items-end justify-content-between flex-wrap">
                <div class="d-flex flex-wrap" style="gap:50px;">
                    <div class="form-group mb-0">
                        <label for="startDate">Start date:</label>
                        <input id="startDate" type="date" class="form-control date-input" name="start_date" required>
                    </div>
                    <div class="form-group mb-0">
                        <label for="endDate">End date:</label>
                        <input id="endDate" type="date" class="form-control date-input" name="end_date" required>
                    </div>
                </div>

                <div class="actions mt-3 mt-md-0">
                    <button type="button" class="btn btn-cancel">Cancel</button>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $('#leaveFile').on('change', function () {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName || "Choose file");
    });
</script>
@endsection