<?php
namespace Tests\PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action\ChargeToken;

class ChargeTokenTest extends \PHPUnit_Framework_TestCase
{

    protected function createNewStore()
    {
        $store = new ChargeToken();
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
