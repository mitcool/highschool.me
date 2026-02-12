@extends('admin_template')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <div class="text-center mb-5 mt-4">
        <h2>Ambassador Program Links</h2>
    </div>
    <div id="status-message"></div>
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Date</th>
                <th>Student</th>
                <th>Platform</th>
                <th>Type</th>
                <th>Link</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <!-- Date -->
                    <td>{{ $activity->created_at->format('F d, Y') }}</td>

                    <!-- Student -->
                    <td>{{ $activity->user->name }} {{ $activity->user->surname }}</td>

                    <!-- Activity Type -->
                    <td>
                        {{ optional($activity->service)->name }}
                    </td>
                    <!-- Activity Type -->
                    <td>
                        @if(!$activity->action)
                            {{ $activity->link }}
                        @else
                            {{ $activity->action->name ?? '—' }}
                        @endif
                    </td>

                    <!-- Link -->
                    <td>
                        @if(!$activity->service_id)
                            -
                        @else
                            <a data-toggle="modal" data-target="#confirmModal-{{$activity->id}}" class="btn btn-link p-0">
                                View
                            </a>
                        @endif
                    </td>

                    <!-- Status Dropdown -->
                    <td>
                        @if(!$activity->action)

                        @else
                            <select class="form-control status-dropdown" data-id="{{ $activity->id }}">
                                <option value="Pending" {{ $activity->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Denied" {{ $activity->status === 'Denied' ? 'selected' : '' }}>Denied</option>
                                <option value="Approved" {{ $activity->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                            </select>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach($activities as $activity)
    <div class="modal fade" id="confirmModal-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="border-radius:10px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalTitle">Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="confirmModalBody">
                    <span style="text-wrap: wrap;">
                        Are you sure you want to visit the following link:<br>
                        {{ $activity->link }}
                    </span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <a id="confirmModalBtn" class="btn btn-primary" href="{{ $activity->link }}" target="_blank">Confirm</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

@section('scripts')
<script>
    $(document).on('change', '.status-dropdown', function () {
        let id = $(this).data('id');
        let status = $(this).val();

        $.ajax({
            url: "{{ route('admin.update-ambassador-activity') }}",
            method: "POST",
            data: {
                id: id,
                status: status,
                _token: "{{ csrf_token() }}"
            },
            success: function () {

                let alertBox = $(`
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        ✔️ Status updated successfully!
                    </div>
                `);

                $('#status-message').html(alertBox);

                // Auto-hide after 3 seconds
                setTimeout(function () {
                    alertBox.alert('close');
                }, 3000);
            },
            error: function () {

                let alertBox = $(`
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        ❌ Error updating status. Please try again.
                    </div>
                `);

                $('#status-message').html(alertBox);

                // Auto-hide after 3 seconds
                setTimeout(function () {
                    alertBox.alert('close');
                }, 3000);
            }
        });
    });
</script>
@endsection