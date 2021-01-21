<?php

namespace Repositories;

use phpDocumentor\Reflection\Types\Float_;

interface ShippingFeeRepositoryInterface {
    public function feeByDimension($width, $height, $depth, $dimensionCoefficient = 11);
    public function feeByWeight($productWeight, $weightCoefficient = 11);
    public function shippingFee($feeByWeight, $feeByDimension);
    public function itemPrice($amazonPrice, $shippingFee);
}
