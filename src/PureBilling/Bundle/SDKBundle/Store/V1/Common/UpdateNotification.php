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
     * @PBAssert\Type(type="id", idPrefixes={"callback"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="type of change applied on the store")
     * @Assert\Type("string")
     * @Assert\Choice({"created"})
     * @Assert\NotBlank()
     */
    protected $changeType;

    /**
     * @Store\Property(description="datetime of the change")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotBlank()
     */
    protected $changeDate;

    /**
     * @Store\Property(description="calls done for this notification")
     * @Assert\Type("integer")
     * @Assert\NotBlank()
     */
    protected $tries;

    /**
     * @Store\Property(description="related store")
     * @Assert\Type("object")
     * @Assert\NotBlank()
     * @Store\StoreClass({"PureBilling\Bundle\SDKBundle\Store\V1\Charge\BillingTransaction",
     *                    "PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Invoice"})
     */
    protected $store;
}
