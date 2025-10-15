@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content') 
    <div class="container shadow p-3 mt-3 text-center bg-light">
    <h2>Add Student</h2>
    <p class="text-primary">* The password will be generated automaticly</p>
    <div>
        <form action="{{ route('add-ai-user')}}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <input required type="text" name="name" class="form-control my-2" placeholder="Name" required>
            <input required type="text" name="email" class="form-control my-2" placeholder="Email" required>
            <input required type="number" name="tokens" class="form-control my-2" placeholder="Tokens" required>
            <br>
            <button class="btn btn-secondary">Add Student</button>
        </form>
    </div>
    <hr>
    <h2 class="my-3">List of all users</h2>
    <table class="table text-left table-striped" style="vertical-align: center;">
        <tr>
            <th scope="row">Name</th>
            <th>Email</th>
            <th>Tokens</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($ai_users as $u )
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->tokens }}</td>
                <td class="text-warning text-center" style="cursor: pointer;" data-toggle="modal" data-target="#user-modal-{{ $u->id }}">
                    Edit
                </td>
                <td class="text-danger text-center">
                   Delete
                </td>
            </tr>
           <div class="modal fade" id="user-modal-{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <form action="{{ route('edit-ai-user',$u->id)}}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <label for="" class="font-weight-bold mb-0">Name</label>
                        <input required type="text" name="name" class="form-control my-1" placeholder="Name" required value="{{ $u->name }}">
                        <label for="" class="font-weight-bold mb-0">Email</label>
                        <input required type="text" name="email" class="form-control my-1" placeholder="Email" required value="{{ $u->email }}">
                        <label for="" class="font-weight-bold mb-0">Tokens</label>
                        <input required type="number" name="tokens" class="form-control my-1" placeholder="Tokens" required value="{{ $u->tokens }}">
                        <br>
                         <button  class="btn btn-primary">Save changes</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        @endforeach
    </table>
</div> 
@endsection