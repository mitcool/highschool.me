@extends('admin_template')

@section('css')
<style>
    .rewards-card {
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border: none;
    }

    .reward-row {
        padding: 12px 10px;
        transition: background 0.2s ease;
    }

    .reward-row:hover {
        background-color: #f8f9fa;
    }

    .reward-points {
        color: #E9580C;
        font-weight: 600;
    }

    .section-title {
        font-weight: 600;
        color: #E9580C;
    }
</style>
@endsection

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <div class="text-center mb-5 mt-4">
        <h2>Ambassador Rewards</h2>
    </div>

    <div class="card rewards-card">
        <div class="card-body">

            <div class="section-title mb-3">
                Reward List
            </div>

            {{-- Header --}}
            <div class="row fw-bold border-bottom pb-2 mb-2">
                <div class="col-md-6">
                    Reward
                </div>
                <div class="col-md-3 text-center">
                    Points
                </div>
                <div class="col-md-3 text-end">
                    Action
                </div>
            </div>

            {{-- Rewards --}}
            @foreach($ambassador_rewards as $reward)
                <div class="row align-items-center reward-row border-bottom">
                    
                    <div class="col-md-6">
                        {{ $reward->name }}
                    </div>

                    <div class="col-md-3 text-center reward-points">
                        {{ $reward->points }}
                    </div>

                    <div class="col-md-3 text-end">
                        <a href="{{ route('admin.edit-single-reward', $reward->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            Edit
                        </a>
                    </div>

                </div>
            @endforeach

            {{-- Add Button --}}
            <div class="text-end mt-4">
                <a href="{{ route('admin.add-reward') }}"
                   class="btn btn-warning px-4">
                    + Add Reward
                </a>
            </div>

        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
</script>
@endsection