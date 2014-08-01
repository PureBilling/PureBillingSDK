<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class InvoiceSupportInfo extends NewInvoiceSupportInfo
{

    /**
     * @Store\Property(description="id of the support info item")
     * @PBAssert\Type(type="id", idPrefixes={"invoicesupport"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="delivery URL if any")
     * @Assert\Type("string")
     * @Store\EntityMapping("deliveryUrl")
     */
    protected $deliveryUrl;

    /**
     * @Store\Property(description="invoice URL if any")
     * @Assert\Type("string")
     * @Store\EntityMapping("invoiceUrl")
     */
    protected $invoiceUrl;

    /**
     * @Store\Property(description="Invoice public key")
     * @Assert\Type("string")
     * @Store\EntityMapping("invoiceTransaction.publicKey")
     * @Assert\NotBlank()
     */
    protected $invoice;

}
