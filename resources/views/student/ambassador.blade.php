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
	<div class="col-md-6 text-center pt-5" style="margin: 0 auto;">
		<h2 class="text-center mb-5 program-title">Ambassador Program</h2>
		<div class="card ambassador-card shadow-lg mx-auto">
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col-auto">
                        <div class="badge-placeholder">
                            <img src="{{ asset('images/badge.png') }}" alt="Ambassador Badge" class="img-fluid" style="width: 150px;">
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="ambassador-name">Ivan Ivanov</h3>
                                        <hr class="my-3">
                        <div class="status-info">
                            <strong>Ambassador Status:</strong> <span class="text-success">Active</span>
                        </div>
                        <div class="status-info">
                            <strong>Last activity:</strong>
                            @if($lastActivity)
                                {{ $lastActivity->created_at->format('F d, Y') }}
                            @endif
                        </div>
                        <div class="points-info">
                            <strong>Points collected:</strong> <span class="points-number">{{ $totalPoints }}</span>
                        </div>
                    </div>
                </div>

                <h4 class="activity-log-title text-center my-3">Your Activity Log</h4>

                <div class="table-responsive">
                    <table class="table activity-table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Platform</th>
                                <th scope="col">Activity</th>
                                <th scope="col">Points</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($activities as $activity)
                                <tr>
                                    <td>{{ $activity->created_at->format('F d, Y') }}</td>

                                    <td>{{ $activity->service->name ?? '—' }}</td>

                                    <td>{{ $activity->action->name ?? '—' }}</td>

                                    <td class="points-cell">
                                        {{ $activity->action->value ?? 0 }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        No activities submitted yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card form-card shadow mx-auto mt-5">
            <div class="card-body p-4">
                <h3 class="text-center mb-4 form-title">Submit Activity</h3>
                <form method="POST" action="{{ route('student.store-activity') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="platform" class="form-label">Platform</label>
                            <select class="form-control" id="platform" aria-label="Platform selection" name="service_id">
                                <option value="">Select Platform</option>
                                @foreach($ambassador_services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="activity" class="form-label">Activity</label>
                            <select class="form-control" id="activity" aria-label="Activity selection" name="action_id">
                                <option value="">Select Activity</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="linkInput" class="form-label">Link</label>
                        <input type="url" class="form-control" id="linkInput" placeholder="Insert Link for Approval here" name="link">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn custom-btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-5">
            <h2 class="program-title">Onsites High School Ambassador Program</h2>
            <p class="text-justify">
                The Onsites High School Ambassador Program is an initiative designed to engage students as representatives of the school community across social media platforms. The program encourages students to promote school events, achievements, and values through positive and creative online interactions. Ambassadors play a key role in strengthening the school’s online presence while developing valuable skills in communication, leadership, and digital engagement. In recognition of their participation, students earn points for various social media activities, which can later be redeemed for a range of rewards.
            </p>
        </div>

        <div class="container mt-5">
            <h2 class="program-title">How the Program Works</h2>
            <p class="text-justify">
                Participants earn points by completing approved social media activities that highlight and promote Onsites High School. Examples include following official school accounts, sharing or creating posts about school events, tagging the school in stories or videos, and participating in challenges or livestreams. Each platform—such as Facebook, Instagram, YouTube, TikTok, Twitter (X), and LinkedIn—offers different ways to contribute, with point values assigned based on the level of engagement and creativity involved. Higher-impact activities, such as hosting livestreams or creating original content, receive greater rewards.
            </p>
        </div>

        <div class="card form-card shadow mx-auto mt-5">
	        @foreach($ambassador_services as $service)
	            <div class="service-wrapper bg-white">
	                <div class="d-flex justify-content-between" style="padding:10px 0;font-size:1.1rem;color:#045397;font-weight:bold">
	                        <div>{{ $service->name }}</div>
	                        <div><i class="fas fa-chevron-up open-service"></i></div>
	                </div>
	                <div class="service-action d-none">
	                    @foreach ($service->actions as $action )
	                        <div class="d-flex justify-content-between">
	                            <div>{{ $action->name }}</div>
	                            <div>{{ $action->value }} {{ $action->additional_information }}</div>
	                        </div>
	                        <hr class="my-1">
	                    @endforeach
	                </div>
	            </div>
	        @endforeach
	    </div>

	    <div class="container mt-5">
            <h2 class="program-title">Ambassador Status</h2>
            <p class="text-justify">
               To maintain active ambassador status, participants must remain engaged by posting or interacting at least once per month. Ambassadors who become inactive for over a month will lose any points accumulated to that point. Active ambassadors may continue to collect and redeem their points at any time. The children may share in all the the platforms that they are active ambassadors of the school.
            </p>
        </div>

        <div class="container mt-5">
            <h2 class="program-title">Rewards and Recognition</h2>
            <p class="text-justify">
                Points earned through participation can be exchanged for a variety of items. Students may also choose to redeem their points through bundle packages, which combine multiple items at different reward levels. These bundles are designed to offer flexibility and motivation for continued engagement, with options suited to various interests and achievement milestones.
            </p>
        </div>

        <div class="d-flex justify-content-between" style="color:#14213D;font-weight:bold;color:#E9580C;padding:10px 0;">
            <div>Reward List</div> 
            <div><i class="fas fa-chevron-up" id="open-rewards"></i></div>
        </div> 
        <div id="rewards" class="d-none">
            <div class="d-flex justify-content-between" style="color:#14213D;font-weight:bold">
                <div>Reward</div> 
                <div>Points</div>
            </div> 

            <hr class="my-1">

            @foreach($ambassador_rewards as $reward)
                <div class="d-flex justify-content-between">
                    <div>{{ $reward->name }}</div> 
                    <div style="color:#E9580C;font-weight:bold">{{ $reward->points }}</div>
                </div> 
            <hr class="my-1">
            @endforeach
        </div>

	</div>
@endsection

@section('scripts')
<script>
    $('#open-rewards').on('click',function(){
        if($('#rewards').hasClass('d-none')){
             $('#rewards').removeClass('d-none');
             $(this).removeClass('fa-chevron-up')
             $(this).addClass('fa-chevron-down')
        }
        else{
             $('#rewards').addClass('d-none');
             $(this).removeClass('fa-chevron-down')
             $(this).addClass('fa-chevron-up')
        }
    });

    $('.open-service').on('click',function(){
        if($(this).closest('.service-wrapper').find('.service-action').hasClass('d-none')){
            $(this).closest('.service-wrapper').find('.service-action').removeClass('d-none')
             $(this).removeClass('fa-chevron-up')
             $(this).addClass('fa-chevron-down')
        }
        else{
             $(this).closest('.service-wrapper').find('.service-action').addClass('d-none')
             $(this).removeClass('fa-chevron-down')
             $(this).addClass('fa-chevron-up')
        }
    });

    const activityUrl = "{{ route('student.get-activity', ['platform_id' => '__ID__']) }}";

    $('#platform').on('change', function () {
        let platformId = $(this).val();
        let activitySelect = $('#activity');

        activitySelect.html('<option value="">Select Activity</option>');

        if (platformId) {

            let url = activityUrl.replace('__ID__', platformId);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $.each(data, function(index, activity) {
                        activitySelect.append(
                            '<option value="' + activity.id + '">' + activity.name + '</option>'
                        );
                    });
                },
                error: function(xhr) {
                    console.log("Error:", xhr.responseText);
                }
            });
        }
    });
</script>
@endsection