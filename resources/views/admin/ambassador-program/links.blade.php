@extends('admin_template')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container py-4">
    <div class="text-center mb-5 mt-4">
        <h2>Ambassador Program Links</h2>
    </div>
    <div id="status-message"></div>
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Date</th>
                <th>Student</th>
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
                    <td>{{ $activity->user->name }}</td>

                    <!-- Activity Type -->
                    <td>{{ $activity->action->name }}</td>

                    <!-- Link -->
                    <td>
                        <a href="{{ $activity->link }}" target="_blank" class="btn btn-link p-0">
                            View
                        </a>
                    </td>

                    <!-- Status Dropdown -->
                    <td>
                        <select class="form-control status-dropdown" data-id="{{ $activity->id }}">
                            <option value="Pending" {{ $activity->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Denied" {{ $activity->status === 'Denied' ? 'selected' : '' }}>Denied</option>
                            <option value="Approved" {{ $activity->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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