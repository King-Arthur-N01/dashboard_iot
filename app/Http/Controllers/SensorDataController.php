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
            $rawData = $grouped[$hour] ?? collect();
            // Parse $hour (misalnya 'YYYY-MM-DD H') ke format 'HH:mm'
            $dateTime = \DateTime::createFromFormat('Y-m-d H', $hour);
            $label = $dateTime ? $dateTime->format('H:i') : $hour; // Fallback ke $hour jika parsing gagal

            $data[] = [
                'label'     => $label,
                'avg_temp'  => $rawData->isNotEmpty() ? round($rawData->avg('temp'), 2) : null,
                'avg_humi'  => $rawData->isNotEmpty() ? round($rawData->avg('humi'), 2) : null,
                'avg_lumi'  => $rawData->isNotEmpty() ? round($rawData->avg('lumi'), 2) : null,
                'avg_soil'  => $rawData->isNotEmpty() ? round($rawData->avg('soil'), 2) : null,
                'avg_rain'  => $rawData->isNotEmpty() ? round($rawData->avg('rain'), 2) : null,
                'count'     => $rawData->count(),
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
            $rawData = $grouped[$day] ?? collect();

            $data[] = [
                'label'     => $day,
                'avg_temp'  => $rawData->isNotEmpty() ? round($rawData->avg('temp'), 2) : null,
                'avg_humi'  => $rawData->isNotEmpty() ? round($rawData->avg('humi'), 2) : null,
                'avg_lumi'  => $rawData->isNotEmpty() ? round($rawData->avg('lumi'), 2) : null,
                'avg_soil'  => $rawData->isNotEmpty() ? round($rawData->avg('soil'), 2) : null,
                'avg_rain'  => $rawData->isNotEmpty() ? round($rawData->avg('rain'), 2) : null,
                'count'     => $rawData->count(),
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
            $rawData = $grouped[$day] ?? collect();

            $data[] = [
                'label'     => $day,
                'avg_temp'  => $rawData->isNotEmpty() ? round($rawData->avg('temp'), 2) : null,
                'avg_humi'  => $rawData->isNotEmpty() ? round($rawData->avg('humi'), 2) : null,
                'avg_lumi'  => $rawData->isNotEmpty() ? round($rawData->avg('lumi'), 2) : null,
                'avg_soil'  => $rawData->isNotEmpty() ? round($rawData->avg('soil'), 2) : null,
                'avg_rain'  => $rawData->isNotEmpty() ? round($rawData->avg('rain'), 2) : null,
                'count'     => $rawData->count(),
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
