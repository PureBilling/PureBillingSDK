<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\PaymentMethod;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;


class PaymentMethodOptions extends BaseStoreV3
{
    /**
     * @Store\Property(description="card specific options")
     * @Assert\Type("object")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V3\PaymentMethod\Options\CardOptions")
     */
    protected $cardOptions;
}