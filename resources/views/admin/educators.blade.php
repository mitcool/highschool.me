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
        <input required class="form-control" name="firstname" value="{{ old('firstname') }}"/><br>
        <label class="font-weight-bold mb-0" for="">Middle Name</label>
        <input class="form-control" name="middlename" value="{{ old('middlename') }}"/><br>
        <label class="font-weight-bold mb-0" for="">Last Name</label>
        <input required class="form-control" name="surname" value="{{ old('surname') }}"/><br>
        <label class="font-weight-bold mb-0" for="">Email</label>
        <input required class="form-control" type="email" name="email" value="{{ old('email') }}" /><br>
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
        <h4 class="mt-4">Billing Details</h4>
        <label class="font-weight-bold mb-0" for="">Country</label>
        <select name="country_id" required class="form-control">
            <option value="" selected disabled>Please select</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ (string) old('country_id') === (string) $country->id ? 'selected' : '' }}>
                    {{ $country->nicename }}
                </option>
            @endforeach
        </select><br>
        <label class="font-weight-bold mb-0" for="">City</label>
        <input required class="form-control" name="city" value="{{ old('city') }}"/><br>
        <label class="font-weight-bold mb-0" for="">Street</label>
        <input required class="form-control" name="street" value="{{ old('street') }}"/><br>
        <label class="font-weight-bold mb-0" for="">Street Number</label>
        <input required class="form-control" name="street_number" value="{{ old('street_number') }}"/><br>
        <label class="font-weight-bold mb-0" for="">Zip Code</label>
        <input required class="form-control" name="zip" value="{{ old('zip') }}"/><br>
        <label class="font-weight-bold mb-0 d-block" for="">Phone Number</label>
        <div class="row">
            <div class="col-md-4">
                <select name="phone_code" class="form-control" required>
                    <option value="" selected disabled>Please select a phone code</option>
                    @foreach ($countries as $country)
                        <option value="+{{ $country->phonecode }}" {{ old('phone_code') == '+'.$country->phonecode ? 'selected' : '' }}>
                            {{ $country->nicename }} +{{ $country->phonecode }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <input required class="form-control" name="phone" value="{{ old('phone') }}"/>
            </div>
        </div>
        <br>
        <label class="font-weight-bold mb-0" for="">Categories</label>  
        <div class="text-left row mt-2"> 
            @foreach ($categories as $key => $category)
                <div class="col-md-6">
                    <input type="checkbox" class="educator-category-checkbox" name="categories[]" value="{{ $category->id }}" {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}> {{ $category->name }} <br>
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
            <th class="text-center">Payments</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Remove</th>
        </tr>
        @foreach($educators as $educator)
            <tr>
                <td class="text-left">{{ $educator->fullname() }}</td>
                <td>{{ $educator->email }}</td>
                <td class="text-center">
                    <a class="btn btn-info" href="{{ route('pay-to-educator', $educator->id) }}">Payments</a>
                </td>
                <td class="text-center">
                    <button class="btn btn-warning"  data-toggle="modal" data-target="#edit-modal-{{ $educator->id }}">Edit</button>
                </td>
                <td class="text-center">
                    <form action="{{ route('delete-educator',$educator->id) }}" method="POST" class="confirm-first">
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    @foreach($educators as $educator)
        <div class="modal fade" id="edit-modal-{{ $educator->id }}" tabindex="-1" aria-labelledby="edit-modal-label-{{ $educator->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-modal-label-{{ $educator->id }}">{{ $educator->fullname() }}</h5>
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
                            <h4 class="mt-4">Billing Details</h4>
                            <label class="font-weight-bold mb-0" for="">Country</label>
                            <select name="country_id" required class="form-control">
                                <option value="" selected disabled>Please select</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ optional($educator->invoice_details)->country_id == $country->id ? 'selected' : '' }}>
                                        {{ $country->nicename }}
                                    </option>
                                @endforeach
                            </select><br>
                            <label class="font-weight-bold mb-0" for="">City</label>
                            <input required class="form-control" name="city" value="{{ optional($educator->invoice_details)->city }}"/><br>
                            <label class="font-weight-bold mb-0" for="">Street</label>
                            <input required class="form-control" name="street" value="{{ optional($educator->invoice_details)->street }}"/><br>
                            <label class="font-weight-bold mb-0" for="">Street Number</label>
                            <input required class="form-control" name="street_number" value="{{ optional($educator->invoice_details)->street_number }}"/><br>
                            <label class="font-weight-bold mb-0" for="">Zip Code</label>
                            <input required class="form-control" name="zip" value="{{ optional($educator->invoice_details)->zip }}"/><br>
                            <label class="font-weight-bold mb-0 d-block" for="">Phone Number</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="phone_code" class="form-control" required>
                                        <option value="" selected disabled>Please select a phone code</option>
                                        @foreach ($countries as $country)
                                            <option value="+{{ $country->phonecode }}" {{ optional($educator->invoice_details)->phone_code == '+'.$country->phonecode ? 'selected' : '' }}>
                                                {{ $country->nicename }} +{{ $country->phonecode }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input required class="form-control" name="phone" value="{{ optional($educator->invoice_details)->phone }}"/>
                                </div>
                            </div>
                            <br>
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
        </div>
    @endforeach

@if($new_category_requests)
<div class="modal fade" id="request-category-modal" aria-labelledby="request-category-modal-label">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="request-category-modal-label">Please check if the educator is qualified for following categories:</h5>
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
