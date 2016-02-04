<?php
namespace Tests\PureBilling\Bundle\SDKBundle\Store\V3\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\V3\Charge\Action\ChargeToken;

class ChargeTokenTest extends \PHPUnit_Framework_TestCase
{

    public function testFromJsClientProperty()
    {
        $store = new ChargeToken();

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
