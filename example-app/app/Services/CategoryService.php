<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Events\Dispatcher;

class CategoryService
{
    public function index()
    {
        return Category::all();
    }

    public function show(int $id)
    {
        return Category::find($id);
    }

    public function store(array $data)
    {
        return Category::create($data);
    }

    public function update(array $data, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($data);
        $category->save();

        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        if($category->delete()) return response(null, 204);
    }

    public function getProducts($id)
    {
        return Category::find($id)->products;
    }
}
