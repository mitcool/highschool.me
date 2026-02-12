@extends('admin_template')

@section('css')
<style>
    .service-wrapper{
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .service-header{
        padding:10px 0;
        font-size:1.1rem;
        color:#045397;
        font-weight:bold;
        cursor:pointer;
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

                {{-- Clickable Header --}}
                <div class="service-header d-flex justify-content-between align-items-center">
                    <div>{{ $service->name }}</div>
                    <div><i class="fas fa-chevron-down"></i></div>
                </div>

                {{-- Hidden Actions --}}
                <div class="service-action" style="display:none;">
                    @foreach ($service->actions as $action)
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
        <a href="{{ route('admin.add-activity') }}" class="btn btn-warning">
            Add Activity
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).on('click', '.service-header', function () {

    const currentWrapper = $(this).closest('.service-wrapper');
    const currentActions = currentWrapper.find('.service-action');
    const currentIcon = $(this).find('i');

    // Close all other open sections
    $('.service-wrapper').not(currentWrapper).each(function(){
        $(this).find('.service-action').slideUp(200);
        $(this).find('i')
               .removeClass('fa-chevron-up')
               .addClass('fa-chevron-down');
    });

    // Toggle current section
    currentActions.stop(true, true).slideToggle(200);
    currentIcon.toggleClass('fa-chevron-up fa-chevron-down');
});
</script>
@endsection
