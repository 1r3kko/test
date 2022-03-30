<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $product = $this->productService->index();
        return response()->json($product);
    }

    public function show($id)
    {
        $product = $this->productService->show($id);
        return response()->json($product);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->store($request->validated());
        return response()->json($product);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->productService->update($request->except(['product_id']), $id);

        return response()->json($product);
    }

    public function delete(ProductRequest $request, $id)
    {
        return $this->productService->delete($id);
    }

//    public function create() {
//        echo 'create';
//    }

//    public function edit($id) {
//        echo 'edit';
//    }
}
