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
     * @PBAssert\Type(type="datetime")
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
     * @Store\Property(description="invoice status")
     * @Assert\Type("string")
     * @Store\EntityMapping("pureBillingStatus")
     * @Assert\Choice({"running", "cancelled"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="invoice detailled status")
     * @Assert\Type("string")
     * @Store\EntityMapping("workflowState")
     * @Assert\Choice({"unsubscribed","cancelled", "autocancelled", "collected", "collecting"})
     * @Assert\NotBlank()
     */
    protected $detailledStatus;

    /**
     * @Store\Property(description="merchant change notification callback")
     * @Assert\Type("array")
     */
    protected $notificationCallbacks;

    public function setDetailledStatus($dStatus)
    {
        $this->detailledStatus = strtolower($dStatus);
    }

}
