@extends('template')

@section('content')
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Leadership</li>
	</ol>
</div>
<div class="container-fluid bg-white main_page_container mb-3">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 shadow  p-4 page-content bg-white text-justify" style="margin: 0 auto;">
      <div class="page-content">
        <div class="">
          <h2 class="text-center page-headings">Lorem Ipsum</h2>
          <hr class="white-hr">
          <div class="w-100 centered text-justify p-20 mx-auto">
          Earn real high school credits through a recognized curriculum that meets national academic standards.
          </div>
          <div class="video mt-3">
              <iframe height="600" width="100%" src="https://www.youtube.com/embed/FbXEqmzu05I?si=wYLlYX3WT1ENmdOd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
          <div>
            <p>Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern. Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, </p>
            <p> auf höchstem Niveau zu unterstützen.Studieren und Promovieren sind nicht nur akademische Meilensteine – sie sind Herausforderungen, die von intensiver Forschung, kreativem Denken und strategischer Planung geprägt sind. Um Dir diese Herausforderung so effizient und produktiv wie möglich zu gestalten, stellen wir Dir das kostenfreie Empowerment-Kit zur Verfügung. Dieses Kit umfasst innovative Tools, um Dir den Weg zu einem erfolgreichen Studienabschluss oder zu einer erfolgreichen Promotion erheblich zu verkürzen und zu erleichtern.\ Entdecke sieben ultrastarke Features, die speziell darauf ausgelegt sind, Dich auf höchstem Niveau zu unterstützen. Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</p>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="row" style="background-color: #045397;padding:50px;">
    <div class="col-md-10 offset-md-1" >
        <!-- <div class="d-flex" id="benefit_wrapper"> -->

        <div class="row col-md-12 ml-0 mr-0" >
            <div class="col-lg-3  text-center ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/badge.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">Accredited Online Courses</h3>
                    <p>Earn real high school credits through a recognized curriculum that meets national academic standards.</p>
                    <!-- Removing <p></p> becuase ck3 editor put <p> and become 3x time more -->
                </div>
            </div>
            <div class="col-lg-3 text-center ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/idea.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">Flexible Learning Schedule</h3>
                    <p>Study when and where it works for you—whether that’s early mornings, late nights, or weekends.</p>
                </div>
            </div>
            <div class="col-lg-3 text-center ">
                <div class="benefit-box">
                     <img src="{{ asset('images/icons/commitment.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">Personalized Support</h3>
                    <p>Our certified teachers, tutors, and mentors are always just a message away, ready to guide you every step of the way.</p>
                </div>
            </div>
             <div class="col-lg-3 text-center  ">
                <div class="benefit-box">
                    <img src="{{ asset('images/icons/open-book.png') }}" alt="" class="welcome-icon-big">
                    <h3 style="font-size:1.25rem;color:#045397;min-height:40px;">College & Career Ready</h3>
                    <p>We don’t just help you graduate—we prepare you for what comes next. From college prep to job-ready skills, your journey starts here.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection