<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $category = $this->categoryService->index();
        return response()->json($category);
    }

    public function show($id)
    {
        $category = $this->categoryService->show($id);
        return response()->json($category);
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->store($request->validated());
        return response()->json($category);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryService->update($request->except(['category_id']), $id);

        return response()->json($category);
    }

    public function delete(CategoryRequest $request, $id)
    {
        return $this->categoryService->delete($id);
    }

    public function getProducts($id)
    {
        $products = $this->categoryService->getProducts($id);
        return response()->json($products);
    }

}
