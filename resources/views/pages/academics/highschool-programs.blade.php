@extends('template')
@section('seo')
<title>{{ trans('study-registration.meta-title') }}</title>
<meta itemprop="description" name="description" content="{{ trans('study-registration.meta-description')}}" />
<meta itemprop="title" property="og:title" content="{{ trans('study-registration.meta-title') }}"/>
<meta property="og:type" content="website"/>
@if(Session::get('applocale') == 'de')
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/de/bewerbung-studium"/>
@else
	<meta itemprop="url" property="og:url" content="{{ config('app.url') }}/en/student-portal"/>
@endif
<meta property="og:description" content="{{ trans('study-registration.meta-description')}}"/>
<x-meta-image itemprop="image" nickname="study_registration"/>

@endsection


@section('headCSS')

<style>

.form-control,
.form-control:focus,
.form-control:active{

	outline: none !important;
}
.time-button,
.studies-button{
	background-color:white;
	border:1px solid black;
	min-width: 180px;
	max-width: 200px;
	cursor: pointer;
}
.selected-button{
	background-color:#d3ebff !important;
}
</style>

@endsection
@section('content')
@php
    $breadcrumb_title = strtok(trans('study-registration.meta-title'), '|');
@endphp
<div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
	<ol class="bg-white breadcrumb mb-0 p-0">
		<li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
	</ol>
</div>
<x-image-component nickname="courses-cover" class="study_registration-images main-pictures-pages" loading="eager"/>
	<div class="container-fluid bg-white main_page_container">	
		<div class="row justify-content-center" >		
			<div class="col-lg-8 text-center p-4 bg-white" style="margin: 0 auto;">
				<h1 class="text-center font-weight-bold page-headings">{{ trans('study-registration.heading') }}</h1><hr>
				<div class="page-content">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Suspendisse non orci eros. Curabitur consectetur pellentesque aliquet. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique. Vivamus cursus iaculis lorem vel sollicitudin. Morbi et urna hendrerit mi laoreet dignissim. Proin mattis porttitor lorem a tristique.</div>
				<h2 class="text-center font-weight-bold page-headings">Discover our interesting Cources</h2><hr>
				<div class="row">
					@foreach ($courses as $course)
						<div class="col-md-4 my-3">
							<div class="shadow">
								<x-image-component nickname="course-{{ $course->id }}" class="w-100"/>
								<div class="d-flex align-items-center justify-content-between mt-4 p-3">
									<p class="font-weight-bold m-0">{{ $course->name }}</p>
									<a href="" class="btn orange-button">Read more</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>
@endsection

@section('footerScripts')
	<script type="text/javascript">
		$(document).ready(function(){

			$('.studies-button').on('click', function(){
				$('#fee').html('');
				$('#payment-option').html('');
				$('#program-select').html('');
				$('.studies-button').removeClass('selected-button');
				$('#start_date').removeClass('d-block').addClass('d-none')
				$(this).addClass('selected-button');
				$('.program-option').prop('disabled', true).addClass('d-none');

				let study_id = $(this).attr('data-id');

				$.ajax({
					data: {study_id: study_id},
					method: "POST",
					url: "{{route('get-programs')}}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				}).done(function(response) {
					
					if(response.id == 1 || response.id == 4 || response.id == 5){
						let programs_html = '';
						for (const program of response.programs) {
							programs_html += `<option value="${program.id}">${program.translated.name}</option>`;
						}
						$('#program-select').html(programs_html);

						let time_period_html = '';

						for (const period of response.studies_periods) {
							time_period_html += `
							<div class="col-md-3">
								<label data-study="${study_id}" data-study-period="${period.id}" class="time-button time-period form-control" for="${period.period.key}">${period.period.translated.name}</label>
								<input  id="${period.period.key}" name="learning_period"  type="radio" value="${period.period.key}" class="d-none time-checkbox">
							</div>`;
						}
						$('#time_periods').html(time_period_html);
					}
					else{
						let programs_html = '';
						let time_period_html = '';
						
						for (const r of response) {
							for (const program of r.programs) {
								programs_html += `<option value="${program.id}">${program.translated.name}</option>`;
							}
							for (const period of r.studies_periods) {
								time_period_html += `
								<div class="col-md-3">
									<label data-study="${study_id}" data-study-period="${period.id}" class="time-button time-period form-control" for="${period.period.key}">${period.period.translated.name}</label>
									<input  id="${period.period.key}" name="learning_period"  type="radio" value="${period.period.key}" class="d-none time-checkbox">
								</div>`;
							}
						}
						
						$('#program-select').html(programs_html);
						$('#time_periods').html(time_period_html);

					}
					

				});
 
			});

			$('#program_day').on('change', function(){
				$('#date-error').html('')
				validateDate()
			})

			$('#program_month').on('change', function(){
				$('#date-error').html('')
				validateDate()
			})

			$('#program_year').on('change', function(){
				$('#date-error').html('')
				validateDate()
			});

			$('.custom-file-input').on('change', function(e){
				$('#file-validation-error').html('');
				let name = e.target.files[0].name;
				let extention = name.split('.').pop();
				let allowed_extentions = ['docx','pdf'];
				let message  = `{!! __('study-registration.incorrect-file') !!}`;

				if(!allowed_extentions.includes(extention)){ 
					$('#file-validation-error').html(message);
					$(this).val("");
					return;
				}
				$(this)
					.closest('.custom-file')
					.find('.custom-file-label')
					.css('background','#D1FFBE')
					.css('color','green')
					.html(name);
			});


		});
		$(document).on('click','.time-period',function() {
				$('#fee').html('');
				$('#payment-option').html('');
				$('.time-period').removeClass('selected-button');
				$('.time-checkbox').prop('checked', false);
				$(this).addClass('selected-button');
				$('#start_date').removeClass('d-block').addClass('d-none')
				let study_period = $(this).attr('data-study-period');
				$.ajax({
					data: {study_period: study_period},
					method: "POST",
					url: "{{route('get-payments-options')}}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				}).done(function(payment_options) {
					payment_html = '<option value="" selected disabled>{!! __('study-registration.select-option') !!}</option>`;';
					for (const option of payment_options) {
						payment_html += `
						<option data-price="${option.price}">${option.payment.translated.name}</option>`;
					}
					$('#payment-option').html(payment_html);
						$('#start_date').removeClass('d-none').addClass('d-block')
				});
				
		});
		
		$(document).on('change','#payment-option',function() {
			const formatter = new Intl.NumberFormat('en-US', {
				style: 'currency',
				currency: 'EUR'
			});
			let value = formatter.format($('#payment-option option:selected').attr('data-price'));
			$('#fee').html(value);
		})
		function validateDate(){	

			let message  = `{!! __('study-registration.incorrect-date') !!}`;
			let day = +$('#program_day').val();
			let month = $('#program_month option:selected').attr('data-value');
			let year = $('#program_year').val();
			let date = new Date(year,month,day);
			let daysInMonth = new Date(year, month, 0).getDate();

			if(day > daysInMonth || day < 1){
				$('#date-error').html(message)
				return 0;
			}
			else if(year < date.getFullYear() || year.length != 4 ){
				$('#date-error').html(message)
				return 0;
			}
			else if(date < new Date()){
				$('#date-error').html(message)
				return 0;
			}

			return 1;
		}
	</script>
@endsection	
