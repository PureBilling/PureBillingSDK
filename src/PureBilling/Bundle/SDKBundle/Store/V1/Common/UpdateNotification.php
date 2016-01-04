<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class UpdateNotification extends Element
{
    /**
     * @Store\Property(description="id of the callback notification event")
     * @PBAssert\Type(type="id", idPrefixes={"update"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="type of change applied on the store")
     * @Assert\Type("string")
     * @Store\EntityMapping("changeType")
     * @Assert\Choice({"unsubscribed", "collected"})
     * @Assert\NotBlank()
     */
    protected $changeType;

    /**
     * @Store\Property(description="related store")
     * @Assert\Type("string")
     * @Store\EntityMapping("storeId")
     * @Assert\NotBlank()
     */
    protected $store;

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
     * @Store\Property(description="Data sent to the callback")
     * @Assert\Type("string")
     * @Store\EntityMapping("notificationCallback.sentData")
     */
    protected $sentData;

    /**
     * @Store\Property(description="calls done for this notification")
     * @Assert\Type("string")
     * @Store\EntityMapping("notificationCallback.rawAnswer")
     */
    protected $rawAnswer;
}
