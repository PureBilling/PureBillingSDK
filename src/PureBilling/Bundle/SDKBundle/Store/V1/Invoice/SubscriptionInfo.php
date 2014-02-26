<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class SubscriptionInfo extends Element
{
    /**
     * @Store\Property(description="id of the sale")
     * @Store\Entity()
     * @PBAssert\Type(type="id", idPrefixes={"sale"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @Assert\Type("datetime")
     * @Assert\NotBlank()
     * @Store\EntityMapping("nextBillingDate")
     */
    protected $nextBillingDate;

    /**
     * @Store\Property(description="all invoices created for the subscription")
     * @Assert\Type("array")
     * @Assert\NotBlank()
     */
    protected $invoices;

    /**
     * @Store\Property(description="If defined, every invoice change will be notified to this callback URL")
     * @Assert\Type("string")
     * @Store\EntityMapping("notificationCallbackUrl")
     */
    protected $notificationCallbackUrl;

    /**
     * @Store\Property(description="merchant change notification callback")
     * @PBAssert\Type(type="id", idPrefixes={"callback"})
     * @Store\EntityMapping("notificationCallback.publicKey")
     */
    protected $notificationCallback;

}
