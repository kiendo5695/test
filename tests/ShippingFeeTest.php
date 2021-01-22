<?php

namespace Tests;

use App\Repositories\ShippingFeeRepository;
use App\Services\ShippingFee;
use \Mockery;
use PHPUnit\Framework\TestCase;

class ShippingFeeTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testShippingFeeReturnFee()
    {
        $item = new \stdClass();
        $item->with = 1;
        $item->height = 1;
        $item->depth = 1;
        $item->productWeight = 1;
        $item->amazonPrice = 1;
        $mockShippingFeeRepository = Mockery::mock(ShippingFeeRepository::class);
        $mockShippingFeeRepository->shouldReceive('getItems')->andReturn([$item]);
        $mockShippingFeeRepository->shouldReceive('getFeeByDimension')->andReturn(1);
        $mockShippingFeeRepository->shouldReceive('getFeeByWeight')->andReturn(1);
        $mockShippingFeeRepository->shouldReceive('getShippingFee')->andReturn(1);
        $mockShippingFeeRepository->shouldReceive('getItemPrice')->andReturn(1);
        $shippingFee = new ShippingFee($mockShippingFeeRepository);
        $this->assertEquals(1, $shippingFee->getGrossPrice());
    }
}
