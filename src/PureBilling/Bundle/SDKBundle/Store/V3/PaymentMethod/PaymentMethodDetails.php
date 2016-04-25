<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\PaymentMethod;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;


class PaymentMethodDetails extends BaseStoreV3
{
    /**
     * @Store\Property(description="card specific options")
     * @Assert\Type("object")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V3\PaymentMethod\Details\CardDetails")
     */
    protected $cardDetails;
}