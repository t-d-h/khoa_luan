<?php

namespace App\Services;

use App\Models\ProductComponentModel;

class ProductComponentService extends BaseService
{
    public function __construct(ProductComponentModel $productComponentModel)
    {
        $this->model = $productComponentModel;
    }

    public function deleteByCondition($condition)
    {
        return $this->model
                    ->where('product_id', $condition)
                    ->delete();
    }
}
