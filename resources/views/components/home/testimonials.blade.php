<section class="row space" style="background-color: #E9580C;color:white;">
	<div class="col-md-8 offset-md-2 text-center">
		<h2 class="section-headings text-white">{{ $texts['testimonials-heading'] }}</h2>
		<hr class="white-hr">
		<div class="page-content ">
			<p class="text-center">{{ $texts['testimonials-content'] }}</p>
		</div>
		<div class="d-flex w-100 justify-content-between" id="testimonial_box">
			<div class="video">
				<video width="100%" height="auto" controls height="400">
					<source src="{{ asset('videos/testimonials_video.mp4')}}" type="video/mp4" >
					Your browser does not support the video tag.
				</video>
			</div>
		</div>
	</div>
</section>
