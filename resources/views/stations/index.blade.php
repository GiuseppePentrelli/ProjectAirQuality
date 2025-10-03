<x-layout>
    <header class="headerIndex">
        <div class="container">
            <div style="height: 100px"></div>
            <h1 class="text-center">{{ __('ui.stations_monitoring') }}</h1>

            @if (!empty($stations))
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/d/embed?mid=1tHWbOisULU2gAAR8klNJmtNUrRx1V1M&ehbc=2E312F&noprof=1"></iframe>
                </div>

                <div class="stations-list py-4">
                    @foreach ($stations as $station)
                        <div class="station-card">
                            <h2>{{ $station['name'] ?? __('ui.no_name') }}</h2>
                            <p style="color: var(--primary-color)">
                                {{ $station['address'] ?? __('ui.address_not_available') }}<br>
                                {{ __('ui.site') }}: {{ $station['site'] ?? '-' }}
                            </p>
                            <a class="details-btn" href="{{ route('stations.show', str_replace(" " ,"-", strtolower($station['site']))) }}">
                                {{ __('ui.view_details') }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p>{{ __('ui.no_stations_found') }}</p>
            @endif
        </div>
    </header>
</x-layout>
