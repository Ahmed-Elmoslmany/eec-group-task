<?php
namespace App\Repositories;

use App\Models\Pharmacy;

class PharmacyRepository
{
    public function getAll()
    {
        return Pharmacy::with('products')->get();
    }

    public function create(array $data)
    {
        return Pharmacy::create($data);
    }

    public function update(array $data, $id)
    {
        return Pharmacy::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return Pharmacy::where('id', $id)->delete();
    }

    public function find($id)
    {
        return Pharmacy::with('products')->findOrFail($id);
    }

    public function paginate($perPage = 10)
    {
        return Pharmacy::with('products')->paginate($perPage);
    }
}
