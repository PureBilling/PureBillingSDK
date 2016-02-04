<?php
namespace Tests\PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action\Capture;

class CaptureTest extends \PHPUnit_Framework_TestCase
{

    protected function createNewStore()
    {
        $store = new Capture();
        return $store;
    }

    public function testFromJsClientProperty()
    {
        $store = $this->createNewStore();

        $store->setFromJsClient(null);
        $this->assertNull($store->getFromJsClient(), "Asserting initial value is null");

        $store->setFromJsClient(true);
        $this->assertTrue($store->getFromJsClient());

        $store->setFromJsClient(false);
        $this->assertFalse($store->getFromJsClient());

        $store->setFromJsClient(null);
        $this->assertNull($store->getFromJsClient());
    }

}
