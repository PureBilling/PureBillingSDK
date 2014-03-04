<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class DetailledUpdateNotification extends UpdateNotification
{
    /**
     * @Store\Property(description="id of the callback notification event")
     * @PBAssert\Type(type="id", idPrefixes={"callback"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="status of the current callback")
     * @Assert\Type("string")
     * @Store\EntityMapping("notificationCallback.statusLabel")
     * @Assert\Choice({"creating", "ready", "blocked", "running", "sent"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="datetime of the change")
     * @PBAssert\Type(type="datetime")
     * @Store\EntityMapping("notificationCallback.lastStatusChange")
     * @Assert\NotBlank()
     */
    protected $changeDate;

    /**
     * @Store\Property(description="calls done for this notification")
     * @Assert\Type("integer")
     * @Store\EntityMapping("notificationCallback.tries")
     * @Assert\NotBlank()
     */
    protected $tries = 0;

    /**
     * @Store\Property(description="calls done for this notification")
     * @Assert\Type("string")
     * @Store\EntityMapping("notificationCallback.rawAnswer")
     */
    protected $rawAnswer;
}
