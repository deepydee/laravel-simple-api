<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(ProductRequest $request)
    {
        $perPage = $request->per_page ?? Product::PER_PAGE;

        $products = Product::with('category')->paginate($perPage);

        return ProductResource::collection($products);
    }
}
