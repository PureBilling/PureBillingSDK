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
}
