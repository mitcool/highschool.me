<section class="row section" style="background-color: #ffffff; padding-bottom: 20px;">
	<div class="col-md-8 offset-md-2">
		<div class="d-flex w-100 justify-content-between" id="testimonial_box">
			<div class="row">
				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@foreach ($testimonials as $key => $testimonial )
							<div class="carousel-item {{ $key==0 ? ' active ' : ''}} ">
								<div class="d-flex justify-content-center">
									<img class="d-block" style="width:10%" src="{{ asset('images/testimonials') }}/{{ $testimonial->translated->image }}" alt="First slide">
								</div>
								<div class="w-75 text-center mx-auto">
									<h4>{!! $testimonial->translated->text !!}</h4>
									<h5 style="color:#045397">- {{ $testimonial->translated->name }}</h5>		
								</div>
										
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
