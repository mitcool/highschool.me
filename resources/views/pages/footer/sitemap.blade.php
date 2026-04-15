@extends('template')


@section('seo')
	<title>{{trans('sitemap.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('sitemap.meta-description') }}" />
    <meta itemprop="url" property="og:url" content="{{ config('app.url') }}/sitemap"/>
	<meta property="og:description" content="{{ trans('sitemap.meta-description') }}"/>
@endsection

@section('headCSS')
<style>
    .col-md a{
        display: block;
        color:#000000;
        text-decoration: none;
    }
</style>
@endsection
@section('content')

<div aria-label="breadcrumb" class="col-md-11 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sitemap</li>
	</ol>
</div>

<div class="container-fluid">
    <div class="row justify-content-center" style="padding:50px;">
        <div class="col-md p-2 text-left">
            <h2 style="font-size:1.2rem;color:#045397;font-weight:bold;">ABOUT</h2>
            <a href="{{ route('school-overview') }}">School Overview</a>
            <a href="{{ route('mission-statement')}}">Mission Statement</a>
            <a href="{{ route('accreditation') }}">Accreditation</a>
            <a href="{{ route('leadership') }}">Leadership</a>
            <a href="{{ route('academics') }}">Faculty & Educators</a>
            <a href="{{ route('academics') }}">Students in Spotlight</a>
            <a href="{{ route('partnership') }}">Partnerships</a>
        </div>

        <div class="col-md p-2 text-left">
            <h2 style="font-size:1.2rem;color:#045397;font-weight:bold;">ACADEMICS</h2>
            <a href="{{ route('highschool-programs')}}">High School Programs</a>
            <a href="{{ route('graduation-requirements')}}">Graduation Requirements</a>
            <a href="{{ route('credit-recovery')}}">Credit Recovery</a>
            <a href="{{ route('credit-transfer')}}">Credit Transfer</a>
            <a href="{{ route('awards')}}">Awards</a>
            <a href="{{ route('international-students')}}">International Students</a>
            <a href="{{ route('starter-kit') }}">Freshman Kit</a>
        </div>

        <div class="col-md p-2 text-left">
            <h2 style="font-size:1.2rem;color:#045397;font-weight:bold;">CURRICULUM</h2>
            <a href="{{ route('standard-high-school')}}">High School Diploma Tracks</a>
            <a href="{{ route('transfer-program')}}">High School International Transfer Program</a>
            <a href="{{ route('honors-high-school')}}">Module & Honors Courses</a>
            <a href="{{ route('psat')}}">PSAT/SAT Prep-Courses</a>
            <a href="{{ route('act')}}">PreACT/ACT Prep-Courses</a>
            <a href="{{ route('advanced-placement')}}">Advances Placement Courses</a>
            <a href="{{ route('cte')}}">CTE Prep-Courses</a>
            <a href="{{ route('clep')}}">CLEP Prep-Courses</a>
            <a href="{{ route('esol')}}">English Courses (ESOL)</a>
            <a href="{{ route('learning-mentoring')}}">Learning/Mentoring/Coaching</a>
        </div>
    
        <div class="col-md p-2 text-left">
            <h2 style="font-size:1.2rem;color:#045397;font-weight:bold;">ADMISSIONS</h2>
            <a href="{{ route('admission-process') }}">Admission process</a>
            <a href="{{ route('enrollment-criteria') }}">Enrollment criteria</a>
            <a href="{{ route('enrollment-options') }}">Enrollment options</a>
            <a href="{{ route('tuition') }}">Tuition</a>
            <a href="{{ route('tuition-assistance') }}">Tuition Assistance (PEP)</a>
            <a href="{{ route('ambassador-program') }}">Ambassador Program</a>
        </div>
        
        <div class="col-md p-2 text-left">
            <h2 style="font-size:1.2rem;color:#045397;font-weight:bold;">RESOURSES</h2>
            <a href="{{ route('faq')}}">FAQ</a>
            <a href="{{ route('code-of-ethics')}}">Code of Ethics</a>
            <a href="{{ route('accessibility')}}">Accessibility</a>
            <a href="{{ route('terms-and-conditions')}}">Terms and Conditions</a>
            <a href="{{ route('blog')}}">News Explorer</a>
            <a href="{{ route('facts-hub')}}">Fact Hub</a>
            <a href="{{ route('press-release')}}">Press Release</a>
        </div>
    </div>
</div>

@endsection
