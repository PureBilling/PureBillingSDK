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
     * @Store\Property(description="used payment method name")
     * @Assert\Type("string")
     * @Store\EntityMapping("paymentServiceProviderAccount.paymentMethod.name")
     * @Assert\Choice({"creditcard"})
     * @Assert\NotBlank()
     */
    protected $paymentMethodName;

    /**
     * @Store\Property(description="used payment method id")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard"})
     * @Store\EntityMapping("creditcardAlias.publicKey")
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
    protected $type;

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
     * @Assert\Choice({"cancelled", "collected", "collecting", "recovering", "refused", "error", "refunded"})
     * @Assert\NotBlank()
     */
    protected $detailledStatus;

    /**
     * @Store\Property(description="amount to bill")
     * @Assert\Type("float")
     * @Store\EntityMapping("amount")
     * @Assert\NotNull()
     */
    protected $amount;

    /**
     * @Store\Property(description="transaction currency")
     * @Assert\Type("string")
     * @Store\EntityMapping("currency.id")
     * @Assert\Currency()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="transaction country")
     * @Assert\Type("string")
     * @Store\EntityMapping("country.id")
     * @Assert\Country()
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
     * @Store\Property(description="customer associated to the invoice")
     * @Assert\Type("string")
     * @Store\EntityMapping("endUser.publicKey")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     * @Store\EntityMapping("publicKey")
     */
    protected $externalId;

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

    public function setDetailledStatus($status)
    {
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