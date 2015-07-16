<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Subscription\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class UpdateSubscription extends Action
{
    /**
     * @Store\Property(description="subscription id")
     * @PBAssert\Type(type="id", idPrefixes={"sale"})
     * @Assert\NotBlank()
     */
    protected $subscriptionInfo;

    /**
     * @Store\Property(description="new payment method id")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard"})
     * @Assert\NotBlank()
     */
    protected $newPaymentMethod;
}
