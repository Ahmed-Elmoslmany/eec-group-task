<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function __construct(public ProductService $productService){}

    public function index()
    {
        $products = $this->productService->getPaginatedProducts(15);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $request)
    {
        $this->productService->createProduct($request->validated());
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit($id){
        $product = $this->productService->getProductDetails($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {   
        $success = $this->productService->updateProduct($request->validated(),$id);
        return $success ? redirect()->route('products.index')->with('success','Product Updated Successfully') : redirect()->route('products.index')->with('error', 'Faild to update product');
    }

    public function show($id)
    {
        $product = $this->productService->getProductDetails($id);
        $pharmacies = $product->pharmacies;
        return view('products.show', compact('product', 'pharmacies' ));
    }

    public function destroy($id){
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index')->with('success','Product Deleted Successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = $this->productService->getSearchedProducts($query);
        return view('products.index', compact('products', 'query'));
    }
    
}
