<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class StationSearch extends Component
{
    public $stations = [];
    public $station = null;
    public $search = '';

    // Valori e classi 
    public $metrics = [
        'pm10' => ['value' => null, 'class' => 'vetro-grigio', 'unit' => ''],
        'pm25' => ['value' => null, 'class' => 'vetro-grigio', 'unit' => ''],
        'no2'  => ['value' => null, 'class' => 'vetro-grigio', 'unit' => ''],
        'so2'  => ['value' => null, 'class' => 'vetro-grigio', 'unit' => ''],
        'o3'   => ['value' => null, 'class' => 'vetro-grigio', 'unit' => ''],
        'pressure' => ['value' => null, 'class' => 'vetro-grigio', 'unit' => ''],
    ];

    public function mount()
    {
        $response = Http::withoutVerifying()->acceptJson()->get('https://api.zeroc.green/v1/stations/');

        if ($response->failed()) {
            $this->stations = [];
            return;
        }

        $data = $response->json();
        $this->stations = $data['stations'] ?? [];



        if (!empty($this->stations)) {
            $randomStation = collect($this->stations)->random();
            $this->loadStation($randomStation['id']);
        }
    }

    public function updatedSearch()
    {
        if (empty($this->search)) {
            $randomStation = collect($this->stations)->random();
            $this->loadStation($randomStation['id']);
        } else {
            $filtered = collect($this->stations)->filter(function ($station) {
                return stripos($station['name'], $this->search) !== false
                    || stripos($station['address'], $this->search) !== false
                    || stripos($station['site'], $this->search) !== false;
            });

            if ($filtered->isNotEmpty()) {
                $first = $filtered->first();
                $this->loadStation($first['id']);
            } else {
                $this->station = null;
                $this->resetMetrics();
            }
        }
    }

    private function resetMetrics()
    {
        foreach ($this->metrics as $key => $val) {
            $this->metrics[$key] = ['value' => null, 'class' => 'vetro-grigio', 'unit' => ''];
        }
    }

private function getPollutionClass($value, $type)
{
    if ($value === null) return 'vetro-grigio';

    switch (strtolower($type)) {
        case 'no2':
            return $value < 100 ? 'vetro-verde' : ($value < 200 ? 'vetro-giallo' : 'vetro-rosso');

        case 'so2':
            return $value < 100 ? 'vetro-verde' : ($value < 350 ? 'vetro-giallo' : 'vetro-rosso');

        case 'o3':
            return $value < 180 ? 'vetro-verde' : ($value < 240 ? 'vetro-giallo' : 'vetro-rosso');

        case 'pm10':
            return $value <= 20 ? 'vetro-verde' : ($value <= 50 ? 'vetro-giallo' : 'vetro-rosso');

        case 'pm25':
        case 'pm2.5':
            return $value <= 10 ? 'vetro-verde' : ($value <= 25 ? 'vetro-giallo' : 'vetro-rosso');

        default:
            return 'vetro-grigio';
    }
}


    private function extractValue($metric)
    {
        if (!empty($metric) && !empty($metric['data_points'])) {
            $last = collect($metric['data_points'])->last();
            return Arr::get($last, 'average');
        }
        return null;
    }

    public function loadStation($id)
    {
        $response = Http::withoutVerifying()->acceptJson()->get("https://api.zeroc.green/v1/stations/{$id}");

        if ($response->successful()) {
            $this->station = $response->json();

            // Mappa dei valori da aggiornare
            $metricsMap = [
                'pm10' => 'PM10',
                'pm25' => 'PM2.5',
                'no2'  => 'NO2',
                'so2'  => 'SO2',
                'o3'   => 'O3',
                'pressure' => 'Pressione atmosferica',
            ];

            foreach ($metricsMap as $key => $name) {
                $metricData = collect($this->station['metrics'])->firstWhere('name', $name);
                $value = $this->extractValue($metricData);
                $this->metrics[$key] = [
                    'value' => $value,
                    'class' => in_array($key, ['pressure']) ? 'vetro-grigio' : $this->getPollutionClass($value, $key),
                    'unit'  => $metricData['unit_of_measurement'] ?? ''
                ];
            }
        } else {
            $this->station = null;
            $this->resetMetrics();
        }

    }

    public function render()
    {
        return view('livewire.station-search');
    }
}
