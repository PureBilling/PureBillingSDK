<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class NewInvoice extends Element
{
    /**
     * @Store\Property(description="customer id. If null, a new customer will be created")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="owner public key. If null, default owner will be used.")
     * @PBAssert\Type(type="id", idPrefixes={"owner"})
     */
    protected $owner;

    /**
     * @Store\Property(description="origin of the invoice. if null, default one is used")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
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
     * @PBAssert\Country()
     */
    protected $country = '??';

    /**
     * @Store\Property(description="invoice currency")
     * @Assert\Type("string")
     * @Assert\Currency()
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
     * @Store\Property(description="metadata you want to associate to the invoice")
     * @Assert\Type("array")
     */
    protected $metadata = array();

    /**
     * @Store\Property(description="customer ip during the purchase")
     * @Assert\Type("string")
     * @Assert\Ip()
     */
    protected $ip;

    /**
     * @Store\Property(description="If defined, every invoice change will be notified to this callback")
     * @Assert\Type("string")
     */
    protected $notificationCallbackUrl;

    /**
     * @Store\Property(description="Invoice description")
     * @Assert\Type("string")
     */
    protected $description;

    /**
     * @Store\Property(description="Some properties return a ID. If you want a full object, add the property path here")
     * @Assert\Type("array")
     * @Assert\Choice(multiple=true, choices={"updateNotifications",
     *                                        "supportInfo",
     *                                        "customer",
     *                                        "origin", "billings", "subscriptionInfo"})
     */
    protected $propertiesToExpand = array();

    public function setMetadata($meta)
    {
        $this->metadata = (array) $meta;
    }
}
