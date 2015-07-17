<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Maintenance\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class NotificationCallbackUpdate extends Action
{
    /**
     * @Store\Property(description="notification callback identifier")
     * @PBAssert\Type(type="id", idPrefixes={"callback"})
     * @Assert\NotBlank()
     */
    protected $notificationCallback;

    /**
     * @Store\Property(description="new notification callback status")
     * @Assert\Type("string")
     * @Assert\Choice({"ready", "ignored"})
     * @Assert\NotBlank()
     */
    protected $newStatus;
}
