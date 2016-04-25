<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class ProcessPaymentAnswer extends BaseStoreV3
{
    /**
     * @Store\Property(description="billing transaction id")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $billingTransaction;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("boolean")
     */
    protected $isTest;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("string")
     */
    protected $sha;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("string")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="form token attached to the transaction")
     * @PBAssert\Type(type="id", idPrefixes={"formtoken"})
     * @Assert\NotBlank
     */
    protected $formToken;

    /**
     * @Store\Property(description="billing transaction type")
     * @Assert\Type("string")
     * @Assert\Choice({"capture", "authorize", "refund"})
     */
    protected $creationContext;

}
