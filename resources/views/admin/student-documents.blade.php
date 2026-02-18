@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">List of pending approvement students applications</h2>
    <hr>
    <ul class="list-group">

    @forelse ($students as $student )
        <li class="list-group-item d-flex align-items-center my-1 justify-content-between">
             <p class="mb-0 font-weight-bold">{{ $student->student->fullname() }} </p>
             <a href="{{ route('single-student-documents',$student->student->id) }}">Check documents</a>
        </li>
    @empty
        <li class="text-center text-primary">No pending requests</li> 
    @endforelse
    
    </ul>
</div>
@endsection

@section('scripts')
<script>
    $(".approve-button").on("click", function () {
        let document_id = $(this).attr('data-value');
        
        fetch("{{ route('approve-document','approve') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
                body: JSON.stringify({
                    document_id: document_id
                })
            })
            .then(response => response.json())
            .then(response => {
                $(`.approve-button[data-value=${response.document_id}]`).removeClass('btn-secondary').addClass('btn-success').html('Approved')
                $(`.reject-button[data-value=${response.document_id}]`).remove();
                if(response.count > 5){
                    $('#approve-student-form').removeClass('d-none');
                    $('#wrong-documents').addClass('d-none')
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
      
    });

    $(".reject-button").on("click", function () {
        let document_id = $(this).attr('data-value');
        
        fetch("{{ route('approve-document','reject') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
                body: JSON.stringify({
                    document_id: document_id
                })
            })
            .then(response => response.json())
            .then(response => {
                $(`.reject-button[data-value=${response.document_id}]`).removeClass('btn-secondary').addClass('btn-danger').html('Rejected')
                $(`.approve-button[data-value=${response.document_id}]`).removeClass('btn-success').addClass('btn-secondary').html('Approve');
                $('#wrong-document').removeClass('d-none')
                $('#approve-student-form').addClass('d-none');
                $('#document_id').val(response.document_id)
            })
            .catch(error => {
                console.error("Error:", error);
            });
      
    });
</script>

@endsection