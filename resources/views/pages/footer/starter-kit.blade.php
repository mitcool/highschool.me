@extends('template')

@section('seo')
<title>{{trans('promotion.meta-title')}}</title>
<meta itemprop="description" name="description" content="{{ trans('promotion.meta-description') }}" />

<meta itemprop="title" property="og:title" content="{{trans('promotion.meta-title')}}"/>
<meta property="og:type" content="website"/>
<meta itemprop="url" property="og:url" content="{{  route('starter-kit') }}"/>
<meta property="og:description" content="{{ trans('promotion.meta-description') }}"/>
<x-meta-image itemprop="image" nickname="coaching"/>

@endsection

@section('headCSS')
<style>
    .small-text {
        font-size: 14px;
        line-height: 1.7;
        color: #8a8a8a;
    }
    .orange-icons {
        background-color: #F8F9FA;
        padding: 56px 0 52px;
    }
    .freshman-kit-subtitle {
        text-align: center;
        margin-bottom: 2.5rem;
    }
    .freshman-kit-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 42px 28px;
        max-width: 860px;
        margin: 0 auto;
    }
    .freshman-kit-item {
        text-align: center;
    }
    .feature-icon {
        width: 84px;
        height: 84px;
        object-fit: contain;
        display: block;
        margin: 0 auto 14px;
    }
    .feature-label {
        color: #111;
        font-size: 1.02rem;
        font-weight: 600;
        line-height: 1.35;
        margin: 0;
    }
    .freshman-kit-cards-container {
        background-color: #F8F9FA;
        padding-top: 3rem;
    }
    .freshman-kit-cards {
        padding: 10px 0 24px;
    }
    .freshman-kit-card {
        display: grid;
        grid-template-columns: 36% 64%;
        align-items: stretch;
        background: #fff;
        box-shadow: 0 10px 28px rgba(17, 24, 39, 0.12);
        margin-bottom: 24px;
        overflow: hidden;
    }
    .freshman-kit-card.is-reversed {
        grid-template-columns: 64% 36%;
    }
    .freshman-kit-card-image {
        min-height: 212px;
    }
    .freshman-kit-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .freshman-kit-card-body {
        padding: 28px 32px;
    }
    .freshman-kit-card-title {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #111;
        font-size: 1.12rem;
        font-weight: 700;
        line-height: 1.35;
        margin-bottom: 16px;
    }
    .freshman-kit-card-title i {
        color: #111;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .freshman-kit-card-text {
        color: #2f2f2f;
        font-size: 1.02rem;
        line-height: 1.45;
        margin: 0;
    }
    @media (max-width: 991.98px) {
        .freshman-kit-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 34px 20px;
            max-width: 520px;
        }
        .freshman-kit-card,
        .freshman-kit-card.is-reversed {
            grid-template-columns: 1fr;
        }
        .freshman-kit-card.is-reversed .freshman-kit-card-body {
            order: 2;
        }
        .freshman-kit-card.is-reversed .freshman-kit-card-image {
            order: 1;
        }
        .freshman-kit-card-image {
            min-height: 280px;
        }
    }
    @media (max-width: 575.98px) {
        .orange-icons {
            padding: 42px 0 38px;
        }
        .freshman-kit-subtitle {
            margin-bottom: 2rem;
            padding: 0 14px;
        }
        .freshman-kit-grid {
            grid-template-columns: 1fr;
            gap: 28px;
            max-width: 260px;
        }
        .feature-icon {
            width: 78px;
            height: 78px;
            margin-bottom: 12px;
        }
        .feature-label {
            font-size: .98rem;
        }
        .freshman-kit-cards {
            padding-bottom: 12px;
        }
        .freshman-kit-card {
            margin-bottom: 18px;
        }
        .freshman-kit-card-image {
            min-height: 220px;
        }
        .freshman-kit-card-body {
            padding: 22px 18px;
        }
        .freshman-kit-card-title {
            font-size: 1rem;
            gap: 10px;
            margin-bottom: 14px;
        }
        .freshman-kit-card-text {
            font-size: .98rem;
        }
    }
</style>
@endsection

@section('content')

