<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Subscription;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

/**
 * Class SubscriptionState
 * @package PureBilling\Bundle\SDKBundle\Store\V1\Subscription
 *
 * used with CancelFromPSPId only
 */
class SubscriptionState extends Element
{
    /**
     * @Store\Property(description="where unsubscribe has been done")
     * @Assert\Type("string")
     * @Assert\Choice({"corazon","pb-wengo", "pb", "unknown"})
     * @Assert\NotBlank()
     */
    protected $source;


    /**
     * @Store\Property(description="operation result")
     * @Assert\Type("string")
     * @Assert\Choice({"cancelled"})
     * @Assert\NotBlank()
     */
    protected $result;
}
