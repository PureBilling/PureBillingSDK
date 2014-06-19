<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\ExpandableAction;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Get extends ExpandableAction
{
    /**
     * @Store\Property(description="invoice id to retrieve")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="Some properties return a ID. If you want a full object, add the property path here")
     * @Assert\Type("array")
     * @Assert\Choice(multiple=true, choices={"updateNotifications",
     *                                        "supportInfo",
     *                                        "customer", "billings.paymentMethod", "billings.PSPTransactionInfo",
     *                                        "origin", "billings", "billings.updateNotifications",
     *                                        "subscriptionInfo", "subscriptionInfo.tasks", "subscriptionInfo.invoices"})
     */
    protected $propertiesToExpand = array();
}
