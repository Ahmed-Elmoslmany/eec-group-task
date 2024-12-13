<?php
namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts()
    {
        return $this->productRepo->getAll();
    }

    public function createProduct(array $data)
    {
        return $this->productRepo->create($data);
    }

    public function updateProduct(array $data, int $id)
    {
        return $this->productRepo->update($data, $id);
    }

    public function deleteProduct(int $id)
    {
        return $this->productRepo->delete($id);
    }

    public function getPaginatedProducts($perPage = 10)
    {
        return $this->productRepo->paginate($perPage);
    }

    public function getProductDetails($id)
    {
        return $this->productRepo->find($id);
    }

    public function getSearchedProducts($query ,$perPage = 5){
        return $this->productRepo->search($query, $perPage);
    }

    public function getCheapestPharmacies(int $productId, int $numOfPharmacies = 5): ?array
    {
        $product = $this->productRepo->productInPharmacies($productId);

        if (!$product) {
            return null;
        }

        return $product->pharmacies->take($numOfPharmacies)->map(function ($pharmacy) {
            return [
                'id' => $pharmacy->id,
                'name' => $pharmacy->name,
                'price' => $pharmacy->pivot->price,
            ];
        })->toArray();
    }
}