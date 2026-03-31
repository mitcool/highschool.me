@extends('admin_template')

@section('css')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
@endsection

@section('content')

<div class="container my-3 shadow bg-white p-3">
    <h1 class="text-center">Add New Educator</h1>
    <hr/>
     <form action="{{ route('create-educator') }}" method="POST" class="educator-form">
        {{ csrf_field() }}
        <label class="font-weight-bold mb-0" for="">First Name</label>
        <input required class="form-control" name="firstname" value=""/><br>
        <label class="font-weight-bold mb-0" for="">Middle Name</label>
        <input class="form-control" name="middlename" value=""/><br>
        <label class="font-weight-bold mb-0" for="">Last Name</label>
        <input required class="form-control" name="surname" value=""/><br>
        <label class="font-weight-bold mb-0" for="">Email</label>
        <input required class="form-control" type="email" name="email" /><br>
        <label class="font-weight-bold mb-0 d-block" for="">Employment Type</label>
        <div class="mt-2 mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="employment_type" id="employment-type-freelancer" value="0" {{ old('employment_type') == '0' ? 'checked' : '' }} required>
                <label class="form-check-label" for="employment-type-freelancer">Freelancer</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="employment_type" id="employment-type-employee" value="1" {{ old('employment_type') == '1' ? 'checked' : '' }} required>
                <label class="form-check-label" for="employment-type-employee">Employee</label>
            </div>
        </div>
        <div class="form-check mb-3">
            <input type="hidden" name="is_counsellor" value="0">
            <input class="form-check-input" type="checkbox" name="is_counsellor" id="is-counsellor" value="1" {{ old('is_counsellor') == '1' ? 'checked' : '' }}>
            <label class="form-check-label font-weight-bold" for="is-counsellor">Counsellor</label>
        </div>
        <label class="font-weight-bold mb-0" for="">Categories</label>  
        <div class="text-left row mt-2"> 
            @foreach ($categories as $key => $category)
                <div class="col-md-6">
                    <input type="checkbox" class="educator-category-checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->name }} <br>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <form action="{{ route('edit-educator') }}" method="POST" class="educator-form">
                        {{ csrf_field() }}
                        <label class="font-weight-bold mb-0" for="">First Name</label>
                        <input required class="form-control" name="firstname"  value="{{ $educator->name }}"/><br>
                        <label class="font-weight-bold mb-0" for="">Middle Name</label>
                        <input class="form-control" name="middlename"  value="{{ $educator->middlename }}"/><br>
                        <label class="font-weight-bold mb-0" for="">Last Name</label>
                        <input required class="form-control" name="surname"  value="{{ $educator->surname }}"/><br>
                        <label class="font-weight-bold mb-0" for="">Email</label>
                        <input required class="form-control" type="email" name="email" value="{{ $educator->email }}" /><br>
                        <label class="font-weight-bold mb-0 d-block" for="">Employment Type</label>
                        <div class="mt-2 mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="employment_type" id="employment-type-freelancer-{{ $educator->id }}" value="0" {{ (string) $educator->employment_type === '0' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="employment-type-freelancer-{{ $educator->id }}">Freelancer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="employment_type" id="employment-type-employee-{{ $educator->id }}" value="1" {{ (string) $educator->employment_type === '1' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="employment-type-employee-{{ $educator->id }}">Employee</label>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input type="hidden" name="is_counsellor" value="0">
                            <input class="form-check-input" type="checkbox" name="is_counsellor" id="is-counsellor-{{ $educator->id }}" value="1" {{ (string) $educator->is_counsellor === '1' ? 'checked' : '' }}>
                            <label class="form-check-label font-weight-bold" for="is-counsellor-{{ $educator->id }}">Counsellor</label>
                        </div>
                        <label class="font-weight-bold mb-0" for="">Categories</label>  
                        <div class="text-left row mt-2"> 
                            @foreach ($categories as $key => $category)
                                <div class="col-md-6">
                                    <input type="checkbox" class="educator-category-checkbox" {{ $educator->array_educator_categories && in_array($category->id,$educator->array_educator_categories) ? ' checked ' : '' }} name="categories[]" value="{{ $category->id }}"> {{ $category->name }} <br>
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

@if($new_category_requests)
<div class="modal fade" id="request-category-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Please check if the educator is qualified for following categories:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table">
                @foreach ($new_category_requests as $categories )
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->educator->fullname() }}</td>
                            <td>{{ $category->category->name }}</td>
                            <td>
                                <form action="{{ route('change-educator-category-status',['approve',$category->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn-success btn">Approve</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('change-educator-category-status',['decline',$category->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn-danger btn">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>
</div>
@endif
@endsection

@section('scripts')
<script>
    $(function(){
    
    let new_category_requests = @json($new_category_requests);
    if(Object.entries(new_category_requests).length > 0){
        $('#request-category-modal').modal('show')
    }
    $('.educator-form').each(function(){
        const form = $(this);
        const categoryCheckboxes = form.find('.educator-category-checkbox');

        if (!categoryCheckboxes.length) {
            return;
        }

        const validateCategories = function() {
            const hasCheckedCategory = categoryCheckboxes.is(':checked');
            categoryCheckboxes.first()[0].setCustomValidity(hasCheckedCategory ? '' : 'Please select at least one category.');
            return hasCheckedCategory;
        };

        categoryCheckboxes.on('change', validateCategories);

        form.on('submit', function(e){
            if (!validateCategories()) {
                categoryCheckboxes.first()[0].reportValidity();
                e.preventDefault();
            }
        });

        validateCategories();
    });

});
</script>
@endsection
