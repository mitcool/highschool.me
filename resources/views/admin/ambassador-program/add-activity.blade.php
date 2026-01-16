@extends('admin_template')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="text-center mb-5 mt-4">
        <h2>Add Activity</h2>
    </div>
    <div>
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label>Social Platform</label>
                    <select class="form-control">
                        @foreach($platforms as $platform)
                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-9 mt-3">
                    <label>Activity</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-3 mt-3">
                    <label>Points</label>
                    <input type="number" name="points" class="form-control">
                </div>
            </div>
            <div class="mt-3">
                <label>Additional Information</label>
                <input type="text" name="additional_info" class="form-control">
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('admin.ambassador-activities') }}" class="btn btn-danger">Cancel</a>
                <btn type='submit' class="btn btn-primary">Add Activity</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

@endsection