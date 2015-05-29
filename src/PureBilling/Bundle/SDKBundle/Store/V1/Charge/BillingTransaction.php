<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

/**
 * Class BillingTransaction
 * @package PureBilling\Bundle\SDKBundle\Store\V1\Charge
 *
 * @method getId()
 * @method getPaymentMethodSubType()
 * @method getPaymentMethodType()
 * @method getBillingTransactionType()
 * @method getStatus()
 * @method getDetailledStatus()
 * @method getAmount()
 * @method getCurrency()
 * @method getCountry()
 * @method getInvoice()
 * @method getParentBillingTransaction()
 * @method getCustomer()
 * @method getOrigin()
 * @method getChargeToken()
 * @method getExternalId()
 * @method getIp()
 * @method getCreationDateTime()
 * @method getErrorCode()
 * @method getMessage()
 * @method getNotificationCallbackUrl()
 * @method getPSPTransactionInfo()
 * @method getShortDescription()
 * @method getIsTest()
 * @method getPaymentMethod()
 * @method getAdditionalAuthenticationMethod()
 * @method getPaymentMethodSource()
 * @method getAllowedActions()
 * @method getMetadata()
 * @method getUpdateNotifications()
 * @method getStrongAuthenticationStatus()
 * @method getMerchantCallback()
 */
class BillingTransaction extends Element
{
    /**
     * @Store\Property(description="billing transaction id")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="Payment method subtype associated to the billing")
     * @Assert\Type("string")
     * @Store\EntityMapping("paymentMethodSubTypeName")
     * @Assert\NotBlank()
     */
    protected $paymentMethodSubType;

    /**
     * @Store\Property(description="used payment method name")
     * @Assert\Type("string")
     * @Store\EntityMapping("PSPAccount.paymentMethodTypeName")
     * @Assert\Choice({"creditcard", "internetplus", "paypal", "iban"})
     * @Assert\NotBlank()
     */
    protected $paymentMethodType;

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
     * @Store\EntityMapping("status")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="billing transaction detailled status")
     * @Assert\Type("string")
     * @Store\EntityMapping("workflowState")
     * @Assert\Choice({"cancelled", "collected", "collecting", "redirected", "authorized", "authorizedcancelled",
     *                 "recovering", "refused", "error", "refunded", "transmitted"})
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
     * @Store\Property(description="children if any. Returned on demand, see propertiesToExpand.")
     * @Assert\Type("array")
     */
    protected $childrenBillingTransactions;

    /**
     * @Store\Property(description="customer associated to the transaction")
     * @Store\EntityMapping("customer.publicKey")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="origin associated to the transaction")
     * @Store\EntityMapping("origin.publicKey")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Assert\NotBlank()
     */
    protected $origin;

    /**
     * @Store\Property(description="origin associated to the transaction")
     * @Store\EntityMapping("formToken")
     * @PBAssert\Type(type="id", idPrefixes={"chargetoken"})
     */
    protected $chargeToken;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     * @Store\EntityMapping("externalId")
     */
    protected $externalId;

    /**
     * @Store\Property(description="ip of the charge")
     * @Assert\Type("string")
     * @Store\EntityMapping("originIp")
     */
    protected $ip;

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
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Store\EntityMapping("publicKey")
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
     * @Store\Property(description="True if it's a test transaction")
     * @Assert\Type("boolean")
     * @Store\EntityMapping("PSPAccount.isTestingAccount")
     */
    protected $isTest;

    /**
     * @Store\Property(description="used payment method id")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal", "iban"})
     * @Store\EntityMapping("paymentMethod.publicKey")
     * @Assert\NotBlank()
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="if the payment method has been validated with one more stuff")
     * @Assert\Type("string")
     * @Assert\Choice(choices={"cvv"})
     * @Store\EntityMapping("additionalAuthenticationMethodString")
     */
    protected $additionalAuthenticationMethod;

    /**
     * @Store\Property(description="payment method source. Can be PSP alias, PureBilling vault...")
     * @Assert\Type("string")
     * @Assert\Choice(choices={"pspalias", "vault", "unknown"})
     * @Store\EntityMapping("paymentMethodSourceString")
     * @Assert\NotBlank()
     */
    protected $paymentMethodSource;

    /**
     * @Store\Property(description="Allowed actions")
     * @Assert\Type("array")
     * @Assert\Choice(choices={"refund"}, multiple=true)
     */
    protected $allowedActions = array();

    /**
     * @Store\Property(description="Metadata")
     * @Assert\Type("array")
     * @Store\EntityMapping("merchantMetadata")
     */
    protected $metadata =  array();

    /**
     * @Store\Property(description="merchant change notification callback. Returned on demand, see propertiesToExpand.")
     * @Assert\Type("array")
     * @Store\AllowedId("update")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Common\UpdateNotification")
     */
    protected $updateNotifications;

    /**
     * @Store\Property(description="extra information associated to the billing transaction")
     * @Assert\Type("object")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Charge\BillingTransactionAdditionalInfo")
     */
    protected $additionalInfo;

    /**
     * @Store\Property(description="Strong Authentication enabled or not during the billing Operation")
     * @Assert\Type("string")
     * @Assert\NotBlank
     * @Assert\Choice({"enabled", "disabled"})
     * @Store\EntityMapping("strongAuthenticationStatusString")
     */
    protected $strongAuthenticationStatus;

    /**
     * @Store\Property(description="merchant callback called if there is a redirection")
     * @Assert\Type("string")
     * @Store\EntityMapping("merchantCallback")
     */
    protected $merchantCallback;

    /**
     * @Store\Property(description="Option used to create the transaction")
     * @PBAssert\Type(type="id", idPrefixes={"option"})
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Option\CascadeNewCard",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Option\CascadeCardAlias",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\Option\MultiPSPCardRegistration"
     * })
     */
    protected $option;

    public function setDetailledStatus($status)
    {
        if ($status == 'WaitingCollecting') $status = 'redirected';

        $this->detailledStatus = strtolower($status);
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
