<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store(ProductStoreRequest $request)
    {
        $product = $this->productService->create($request->validated());
        if ($product) {
            return response()->json(['product' => $product], 201);
        }
        return response()->json(['message' => 'Такой продукт уже существует.'], 409);
    }
}
