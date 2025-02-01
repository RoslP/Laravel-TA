<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getAvailableProducts()
    {
        return Product::available()
            ->select(['id', 'article', 'name', 'status', 'data', 'url_image'])
            ->get();
    }

    public function create(array $data)
    {
        $data['url_image']='https://avatars.mds.yandex.net/i?id=81c22dd432eb211d42589fb28df2562d_l-4809878-images-thumbs&n=13';
        $data['data']=json_encode($data['data']);
        $product = Product::firstOrNew(['article' => $data['article']]);
        if (!$product->exists) {
            $product->fill($data)->save();
            return $product;
        }
        return null;
    }
}
