<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\ExpandableAction;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Get extends ExpandableAction
{
    /**
     * @Store\Property(description="Id or ExternalId of the customer to retrieve")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="Some properties return a ID. If you want a full object, add the property path here")
     * @Assert\Type("array")
     * @Assert\Choice(multiple=true, choices={"subscriptionInfo", "subscriptionInfo.tasks",
     *                                        "invoices", "invoices.supportInfo",
     *                                        "invoices.updateNotifications",
     *                                        "invoices.billings",
     *                                        "paymentMethods",
     *                                        "billings", "invoices.billings.PSPTransactionInfo", "billings.PSPTransactionInfo",
     *                                        "invoices.billings.updateNotifications", "origin", "owner"})
     */
    protected $propertiesToExpand = array();
}
