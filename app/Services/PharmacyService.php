<?php
namespace App\Services;

use App\Repositories\PharmacyRepository;

class PharmacyService
{
    protected $pharmacyRepo;

    public function __construct(PharmacyRepository $pharmacyRepo)
    {
        $this->pharmacyRepo = $pharmacyRepo;
    }

    public function createPharmacy(array $data)
    {
        return $this->pharmacyRepo->create($data);
    }

    public function updatePharmacy(array $data, int $id)
    {
        return $this->pharmacyRepo->update($data, $id);
    }

    public function deletePharmacy(int $id)
    {
        return $this->pharmacyRepo->delete($id);
    }

    public function getPaginatedPharmacies($perPage = 10)
    {
        return $this->pharmacyRepo->paginate($perPage);
    }

    public function getpharmacyDetails($id)
    {
        return $this->pharmacyRepo->find($id);
    }
}