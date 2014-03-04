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
     * @Store\EntityMapping("changeType")
     * @Assert\Choice({"unsubscribed", "collected"})
     * @Assert\NotBlank()
     */
    protected $changeType;

    /**
     * @Store\Property(description="related store")
     * @Assert\Type("id")
     * @Store\EntityMapping("storeId")
     * @Assert\NotBlank()
     */
    protected $store;
}
