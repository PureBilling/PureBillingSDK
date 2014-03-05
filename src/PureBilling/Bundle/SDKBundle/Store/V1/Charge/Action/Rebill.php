<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;

class Rebill extends Action
{
    /**
     * @Store\Property(description="billing Transaction to refund")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotNull()
     * @Store\Entity()
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
}
