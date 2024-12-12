<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::with('pharmacies')->get();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        return Product::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return Product::where('id', $id)->delete();
    }

    public function find($id)
    {
        return Product::with('pharmacies')->findOrFail($id);
    }

    public function paginate($perPage = 10)
    {
        return Product::with('pharmacies')->paginate($perPage);
    }

    public function search($query, $perPage = 5){
        return Product::where('title', 'like', '%' . $query . '%')->paginate(15);
    }
}
