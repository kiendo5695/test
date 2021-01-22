<?php

namespace App\Services;

use App\Repositories\ShippingFeeRepositoryInterface;

class ShippingFee
{
    private $shippingFeeRepository;

    public function __construct(ShippingFeeRepositoryInterface $shippingFeeRepository)
    {
        $this->shippingFeeRepository = $shippingFeeRepository;
    }

    public function getGrossPrice()
    {
        $items = $this->shippingFeeRepository->getItems();
        $grossPrice = 0;
        if (count($items)) {
            foreach ($items as $item) {
                $feeByDimension = $this->shippingFeeRepository
                    ->getFeeByDimension($item->with, $item->height, $item->depth);
                $feeByWeight = $this->shippingFeeRepository
                    ->getFeeByWeight($item->productWeight);
                $shippingFee = $this->shippingFeeRepository
                    ->getShippingFee($feeByWeight, $feeByDimension);
                $itemPrice = $this->shippingFeeRepository
                    ->getItemPrice($item->amazonPrice, $shippingFee);
                $grossPrice += $itemPrice;
            }
        }
        return $grossPrice;
    }
}
