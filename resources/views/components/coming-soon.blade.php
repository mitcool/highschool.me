<div {{ $attributes->merge(['class' => 'coming-soon-wrapper']) }}>
    <style>
        .coming-soon-wrapper {
            width: 100%;
            padding: 60px 20px;
        }

        .coming-soon-card {
            max-width: 920px;
            margin: 0 auto;
            text-align: center;
            background: #ffffff;
        }

        .coming-soon-illustration {
            width: min(100%, 320px);
            height: auto;
            margin: 0 auto 34px;
            display: block;
        }

        .coming-soon-title {
            color: #025297;
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .coming-soon-text {
            max-width: 920px;
            margin: 0 auto 30px;
            color: #7f7f7f;
            font-size: clamp(1rem, 1.35vw, 1.25rem);
            line-height: 1.55;
        }

        .coming-soon-button {
            min-width: 186px;
            text-decoration: none !important;
            font-size: 1.15rem;
            padding: 12px 26px;
            border-radius: 8px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .coming-soon-wrapper {
                padding: 40px 16px;
            }

            .coming-soon-illustration {
                width: min(100%, 250px);
                margin-bottom: 24px;
            }

            .coming-soon-text {
                max-width: 100%;
            }
        }
    </style>

    <div class="coming-soon-card">
        <x-image-component nickname="cartoon-character-tools-gears-maintenance" loading="eager" />

        <h2 class="coming-soon-title">Coming soon</h2>

        <p class="coming-soon-text">Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros. Maecenas fringilla elit in nibh efficitur placerat. Nulla sed felis neque. Aenean suscipit lorem ac orci ultricies, ac gravida tellus pretium. Vivamus vitae nisi a dolor aliquet varius in a eros.</p>



        <a href="{{ route('welcome') }}" class="orange-button btn coming-soon-button">
            Go to Homepage
        </a>
    </div>
</div>
