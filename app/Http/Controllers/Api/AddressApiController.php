<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AddressProvince;
use App\Models\AddressRegency;
use App\Models\AddressDistrict;
use App\Models\AddressVillage;
use Illuminate\Http\JsonResponse;

class AddressApiController extends Controller
{
    // Get all provinces
    public function getProvinces(): JsonResponse
    {
        $provinces = AddressProvince::all();
        return $this->successResponse($provinces);
    }

    // Get regencies by province_id
    public function getRegencies($province_id): JsonResponse
    {
        $regencies = AddressRegency::where('province_id', $province_id)->get();
        return $this->successResponse($regencies);
    }

    // Get districts by regency_id
    public function getDistricts($regency_id): JsonResponse
    {
        $districts = AddressDistrict::where('regency_id', $regency_id)->get();
        return $this->successResponse($districts);
    }

    // Get villages by district_id
    public function getVillages($district_id): JsonResponse
    {
        $villages = AddressVillage::where('district_id', $district_id)->get();
        return $this->successResponse($villages);
    }

    // Get coordinates of a village
    public function getVillageCoords($id): JsonResponse
    {
        $village = AddressVillage::find($id);

        if (!$village || !$village->latitude || !$village->longitude) {
            return $this->successResponse(['lat' => null, 'lng' => null]);
        }

        return $this->successResponse([
            'lat' => $village->latitude,
            'lng' => $village->longitude
        ]);
    }

    // Get province
    public function getProvince($id): JsonResponse
    {
        return $this->findOrNotFound(AddressProvince::find($id));
    }

    // Get regency
    public function getRegency($id): JsonResponse
    {
        return $this->findOrNotFound(AddressRegency::find($id));
    }

    // Get district
    public function getDistrict($id): JsonResponse
    {
        return $this->findOrNotFound(AddressDistrict::find($id));
    }

    // Get village
    public function getVillage($id): JsonResponse
    {
        return $this->findOrNotFound(AddressVillage::find($id));
    }

    // Helper: Standard success response
    protected function successResponse($data, $message = 'Success', $status = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    // Helper: Not found or success
    protected function findOrNotFound($model): JsonResponse
    {
        if (!$model) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
                'data' => null,
            ], 404);
        }

        return $this->successResponse($model);
    }
}
