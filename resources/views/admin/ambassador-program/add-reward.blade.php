@extends('admin_template')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="text-center mb-5 mt-4">
        <h2>Add Reward</h2>
    </div>
    <div>
        <form method="POST" action="{{ route('admin.add-new-reward') }}">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label>Points</label>
                    <input type="text" name="points" class="form-control" required>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('admin.ambassador-rewards') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Add Reward</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

@endsection