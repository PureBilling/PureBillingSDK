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
     * @PBAssert\Type(type="id", idPrefixes={"sale"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotBlank()
     * @Store\EntityMapping("creationDateTime")
     */
    protected $subscriptionDate;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotBlank()
     * @Store\EntityMapping("nextBillingDate")
     */
    protected $nextBillingDate;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     * @Store\EntityMapping("recurringAmount")
     */
    protected $recurringAmount;

    /**
     * @Store\Property(description="Subscription External Id")
     * @Assert\Type("string")
     * @Store\EntityMapping("externalId")
     */
    protected $externalId;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="string")
     * @Assert\Currency()
     * @Assert\NotBlank()
     * @Store\EntityMapping("currency.iso2")
     */
    protected $currency;

    /**
     * @Store\Property(description="all invoices created for the subscription")
     * @Assert\Type("array")
     */
    protected $invoices;

    /**
     * @Store\Property(description="tasks of the subscription")
     * @Assert\Type("array")
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Common\Task"
     * })
     */
    protected $tasks;

    /**
     * @Store\Property(description="First invoice status created with the subscription")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $firstInvoiceStatus = 'unpaid';

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
    protected $updateNotifications;

    public function setDetailledStatus($dStatus)
    {
        $this->detailledStatus = strtolower($dStatus);
    }
}
