<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class RecurringInvoice extends Invoice
{
    /**
     * @Store\Property(description="Subscription info attached to the invoice")
     * @PBAssert\Type(type="id", idPrefixes={"sale"})
     * @Assert\NotBlank()
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Invoice\SubscriptionInfo")
     */
    protected $subscriptionInfo;
}
