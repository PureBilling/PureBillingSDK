<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class Invoice extends NewInvoice
{
    /**
     * @Store\Property(description="Invoice id")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^invoice_/", message="owner id should start with 'invoice_' prefix")
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="customer associated to the invoice")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^customer_/", message="owner id should start with 'customer_' prefix")
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="your invoice internal Id if it has been defined at creation")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $externalId;

    /**
     * @Store\Property(description="invoice status")
     * @Assert\Type("string")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="invoice detailled status")
     * @Assert\Type("string")
     * @Assert\Choice({"cancelled", "collected", "collecting", "recovering", "recoverystuck"})
     * @Assert\NotBlank()
     */
    protected $detailledStatus;

    /**
     * @Store\Property(description="total invoice amount")
     * @Assert\Type("float")
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
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Charge\BillingTransaction")
     */
    protected $billingTransactions;

    /**
     * @Store\Property(description="Current payment method attached to the invoice")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^creditcard_/", message="Invoice.paymentMethod invalid")
     */
    protected $paymentMethod = null;
}
