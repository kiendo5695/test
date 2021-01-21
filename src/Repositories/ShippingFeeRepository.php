<?php

namespace Repositories;

abstract class EloquentRepository implements ShippingFeeRepositoryInterface
{
    public function feeByDimension($width, $height, $depth, $dimensionCoefficient = 11)
    {
        return $width * $height * $depth * $dimensionCoefficient;
    }

    public function feeByWeight($productWeight, $weightCoefficient = 11)
    {
        return $productWeight * $weightCoefficient;
    }

    public function shippingFee($feeByWeight, $feeByDimension)
    {
        return max($feeByWeight, $feeByDimension);
    }

    public function itemPrice($amazonPrice, $shippingFee)
    {
        return $amazonPrice + $shippingFee;
    }
}
