<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Invoice extends NewInvoice
{
    /**
     * @Store\Property(description="Invoice id")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Assert\NotBlank()
     * @Store\Entity()
     */
    protected $id;

    /**
     * @Store\Property(description="country where the purchase is done")
     * @Assert\Type("string")
     * @PBAssert\Country()
     * @Assert\NotBlank()
     * @Store\EntityMapping("saletransaction.country.id")
     */
    protected $country;

    /**
     * @Store\Property(description="invoice currency")
     * @Assert\Type("string")
     * @Assert\Currency()
     * @Store\EntityMapping("saletransaction.currency.id")
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="customer associated to the invoice")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\EntityMapping("saleTransaction.customer.publicKey")
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="your invoice internal Id if it has been defined at creation")
     * @Assert\Type("string")
     * @Store\EntityMapping("externalId")
     * @Assert\NotBlank()
     */
    protected $externalId;

    /**
     * @Store\Property(description="invoice status")
     * @Assert\Type("string")
     * @Store\EntityMapping("pureBillingStatus")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="invoice detailled status")
     * @Assert\Type("string")
     * @Store\EntityMapping("workflowState")
     * @Assert\Choice({"autocancelled", "cancelled", "collected", "collecting", "recovering", "manualrecovery"})
     * @Assert\NotBlank()
     */
    protected $detailledStatus;

    /**
     * @Store\Property(description="owner public key. If null, default owner will be used.")
     * @PBAssert\Type(type="id", idPrefixes={"owner"})
     * @Store\EntityMapping("owner.publicKey")
     * @Assert\NotBlank()
     */
    protected $owner;

    /**
     * @Store\Property(description="origin of the invoice. if null, default one is used")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Store\EntityMapping("saleTransaction.origin.publicKey")
     * @Assert\NotBlank()
     */
    protected $origin;

    /**
     * @Store\Property(description="total invoice amount")
     * @Assert\Type("float")
     * @Store\EntityMapping("amount")
     * @Assert\GreaterThan(0)
     * @Assert\NotNull()
     */
    protected $totalAmount;

    /**
     * @Store\Property(description="invoice balance. equal to 0 if paid")
     * @Assert\Type("float")
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\NotNull()
     */
    protected $balanceAmount;

    /**
     * @Store\Property(description="invoice items. define the products solds and associated prices and taxes")
     * @Assert\Type("array")
     * @Assert\Count(min=1)
     * @Assert\NotNull()
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Invoice\InvoiceItem")
     */
    protected $invoiceItems;

    /**
     * @Store\Property(description="all billing actions (succesfull or not)")
     * @Assert\Type("array")
     * @Assert\NotNull()
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Charge\BillingTransaction",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Charge\DetailledBillingTransaction"
     * })
     */
    protected $billingTransactions;

    /**
     * @Store\Property(description="Current payment method attached to the invoice")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard"})
     */
    protected $paymentMethod = null;

    /**
     * @Store\Property(description="due date of the invoice")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotNull()
     */
    protected $dueDate;

    /**
     * @Store\Property(description="If defined, every invoice change will be notified to this callback Url")
     * @Assert\Type("string")
     * @Store\EntityMapping("notificationCallbackUrl")
     */
    protected $notificationCallbackUrl;

    /**
     * @Store\Property(description="merchant change notification callback. Returned on demand, see propertiesToExpand.")
     * @Assert\Type("array")
     * @Store\StoreClass({"PureBilling\Bundle\SDKBundle\Store\V1\Common\UpdateNotification"})
     */
    protected $updateNotifications;

    /**
     * @Store\Property(description="support information associated to the invoice. Returned on demand, see propertiesToExpand.")
     * @PBAssert\Type(type="id", idPrefixes={"support"})
     */
    protected $supportInfo;

    public function setDetailledStatus($dStatus)
    {
        $this->detailledStatus = strtolower($dStatus);
    }

    public function setTotalAmount($amount)
    {
        $this->totalAmount = (float) $amount;
    }
}
