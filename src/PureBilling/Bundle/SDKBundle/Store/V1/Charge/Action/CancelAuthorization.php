<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class CancelAuthorization extends Action
{
    /**
     * @Store\Property(description="Previously authorized billingTransaction to cancel")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $billingTransaction;

    /**
     * @Store\Property(description="cancellation message")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $message;
}
