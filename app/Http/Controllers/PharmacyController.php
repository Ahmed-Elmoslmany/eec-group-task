<?php

namespace App\Http\Controllers;

use App\Http\Requests\PharmacyStoreRequest;
use App\Http\Requests\PharmacyUpdateRequest;
use App\Services\PharmacyService;


class PharmacyController extends Controller
{
    public function __construct(public PharmacyService $pharmacyService){}
    public function index()
    {
        $pharmacies = $this->pharmacyService->getPaginatedPharmacies(15);
        return view('pharmacy.index', compact('pharmacies'));
    }

    public function create()
    {
        return view('pharmacy.create');
    }

    public function store(PharmacyStoreRequest $request)
    {
        $this->pharmacyService->createPharmacy($request->validated());
        return redirect()->route('pharmacy.index')->with('success', 'Pharmacy created successfully!');
    }
    public function edit($id)
    {
        $pharmacy = $this->pharmacyService->getPharmacyDetails($id);
        return view('pharmacy.edit', compact('pharmacy'));
    }

    public function update(PharmacyUpdateRequest $request, $id)
    {   
        $success = $this->pharmacyService->updatePharmacy($request->validated(),$id);
        return $success ? redirect()->route('pharmacy.index')->with('success','Pharmacy Updated Successfully') : redirect()->route('products.index')->with('error', 'Faild to update product');
    }

    public function show($id)
    {
        $pharmacy = $this->pharmacyService->getPharmacyDetails($id);
        return view('pharmacy.show', compact('pharmacy'));
    }

    public function destroy($id)
    {
        $this->pharmacyService->deletePharmacy($id);
        return redirect()->route('pharmacy.index')->with('success','Pharmacy Deleted Successfully');
    }
}
