<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Subscription\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class CancelSubscriptionFromPSPId extends Action
{
    /**
     * @Store\Property(description="subscription to stop")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $PSPId;

    /**
     * @Store\Property(description="cancellation message")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $message;
}
