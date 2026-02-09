@extends('admin_template')

@section('content')

<div class=" container border bg-white" style="margin-top:50px;padding:20px;">    
    <h2 class="text-center">Documents </h2>
    <h5 class="text-center text-primary"> <span class="font-weight-bold">Student:</span> <span class="font-italic">"{{ $student->student->name }} {{ $student->student->surname }}"</span> </h5>
    <h5 class="text-center text-primary"> <span class="font-weight-bold">Parent:</span> <span class="font-italic">"{{ $student->parent->name }} {{ $student->parent->surname }}"</span> </h5>
    <hr>
        
       <table class="table table-striped">
            @foreach ($student->student->documents as $document )
                <tr>
                    <td class="font-weight-bold">{{ $document->document_type->name }}:</td> 
                    <td><a target="_blank" href="{{ asset('documents') }}/{{ $student->student_id }}/{{ $document->file }}">{{ $document->file }}</a></td>
                    <td class="text-center"> 
                        <button 
                            class="approve-button btn  @if($document->is_approved == 1) btn-success @else btn-secondary @endif"  
                            data-value="{{ $document->id }}">@if($document->is_approved == 1) Approved @else Approve @endif
                        </button>
                    </td>
                           
                    <td class="text-center">
                        @if($document->is_approved != 1)
                        <button class="reject-button btn @if($document->is_approved == 2) btn-danger @else btn-secondary @endif"  data-value="{{ $document->id }}">@if($document->is_approved == 2) Rejected @else Reject @endif</button></td>
                        @endif
                </tr>
            @endforeach
        </table>
      
        <hr>
        <form action="{{ route('approve.student',$student->student_id) }}" method="POST" class="text-center my-3 {{ $student->approved_documents_count() > 5 ? ' d-block ' : 'd-none' }} " id="approve-student-form">
            {{ csrf_field() }}
            <div class="">
                <input type="checkbox" name="is_disabled"> IEP / 504
            </div>
            <button class="btn btn-info mt-4">Approve Student</button>
        </form>
      
         <form action="{{ route('wrong-document') }}" method="POST" class="text-center my-3 {{ $student->rejected_documents_count() > 0 ? ' d-block ' : 'd-none' }}" id="wrong-document">
            {{ csrf_field() }}
            <div>
               <label class="font-weight-bold" for="">Feedback</label>
               <textarea name="feedback" id="" cols="30" rows="10" class="form-control"></textarea>
               <input type="hidden" name="student_id" value="{{ $student->student_id }}">
               <input type="hidden" name="parent_id" value="{{ $student->parent_id }}">
            </div>
            <button class="btn btn-dark mt-2">Send Feedback</button>
        </form>
   

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
                    $('#wrong-document').addClass('d-none')
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
            })
            .catch(error => {
                console.error("Error:", error);
            });
      
    });
</script>

@endsection