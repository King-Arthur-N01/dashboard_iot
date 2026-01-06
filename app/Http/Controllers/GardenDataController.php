<?php

namespace App\Http\Controllers;

use App\Models\GardenData;
use App\Http\Requests\StoreGardenDataRequest;
use App\Http\Requests\UpdateGardenDataRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
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
            // dd($request->all());

            $request->validate([
                'garden_name' => 'required',
                'garden_desc' => 'required',
            ]);

            // $garden_name = $request->input('garden_name');
            // $garden_desc = $request->input('garden_desc');
            // $garden_pic = $request->input('garden_pic');

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
    public function registerScheduleData(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GardenData $gardenData)
    {
        //
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
