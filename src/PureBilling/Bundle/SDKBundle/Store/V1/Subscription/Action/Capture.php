<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Subscription\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\CaptureBase;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Capture extends CaptureBase
{
    /**
     * @Store\Property(description="Subscription to bill (initial step)")
     * @PBAssert\Type(type="id", idPrefixes={"sale"})
     * @Assert\NotBlank()
     */
    protected $subscriptionInfo;
}
