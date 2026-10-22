@extends('template')


@section('seo')
	<title>{{trans('sitemap.meta-title')}}</title>
	<meta itemprop="description" name="description" content="{{ trans('sitemap.meta-description') }}" />
    <meta itemprop="url" property="og:url" content="{{ config('app.url') }}/sitemap"/>
	<meta property="og:description" content="{{ trans('sitemap.meta-description') }}"/>
	<x-seo.web-page-schema :url="route('sitemap')" name="Sitemap" :description="trans('sitemap.meta-description')" :breadcrumbs="[['name' => 'Home', 'url' => route('welcome')], ['name' => 'Sitemap', 'url' => route('sitemap')]]" />
@endsection

@section('headCSS')
<style>
    .sitemap-container {
        padding-top: 35px;
        padding-bottom: 50px;
    }
    .sitemap-container > div {
        margin-bottom: 20px;
    }
    .sitemap-card {
        height: 100%;
        border: 1px solid #f0a07a;
        border-radius: 12px;
        padding: 15px 10px;
    }
    .sitemap-card h2 {
        color: #e0631f;
        font-size: 1.05rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        text-align: center;
        margin: 5px 0 20px 0;
    }
    .sitemap-card a {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 34px;
        background-color: #045397;
        color: #ffffff;
        text-align: center;
        text-decoration: none;
        font-size: 0.75rem;
        font-weight: 700;
        line-height: 1.3;
        border-radius: 8px;
        padding: 6px 10px;
        margin-bottom: 6px;
        transition: background-color 0.2s ease;
    }
    .sitemap-card a:hover,
    .sitemap-card a:focus {
        background-color: #033d70;
        color: #ffffff;
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
    <h1 class="text-center mb-4 page-headings">Sitemap</h1>
    <div class="row sitemap-container mx-md-3">
        <div class="col-lg col-md-4 col-sm-6">
            <div class="sitemap-card">
                <h2>About</h2>
                <a href="{{ route('school-overview') }}">School Overview</a>
                <a href="{{ route('mission-statement')}}">Mission Statement</a>
                <a href="{{ route('accreditation') }}">Accreditation</a>
                <a href="{{ route('leadership') }}">Leadership</a>
                <a href="{{ route('academics') }}">Faculty & Educators</a>
                <a href="{{ route('academics') }}">Students in Spotlight</a>
                <a href="{{ route('partnership') }}">Partnerships</a>
            </div>
        </div>

        <div class="col-lg col-md-4 col-sm-6">
            <div class="sitemap-card">
                <h2>Academics</h2>
                <a href="{{ route('highschool-programs')}}">High School Programs</a>
                <a href="{{ route('graduation-requirements')}}">Graduation Requirements</a>
                <a href="{{ route('credit-recovery')}}">Credit Recovery</a>
                <a href="{{ route('credit-transfer')}}">Credit Transfer</a>
                <a href="{{ route('international-students')}}">International Students</a>
                <a href="{{ route('country-requirements') }}">International Diploma Recognition</a>
                <a href="{{ route('starter-kit') }}">Freshman Kit</a>
                <a href="{{ route('awards')}}">Awards</a>
            </div>
        </div>

        <div class="col-lg col-md-4 col-sm-6">
            <div class="sitemap-card">
                <h2>Curriculum</h2>
                <a href="{{ route('standard-high-school')}}">High School Diploma Tracks</a>
                <a href="{{ route('transfer-program')}}">High School International Transfer Program</a>
                <a href="{{ route('honors-high-school')}}">Module & Honors Courses</a>
                <a href="{{ route('psat')}}">PSAT/SAT Prep-Courses</a>
                <a href="{{ route('act')}}">PreACT/ACT Prep-Courses</a>
                <a href="{{ route('advanced-placement')}}">Advanced Placement Courses</a>
                <a href="{{ route('cte')}}">CTE Prep-Courses</a>
                <a href="{{ route('clep')}}">CLEP Prep-Courses</a>
                <a href="{{ route('esol')}}">English Courses (ESOL)</a>
                <a href="{{ route('learning-mentoring')}}">Learning/Mentoring/Coaching</a>
            </div>
        </div>

        <div class="col-lg col-md-4 col-sm-6">
            <div class="sitemap-card">
                <h2>Admissions</h2>
                <a href="{{ route('admission-process') }}">Admission Process</a>
                <a href="{{ route('enrollment-criteria') }}">Enrollment Criteria</a>
                <a href="{{ route('enrollment-options') }}">Enrollment Options</a>
                <a href="{{ route('tuition') }}">Tuition</a>
                <a href="{{ route('tuition-assistance') }}">Tuition Assistance (PEP)</a>
                <a href="{{ route('ambassador-program') }}">Ambassador Program</a>
            </div>
        </div>

        <div class="col-lg col-md-4 col-sm-6">
            <div class="sitemap-card">
                <h2>Resources</h2>
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
</div>

@endsection
