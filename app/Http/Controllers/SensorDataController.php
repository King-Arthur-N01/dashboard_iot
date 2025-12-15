<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use App\Http\Requests\StoreSensorDataRequest;
use App\Http\Requests\UpdateSensorDataRequest;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class SensorDataController extends Controller
{
    public function latestSensorData(): JsonResponse
    {
        $data = SensorData::latest()->first();

        return response()->json([
            'temperature' => $data->temp ?? 'N/A',
            'humidity' => $data->humi ?? 'N/A',
            'light' => $data->lumi ?? 'N/A',
            'soil' => $data->soil ?? 'N/A',
            'updated_at' => $data->created_at ?? now(),
        ]);
    }

    public function lastDaySensorData(): JsonResponse
    {
        $oneDayAgo = Carbon::now()->subDay();

        $lastdaydata = SensorData::where('created_at', '>=', $oneDayAgo)->get();

        $grouped = $lastdaydata->groupBy(function ($item) {
            return $item->created_at
                ->timezone('Asia/Jakarta')
                ->format('Y-m-d H');
        });

        // Generate jam WIB
        $start = $oneDayAgo->copy()->timezone('Asia/Jakarta')->startOfHour();
        $end = Carbon::now('Asia/Jakarta')->startOfHour();

        $hours = [];
        while ($start <= $end) {
            $hours[] = $start->format('Y-m-d H');
            $start->addHour();
        }

        $data = [];
        foreach ($hours as $hour) {
            if (isset($grouped[$hour])) {
                $c = $grouped[$hour];
                $data[] = [
                    'hour' => $hour,
                    'avg_temp' => round($c->avg('temp'), 2),
                    'avg_humi' => round($c->avg('humi'), 2),
                    'avg_lumi' => round($c->avg('lumi'), 2),
                    'avg_soil' => round($c->avg('soil'), 2),
                    'avg_rain' => round($c->avg('rain'), 2),
                    'count' => $c->count(),
                ];
            } else {
                $data[] = [
                    'hour' => $hour,
                    'avg_temp' => null,
                    'avg_humi' => null,
                    'avg_lumi' => null,
                    'avg_soil' => null,
                    'avg_rain' => null,
                    'count' => 0,
                ];
            }
        }

        return response()->json([
            'data' => $data,
            'total_hours' => count($hours),
        ]);
    }

    public function summarySensorData()
    {
        return view('layouts.sensor_page.view_sensor');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSensorDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SensorData $sensorData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SensorData $sensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSensorDataRequest $request, SensorData $sensorData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SensorData $sensorData)
    {
        //
    }
}
