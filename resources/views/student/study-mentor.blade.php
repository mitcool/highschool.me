@extends('student.dashboard')

@section('content')
<div class="container shadow  wrapper">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3 class="text-center h2 page-headings">Please select a mentor</h3>
			<hr>
		</div>
        @foreach ($grouped_courses as $type_key => $grouped_courses_by_category)
            <div class="col-md-12 my-1">
                <div class="orange text-center w-100" style="border-radius:5px;padding:15px;background: #E9580C;color:white">
                    <h5 class="mb-0">{{ $types[$type_key] }}</h5>
                </div>
            </div>
           
                @foreach ($grouped_courses_by_category as $category => $category_courses )
                 <div class="col-md-12 category-wrapper">
                    @if($category != "")
                        <div class="w-100 my-1 category">
                            <div class="orange d-flex justify-content-between w-100" style="border-radius:5px;padding:15px;background:white">
                                <h5 class="mb-0">{{ $categories[$category] }}</h5>
                                <div><i class="fas {{ $loop->first ? 'fa-chevron-up' : 'fa-chevron-down' }} icon"></i></div>
                            </div>
                        </div>
                    @endif
                    <div class="w-100 courses {{ $loop->first ? ' d-block ' : ' d-none ' }}">
                        @foreach ($category_courses as $course)
                            <div class=" my-1 w-100" >
                                <a href="{{ route('student.single-study-mentor',$course->study_mentor->slug) }}" style="text-decoration: none;color:black;">
                                    <div class="shadow text-center text-capitalize" style="border-radius:5px;padding:15px;background: #045397;color:white">
                                        <h6 class="mb-0">{{ $course->course->title }}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            
            
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    
    $('.category').on('click',function(){

        if($(this).closest('.category-wrapper').find('.courses').hasClass('d-none')){
             $(this).closest('.category-wrapper').find('.courses').removeClass('d-none')
             $(this).closest('.category-wrapper').find('.icon').removeClass('fa-chevron-down')
             $(this).closest('.category-wrapper').find('.icon').addClass('fa-chevron-up')
        }
        else{
             $(this).closest('.category-wrapper').find('.courses').addClass('d-none')
             $(this).closest('.category-wrapper').find('.courses').removeClass('d-block')
             $(this).closest('.category-wrapper').find('.icon').removeClass('fa-chevron-up')
             $(this).closest('.category-wrapper').find('.icon').addClass('fa-chevron-down')
        }
    })
</script>

@endsection