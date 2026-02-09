@extends('admin_template')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <div class="text-center mb-5 mt-4">
        <h2>Ambassador Rewards</h2>
    </div>
    <div class="d-flex justify-content-between" style="color:#14213D;font-weight:bold;color:#E9580C;padding:10px 0;">
        <div>Reward List</div> 
        <div><i class="fas fa-chevron-up" id="open-rewards"></i></div>
    </div> 
    <div id="rewards" class="">
        <div class="d-flex justify-content-between" style="color:#14213D;font-weight:bold">
            <div>Reward</div> 
            <div>Points</div>
        </div> 

        <hr class="my-1">

        @foreach($ambassador_rewards as $reward)
            <div class="d-flex justify-content-between">
                <div>{{ $reward->name }}</div> 
                <div style="color:#E9580C;font-weight:bold">{{ $reward->points }}</div>
            </div> 
        <hr class="my-1">
        @endforeach
    </div>
    <div class="text-right mt-4">
        <a href="{{ route('admin.add-reward') }}" class="btn btn-warning">Add Reward</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#open-rewards').on('click',function(){
        if($('#rewards').hasClass('d-none')){
             $('#rewards').removeClass('d-none');
             $(this).removeClass('fa-chevron-up')
             $(this).addClass('fa-chevron-down')
        }
        else{
             $('#rewards').addClass('d-none');
             $(this).removeClass('fa-chevron-down')
             $(this).addClass('fa-chevron-up')
        }
    });
</script>
@endsection