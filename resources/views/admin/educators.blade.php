@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="container text-center my-3 shadow bg-light p-3">
    <h1>Add New Educator</h1>
    <hr/>
     <form action="{{ route('create-educator') }}" method="POST" >
        {{ csrf_field() }}
        <label class="font-weight-bold mb-0" for="">First Name</label>
        <input required class="form-control" name="firstname" /><br>
        <label class="font-weight-bold mb-0" for="">Middle Name</label>
        <input class="form-control" name="middlename" /><br>
        <label class="font-weight-bold mb-0" for="">Last Name</label>
        <input required class="form-control" name="surname" /><br>
        <label class="font-weight-bold mb-0" for="">Email</label>
        <input required class="form-control" type="email" name="email" /><br>
        <label class="font-weight-bold mb-0" for="">Categories</label>  
        <div class="text-left row mt-2"> 
            @foreach ($categories as $key => $category)
                <div class="col-md-6">
                    <input type="checkbox" required name="categories[]" value="{{ $category->id }}"> {{ $category->name }} <br>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-info my-2">Add Educator</button>
    </form>

@endsection

@section('scripts')
<script>
    $(function(){

    var requiredCheckboxes = $(':checkbox[required]');

    requiredCheckboxes.change(function(){

        if(requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        }

        else {
            requiredCheckboxes.attr('required', 'required');
        }
    });

});
</script>
@endsection