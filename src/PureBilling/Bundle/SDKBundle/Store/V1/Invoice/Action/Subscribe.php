<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Subscribe extends Action
{
    /**
     * @Store\Property(description="customer id")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="origin of the invoice. if null, default one is used")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Assert\NotBlank()
     */
    protected $origin;

    /**
     * @Store\Property(description="your subscription externam Id")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $externalId;

    /**
     * @Store\Property(description="country where the purchase is done")
     * @Assert\Type("string")
     * @PBAssert\Country()
     * @Assert\NotBlank()
     */
    protected $country;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     */
    protected $recurringAmount;

    /**
     * @Store\Property(description="invoice currency")
     * @Assert\Type("string")
     * @Assert\Currency()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="Periodicity.")
     * @Assert\Type("string")
     * @Assert\Choice({"monthly"})
     * @Assert\NotBlank()
     */
    protected $periodicity;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotBlank()
     */
    protected $firstBillingDate;

    /**
     * @Store\Property(description="customer ip during the purchase")
     * @Assert\Type("string")
     * @Assert\Ip()
     * @Assert\NotBlank()
     */
    protected $ip;

    /**
     * @Store\Property(description="Recurring offer to use (only indicativo, values are overwritten.")
     * @PBAssert\Type(type="id", idPrefixes={"offer"})
     * @Assert\NotNull()
     */
    protected $offer;

    /**
     * @Store\Property(description="Payment Service Provider Account to use. if NULL, use the backoffice configuration")
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     * @Assert\NotNull()
     */
    protected $PSPAccount = null;

    /**
     * @Store\Property(description="billing method to use to bill the invoice. Should be a ID or a newCreditcard store.")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal", "iban"})
     * @Assert\NotBlank()
     */
    protected $paymentMethod;
}
