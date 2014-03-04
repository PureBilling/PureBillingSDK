<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class DetailledBillingTransaction extends BillingTransaction
{
    /**
     * @Store\Property(description="merchant change notification callback")
     * @Assert\Type("array")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Common\UpdateNotification")
     */
    protected $updateNotifications;
}
