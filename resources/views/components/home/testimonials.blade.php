<section class="row section" style="background-color: #ffffff; padding-bottom: 20px;">
	<div class="col-md-8 offset-md-2">
		<div class="d-flex w-100 justify-content-between" id="testimonial_box">
			<div class="row">
				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@foreach ($testimonials as $key => $testimonial )
							<div class="carousel-item {{ $key==0 ? ' active ' : ''}} ">
								<img class="d-block w-100" src="..." alt="First slide">
								<h4>{!! $testimonial->translated->text !!}</h4>
								<p>- {{ $testimonial->translated->name }}</p>				
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
