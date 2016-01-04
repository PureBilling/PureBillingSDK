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
     * @Store\Property(description="quantity of product sold. if amount is 100 and quantity is 2, invoice total will be 200. only 1 is supported for now")
     * @Assert\Type("integer")
     * @Assert\Range(min=1)
     * @Assert\NotBlank()
     */
    protected $quantity = 1;

    /**
     * @Store\Property(description="Discount if apply")
     * @Assert\Type("object")
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Invoice\PercentDiscount",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Invoice\AmountDiscount"
     * })
     */
    protected $discount;

}
