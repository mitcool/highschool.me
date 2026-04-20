@extends('admin_template')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 shadow">
             <h2 class="text-center page-headings">Add Staff Member</h2>
             <hr/>
            <form action="{{ route('other-staff-add') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12 my-2">
                        <label class="m-0 font-weight-bold" for="">Role</label>
                        <select name="role" required="required" class="form-control">
                            <option value="" disabled selected>-- Select Role --</option>
                            <option value="Librarians">Librarians</option>
                            <option value="Media Specialist">Media Specialist</option>
                            <option value="Administrator">Administrator</option>
                        </select>
                    </div>
                     <div class="col-md-12 my-2">
                        <label class="m-0 font-weight-bold" for="">First Name</label>
                        <input type="text" name="name" required="required" class="form-control">
                    </div>
                     <div class="col-md-12 my-2">
                        <label class="m-0 font-weight-bold" for="">Middle Name (optional)</label>
                        <input type="text" name="middlename" class="form-control">
                    </div>
                     <div class="col-md-12 my-2">
                        <label class="m-0 font-weight-bold" for="">Last Name</label>
                        <input type="text" name="surname" required="required" class="form-control">
                    </div>
                     <div class="col-md-12 my-2">
                        <label class="m-0 font-weight-bold" for="">Email</label>
                        <input type="text" name="email" required="required" class="form-control">
                    </div>
                    <hr>
                    <div class="col-md-12 text-center my-3">
                        <button class="btn btn-info">Add Member</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
      <div class="row justify-content-center">
        <div class="col-lg-10 shadow">
             <h2 class="text-center page-headings">List of Staff Members</h2>
             <hr/>
             <table class="table">
                <tr>
                    <th>Name</th>
                     <th>Email</th>
                    <th>Role</th>
                    <th colspan="2" class="text-center">Edit/Remove</th>
                </tr>
                @foreach ($other_staff as $member)
                    <tr>
                        <td>{{ $member->fullname() }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->role }}</td>
                        <td class="text-center">
                            <button class="btn-warning btn" data-toggle="modal" data-target="#other-staff-{{ $member->id }}">Edit</button>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('other-staff-delete') }}" method="POST" class="confirm-first">
                              {{ csrf_field() }}
                              <input type="hidden" value="{{ $member->id }}" name="id">
                              <button class="btn-danger btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="other-staff-{{ $member->id }}" aria-labelledby="request-category-modal-label">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="request-category-modal-label">Edit staff member</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('other-staff-edit') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <label class="m-0 font-weight-bold" for="">Role</label>
                                            <select name="role" required="required" class="form-control">
                                                <option value="" disabled selected>-- Select Role --</option>
                                                <option {{ $member->role == 'Librarians' ? 'selected' : '' }} value="Librarians">Librarians</option>
                                                <option {{ $member->role == 'Media Specialist' ? 'selected' : '' }} value="Media Specialist">Media Specialist</option>
                                                <option {{ $member->role == 'Administrator' ? 'selected' : '' }} value="Administrator">Administrator</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <label class="m-0 font-weight-bold" for="">First Name</label>
                                            <input type="text" name="name" value="{{ $member->name }}" required="required" class="form-control">
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <label class="m-0 font-weight-bold" for="">Middle Name (optional)</label>
                                            <input type="text" name="middlename" value="{{ $member->middlename }}" class="form-control">
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <label class="m-0 font-weight-bold" for="">Last Name</label>
                                            <input type="text" name="surname" value="{{ $member->surname }}" required="required" class="form-control">
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <label class="m-0 font-weight-bold" for="">Email</label>
                                            <input type="text" name="email" value="{{ $member->email }}" required="required" class="form-control">
                                        </div>
                                        <hr>
                                        <div class="col-md-12 text-center my-3">
                                            <input type="hidden" value="{{ $member->id }}" name="id">
                                            <button class="btn btn-info">Update Member</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
             </table>
        </div>
      </div>
</div>


@endsection