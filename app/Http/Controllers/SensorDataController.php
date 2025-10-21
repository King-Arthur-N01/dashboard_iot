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

    public function summarySensorData(): JsonResponse
    {
        // $currenttime = Carbon::now('Asia/Jakarta');

        $last_day = Carbon::now('Asia/Jakarta')->format('dd/mm/yyyy');
        $data = SensorData::find('created_at')->where($last_day);
        

        return response()->json([
            'temperature' => $data->temp ?? 'N/A',
            'humidity' => $data->humi ?? 'N/A',
            'light' => $data->lumi ?? 'N/A',
            'soil' => $data->soil ?? 'N/A',
            'updated_at' => $data->created_at ?? now(),
        ]);
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
