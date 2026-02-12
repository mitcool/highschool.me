@extends('admin_template')

@section('css')
<style>
    .form-card{
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border: none;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="text-center mb-4 mt-4">
        <h2>Edit Reward</h2>
    </div>

    <div class="card form-card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.edit-reward', $reward->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <label class="mb-1">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $reward->name) }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="mb-1">Points</label>
                        <input type="number" name="points" class="form-control" value="{{ old('points', $reward->points) }}" min="0" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <a href="{{ route('admin.ambassador-rewards') }}" class="btn btn-warning">
                            Cancel
                        </a>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection
