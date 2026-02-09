@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Define order of features in "Plans table" </h2>
    @foreach ($categories as $category )
        <h4 class="text-center">{{ $category->name }}</h4>
        <form action="{{ route('features-reorder') }}" method="POST">
            {{ csrf_field() }}
             @foreach ($category->features as $feature )
                <div class="row my-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">{{ $feature->feature }}</div>
                    <div class="col-md-4">
                        <select name="order[]" id="" class="form-control">
                            @for ($i = 1 ; $i <= count($category->features) ; $i++ )
                                <option {{ $i == $feature->_order ? ' selected ' : '' }} value="{{ $i }}">{{ $i }}</option>
                            @endfor
                            <option value=""></option>
                        </select>
                        <input type="hidden" value="{{ $feature->id }}" name="ids[]">
                    </div>
                    <div class="col-md-2"></div>
                </div>
             @endforeach
            <div class="text-center">
                <button class="btn btn-info">Re-order category</button>
            </div> 
            <hr>
        </form>
       
    @endforeach
    <hr>
    
</div>


@endsection