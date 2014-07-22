<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use Symfony\Component\Validator\Constraints as Assert;

class Refund extends Action
{
    /**
     * @Store\Property(description="billing Transaction to refund")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotNull()
     */

    protected $billingTransaction;

    /**
     * @Store\Property(description="External id")
     * @Assert\Type("string")
     */
    protected $externalId;

    /**
     * @Store\Property(description="Short description of billed item")
     * @Assert\Type("string")
     */
    protected $shortDescription;

    /**
     * @Store\Property(description="amount to refund, NULL if same a $billingTransaction")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     */
    protected $amount;
}
