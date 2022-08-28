<?php

namespace App\Services;

use App\Models\ProductColorModel;
use Illuminate\Support\Facades\Session;

class ProductColorService extends BaseService
{
    public function __construct(ProductColorModel $productColorModel)
    {
        $this->model = $productColorModel;
    }
}
