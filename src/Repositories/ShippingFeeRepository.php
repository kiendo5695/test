<?php

namespace App\Repositories;

abstract class ShippingFeeRepository implements ShippingFeeRepositoryInterface
{
    public function getItems()
    {
        return [];
    }

    public function getFeeByDimension($width, $height, $depth, $dimensionCoefficient = 11)
    {
        return $width * $height * $depth * $dimensionCoefficient;
    }

    public function getFeeByWeight($productWeight, $weightCoefficient = 11)
    {
        return $productWeight * $weightCoefficient;
    }

    public function getFeeByProductType()
    {
        return 1;
    }

    public function getShippingFee($feeByWeight, $feeByDimension)
    {
        return max($feeByWeight, $feeByDimension);
    }

    public function getItemPrice($amazonPrice, $shippingFee)
    {
        return $amazonPrice + $shippingFee;
    }
}
