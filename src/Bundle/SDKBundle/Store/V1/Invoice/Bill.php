<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Action;

class Bill extends Action
{
    /**
     * @Store\Property(description="invoice Id to charge")
     * @Assert\Type("string")
     * @Assert\RegEx("^invoice_")
     */
    protected $invoiceId;

    /**
     * @Store\Property(description="billing action to apply")
     * @Assert\Type("object")
     * @Store\StoreClass({"PureBilling\Bundle\SDKBundle\Store\V1\Creditcard\ChargeNewCard"})
     */
    protected $billingAction;
}
