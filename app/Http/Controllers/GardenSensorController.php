<?php

namespace App\Http\Controllers;

use App\Models\GardenSensor;
use App\Models\SoilSensor;
use App\Models\RelayData;
use App\Http\Requests\StoreGardenSensorRequest;
use App\Http\Requests\UpdateGardenSensorRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use PhpMqtt\Client\Facades\MQTT;
use Carbon\Carbon;

class GardenSensorController extends Controller
{
    // public function liveSensorData(Request $request)
    // {
    //     try {
    //         $data = $request->validate([
    //             'suhu' => 'required|numeric',
    //             'kelembapan' => 'required|numeric',
    //             'cahaya' => 'required|numeric',
    //             'hujan' => 'required|numeric',
    //             'received_at' => 'nullable|string',
    //         ]);

    //         return response()->json([
    //             'status' => 'ok'
    //         ]);

    //     } catch (\Exception $e) {
    //         Log::error('Error fetching data: ' . $e->getMessage());
    //         return response()->json(['error' => 'Error fetching data'], 500);
    //     }
    // }
    public function latestSensorData(): JsonResponse
    {
        try {
            $sensor_data = GardenSensor::latest()->first();
            $soil_data = SoilSensor::latest()->first();

            // Hitung rata-rata kelembapan tanah dari soil_1 s/d soil_9
            $average_soil = 'N/A';
            if ($soil_data) {
                $soil_values = [
                    $soil_data->soil_1,
                    $soil_data->soil_2,
                    $soil_data->soil_3,
                    $soil_data->soil_4,
                    $soil_data->soil_5,
                    $soil_data->soil_6,
                    $soil_data->soil_7,
                    $soil_data->soil_8,
                    $soil_data->soil_9,
                ];

                // Filter nilai yang tidak null/empty lalu hitung rata-ratanya
                $valid_soils = array_filter($soil_values, function($val) {
                    return !is_null($val) && $val !== '';
                });

                if (count($valid_soils) > 0) {
                    $average_soil = round(array_sum($valid_soils) / count($valid_soils), 2);
                }
            }

            return response()->json([
                'temperature' => $sensor_data->garden_temp ?? 'N/A',
                'humidity'    => $sensor_data->garden_humi ?? 'N/A',
                'light'       => $sensor_data->garden_lumi ?? 'N/A',
                'soil'        => $average_soil,
                'rain'        => $sensor_data->garden_rain ?? 'N/A',
                'updated_at'  => $sensor_data->created_at ?? now(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching latest sensor data: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data'], 500);
        }
    }

    public function errorSensorData(): JsonResponse
    {
        return response()->json([
            'temperature' => 'Sensor Error',
            'humidity' => 'Sensor Error',
            'light' => 'Sensor Error',
            'soil' => 'Sensor Error',
            'rain' => 'Sensor Error',
            'updated_at' => now(),
        ]);
    }

    public function lastDaySensorData(): JsonResponse
    {
        try {
            $from = Carbon::now()->subDay(); // UTC
            $to   = Carbon::now();
            $garden_rows = GardenSensor::whereBetween('created_at', [$from, $to])->get();
            $soil_rows   = SoilSensor::whereBetween('created_at', [$from, $to])->get();

            $garden_grouped = $garden_rows->groupBy(fn ($item) =>
                $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d H')
            );
            $soil_grouped = $soil_rows->groupBy(fn ($item) =>
                $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d H')
            );

            // generate slot jam (WIB)
            $start = $from->copy()->timezone('Asia/Jakarta')->startOfHour();
            $end   = $to->copy()->timezone('Asia/Jakarta')->startOfHour();

            $hours = [];
            while ($start <= $end) {
                $hours[] = $start->format('Y-m-d H');
                $start->addHour();
            }

            $data = [];
            foreach ($hours as $hour) {
                // Garden data
                $rawGarden = $garden_grouped[$hour] ?? collect();
                $dateTime  = \DateTime::createFromFormat('Y-m-d H', $hour);
                $label     = $dateTime ? $dateTime->format('H:i') : $hour;
                $data[] = [
                    'label'     => $label,
                    'avg_temp'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_temp'), 2) : null,
                    'avg_humi'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_humi'), 2) : null,
                    'avg_lumi'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_lumi'), 2) : null,
                    'avg_rain'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_rain'), 2) : null,
                    'count'     => $rawGarden->count(),
                ];
            }
            foreach ($hours as $hour) {
                // Soil data
                $rawSoil  = $soil_grouped[$hour] ?? collect();
                $dateTime = \DateTime::createFromFormat('Y-m-d H', $hour);
                $label    = $dateTime ? $dateTime->format('H:i') : $hour;
                $average_soil = null;
                if ($rawSoil->isNotEmpty()) {
                    // Ambil semua nilai soil dari setiap row
                    $soil_values = [];
                    foreach ($rawSoil as $soil_data) {
                        $soil_values = array_merge($soil_values, [
                            $soil_data->soil_1,
                            $soil_data->soil_2,
                            $soil_data->soil_3,
                            $soil_data->soil_4,
                            $soil_data->soil_5,
                            $soil_data->soil_6,
                            $soil_data->soil_7,
                            $soil_data->soil_8,
                            $soil_data->soil_9,
                        ]);
                    }

                    // Filter nilai valid
                    $valid_soils = array_filter($soil_values, fn($val) => !is_null($val) && $val !== '');
                    if (count($valid_soils) > 0) {
                        $average_soil = round(array_sum($valid_soils) / count($valid_soils), 2);
                    }
                }
                $data[] = [
                    'label'    => $label,
                    'avg_soil' => $average_soil,
                    'count'    => $rawSoil->count(),
                ];
            }

            return response()->json([
                'range' => 'day',
                'data'  => $data
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching latest sensor data: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data'], 500);
        }
    }

    public function lastWeekSensorData(): JsonResponse
    {
        try {
            $from = Carbon::now()->subDays(7); // 7 hari ke belakang
            $to   = Carbon::now();

            $garden_rows = GardenSensor::whereBetween('created_at', [$from, $to])->get();
            $soil_rows   = SoilSensor::whereBetween('created_at', [$from, $to])->get();

            // Group per hari (Asia/Jakarta)
            $garden_grouped = $garden_rows->groupBy(fn ($item) =>
                $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d')
            );
            $soil_grouped = $soil_rows->groupBy(fn ($item) =>
                $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d')
            );

            // Generate slot hari
            $start = $from->copy()->timezone('Asia/Jakarta')->startOfDay();
            $end   = $to->copy()->timezone('Asia/Jakarta')->startOfDay();

            $days = [];
            while ($start <= $end) {
                $days[] = $start->format('Y-m-d');
                $start->addDay();
            }

            $data = [];
            foreach ($days as $day) {
                $rawGarden = $garden_grouped[$day] ?? collect();
                $rawSoil   = $soil_grouped[$day] ?? collect();

                $label = Carbon::createFromFormat('Y-m-d', $day)->format('d M');

                $avgSoil = null;
                if ($rawSoil->isNotEmpty()) {
                    $soil_values = [];
                    foreach ($rawSoil as $soil_data) {
                        $soil_values = array_merge($soil_values, [
                            $soil_data->soil_1, $soil_data->soil_2, $soil_data->soil_3,
                            $soil_data->soil_4, $soil_data->soil_5, $soil_data->soil_6,
                            $soil_data->soil_7, $soil_data->soil_8, $soil_data->soil_9,
                        ]);
                    }
                    $valid = array_filter($soil_values, fn($v) => !is_null($v) && $v !== '');
                    if (count($valid) > 0) {
                        $avgSoil = round(array_sum($valid) / count($valid), 2);
                    }
                }

                $data[] = [
                    'label'     => $label,
                    'avg_temp'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_temp'), 2) : null,
                    'avg_humi'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_humi'), 2) : null,
                    'avg_lumi'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_lumi'), 2) : null,
                    'avg_rain'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_rain'), 2) : null,
                    'avg_soil'  => $avgSoil,
                    'count'     => $rawGarden->count() + $rawSoil->count(),
                ];
            }

            return response()->json([
                'range' => 'week',
                'data'  => $data
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching latest sensor data: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data'], 500);
        }
    }


    public function lastMonthSensorData(): JsonResponse
    {
        try {
            $from = Carbon::now()->subDays(30); // 30 hari ke belakang
            $to   = Carbon::now();

            $garden_rows = GardenSensor::whereBetween('created_at', [$from, $to])->get();
            $soil_rows   = SoilSensor::whereBetween('created_at', [$from, $to])->get();

            // Group per hari
            $garden_grouped = $garden_rows->groupBy(fn ($item) =>
                $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d')
            );
            $soil_grouped = $soil_rows->groupBy(fn ($item) =>
                $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d')
            );

            $start = $from->copy()->timezone('Asia/Jakarta')->startOfDay();
            $end   = $to->copy()->timezone('Asia/Jakarta')->startOfDay();

            $days = [];
            while ($start <= $end) {
                $days[] = $start->format('Y-m-d');
                $start->addDay();
            }

            $data = [];
            foreach ($days as $day) {
                $rawGarden = $garden_grouped[$day] ?? collect();
                $rawSoil   = $soil_grouped[$day] ?? collect();

                $label = Carbon::createFromFormat('Y-m-d', $day)->format('d M');

                // sama seperti weekly → hitung rata-rata soil
                $avgSoil = null;
                if ($rawSoil->isNotEmpty()) {
                    $soil_values = [];
                    foreach ($rawSoil as $soil_data) {
                        $soil_values = array_merge($soil_values, [
                            $soil_data->soil_1, $soil_data->soil_2, $soil_data->soil_3,
                            $soil_data->soil_4, $soil_data->soil_5, $soil_data->soil_6,
                            $soil_data->soil_7, $soil_data->soil_8, $soil_data->soil_9,
                        ]);
                    }
                    $valid = array_filter($soil_values, fn($v) => !is_null($v) && $v !== '');
                    if (count($valid) > 0) {
                        $avgSoil = round(array_sum($valid) / count($valid), 2);
                    }
                }

                $data[] = [
                    'label'     => $label,
                    'avg_temp'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_temp'), 2) : null,
                    'avg_humi'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_humi'), 2) : null,
                    'avg_lumi'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_lumi'), 2) : null,
                    'avg_rain'  => $rawGarden->isNotEmpty() ? round($rawGarden->avg('garden_rain'), 2) : null,
                    'avg_soil'  => $avgSoil,
                    'count'     => $rawGarden->count() + $rawSoil->count(),
                ];
            }

            return response()->json([
                'range' => 'month',
                'data'  => $data
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching latest sensor data: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data'], 500);
        }
    }


    public function summarySensorData()
    {
        return view('layouts.sensor_page.view_sensor');
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGardenSensorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GardenSensor $gardenSensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GardenSensor $gardenSensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGardenSensorRequest $request, GardenSensor $gardenSensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GardenSensor $gardenSensor)
    {
        //
    }
}
