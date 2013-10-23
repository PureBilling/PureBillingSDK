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
     * @Assert\Choice({"creditcard"})
     * @Assert\NotBlank()
     */
    protected $paymentMethodName;

    /**
     * @Store\Property(description="used payment method id")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard"})
     * @Assert\NotBlank()
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="billing transaction type")
     * @Assert\Type("string")
     * @Assert\Choice({"capture", "authorize", "refund"})
     * @Assert\NotBlank()
     */
    protected $type;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("string")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="billing transaction detailled status")
     * @Assert\Type("string")
     * @Assert\Choice({"cancelled", "collected", "collecting", "recovering", "refused", "error", "refunded"})
     * @Assert\NotBlank()
     */
    protected $detailledStatus;

    /**
     * @Store\Property(description="amount to bill")
     * @Assert\Type("float")
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\NotNull()
     */
    protected $amount;

    /**
     * @Store\Property(description="invoice attached to the payment if any")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     */
    protected $invoice;

    /**
     * @Store\Property(description="parent billingTransaction if any")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     */
    protected $parentBillingTransaction;

    /**
     * @Store\Property(description="customer associated to the invoice")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^customer_/", message="owner id should start with 'customer_' prefix")
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     */
    protected $externalId;
}
