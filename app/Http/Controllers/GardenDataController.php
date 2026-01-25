<?php

namespace App\Http\Controllers;

use App\Models\GardenData;
use App\Models\ScheduleData;
use App\Models\RelayData;
use App\Http\Requests\StoreGardenDataRequest;
use App\Http\Requests\UpdateGardenDataRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GardenDataController extends Controller
{
    // public function pageRegisterGardenData()
    // {
    //     return view('layouts.garden_page.create_garden');
    // }

    public function registerGardenData(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'garden_name' => 'required',
                'garden_desc' => 'required',
                'garden_pic' => 'image|mimes:png,jpg,jpeg|max:8192',
                'schedule_name' => 'required',
                'relay_id' => 'required',
                'schedule_date' => 'required',
                'schedule_time' => 'required',
                'schedule_cycle' => 'required'
            ]);

            // Upload file
            $file = $request->file('garden_pic');
            $filename = time() . '_' . $file->getClientOriginalName(); // Nama unik
            $path = $file->storeAs('gardens', $filename, 'public'); // Simpan di storage/app/public/gardens

            $StoreGardenData = new GardenData();
            $StoreGardenData->garden_name = $request->input('garden_name');
            $StoreGardenData->garden_description = $request->input('garden_desc');
            $StoreGardenData->garden_picture = $path;
            $StoreGardenData->save();

            $GardenId = GardenData::latest('id')->first()->id;

            // Simpan data jadwal ke database
            $StoreScheduleData = new ScheduleData();
            $StoreScheduleData->schedule_name = $request->input('schedule_name');
            $StoreScheduleData->relay_id = $request->input('relay_id');
            $StoreScheduleData->schedule_date = json_encode($request->input('schedule_date'));
            $StoreScheduleData->schedule_time = json_encode($request->input('schedule_time'));
            $StoreScheduleData->schedule_cycle = $request->input('schedule_cycle');
            $StoreScheduleData->garden_id = $GardenId;
            $StoreScheduleData->save();

            $ScheduleId = ScheduleData::latest('id')->first()->id;

            // kondisi default
            $StoreRelayData = new RelayData();
            $StoreRelayData->condition_name = 'Default Value';
            $StoreRelayData->temp_condition = ["high" => 35, "med_min" => 25, "med_max" => 35, "low" => 25];
            $StoreRelayData->humi_condition = ["high" => 60, "med_min" => 45, "med_max" => 60, "low" => 45];
            $StoreRelayData->lumi_condition = ["high" => 70, "med_min" => 40, "med_max" => 70, "low" => 40];
            $StoreRelayData->soil_condition = ["high" => 70, "med_min" => 40, "med_max" => 70, "low" => 40];
            $StoreRelayData->rain_condition = ["heavy" => 0.1, "mid_max" => 0.4, "mid_min" => 0.1, "light_max" => 0.6, "light_min" => 0.4, "none" => 0.6];
            $StoreRelayData->schedule_id    = $ScheduleId;
            $StoreRelayData->save();

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
            // dd($request->all());
            $request->validate([
                'schedule_name' => 'required',
                'relay_id' => 'required',
                'schedule_date' => 'required',
                'schedule_time' => 'required',
                'schedule_cycle' => 'required',
            ]);

            $GardenId = GardenData::latest('id')->first()->id;

            // Simpan data jadwal ke database
            $StoreScheduleData = new ScheduleData();
            $StoreScheduleData->schedule_name = $request->input('schedule_name');
            $StoreScheduleData->relay_id = $request->input('relay_id');
            $StoreScheduleData->schedule_date = json_encode($request->input('schedule_date'));
            $StoreScheduleData->schedule_time = json_encode($request->input('schedule_time'));
            $StoreScheduleData->schedule_cycle = $request->input('schedule_cycle');
            $StoreScheduleData->garden_id = $GardenId;
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
            // dd($request->all());
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
            $schedule = ScheduleData::findOrFail($id);
            $schedule->delete();
            return response()->json(['success' => 'Jadwal Penyiraman Berhasil Dihapus!']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Kesalahan saat menghapus jadwal!'], 500);
        }
    }

    public function readGardenData(): JsonResponse
    {
        $data = GardenData::all();

        return response()->json([
            'data'  => $data
        ]);

    }

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
