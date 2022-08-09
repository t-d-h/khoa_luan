<?php

namespace App\Services;

use App\Models\ProductModel;

class ProductService extends BaseService
{
    public function __construct(ProductModel $productModel)
    {
        $this->model = $productModel;
    }
}
