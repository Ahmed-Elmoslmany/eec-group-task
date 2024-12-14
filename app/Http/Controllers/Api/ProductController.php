<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService){}

    public function index()
    {
        $products = $this->productService->getPaginatedProducts();
        return new ProductCollection($products);
    }

    public function store(ProductStoreRequest $request)
    {
        $product = $this->productService->createProduct($request->validated());

        return new ProductResource($product);
    }

    public function show($id)
    {
        $product = $this->productService->getProductDetails($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return new ProductResource($product);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = $this->productService->updateProduct( $request->validated(), $id);

        if (!$product) {
            return response()->json([
                'status' => 'fail',
                'error' => 'Product not found'
            ], 404);
        }

        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $deleted = $this->productService->deleteProduct($id);

        if (!$deleted) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ]);
    }
}
