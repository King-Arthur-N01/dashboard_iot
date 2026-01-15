<?php

namespace App\Http\Controllers;

use App\Models\GardenData;
use App\Models\ScheduleData;
use App\Http\Requests\StoreGardenDataRequest;
use App\Http\Requests\UpdateGardenDataRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GardenDataController extends Controller
{
    public function pageRegisterGardenData()
    {
        return view('layouts.garden_page.create_garden');
    }

    public function registerGardenData(Request $request)
    {
        try {
            $request->validate([
                'garden_name' => 'required',
                'garden_desc' => 'required',
            ]);

            $StoreData = new GardenData();
            $StoreData->garden_name = $request->input('garden_name');
            $StoreData->garden_description = $request->input('garden_desc');
            $StoreData->garden_picture = $request->input('garden_pic');
            $StoreData->save();

            return redirect()->route('dashboard', [
                'success' => 'Kebun berhasil ditambahkan'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Kembalikan JSON untuk error validasi
            return response()->json(['error' => 'Periksa lagi!, ada kolom yang tidak boleh kosong'], 422);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Kesalahan kebun gagal ditambahkan!!!!'], 500);
        }
    }

    public function pageEditGardenData()
    {
        return view('layouts.garden_page.update_garden');
    }

    /**
     * Display the specified resource.
     */
    public function createScheduleData(Request $request)
    {
        try {
            $request->validate([
                'schedule_name' => 'required',
                'relay_id' => 'required',
                'schedule_date' => 'required',
                'schedule_time' => 'required',
                'schedule_cycle' => 'required',
            ]);

            // Simpan data jadwal ke database
            $StoreScheduleData = new ScheduleData();
            $StoreScheduleData->schedule_name = $request->input('schedule_name');
            $StoreScheduleData->relay_id = $request->input('relay_id');
            $StoreScheduleData->schedule_date = json_encode($request->input('schedule_date'));
            $StoreScheduleData->schedule_time = json_encode($request->input('schedule_time'));
            $StoreScheduleData->schedule_cycle = $request->input('schedule_cycle');
            $StoreScheduleData->save();

            return response()->json(['success' => 'Jadwal Penyiraman Berhasil Ditambahkan!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Periksa lagi!, ada kolom yang tidak boleh kosong'], 422);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Kesalahan saat menyimpan jadwal!'], 500);
        }

    }

    public function updateScheduleData(Request $request, $id): JsonResponse
    {
        try {
            $request->validate([
                'schedule_name' => 'required',
                'relay_id' => 'required',
                'schedule_date' => 'required',
                'schedule_time' => 'required',
                'schedule_cycle' => 'required',
            ]);

            // Update data jadwal di database
            $schedule = ScheduleData::findOrFail($id);
            $schedule->schedule_name = $request->input('schedule_name');
            $schedule->relay_id = $request->input('relay_id');
            $schedule->schedule_date = json_encode($request->input('schedule_date'));
            $schedule->schedule_time = json_encode($request->input('schedule_time'));
            $schedule->schedule_cycle = $request->input('schedule_cycle');
            $schedule->save();
            return response()->json(['success' => 'Jadwal Penyiraman Berhasil Diperbarui!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Periksa lagi!, ada kolom yang tidak boleh kosong'], 422);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Kesalahan saat memperbarui jadwal!'], 500);
        }
    }

    public function deleteScheduleData($id): JsonResponse
    {
        try {
            // dd($id->all());
            $schedule = ScheduleData::findOrFail($id);
            $schedule->delete();
            return response()->json(['success' => 'Jadwal Penyiraman Berhasil Dihapus!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Kesalahan saat menghapus jadwal!'], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function readScheduleData(): JsonResponse
    {
        $data = ScheduleData::all();

        return response()->json([
            'data'  => $data
        ]);

    }

    public function readScheduleDataId($id): JsonResponse
    {
        $data = ScheduleData::findOrFail($id);

        return response()->json([
            'data'  => $data
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGardenDataRequest $request, GardenData $gardenData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GardenData $gardenData)
    {
        //
    }
}
