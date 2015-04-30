<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\SEPA;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

/**
 * Class Get
 *
 * @method setBillingTransaction(string $billing_transaction_id)
 * @method setPropertyToExpand(array $propertiesToExpand)
 */
class PDFMandate extends Action
{
    /**
     * @Store\Property(description="BillingTransaction attached to the mandate")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $billingTransaction;

    /**
     * @Store\Property(description="Base64 encoded PDF")
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    protected $base64PDF;
}
