@extends('student.dashboard')

@section('css')
	<style>
		/* Global Colors & Fonts */
		:root {
		    --main-blue: #004c99; /* Deep blue for titles */
            --points-red: #cc5200; /* Orange-red for points */
            --light-bg-blue: #f7f9fc; /* Very light blue for background/highlights */
            --submit-orange: #f26522; /* Specific orange for button */
            --submit-orange-hover: #d3521b; /* Darker orange for hover state */
		}

		.program-title {
		    color: var(--main-blue);
		    font-weight: 700;
		}

		.ambassador-card {
		    max-width: 800px;
		    border-radius: 10px;
		    border: 1px solid #dee2e6;
		}

		.ambassador-name {
		    color: var(--main-blue);
		    font-weight: 600;
		    margin-bottom: 5px;
		}

		.points-number {
		    color: var(--points-red);
		    font-size: 1.25rem;
		    font-weight: 700;
		    display: inline-block;
		}

		.activity-log-title {
		    color: var(--main-blue);
		    font-weight: 600;
		}

		.badge-placeholder {
		    width: 100px;
		    height: auto;
		}

		.badge-placeholder img {
		    max-width: 100%;
		    height: auto;
		}

		.activity-table {
		    margin-bottom: 0;
		}

		.activity-table thead th {
		    border-bottom: 2px solid #dee2e6;
		    font-weight: 600;
		}

		.activity-table tbody tr {
		    transition: background-color 0.2s ease;
		}

		.activity-table .highlight-row {
		    background-color: var(--light-bg-blue);
		}

		.activity-table .highlight-row:hover {
		    background-color: #e9ecef;
		}

		.activity-table .points-cell {
		    color: var(--points-red);
		    font-weight: 700;
		}
		.form-card {
            max-width: 800px; 
            border-radius: 8px;
            border: 1px solid #dee2e6; 
        }

        .form-title {
            color: var(--main-blue);
            font-weight: 600;
        }

        .custom-btn-submit {
            background-color: var(--submit-orange);
            border-color: var(--submit-orange);
            color: white;
            font-weight: 600;
            padding: 8px 30px; 
            border-radius: 6px;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .custom-btn-submit:hover {
            background-color: var(--submit-orange-hover);
            border-color: var(--submit-orange-hover);
            color: white; 
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.25rem;
        }

        #open-rewards,
	    .open-service{
	        cursor: pointer;
	    }
	    .service-wrapper{
	        margin:10px 0;
	        padding:10px;
	    }
	</style>
@endsection

@section('content')
	<div class="container text-center pt-5" style="margin: 0 auto;">
		<h2 class="text-center mb-5 program-title">Study mentor</h2>
        <div class="page-content mt-3 text-justify">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi doloremque itaque vero dolorum est, culpa eveniet sed doloribus quo et quasi alias, fugiat voluptates facilis? Suscipit necessitatibus quia pariatur corrupti.</p>
        </div>
		<div class="shadow-lg mx-auto">
            <div class="card-body">
                 <div class="video mt-3">
                    <iframe height="600" width=100%" src="https://www.youtube.com/embed/FbXEqmzu05I?si=wYLlYX3WT1ENmdOd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="page-content mt-3">
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi doloremque itaque vero dolorum est, culpa eveniet sed doloribus quo et quasi alias, fugiat voluptates facilis? Suscipit necessitatibus quia pariatur corrupti.</p>
                </div>
            </div>
        </div>
        <div style="margin:50px 0;">
			<a href="{{ route('student.single-study-mentor-chat',1) }}" class="orange-button mt-4" style="text-decoration: none;">Start now</a>
		</div>
	</div>
    

@endsection

