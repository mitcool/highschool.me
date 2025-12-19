@extends('admin_template')

@section('css')
<style>
    .service-wrapper {
        padding: 10px;
    }
</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="text-center mb-5 mt-4">
        <h2>Ambassador Activities</h2>
    </div>
    <div class="card form-card shadow mx-auto mt-5">
        @foreach($ambassador_services as $service)
            <div class="service-wrapper bg-white">
                <div class="d-flex justify-content-between" style="padding:10px 0;font-size:1.1rem;color:#045397;font-weight:bold">
                        <div>{{ $service->name }}</div>
                        <div><i class="fas fa-chevron-up open-service"></i></div>
                </div>
                <div class="service-action d-none">
                    @foreach ($service->actions as $action )
                        <div class="d-flex justify-content-between">
                            <div>{{ $action->name }}</div>
                            <div>{{ $action->value }} {{ $action->additional_information }}</div>
                        </div>
                        <hr class="my-1">
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-right mt-4">
        <a href="{{ route('admin.add-activity') }}" class="btn btn-warning">Add Activity</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.open-service').on('click',function(){
        if($(this).closest('.service-wrapper').find('.service-action').hasClass('d-none')){
            $(this).closest('.service-wrapper').find('.service-action').removeClass('d-none')
             $(this).removeClass('fa-chevron-up')
             $(this).addClass('fa-chevron-down')
        }
        else{
             $(this).closest('.service-wrapper').find('.service-action').addClass('d-none')
             $(this).removeClass('fa-chevron-down')
             $(this).addClass('fa-chevron-up')
        }
    });
</script>
@endsection