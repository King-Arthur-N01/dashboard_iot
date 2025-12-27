<?php

namespace App\Http\Controllers;

use App\Models\RelayData;
use App\Http\Requests\StoreRelayDataRequest;
use App\Http\Requests\UpdateRelayDataRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use PhpMqtt\Client\Facades\MQTT;
use Carbon\Carbon;

class RelayDataController extends Controller
{
    public function manualRelayData(Request $request)
    {
        $request->validate([
            'relay' => 'required|in:on,off',
            'relay_id' => 'required|in:1,2',
        ]);

        $payload = [
            'relay' => $request->relay,
            'relay_id' => $request->relay_id,
            'time'  => 0,
            'note'  => $request->relay === 'on'
                ? 'Menyalakan pompa manual'
                : 'Mematikan pompa manual'
        ];

        MQTT::publish(
            'relay/data',
            json_encode($payload),
            0
        );

        return response()->json([
            'status' => 'ok',
            'sent'   => $payload
        ]);
    }

    public function statusRelayData(): JsonResponse
    {
        try {
            $data = RelayData::latest()->first();

            return response()->json([
                'relay1_status' => $data->relay_1_status ?? 'N/A',
                'relay2_status' => $data->relay_2_status ?? 'N/A',
                'updated_at' => $data->created_at ?? now(),
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching machine data: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRelayDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RelayData $relayData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RelayData $relayData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRelayDataRequest $request, RelayData $relayData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RelayData $relayData)
    {
        //
    }
}
