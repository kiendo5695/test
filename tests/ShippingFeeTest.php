<?php

namespace Tests;

use Controller\ShippingFeeController;
use \Mockery;
use Models\Item;
use PHPUnit\Framework\TestCase;

class ShippingFeeTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testShippingFeeReturnFee()
    {
        $item = Mockery::mock(Item::class);
        $item->shouldReceive('setWeight')->andReturn(1);
        $item->shouldReceive('setDimensions')->andReturn(1);
        $shippingFee = new ShippingFeeController($item);
        $this->assertEquals(12, $shippingFee->main());
    }
}
