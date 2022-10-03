<?php

namespace App\Services;

use App\Models\AddressModel;

class AddressService extends BaseService
{
    public function __construct(AddressModel $addressModel)
    {
        $this->model = $addressModel;
    }
}
