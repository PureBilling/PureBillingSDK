<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class InvoiceItem extends NewInvoiceItem
{
    /**
     * @Store\Property(description="invoice item id")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^invoiceitem_/", message="owner id should start with 'invoiceitem_' prefix")
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="positive integer. amount for 1 unit. 10 is 0.10 eur. taxes are included")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotNull()
     * @Store\EntityMapping("amount")
     */
    protected $amount;

    /**
     * @Store\Property(description="VAT rate to apply. 19.00 is a taxe rate of 19%")
     * @Assert\Type("float")
     * @Assert\Range(min=0, max=100)
     * @Assert\NotBlank()
     * @Store\EntityMapping("vatRate")
     */
    protected $vatRate = 0;
}
