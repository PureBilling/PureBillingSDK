<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\InvoiceItemBase;

class NewInvoiceItem extends InvoiceItemBase
{
    /**
     * @Store\Property(description="Invoice item description")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @Store\Property(description="positive integer. amount for 1 unit. 10 is 0.10 eur. taxes are included")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotNull()
     */
    protected $amount;

    /**
     * @Store\Property(description="VAT rate to apply. 19.00 is a taxe rate of 19%")
     * @Assert\Type("float")
     * @Assert\Range(min=0, max=100)
     * @Assert\NotBlank()
     */
    protected $vatRate = 0;

    /**
     * @Store\Property(description="quantity of product sold. if amount is 100 and quantity is 2, invoice total will be 200. only 1 is supported for now")
     * @Assert\Type("integer")
     * @Assert\Range(min=1, max=1)
     * @Assert\NotBlank()
     */
    protected $quantity = 1;
}
