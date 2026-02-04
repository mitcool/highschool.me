@extends('template')

@section('headCSS')
<style>
    .h3.blue{
        color: #045397 !important;
    }
    .box{
        padding:20px;
    }
    #open-rewards,
    .service-wrapper{
        cursor: pointer;
    }
    .service-wrapper{
        margin:10px 0;
        padding:10px;
    }
</style>

@endsection

@section('content')
    <div aria-label="breadcrumb" class="col-md-8 breadcrumb-container mt-4 mb-3">
        <ol class="bg-white breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ambassador Program</li>
        </ol>
    </div>
    
    <div class="container-fluid bg-white box">
        <div class="container">
            <div class="text-center">
                <img src="{{ asset('images/badge.png') }}" alt="" class="w-25">
            </div>
             <h1 class="page-headings">Onsites High School Ambassador Program</h1>
            <p>
                The Onsites High School Ambassador Program is an initiative designed to engage students as representatives of the school community across social media platforms. The program encourages students to promote school events, achievements, and values through positive and creative online interactions. Ambassadors play a key role in strengthening the school’s online presence while developing valuable skills in communication, leadership, and digital engagement. In recognition of their participation, students earn points for various social media activities, which can later be redeemed for a range of rewards.
            </p>
        </div>
    </div>
    <div class="container-fluid box" style="background-color:#F1F1F1">
        <div class="container">
             <h3 class="page-headings h3 blue">How the Program Works</h3>
             <p>
                Participants earn points by completing approved social media activities that highlight and promote Onsites High School. Examples include following official school accounts, sharing or creating posts about school events, tagging the school in stories or videos, and participating in challenges or livestreams. Each platform—such as Facebook, Instagram, YouTube, TikTok, Twitter (X), and LinkedIn—offers different ways to contribute, with point values assigned based on the level of engagement and creativity involved. Higher-impact activities, such as hosting livestreams or creating original content, receive greater rewards.
            </p>
            @foreach($ambassador_services as $service)
                <div class="service-wrapper bg-white">
                    <div class="d-flex justify-content-between" style="padding:10px 0;font-size:1.1rem;color:#045397;font-weight:bold">
                            <div>{{ $service->name }}</div>
                            <div><i class="fas fa-chevron-up service-icon"></i></div>
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
    </div>
    <div class="container-fluid bg-white box">
        <div class="container">
             <h3 class="page-headings h3 blue">Ambassador Status</h3>
            <p>
               To maintain active ambassador status, participants must remain engaged by posting or interacting at least once per month. Ambassadors who become inactive for over a month will lose any points accumulated to that point. Active ambassadors may continue to collect and redeem their points at any time. The children may share in all the the platforms that they are active ambassadors of the school.
            </p>
        </div>
    </div>
      <div class="container-fluid box" style="background-color:#F1F1F1">
        <div class="container">
             <h3 class="page-headings h3 blue">Rewards and Recognition</h3>
             <p>
                Points earned through participation can be exchanged for a variety of items. Students may also choose to redeem their points through bundle packages, which combine multiple items at different reward levels. These bundles are designed to offer flexibility and motivation for continued engagement, with options suited to various interests and achievement milestones.
            </p>
            <div class="shadow bg-white p-2" style="border-radius:5px;">
           <div class="d-flex justify-content-between" id="open-rewards" style="color:#14213D;font-weight:bold;color:#E9580C;padding:10px 0;">
                <div>Reward List</div> 
                <div><i class="fas fa-chevron-up" id="icon" ></i></div>
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
        </div>
    </div>

     <div class="container-fluid bg-white box">
        <div class="container">
             <h3 class="page-headings h3 blue">Program Purpose and Benefits</h3>
            <p>
              The Ambassador Program serves multiple goals:
              <ul>
                <li>Enhancing school visibility and reputation through authentic student-led promotion.</li>
                <li>Encouraging student involvement in school life and online community building.</li>
                <li>Developing essential skills in communication, digital literacy, and leadership.</li>
                <li>Rewarding creativity and initiative among students who represent Onsites High School.</li>
              </ul> 
            </p>
        </div>
    </div>
@endsection

@section('footerScripts')
<script>
    $('#open-rewards').on('click',function(){
        if($('#rewards').hasClass('d-none')){
             $('#rewards').removeClass('d-none');
             $('#icon').removeClass('fa-chevron-up')
             $('#icon').addClass('fa-chevron-down')
        }
        else{
             $('#rewards').addClass('d-none');
             $('#icon').removeClass('fa-chevron-down')
             $('#icon').addClass('fa-chevron-up')
        }
    });

    $('.service-wrapper').on('click',function(){
        if($(this).find('.service-action').hasClass('d-none')){
             $(this).find('.service-action').removeClass('d-none')
             $(this).find('.service-icon').removeClass('fa-chevron-up')
             $(this).find('.service-icon').addClass('fa-chevron-down')
        }
        else{
             $(this).find('.service-action').addClass('d-none')
             $(this).find('.service-icon').removeClass('fa-chevron-down')
             $(this).find('.service-icon').addClass('fa-chevron-up')
        }
    })
</script>
@endsection