<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;


/**
 * Class BillingTransaction
 * @package PureBilling\Bundle\SDKBundle\Store\V3\Charge
 *
 * @method getId()
 * @method getPaymentMethodSubType()
 * @method getPaymentMethodType()
 * @method getBillingTransactionType()
 * @method getStatus()
 * @method getDetailedStatus()
 * @method getAmount()
 * @method getCurrency()
 * @method getCountry()
 * @method getInvoice()
 * @method getParentBillingTransaction()
 * @method getCustomer()
 * @method getOrigin()
 * @method getFormToken()
 * @method getOrderId()
 * @method getIpAddress()
 * @method getCreationDate()
 * @method getExpectedCaptureDate()
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
 *
 * ChangeLog from V1
 *
 * paymentMethodSubType removed. Can be found inside paymentMethod store
 * allowedActions has been moved to BillingTransactionAdditionalInfo
 */
class BillingTransaction extends BaseStoreV3
{
    /**
     * @Store\Property(description="billing transaction id")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="used payment method name")
     * @Assert\Type("string")
     * @Store\EntityMapping("PSPAccount.paymentMethodTypeName")
     * @Assert\Choice({"creditcard", "internetplus", "paypal", "iban", "paysafecard", "ideal", "giropay",
     *                 "sofort", "bcmc"})
     * @Assert\NotBlank()
     */
    protected $paymentMethodType;

    /**
     * @Store\Property(description="used payment method id")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal", "iban", "paysafecard",
     *                                       "ideal", "giropay", "sofort", "bcmc"})
     * @Store\EntityMapping("paymentMethod.publicKey")
     * @Assert\NotBlank()
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="billing transaction type")
     * @Assert\Type("string")
     * @Store\EntityMapping("billingTransactionType.name")
     * @Assert\Choice({"capture", "authorize", "refund"})
     * @Assert\NotBlank()
     */
    protected $creationContext;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("string")
     * @Store\EntityMapping("status")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="billing transaction detailed status")
     * @Assert\Type("string")
     * @Store\EntityMapping("workflowState")
     * @Assert\Choice({"cancelled", "collected", "collecting", "redirected", "authorized", "authorizedcancelled",
     *                 "recovering", "refused", "error", "refunded", "transmitted", "create"})
     * @Assert\NotBlank()
     */
    protected $detailedStatus;

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
     * @Store\Property(description="transaction country", keepIfNull=True)
     * @Assert\Type("string")
     * @Store\EntityMapping("country.id")
     * @PBAssert\Country()
     */
    protected $country;

    /**
     * @Store\Property(description="shop ID")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     * @Store\EntityMapping("owner.login")
     */
    protected $shopId;

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
     * @PBAssert\Type(type="id", idPrefixes={"formtoken"})
     */
    protected $formToken;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used", keepIfNull=True)
     * @Assert\Type("string")
     * @Store\EntityMapping("externalId")
     */
    protected $orderId;

    /**
     * @Store\Property(description="ip of the charge", keepIfNull=True)
     * @Assert\Type("string")
     * @Store\EntityMapping("originIp")
     */
    protected $ipAddress;

    /**
     * @Store\Property(description="Creation date time of the billing")
     * @Store\EntityMapping("creationDateTime")
     * @PBAssert\Type(type="datetime")
     */
    protected $creationDate;

    /**
     * @Store\Property(description="expected capture date", keepIfNull=True)
     * @PBAssert\Type(type="datetime")
     */
    protected $expectedCaptureDate;

    /**
     * @Store\Property(description="last error code", keepIfNull=True)
     * @Assert\Type("string")
     * @Store\EntityMapping("errorCode")
     */
    protected $errorCode;

    /**
     * @Store\Property(description="Message associated to the last operation (usually a error message)", keepIfNull=True)
     * @Assert\Type("string")
     * @Store\EntityMapping("errorMessage")
     */
    protected $message;

    /**
     * @Store\Property(description="detailed message associated to the message", keepIfNull=True)
     * @Assert\Type("string")
     * @Store\EntityMapping("merchantErrorMessage")
     */
    protected $detailedMessage;

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
     * @Store\Property(description="Short description of billed item", keepIfNull=true)
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
     * @Store\Property(description="Metadata", keepIfNull=true)
     * @Assert\Type("array")
     * @Store\EntityMapping("merchantMetadata")
     */
    protected $metadata;

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
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V3\Charge\BillingTransactionAdditionalInfo")
     */
    protected $additionalInfo;

    /**
     * @Store\Property(description="Strong Authentication enabled or not during the billing Operation")
     * @Assert\Type("string")
     * @Assert\NotBlank
     * @Assert\Choice({"enabled", "disabled"})
     * @Store\EntityMapping("strongAuthenticationStatusString")
     */
    protected $strongAuthenticationState;

    /**
     * @Store\Property(description="merchant callback called if there is a redirection", keepIfNull=True)
     * @Assert\Type("string")
     * @Store\EntityMapping("merchantCallback")
     */
    protected $merchantCallbackUrl;

    /**
     * @Store\Property(description="Option used to create the transaction")
     * @Assert\Type("array")
     * @Assert\Choice(choices={"newCardCascading", "cardAliasCascading", null}, multiple=true)
     * @Store\EntityMapping("options")
     */
    protected $options;

    public function setDetailedStatus($status)
    {
        if ($status == 'WaitingCollecting') $status = 'redirected';

        $this->detailedStatus = strtolower($status);
    }

    public function setErrorCode($code)
    {
        if (is_null($code)) {
            $this->errorCode = null;
        } else {
            $this->errorCode = (string)$code;
        }
    }

    public function setCurrency($currency)
    {
        $this->currency = strtoupper($currency);
    }

    public function setCountry($country)
    {
        if (is_null($country)) {
            $this->country = null;
        } else {
            $this->country = strtoupper($country);
        }
    }
}
