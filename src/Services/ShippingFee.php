<?php

namespace Services;

use Repositories\ShippingFeeRepositoryInterface;

class ShippingFee
{
    private $shippingFeeRepository;

    public function __construct(ShippingFeeRepositoryInterface $shippingFeeRepository)
    {
        $this->shippingFeeRepository = $shippingFeeRepository;
    }

    public function grossPrice()
    {
        $items = [];
        $grossPrice = 0;
        if (count($items)) {
            foreach ($items as $item) {
                $feeByDimension = $this->shippingFeeRepository
                    ->feeByDimension($item->with, $item->height, $item->depth);
                $feeByWeight = $this->shippingFeeRepository
                    ->feeByWeight($item->productWeight);
                $shippingFee = $this->shippingFeeRepository
                    ->shippingFee($feeByWeight, $feeByDimension);
                $itemPrice = $this->shippingFeeRepository
                    ->itemPrice($item->amazonPrice, $shippingFee);
                $grossPrice += $itemPrice;
            }
        }
        return $grossPrice;
    }
}