<x-image-component nickname="freshman-kit-cover" class="digital_studies-images main-pictures-pages"/>
<div class="mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
                <h1 class="page-headings p-3">The Ultimate Freshman Kit: Feel Like You’ve Always Been Here</h1>

                <p class="text-dark text-justify">
                    Earn real high school credits through a recognized curriculum that
                    meets national academic standards.
                </p>
                <p class="text-dark text-justify">
                    Be part of the movement from Day One.
                </p>
                <p class="text-dark text-justify">
                    Not as a newcomer, but as a core member of the community.
                </p>
                <p class="text-dark text-justify">
                    The individually curated Freshman Kit puts you right in the middle of it. Whether it’s Street Mode, Tech Vibe, Green Flow, or a deep Study Grind – each kit is matched to your vibe and combines trend pieces with smart essentials into a clean, cohesive setup.
                </p>
                <p class="text-dark text-justify">
                    No mainstream defaults. No copy-paste styles.
                </p>
            </div>
        </div>
    </div>
    <div class="mt-4 orange-icons">
        <div class="container">
            <h2 class="freshman-kit-subtitle">Upgrade your Daily Game with the Freshman Kit</h2>
            <div class="freshman-kit-grid">
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/bag.webp') }}" class="feature-icon" alt="School Gear icon">
                    <p class="feature-label">School Gear</p>
                </div>
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/book.webp') }}" class="feature-icon" alt="Notes and Organization icon">
                    <p class="feature-label">Notes &amp; Organization</p>
                </div>
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/headphones.webp') }}" class="feature-icon" alt="Audio and Focus icon">
                    <p class="feature-label">Audio &amp; Focus</p>
                </div>
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/power.webp') }}" class="feature-icon" alt="Power and Charging icon">
                    <p class="feature-label">Power &amp; Charging</p>
                </div>
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/usb.webp') }}" class="feature-icon" alt="Storage and Files icon">
                    <p class="feature-label">Storage &amp; Files</p>
                </div>
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/tablet.webp') }}" class="feature-icon" alt="Digital Learning icon">
                    <p class="feature-label">Digital Learning</p>
                </div>
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/phone.webp') }}" class="feature-icon" alt="Smart Tools icon">
                    <p class="feature-label">Smart Tools</p>
                </div>
                <div class="freshman-kit-item">
                    <img src="{{ asset('/images/freshman-kit/pens.webp') }}" class="feature-icon" alt="Writing Tools icon">
                    <p class="feature-label">Writing Tools</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
                <h2 class="p-3">The Freshman Setup – Inside your Welcome Loot</h2>

                <p class="text-dark text-justify">
                    Every Kit is a Unique Match: Once your enrollment is locked in, we curate and pack your individual setup from our latest highlights and ship it straight to your door. 
                </p>
                <p class="text-dark text-justify">
                    Get ready for the ultimate unboxing experience – your personalized gear is on its way. 
                </p>
                <p class="text-dark text-justify">
                    No boring standard-packs. Depending on the current drop, your setup follows one of these styles:
                </p>
            </div>
        </div>
    </div>

    <div class="freshman-kit-cards-container">
    <div class="container freshman-kit-cards">
        <div class="freshman-kit-card">
            <div class="freshman-kit-card-image">
                <x-image-component nickname="onsites-freshman-kit-students-smartphone-desk" loading="eager"/>
            </div>
            <div class="freshman-kit-card-body">
                <h3 class="freshman-kit-card-title">
                    <i class="fas fa-bolt"></i>
                    <span>Street Mode: Conquer the Urban Jungle</span>
                </h3>
                <p class="freshman-kit-card-text">
                    Master the city streets with gear that moves as fast as you do. Whether you are navigating new languages or cruising through a packed school week, this kit keeps you flexible, connected, and ready for every turn.
                </p>
            </div>
        </div>

        <div class="freshman-kit-card is-reversed">
            <div class="freshman-kit-card-body">
                <h3 class="freshman-kit-card-title">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Tech Vibe: Stay Connected, Stay Powered</span>
                </h3>
                <p class="freshman-kit-card-text">
                    Your digital life does not hit pause. This setup is made for students who need utility that keeps devices charged, files close at hand, and daily routines powered from the first class to the last task.
                </p>
            </div>
            <div class="freshman-kit-card-image">
                <x-image-component nickname="onsites-freshman-kit-students-enrollment-card-cafe" loading="eager"/>
            </div>
        </div>

        <div class="freshman-kit-card">
            <div class="freshman-kit-card-image">
                <x-image-component nickname="onsites-freshman-kit-students-outdoor-picnic" loading="eager"/>
            </div>
            <div class="freshman-kit-card-body">
                <h3 class="freshman-kit-card-title">
                    <i class="fas fa-leaf"></i>
                    <span>Green Flow: Fresh Energy for Every Day</span>
                </h3>
                <p class="freshman-kit-card-text">
                    Built for balance, comfort, and mindful routines, this version mixes dependable essentials with a lighter everyday feel so your setup stays clean, portable, and easy to rely on from morning to night.
                </p>
            </div>
        </div>

        <div class="freshman-kit-card is-reversed">
            <div class="freshman-kit-card-body">
                <h3 class="freshman-kit-card-title">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Study Grind: Locked In and Ready to Win</span>
                </h3>
                <p class="freshman-kit-card-text">
                    When the goal is focus, this kit brings together the tools that help you stay sharp, keep your notes in order, and build momentum through assignments, classes, and the habits that actually stick.
                </p>
            </div>
            <div class="freshman-kit-card-image">
                <x-image-component nickname="onsites-freshman-kit-students-tablet-outdoor" loading="eager"/>
            </div>
        </div>
    </div>
    </div>

    <x-three-buttons />
</div>
@endsection
