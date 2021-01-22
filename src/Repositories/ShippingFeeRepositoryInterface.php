<?php

namespace App\Repositories;

interface ShippingFeeRepositoryInterface
{
    public function getItems();

    public function getFeeByDimension($width, $height, $depth, $dimensionCoefficient = 11);

    public function getFeeByWeight($productWeight, $weightCoefficient = 11);

    public function getFeeByProductType();

    public function getShippingFee($feeByWeight, $feeByDimension);

    public function getItemPrice($amazonPrice, $shippingFee);
}
