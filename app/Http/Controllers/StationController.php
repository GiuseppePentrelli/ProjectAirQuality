<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class StationController extends Controller
{

    public function index()
    {
        $response = Http::withoutVerifying()
            ->acceptJson()
            ->get("https://api.zeroc.green/v1/stations/");

        if ($response->failed()) {
            return view('stations.index', [
                'stations' => [],
                'error' => "Errore API: " . $response->status() . " - " . $response->body()
            ]);
        }

        $data = $response->json();
        $stations = $data['stations'] ?? [];

        // dd($data);
        return view('stations.index', compact('stations'));
    }

    public function show($site)
    {


        $response_site = Http::get("https://api.zeroc.green/v1/stations/");
        $data_site = $response_site->json();

        $data_sites = $data_site['stations'];



        foreach ($data_sites as $station) {

            if (str_replace(" ", "-", strtolower($station['site'])) === $site) {

                $station_id = $station['id'];
                break;
            }
        }

        if (!$station_id) {
            return view(
                'stations.error',

            );
        }


        $response = Http::get("https://api.zeroc.green/v1/stations/{$station_id}");
        $data = $response->json();



        // Calcolo media ponderata sugli ultimi 7 giorni
        if (isset($data['metrics'])) {
            foreach ($data['metrics'] as &$metric) {
                $last7 = array_slice($metric['data_points'], 0, 7);
                //  dd($last7);
                $sum = 0;
                $weightSum = 0;

                foreach ($last7 as $day) {
                    if ($day['sample_size'] > 0) {
                         $averageDay = round($day['average'], 2);

                        $sum += $averageDay * $day['sample_size'];
                        $weightSum += $day['sample_size'];

                          $day['average'] = $averageDay;
                    }
                    //   dd($day);

                }

                $metric['weighted_average'] = $weightSum ? round($sum / $weightSum, 2) : null;
            }
        }

        return view('stations.show', compact('data'));
    }
}
