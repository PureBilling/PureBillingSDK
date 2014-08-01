<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Store\Base\SupportInfoBase;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class NewInvoiceSupportInfo extends SupportInfoBase
{

    /**
     * @Store\Property(description="delivery URL if any")
     * @Assert\Type("string")
     */
    protected $deliveryUrl;

    /**
     * @Store\Property(description="invoice URL if any")
     * @Assert\Type("string")
     */
    protected $invoiceUrl;

    /**
     * @Store\Property(description="Invoice public key")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $invoice;

}
