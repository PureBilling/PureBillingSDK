<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Subscription;

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
     * @Store\Property(description="offerID defined by the merchant")
     * @Assert\Type("string")
     * @Store\EntityMapping("merchantOfferId")
     */
    protected $offerId;

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
     * @Store\AllowedId("task")
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Common\Task"
     * })
     */
    protected $tasks;

    /**
     * @Store\Property(description="first invoice of the subscription")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     */
    protected $firstInvoice;

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
     * @Store\Property(description="Allowed actions")
     * @Assert\Type("array")
     * @Assert\Choice(choices={"unsubscribe"}, multiple=true)
     */
    protected $allowedActions = array();

    /**
     * @Store\Property(description="merchant change notification callback")
     * @Assert\Type("array")
     */
    protected $updateNotifications;

    /**
     * @Store\Property(description="start time of the subscription")
     * @PBAssert\Type(type="datetime")
     * @Store\EntityMapping("startDatetime")
     */
    protected $startDate;

    /**
     * @Store\Property(description="Metadata")
     * @Assert\Type("array")
     * @Store\EntityMapping("metadataAsArray")
     */
    protected $metadata =  array();

    /**
     * @Store\Property(description="end time of the subscription")
     * @PBAssert\Type(type="datetime")
     * @Store\EntityMapping("endDatetime")
     */
    protected $endDate;

    /**
     * @Store\Property(description="customer associated to the transaction")
     * @Store\EntityMapping("customer.publicKey")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Assert\NotBlank()
     */
    protected $customer;

    public function setDetailledStatus($dStatus)
    {
        $this->detailledStatus = strtolower($dStatus);
    }
}
