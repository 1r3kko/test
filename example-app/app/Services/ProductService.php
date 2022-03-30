<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Events\Dispatcher;

class ProductService
{
    public function index()
    {
        return Product::all();
    }

    public function show(int $id)
    {
        return Product::find($id);
    }

    public function store(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($data);
        $product->save();

        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if($product->delete()) return response(null, 204);
    }
}
