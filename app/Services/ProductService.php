<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAvailableProducts()
    {
        return Product::where('status', 'available')
            ->select(['id', 'article', 'name', 'status', 'data', 'url_image'])
            ->get();
    }
}
