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
            'relay_id' => 'required|in:1,2,3,4',
        ]);

        $payload = [
            'relay' => (int) $request->relay,
            'relay_id' => (int) $request->relay_id,
            'time'  => 0,
            'note'  => $request->relay === 'on'
                ? 'Menyalakan pompa manual'
                : 'Mematikan pompa manual'
        ];

        MQTT::publish(
            'farm/tank/1/cmd',
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
                'relay3_status' => $data->relay_3_status ?? 'N/A',
                'relay4_status' => $data->relay_4_status ?? 'N/A',
                'updated_at' => $data->created_at ?? now(),
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching data: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data'], 500);
        }
    }

    public function lastDayRelayData(): JsonResponse
    {
        try {
            $from = Carbon::now('UTC')->subDay();
            $to   = Carbon::now('UTC');

            $logs = RelayData::whereBetween('created_at', [$from, $to])
                ->orderBy('created_at')
                ->get();

            $result = [
                'range'   => 'last_24_hours',
                'relay_1' => [],
                'relay_2' => [],
                'relay_3' => [],
                'relay_4' => [],
            ];

            $active = [
                'relay_1' => null,
                'relay_2' => null,
                'relay_3' => null,
                'relay_4' => null,
            ];

            foreach ($logs as $log) {
                $time = $log->created_at->timezone('Asia/Jakarta');
                // ===== RELAY 1 =====
                if ($log->relay_1_status === 1 && $active['relay_1'] === null) {
                    $active['relay_1'] = $time;
                }
                if ($log->relay_1_status === 0 && $active['relay_1']) {
                    $duration = $active['relay_1']->diffInSeconds($time);

                    $result['relay_1'][] = [
                        'start'    => $active['relay_1']->format('H:i:s'),
                        'duration' => $duration, // DETIK
                    ];
                    $active['relay_1'] = null;
                }
                // ===== RELAY 2 =====
                if ($log->relay_2_status === 1 && $active['relay_2'] === null) {
                    $active['relay_2'] = $time;
                }
                if ($log->relay_2_status === 0 && $active['relay_2']) {
                    $duration = $active['relay_2']->diffInSeconds($time);
                    $result['relay_2'][] = [
                        'start'    => $active['relay_2']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_2'] = null;
                }
                // ===== RELAY 3 =====
                if ($log->relay_3_status === 1 && $active['relay_3'] === null) {
                    $active['relay_3'] = $time;
                }
                if ($log->relay_3_status === 0 && $active['relay_3']) {
                    $duration = $active['relay_3']->diffInSeconds($time);
                    $result['relay_3'][] = [
                        'start'    => $active['relay_3']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_3'] = null;
                }
                // ===== RELAY 4 =====
                if ($log->relay_4_status === 1 && $active['relay_4'] === null) {
                    $active['relay_4'] = $time;
                }
                if ($log->relay_4_status === 0 && $active['relay_4']) {
                    $duration = $active['relay_4']->diffInSeconds($time);
                    $result['relay_4'][] = [
                        'start'    => $active['relay_4']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_4'] = null;
                }
            }
            return response()->json($result);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to build chart data'], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function lastWeekRelayData (): JsonResponse
    {
        try {
            $from = Carbon::now('UTC')->subDay(7);
            $to   = Carbon::now('UTC');

            $logs = RelayData::whereBetween('created_at', [$from, $to])
                ->orderBy('created_at')
                ->get();

            $result = [
                'range'   => 'last_week',
                'relay_1' => [],
                'relay_2' => [],
                'relay_3' => [],
                'relay_4' => [],

            ];

            $active = [
                'relay_1' => null,
                'relay_2' => null,
                'relay_3' => null,
                'relay_4' => null,
            ];

            foreach ($logs as $log) {
                $time = $log->created_at->timezone('Asia/Jakarta');
                // ===== RELAY 1 =====
                if ($log->relay_1_status === 1 && $active['relay_1'] === null) {
                    $active['relay_1'] = $time;
                }
                if ($log->relay_1_status === 0 && $active['relay_1']) {
                    $duration = $active['relay_1']->diffInSeconds($time);

                    $result['relay_1'][] = [
                        'start'    => $active['relay_1']->format('H:i:s'),
                        'duration' => $duration, // DETIK
                    ];
                    $active['relay_1'] = null;
                }
                // ===== RELAY 2 =====
                if ($log->relay_2_status === 1 && $active['relay_2'] === null) {
                    $active['relay_2'] = $time;
                }
                if ($log->relay_2_status === 0 && $active['relay_2']) {
                    $duration = $active['relay_2']->diffInSeconds($time);
                    $result['relay_2'][] = [
                        'start'    => $active['relay_2']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_2'] = null;
                }
                // ===== RELAY 3 =====
                if ($log->relay_3_status === 1 && $active['relay_3'] === null) {
                    $active['relay_3'] = $time;
                }
                if ($log->relay_3_status === 0 && $active['relay_3']) {
                    $duration = $active['relay_3']->diffInSeconds($time);
                    $result['relay_3'][] = [
                        'start'    => $active['relay_3']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_3'] = null;
                }
                // ===== RELAY 4 =====
                if ($log->relay_4_status === 1 && $active['relay_4'] === null) {
                    $active['relay_4'] = $time;
                }
                if ($log->relay_4_status === 0 && $active['relay_4']) {
                    $duration = $active['relay_4']->diffInSeconds($time);
                    $result['relay_4'][] = [
                        'start'    => $active['relay_4']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_4'] = null;
                }
            }
            return response()->json($result);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to build chart data'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function lastMonthRelayData(RelayData $relayData)
    {
        try {
            $from = Carbon::now('UTC')->subDays(30);
            $to   = Carbon::now('UTC');

            $logs = RelayData::whereBetween('created_at', [$from, $to])
                ->orderBy('created_at')
                ->get();

            $result = [
                'range'   => 'last_week',
                'relay_1' => [],
                'relay_2' => [],
                'relay_3' => [],
                'relay_4' => [],
            ];

            $active = [
                'relay_1' => null,
                'relay_2' => null,
                'relay_3' => null,
                'relay_4' => null,
            ];

            foreach ($logs as $log) {
                $time = $log->created_at->timezone('Asia/Jakarta');
                // ===== RELAY 1 =====
                if ($log->relay_1_status === 1 && $active['relay_1'] === null) {
                    $active['relay_1'] = $time;
                }
                if ($log->relay_1_status === 0 && $active['relay_1']) {
                    $duration = $active['relay_1']->diffInSeconds($time);

                    $result['relay_1'][] = [
                        'start'    => $active['relay_1']->format('H:i:s'),
                        'duration' => $duration, // DETIK
                    ];
                    $active['relay_1'] = null;
                }
                // ===== RELAY 2 =====
                if ($log->relay_2_status === 1 && $active['relay_2'] === null) {
                    $active['relay_2'] = $time;
                }
                if ($log->relay_2_status === 0 && $active['relay_2']) {
                    $duration = $active['relay_2']->diffInSeconds($time);
                    $result['relay_2'][] = [
                        'start'    => $active['relay_2']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_2'] = null;
                }
                // ===== RELAY 3 =====
                if ($log->relay_3_status === 1 && $active['relay_3'] === null) {
                    $active['relay_3'] = $time;
                }
                if ($log->relay_3_status === 0 && $active['relay_3']) {
                    $duration = $active['relay_3']->diffInSeconds($time);
                    $result['relay_3'][] = [
                        'start'    => $active['relay_3']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_3'] = null;
                }
                // ===== RELAY 4 =====
                if ($log->relay_4_status === 1 && $active['relay_4'] === null) {
                    $active['relay_4'] = $time;
                }
                if ($log->relay_4_status === 0 && $active['relay_4']) {
                    $duration = $active['relay_4']->diffInSeconds($time);
                    $result['relay_4'][] = [
                        'start'    => $active['relay_4']->format('H:i:s'),
                        'duration' => $duration,
                    ];
                    $active['relay_4'] = null;
                }
            }
            return response()->json($result);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to build chart data'], 500);
        }
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
