{{-- Menu --}}
<div class="p-5">

    {{-- Riga iniziale --}}
    <div class="d-flex justify-content-between align-items-center headMenu">
        <h3 class="h3Menu">AirWatch</h3>
        <picture>
            <img class="img-fluid logoMenu" src="/media/logoNav.png" alt="" title="Logo-Air Quality">
        </picture>
    </div>

    {{-- Presentazione --}}
    <div class="titleMenu mt-3">
        <h2 class="text-uppercase">Qualità dell'area <br> in tempo reale</h2>
        <small class="fst-italic">Monitora la tua città e scopri quanto è pulita l'aria che respiri</small>
        <div class="input-group mb-4 inputLivewire mt-3">
            <input type="text" wire:model.live="search" placeholder="{{ __('ui.searchStation') }}"
                class="form-control">
            <span class="input-group-text"><i class="bi bi-search-heart"></i></span>
        </div>
        <div class="boxSuggestion">
            <small>
                {{ __('ui.suggestion') }} 
                @foreach ($stations as $s)
                    {{ $s['name'] }} @if(!$loop->last) , @endif
                @endforeach
            </small>
        </div> 
    </div>

    {{-- MENU --}}
    <div class="menuContent p-3 text-center">
        <div class="box1">
            <div class="boxName vetro-grigio shadow py-4">
                <h5 class="text-xl font-bold">{{ $station['name'] ?? 'N/A' }}</h5>
                <p class="fs-6 text-wrap">{{ $station['address'] ?? '' }}</p>
                <small>{{ $station['site'] ?? '' }}</small>
            </div>

            <div class="box-time vetro-grigio py-3 shadow py-4">
                <h5><i class="bi bi-clock-history"></i> Ultime 24 ore</h5>
            </div>

            <div class="boxAtmosphere vetro-grigio shadow vento py-4">
                <h5><i class="bi-speedometer"></i><strong> Pressione Atmosferica</strong></h5>
                <p>{{ isset($metrics['pressure']['value']) ? round($metrics['pressure']['value']) : 'N/A' }} {{ $metrics['pressure']['unit'] ?? '' }}</p>
            </div>
        </div>

        <div class="box2">
            {{-- Prima riga box 2 --}}
            <div class="box2Row1">
                <div class="pm1 shadow {{ $metrics['pm10']['class'] }}" title="Particelle PM10">
                    <h4><i class="bi bi-cloud-haze2"></i><strong> PM10</strong></h4>
                    <p>{{ isset($metrics['pm10']['value']) ? round($metrics['pm10']['value']) : 'N/A' }} {{ $metrics['pm10']['unit'] }}</p>
                </div>

                <div class="pm2 shadow {{ $metrics['pm25']['class'] }}" title="Particelle PM2.5">
                    <h4><i class="bi bi-cloud-haze"></i><strong> PM2.5</strong></h4>
                    <p>{{ isset($metrics['pm25']['value']) ? round($metrics['pm25']['value']) : 'N/A' }} {{ $metrics['pm25']['unit'] }}</p>
                </div>
            </div>

            {{-- Seconda riga box 2 --}}
            <div class="box2Row2">
                <div class="no2 shadow {{ $metrics['no2']['class'] }}" title="Biossido di Azoto">
                    <h4><i class="bi bi-droplet-half"></i><strong> NO2</strong></h4>
                    <p>{{ isset($metrics['no2']['value']) ? round($metrics['no2']['value']) : 'N/A' }} {{ $metrics['no2']['unit'] }}</p>
                </div>

                <div class="so2 shadow {{ $metrics['so2']['class'] }}" title="Biossido di Zolfo">
                    <h4><i class="bi bi-fire"></i><strong> SO2</strong></h4>
                    <p>{{ isset($metrics['so2']['value']) ? round($metrics['so2']['value']) : 'N/A' }} {{ $metrics['so2']['unit'] }}</p>
                </div>

                <div class="o3 shadow {{ $metrics['o3']['class'] }}" title="Ozono">
                    <h4><i class="bi bi-wind"></i><strong> O3</strong></h4>
                    <p>{{ isset($metrics['o3']['value']) ? round($metrics['o3']['value']) : 'N/A' }} {{ $metrics['o3']['unit'] }}</p>
                </div>
            </div>

            <div class="legend shadow vetro-grigio mt-3">
                <h6><i class="bi bi-info-circle"></i> Legenda qualità aria</h6>
                <ul>
                    <li><span class="circle green"></span> Buona (entro i limiti OMS/UE)</li>
                    <li><span class="circle orange"></span> Moderata (vicino alla soglia di attenzione)</li>
                    <li><span class="circle red"></span> Alta (superata la soglia di allarme)</li>
                </ul>
            </div>
        </div>
    </div>
</div>
