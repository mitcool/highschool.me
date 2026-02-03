@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="container my-3 shadow bg-white p-3">
    <h1 class="text-center">Add New Educator</h1>
    <hr/>
     <form action="{{ route('create-educator') }}" method="POST" >
        {{ csrf_field() }}
        <label class="font-weight-bold mb-0" for="">First Name</label>
        <input required class="form-control" name="firstname" value=""/><br>
        <label class="font-weight-bold mb-0" for="">Middle Name</label>
        <input class="form-control" name="middlename" value=""/><br>
        <label class="font-weight-bold mb-0" for="">Last Name</label>
        <input required class="form-control" name="surname" value=""/><br>
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
        <div class="text-center my-3">
            <hr>
            <button type="submit" class="btn btn-info my-2">Add Educator</button>
        </div>
    </form>
    <hr>
    <h2 class="text-center">List of educators</h2>
    <table class="table">
        <tr>
            <th class="text-left">Name</th>
            <th>Email</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Remove</th>
        </tr>
        @foreach($educators as $educator)
            <tr>
                <td class="text-left">{{ $educator->fullname() }}</td>
                <td>{{ $educator->email }}</td>
                <td class="text-center">
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#edit-modal-{{ $educator->id }}">Edit Educator</button>
                </td>
                <td class="text-center">
                    <form action="{{ route('delete-educator',$educator->id) }}" method="POST" class="confirm-first">
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Delete Educator</button>
                    </form>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="edit-modal-{{ $educator->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $educator->fullname() }}</h5>
                   
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <form action="{{ route('edit-educator') }}" method="POST" >
                        {{ csrf_field() }}
                        <label class="font-weight-bold mb-0" for="">First Name</label>
                        <input required class="form-control" name="firstname"  value="{{ $educator->name }}"/><br>
                        <label class="font-weight-bold mb-0" for="">Middle Name</label>
                        <input class="form-control" name="middlename"  value="{{ $educator->middlename }}"/><br>
                        <label class="font-weight-bold mb-0" for="">Last Name</label>
                        <input required class="form-control" name="surname"  value="{{ $educator->surname }}"/><br>
                        <label class="font-weight-bold mb-0" for="">Email</label>
                        <input required class="form-control" type="email" name="email" value="{{ $educator->email }}" /><br>
                        <label class="font-weight-bold mb-0" for="">Categories</label>  
                        <div class="text-left row mt-2"> 
                            @foreach ($categories as $key => $category)
                                <div class="col-md-6">
                                    <input type="checkbox" {{ $educator->array_educator_categories && in_array($category->id,$educator->array_educator_categories) ? ' checked ' : '' }} required name="categories[]" value="{{ $category->id }}"> {{ $category->name }} <br>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center my-3">
                            <hr>
                            <input type="hidden" name="id" value="{{ $educator->id }}">
                            <button type="submit" class="btn btn-info my-2">Edit Educator</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        @endforeach
    </table>
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