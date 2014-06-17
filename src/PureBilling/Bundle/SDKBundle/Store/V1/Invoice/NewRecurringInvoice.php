<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class NewRecurringInvoice extends Element
{
    /**
     * @Store\Property(description="customer id. If null, a new customer will be created")
     * @PBAssert\Type(type="id", idPrefixes={"sale"})
     * @Assert\NotBlank()
     */
    protected $subscriptionInfo;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     */
    protected $externalId;

    /**
     * @Store\Property(description="metadata you want to associate to the invoice")
     * @Assert\Type("array")
     */
    protected $metadata = array();

    /**
     * @Store\Property(description="If defined, every invoice change will be notified to this callback")
     * @Assert\Type("string")
     */
    protected $notificationCallbackUrl;

    /**
     * @Store\Property(description="Some properties return a ID. If you want a full object, add the property path here")
     * @Assert\Type("array")
     * @Assert\Choice(multiple=true, choices={"updateNotifications",
     *                                        "supportInfo",
     *                                        "customer",
     *                                        "origin", "billings", "subscriptionInfo"})
     */
    protected $propertiesToExpand = array();

    public function setMetadata($meta)
    {
        $this->metadata = (array) $meta;
    }
}
