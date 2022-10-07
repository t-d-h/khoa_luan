<?php

namespace App\Services;

use App\Models\PaymentModel;

class PaymentService extends BaseService
{
    public function __construct(PaymentModel $paymentModel)
    {
        $this->model = $paymentModel;
    }
}
