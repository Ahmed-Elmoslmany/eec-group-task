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
}