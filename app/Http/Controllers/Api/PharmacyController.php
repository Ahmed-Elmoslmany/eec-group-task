<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyRequest;
use App\Http\Requests\PharmacyStoreRequest;
use App\Http\Requests\PharmacyUpdateRequest;
use App\Http\Resources\PharmacyResource;
use App\Http\Resources\PharmacyCollection;
use App\Services\PharmacyService;
use Illuminate\Http\JsonResponse;

class PharmacyController extends Controller
{
    public function __construct(protected PharmacyService $pharmacyService){}

    public function index()
    {
        $pharmacies = $this->pharmacyService->getPaginatedPharmacies();
        return new PharmacyCollection($pharmacies);
    }

    public function show($id)
    {
        $pharmacy = $this->pharmacyService->getpharmacyDetails($id);

        if (!$pharmacy) {
            return response()->json(['error' => 'Pharmacy not found'], 404);
        }

        return new PharmacyResource($pharmacy);
    }

    public function store(PharmacyStoreRequest $request)
    {
        $data = $request->validated();
        $pharmacy = $this->pharmacyService->createPharmacy($data);

        return new PharmacyResource($pharmacy);
    }

    public function update(PharmacyUpdateRequest $request, $id)
    {
        $pharmacy = $this->pharmacyService->updatePharmacy($request->validated(), $id);

        if (!$pharmacy) {
            return response()->json([
                'status' => 'fail',
                'error' => 'Pharmacy not found or update failed'
            ], 404);
        }

        return new PharmacyResource($pharmacy);
    }

    public function destroy($id)
    {
        $deleted = $this->pharmacyService->deletePharmacy($id);

        if (!$deleted) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Pharmacy not found or deletion failed'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Pharmacy deleted successfully',
        ]);
    }
}
