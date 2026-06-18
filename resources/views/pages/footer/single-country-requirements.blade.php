@extends('template')

@section('headCSS')
<style>
    .orange{
        color:#E9580C;
    }
</style>
@endsection
@section('content')

<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="{{ route('country-requirements') }}">Country Requirements</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $country->nicename }}</li>
	</ol>
</div>

<div class="container-fluid bg-light">
    <div class="container page-content">
        <h1 class="page-headings">Recognition of the U.S. High School Diploma in Bulgaria</h1>
        <p>Complete an accredited American high school fully online. NACID issues the recognition certificate within 1 month of a complete submission, opening the path to Bulgarian universities.</p>
    </div>
    <x-image-component nickname="country-requirements" class="imprint-images main-pictures-pages" loading="eager"/>
</div>

<div class="container-fluid ">
     <div class="container">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;">Recognition in Bulgaria at a Glance</h2>
     </div>
    <div class="container page-content shadow">
       
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">RECOGNITION</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">COMPETENT AUTHORITY</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">LEGAL BASIS</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">PROCESSING TIME</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">FEE</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">DOCUMENTS</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">FILING</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">GRADE CONVERSION</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">UNIVERSITY ADMISSION</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">PARALLEL TO SCHOOL</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-light">
     <div class="container page-content">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;padding:20px 0;">How the Recognition Process Works, Step by Step</h2>
        <p>Five steps separate the American diploma from the Bulgarian recognition certificate. Two take place in the United States, three in Bulgaria, and all of them can be arranged remotely.</p>
    
       
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">01</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">02</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">03</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">04</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 orange border-bottom font-weight-bold">05</div>
            <div class="col-md-9 border-bottom">
                <p class="mb-0 font-weight-bold">Yes</p>
                <p>The certificate (удостоверение) is valid for university admission, the driving license, and access to the labor market.</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    
    <div class="container page-content">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;">What the Recognized Diploma Opens at Bulgarian Universities</h2>
        <p>The NACID certificate places the holder of a U.S. diploma on equal footing with every Bulgarian graduate: it is the official document used to apply to higher education institutions in Bulgaria. The state sets a single requirement for grades, and it is precisely worded:</p>
        <div class="shadow p-2">
            <h5 style="color:#E9580C">ORDINANCE ON STATE REQUIREMENTS FOR STUDENT ADMISSION</h5>
            <p>The minimum average grade in the school subjects that are relevant for the chosen program may not be lower than 62 percent of the maximum value under the grading system of the country in which the secondary education was obtained.</p>
        </div>
        <p>
            For a U.S. diploma this means the grades in the subjects the specific program requires are measured against the maximum of the American scale. Bulgaria imposes no national add-on of the kind known elsewhere, such as mandatory AP examinations or a mandatory SAT, requirements that in several other EU countries are a precondition for recognition itself.
        </p>
        <div class="shadow text-white p-2" style="background-color:#E9580C;">
            <h5 style="">THE 62 PERCENT THRESHOLD IN PRACTICE</h5>
            <p>On a 4.0 GPA scale: 0.62 × 4.0 = GPA 2.48 minimum average in the program-relevant subjects — a solid B− average clears the threshold. The binding conversion is performed by NACID; the official grade converter is available at portal.nacid.bg.</p>
        </div>
        <p>From there, academic autonomy applies: each university defines in its regulations how admission scores are formed for each program, whether from diploma grades, a competitive examination, or a combination. Where a university holds its own examination, it applies to all applicants equally. The program's preparation answers this directly: the 24 AP courses cover the material of the most common examination subjects at a depth beyond the school minimum, and the preparation modules for the PSAT, SAT, PreACT, and ACT train the examination format itself.</p>
        <p>The requirements of the specific university for the specific admission cycle are always decisive; they are published annually in the universities' admission guides.</p>
    </div>
</div>

<div class="container-fluid bg-light">
     <div class="container">
        <h2 class="font-weight-bold text-dark"  style="margin:20px 0;padding:20px 0;">Inside the ONSITES High School Program</h2>
        <div class="row">
            <div class="col-md-3 mb-2">
                <div class="shadow h-100 p-2">
                    <i class="fa fa-book-open"></i>
                    <p class="orange font-weight-bold">FULL CURRICULUM</p>
                    <p>The complete program of an accredited American high school: 24-credit Standard and Honors tracks or 18-credit ACCEL track.</p>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="shadow h-100 p-2">
                    <i class="fa fa-arrow-right-arrow-left"></i>
                    <p class="orange font-weight-bold">INTERNATIONAL TRANSFER PROGRAM</p>
                    <p>Credit recognition for the local high school diploma with completion of U.S.-specific coursework.</p>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="shadow h-100 p-2">
                    <i class="fa fa-bullseye"></i>
                    <p class="orange font-weight-bold">COLLEGE ENTRANCE PREP COURSES</p>
                    <p>Targeted preparation for AP, CLEP, PSAT/SAT, PreACT/ACT that open university doors worldwide.</p>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="shadow h-100 p-2">
                    <i class="fa fa-globe"></i>
                    <p class="orange font-weight-bold">CAREER & LANGUAGE PROGRAMS</p>
                    <p>Applied CTE courses for career-focused skills and ESOL courses for academic English.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="shadow h-100 p-2">
                    <i class="fa fa-robot"></i>
                    <p class="orange font-weight-bold">EDUCATORS & AI-STUDY MENTOR</p>
                    <p>Personal educators or the AI-StudyMentor assist at every step.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="shadow h-100 p-2">
                    <i class="fa fa-building-columns"></i>
                    <p class="orange font-weight-bold">MENTORING, TUTORING & COACHING</p>
                    <p>Group mentoring, individual mentoring, one-to-one tutoring, and college & career coaching sessions.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="shadow h-100 p-2">
                    <i class="fa fa-arrows-rotate"></i>
                    <p class="orange font-weight-bold">FLEXIBLE ACADEMIC MODEL</p>
                    <p>Rolling enrollment, 12-month round schooling, and cross-grade learning, built for every student's pace and plan.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="shadow h-100 p-2">
                    <p class="orange font-weight-bold">STUDENT ENGAGEMENT & AWARDS</p>
                    <p>The freshman kit, the ambassador program, and the President's Education Award recognize commitment from day one.</p>
                </div>
            </div>
        </div>
     </div>
</div>
@endsection