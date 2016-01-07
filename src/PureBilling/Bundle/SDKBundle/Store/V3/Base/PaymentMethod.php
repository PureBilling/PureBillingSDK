<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Base;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class PaymentMethod extends BaseStoreV3
{
    /**
     * @Store\Property(description="payment method ID")
     * @PBAssert\Type(type="string")
     */
    protected $id;
}
