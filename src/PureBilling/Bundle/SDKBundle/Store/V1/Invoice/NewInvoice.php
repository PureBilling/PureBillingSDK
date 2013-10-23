<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;

class NewInvoice extends Element
{
    /**
     * @Store\Property(description="customer id. If null, a new customer will be created")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^customer_/", message="owner id should start with 'customer_' prefix")
     * @Store\Entity()
     */
    protected $customer;

    /**
     * @Store\Property(description="owner public key. If null, default owner will be used.")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^owner_/", message="owner id should start with 'owner_' prefix")
     * @Store\Entity()
     */
    protected $owner;

    /**
     * @Store\Property(description="origin of the invoice. if null, default one is used")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^origin_/", message="origin id should start with 'origin_' prefix")
     * @Store\Entity()
     */
    protected $origin;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     */
    protected $externalId;

    /**
     * @Store\Property(description="country where the purchase is done")
     * @Assert\Type("string")
     * @Assert\Country()
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $country;

    /**
     * @Store\Property(description="invoice currency")
     * @Assert\Type("string")
     * @Assert\Currency()
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="invoice items. define the products solds and associated prices and taxes")
     * @Assert\Type("array")
     * @Assert\Count(min=1)
     * @Assert\NotNull()
     * @Store\StoreClass({"PureBilling\Bundle\SDKBundle\Store\V1\Invoice\NewInvoiceItem",
     *                    "PureBilling\Bundle\SDKBundle\Store\V1\Invoice\NewInvoiceOfferItem"})
     */
    protected $invoiceItems;

    /**
     * @Store\Property(description="metadata to keep with the invoice")
     * @Assert\Type("array")
     */
    protected $metadata = array();

    /**
     * @Store\Property(description="customer ip when the purchase is done.")
     * @Assert\Type("string")
     * @Assert\Ip()
     * @Assert\NotNull()
     */
    protected $ip = '0.0.0.0';
}
