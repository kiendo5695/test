<?php

namespace Controller;

use Services\ShippingFee;

class ShippingFeeController
{
    private $shippingFee;

    public function __construct(ShippingFee $shippingFee)
    {
        $this->shippingFee = $shippingFee;
    }

    public function main()
    {
        return $this->shippingFee->grossPrice();
    }
}
