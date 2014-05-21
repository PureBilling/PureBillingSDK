<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class BillingTransaction extends Element
{
    /**
     * @Store\Property(description="billing transaction id")
     * @Store\Entity()
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="Payment method subtype associated to the billing")
     * @Assert\Type("string")
     * @Store\EntityMapping("paymentMethodSubType.name")
     * @Assert\NotBlank()
     */
    protected $paymentMethodSubType;

    /**
     * @Store\Property(description="used payment method name")
     * @Assert\Type("string")
     * @Store\EntityMapping("PSPAccount.paymentMethodType.name")
     * @Assert\Choice({"creditcard", "internetplus", "paypal"})
     * @Assert\NotBlank()
     */
    protected $paymentMethodType;

    /**
     * @Store\Property(description="used payment method id")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal"})
     * @Store\EntityMapping("paymentMethod.publicKey")
     * @Assert\NotBlank()
     * @Store\Entity()
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="billing transaction type")
     * @Assert\Type("string")
     * @Store\EntityMapping("billingTransactionType.name")
     * @Assert\Choice({"capture", "authorize", "refund"})
     * @Assert\NotBlank()
     */
    protected $billingTransactionType;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("string")
     * @Store\EntityMapping("workflowStatus.name")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="billing transaction detailled status")
     * @Assert\Type("string")
     * @Store\EntityMapping("workflowState")
     * @Assert\Choice({"cancelled", "collected", "collecting", "redirected", "recovering", "refused", "error", "refunded"})
     * @Assert\NotBlank()
     */
    protected $detailledStatus;

    /**
     * @Store\Property(description="amount (billed or to bill)")
     * @Assert\Type("float")
     * @Store\EntityMapping("amount")
     * @Assert\NotBlank()
     */
    protected $amount;

    /**
     * @Store\Property(description="transaction currency")
     * @Assert\Type("string")
     * @Store\EntityMapping("currency.id")
     * @Assert\Currency()
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="transaction country")
     * @Assert\Type("string")
     * @Store\EntityMapping("country.id")
     * @PBAssert\Country()
     * @Assert\NotBlank()
     */
    protected $country;

    /**
     * @Store\Property(description="invoice attached to the payment if any")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Store\EntityMapping("invoiceTransaction.publicKey")
     */
    protected $invoice;

    /**
     * @Store\Property(description="parent billingTransaction if any")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Store\EntityMapping("parentBillingTransaction.publicKey")
     */
    protected $parentBillingTransaction;

    /**
     * @Store\Property(description="customer associated to the transaction")
     * @Assert\Type("string")
     * @Store\EntityMapping("customer.publicKey")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     * @Store\EntityMapping("externalId")
     */
    protected $externalId;

    /**
     * @Store\Property(description="Creation date time of the billing")
     * @Store\EntityMapping("creationDateTime")
     * @PBAssert\Type(type="datetime")
     */
    protected $creationDateTime;

    /**
     * @Store\Property(description="last error code")
     * @Assert\Type("string")
     * @Store\EntityMapping("errorCode")
     */
    protected $errorCode;

    /**
     * @Store\Property(description="Message associated to the last operation (usually a error message)")
     * @Assert\Type("string")
     * @Store\EntityMapping("errorMessage")
     */
    protected $message;

    /**
     * @Store\Property(description="merchant change notification callback Url")
     * @Assert\Type("string")
     * @Store\EntityMapping("notificationCallbackUrl")
     */
    protected $notificationCallbackUrl;

    /**
     * @Store\Property(description="PSP transaction Info")
     * @Assert\Type("object")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Charge\PSPTransactionInfo")
     * @Assert\NotBlank()
     */
    protected $PSPTransactionInfo;

    /**
     * @Store\Property(description="Short description of billed item")
     * @Assert\Type("string")
     * @Store\EntityMapping("shortDescription")
     */
    protected $shortDescription;

    /**
     * @Store\Property(description="Short description of billed item")
     * @Assert\Type("boolean")
     * @Store\EntityMapping("owner.isTest")
     */
    protected $isTest;

    /**
     * @Store\Property(description="Payment Method Info")
     * @Assert\Type("object")
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\Creditcard",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\RemotePaymentMethod"
     * })
     */
    protected $paymentMethodInfo;

    /**
     * @Store\Property(description="Allowed actions")
     * @Assert\Type("array")
     * @Assert\Choice(choices={"refund"}, multiple=true)
     */
    protected $allowedActions = array();

    /**
     * @Store\Property(description="Metadata")
     * @Assert\Type("array")
     * @Store\EntityMapping("metadatas")
     */
    protected $metadata =  array();

    public function setDetailledStatus($status)
    {
        if ($status == 'WaitingCollecting') $status = 'redirected';

        $this->detailledStatus = strtolower($status);
    }

    public function setStatus($status)
    {
        switch ($status) {
            case 'success':
                if ($this->getDetailledStatus() == 'collected' ||
                    $this->getDetailledStatus() == 'refunded') {

                    $this->status = 'paid';
                    break;
                }
            case 'error':
            case 'refused':
            case 'exception':
            case 'cancelled':
                $this->status = 'unpaid';
                break;
            case 'running':
                $this->status = 'running';
                break;
            default:
                $this->status = $status;
                break;
        }
    }

    public function setErrorCode($code)
    {
        $this->errorCode =(string) $code;
    }

    public function setCurrency($currency)
    {
        $this->currency = strtoupper($currency);
    }

    public function setCountry($country)
    {
        $this->country = strtoupper($country);
    }
}
