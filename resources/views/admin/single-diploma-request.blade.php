@extends('admin_template')

@section('content')

<div class=" container shadow bg-white" style="margin-top:50px;padding:20px;">    
    <h4 class="text-center" style="color:#045397;padding:10px 0;">{{ $request->type->name }} Request</h4>

    <div class="text-right">
        @if($request->service_type == 2)
            <a href="{{ route('enrollment-confirmation',$request->student_id) }}" class="btn btn-secondary my-2"><i class="fas fa-print"></i> Print</a>
        @elseif($request->service_type == 7)
            <a href="{{ route('parent.request-verification-of-graduation-pdf',$request->student_id) }}" class="btn btn-secondary my-2"><i class="fas fa-print"></i> Print</a>
        @elseif($request->service_type == 3 || $request->service_type == 4 || $request->service_type == 5 )
            <a href="{{ route('student.generate-pdf-diploma',$request->student_id) }}" class="btn btn-secondary my-2"><i class="fas fa-print"></i> Print Diploma</a>
            <a href="{{ route('student.generate-pdf-transcript',$request->student_id) }}" class="btn btn-secondary my-2"><i class="fas fa-print"></i> Print Transcript</a>
        @endif
    </div>
    <table class="table">
        <tr>
            <td><span class="font-weight-bold">Date of order:</span> {{ $request->created_at->format('d.m.Y') }}</td>
        </tr>
        <tr>
            <td><span class="font-weight-bold">Ordered by:</span> {{ $request->student->student_details->parent->fullname() }}</td>
        </tr>
        <tr>
            <td><span class="font-weight-bold">Student:</span> {{ $request->student->fullname() }}</td>
        </tr>
        <tr>
            <td><span class="font-weight-bold">Date of Birth:</span> {{ $request->student->date_of_birth() }}</td>
        </tr>
        
        <tr>
            <td><span class="font-weight-bold">Student Id:</span> {{ $request->student->student_id() }}</td>
        </tr>
        <tr>
            <td><span class="font-weight-bold">Total:</span> ${{ number_format($request->type->price * ($request->copies ?? 1 ),2,'.',',')}}</td>
        </tr>
        <tr>
            <td><span class="font-weight-bold">Payment Status:</span> {{ $request->status()}}</td>
        </tr>
        <tr>
            <td>
                <span class="font-weight-bold">Address:</span> {{ $parent->invoice_details->address }} 
            </td>
        </tr>
        <tr>
            <td>
                <span class="font-weight-bold">City:</span>  {{ $parent->invoice_details->zip }}  {{ $parent->invoice_details->city }} 
            </td> 
        </tr> 
        <tr>
            <td> 
                <span class="font-weight-bold">Country:</span> {{ $parent->invoice_details->country->nicename }}    
                
            </td>
         </tr>
         <tr>
            <td>
                <span class="font-weight-bold"> Phone:</span> (+{{ $parent->invoice_details->phone_code }}) {{ $parent->invoice_details->phone }}
            </td>
        </tr>
        <tr>
            <td><span class="font-weight-bold">Set Status:</span>
                <select name="status" class="form-control" form="change-status">
                    @foreach ($statuses as $key => $status)
                        <option {{ $key == $request->status ? ' selected ' : '' }} value="{{ $key }}">{{ $status }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            @if($request->status == 0)
            <td>
                <span class="font-weight-bold">Tracking Number:</span>
                <input type="text" class="form-control" name="tracking_number" required form="change-status">
            </td>
            @else
                <td>
                <span class="font-weight-bold">Tracking Number:</span>
                <p>{{ $request->tracking_number }}</p>
                </td>

            @endif
        </tr>
        <tr>
            <td class="text-center">
                <form action="{{ route('admin.change-diploma-printing-status',$request->id) }}" id="change-status" class="confirm-first" method="POST">
                    {{ csrf_field() }}
                    <button class="orange-button">Save Changes</button>
                </form>
            </td>
        </tr>
    </table>
   
</div>
@endsection
