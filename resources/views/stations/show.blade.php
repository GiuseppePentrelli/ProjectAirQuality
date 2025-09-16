<x-layout>

    <main class="station-page">
        {{-- Messaggi di errore --}}
        @if (isset($error))
            <div class="alert-error">
                {{ $error }}
            </div>
        @endif

        {{-- Contenuto della stazione --}}
        @if ($data)
            <header class="station-header text-center mt-5">
                <h1 class="station-title">{{ $data['name'] ?? __('ui.unknown_station') }}</h1>
                <p class="station-address">{{ $data['address'] ?? '' }}</p>
            </header>

            {{-- Metriche --}}
            @foreach ($data['metrics'] as $metric)
                <section class="metric-card">
                    <h2 class="metric-title">
                        {{ $metric['name'] }}
                        <span class="metric-unit">({{ $metric['unit_of_measurement'] }})</span>
                    </h2>

                    <p class="metric-weighted">
                        {{ __('ui.weighted_average_7days') }}:
                        <strong>{{ $metric['weighted_average'] }}</strong>
                    </p>

                    {{-- Tabella dati --}}
                    <div class="table-container">
                        <table class="metric-table">
                            <caption class="sr-only">
                                {{ $metric['name'] }} - {{ __('ui.data_last_days') }}
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('ui.date') }}</th>
                                    <th scope="col">{{ __('ui.min') }}</th>
                                    <th scope="col">{{ __('ui.average') }}</th>
                                    <th scope="col">{{ __('ui.max') }}</th>
                                    <th scope="col">{{ __('ui.sample_size') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metric['data_points'] as $day)
                                    <tr>
                                        <td data-label="{{ __('ui.date') }}">{{ $day['date'] }}</td>
                                        <td data-label="{{ __('ui.min') }}">{{ $day['min'] }}</td>
                                        <td data-label="{{ __('ui.average') }}">{{ $day['average'] }}</td>
                                        <td data-label="{{ __('ui.max') }}">{{ $day['max'] }}</td>
                                        <td data-label="{{ __('ui.sample_size') }}">{{ $day['sample_size'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            @endforeach
        @else
            <h2 class="no-data mt-5">{{ __('ui.data_not_available') }}</h2>

                            <section class="metric-card" style="height: 70vh">
                    <h2 class="metric-title">
                        N/D
                        <span class="metric-unit">N/D</span>
                    </h2>

                    <p class="metric-weighted">
                        N/D
                        <strong>N/D</strong>
                    </p>

                    {{-- Tabella dati --}}
                    <div class="table-container">
                        <table class="metric-table">
                            <caption class="sr-only">
                                N/D
                            </caption>
                            <thead>
                                                               <tr>
                                    <th scope="col">{{ __('ui.date') }}</th>
                                    <th scope="col">{{ __('ui.min') }}</th>
                                    <th scope="col">{{ __('ui.average') }}</th>
                                    <th scope="col">{{ __('ui.max') }}</th>
                                    <th scope="col">{{ __('ui.sample_size') }}</th>
                                </tr>
                                <tr>
                                      <td data-label="{{ __('ui.date') }}">N/D</td>
                                        <td data-label="{{ __('ui.min') }}">N/D</td>
                                        <td data-label="{{ __('ui.average') }}">N/D</td>
                                        <td data-label="{{ __('ui.max') }}">N/D</td>
                                        <td data-label="{{ __('ui.sample_size') }}">N/D</td>
                                </tr>
                                
                            </thead>
                            <tbody>


                        </table>
                    </div>
                </section>
        @endif
    </main>
</x-layout>
