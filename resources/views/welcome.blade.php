<x-layout>
    <style>
        .headerCustom,
        .mainCustom {
            background: url('/media/HeaderBg.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>

    {{-- Inizio Header --}}
    <header class="headerCustom">
        <div class="headerContent">
            <img class="img-fluid" style="max-height: 30%" src="media/imgTitle.png" alt="{{ __('ui.img_alt_title') }}">
        </div>
    </header>

    {{-- Inizio Main --}}
    <main class="mainCustom pb-5">
        <section class="presentationContainer">

            <div class="cardPresentationTitle">
                <h2>{{ __('ui.welcome') }}</h2>
                <p>
                    {{ __('ui.dashboard_description') }}
                </p>
            </div>

            <div class="presentation">
                <div class="cardPresentation">
                    <h2>{{ __('ui.station_data') }}</h2>
                    <p>
                        {{ __('ui.station_data_description') }}
                    </p>
                </div>

                <div class="cardPresentation">
                    <h2>{{ __('ui.historical_analysis') }}</h2>
                    <p>
                        {{ __('ui.historical_analysis_description') }}
                    </p>
                </div>
            </div>
        </section>
        <section class="menuContainer pb-4">
            <div class="menuRandom shadow-lg">

                <livewire:station-search />
            </div>
        </section>
    </main>

</x-layout>
