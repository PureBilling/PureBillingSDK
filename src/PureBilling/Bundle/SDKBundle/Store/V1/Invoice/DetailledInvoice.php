<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class DetailledInvoice extends Invoice
{
    /**
     * @Store\Property(description="merchant change notification callback")
     * @Assert\Type("array")
     * @Store\StoreClass({"PureBilling\Bundle\SDKBundle\Store\V1\Common\UpdateNotification",
     *                    "PureBilling\Bundle\SDKBundle\Store\V1\Common\DetailledUpdateNotification"})
     */
    protected $updateNotifications;

    /**
     * @Store\Property(description="support information associated to the invoice")
     * @PBAssert\Type(type="id", idPrefixes={"support"})
     */
    protected $supportInfo;
}
