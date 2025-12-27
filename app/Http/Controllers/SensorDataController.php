<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use App\Http\Requests\StoreSensorDataRequest;
use App\Http\Requests\UpdateSensorDataRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function errorSensorData(): JsonResponse
    {
        return response()->json([
            'temperature' => 'Sensor Error',
            'humidity' => 'Sensor Error',
            'light' => 'Sensor Error',
            'soil' => 'Sensor Error',
            'updated_at' => now(),
        ]);
    }

    public function lastDaySensorData(): JsonResponse
    {
        $from = Carbon::now()->subDay(); // UTC
        $to   = Carbon::now();

        $rows = SensorData::whereBetween('created_at', [$from, $to])->get();

        $grouped = $rows->groupBy(fn ($item) =>
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
            $c = $grouped[$hour] ?? collect();

            $data[] = [
                'label'     => $hour,
                'avg_temp'  => $c->isNotEmpty() ? round($c->avg('temp'), 2) : null,
                'avg_humi'  => $c->isNotEmpty() ? round($c->avg('humi'), 2) : null,
                'avg_lumi'  => $c->isNotEmpty() ? round($c->avg('lumi'), 2) : null,
                'avg_soil'  => $c->isNotEmpty() ? round($c->avg('soil'), 2) : null,
                'avg_rain'  => $c->isNotEmpty() ? round($c->avg('rain'), 2) : null,
                'count'     => $c->count(),
            ];
        }

        return response()->json([
            'range' => 'day',
            'data'  => $data
        ]);
    }

    public function lastWeekSensorData(): JsonResponse
    {
        $from = Carbon::now()->subDays(7);
        $to   = Carbon::now();

        $rows = SensorData::whereBetween('created_at', [$from, $to])->get();

        $grouped = $rows->groupBy(fn ($item) =>
            $item->created_at->timezone('Asia/Jakarta')->format('Y-m-d')
        );

        // generate slot hari
        $start = $from->copy()->timezone('Asia/Jakarta')->startOfDay();
        $end   = $to->copy()->timezone('Asia/Jakarta')->startOfDay();

        $days = [];
        while ($start <= $end) {
            $days[] = $start->format('Y-m-d');
            $start->addDay();
        }

        $data = [];
        foreach ($days as $day) {
            $c = $grouped[$day] ?? collect();

            $data[] = [
                'label'     => $day,
                'avg_temp'  => $c->isNotEmpty() ? round($c->avg('temp'), 2) : null,
                'avg_humi'  => $c->isNotEmpty() ? round($c->avg('humi'), 2) : null,
                'avg_lumi'  => $c->isNotEmpty() ? round($c->avg('lumi'), 2) : null,
                'avg_soil'  => $c->isNotEmpty() ? round($c->avg('soil'), 2) : null,
                'avg_rain'  => $c->isNotEmpty() ? round($c->avg('rain'), 2) : null,
                'count'     => $c->count(),
            ];
        }

        return response()->json([
            'range' => 'week',
            'data'  => $data
        ]);
    }

    public function lastMonthSensorData(): JsonResponse
    {
        $from = Carbon::now()->subDays(30);
        $to   = Carbon::now();

        $rows = SensorData::whereBetween('created_at', [$from, $to])->get();

        $grouped = $rows->groupBy(fn ($item) =>
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
            $c = $grouped[$day] ?? collect();

            $data[] = [
                'label'     => $day,
                'avg_temp'  => $c->isNotEmpty() ? round($c->avg('temp'), 2) : null,
                'avg_humi'  => $c->isNotEmpty() ? round($c->avg('humi'), 2) : null,
                'avg_lumi'  => $c->isNotEmpty() ? round($c->avg('lumi'), 2) : null,
                'avg_soil'  => $c->isNotEmpty() ? round($c->avg('soil'), 2) : null,
                'avg_rain'  => $c->isNotEmpty() ? round($c->avg('rain'), 2) : null,
                'count'     => $c->count(),
            ];
        }

        return response()->json([
            'range' => 'month',
            'data'  => $data
        ]);
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
