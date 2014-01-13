<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;

class Collect extends Action
{
    /**
     * @Store\Property(description="Previously authorized billingTransaction to collect")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotNull()
     * @Store\Entity()
     */

    protected $billingTransaction;

    /**
     * @Store\Property(description="amount to bill if different from the authorization amount")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotNull()
     */
    protected $amount;
}
