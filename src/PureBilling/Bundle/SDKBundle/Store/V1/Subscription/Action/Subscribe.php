<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Subscription\Action;

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
     */
    protected $origin;

    /**
     * @Store\Property(description="your subscription external Id")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $externalId;

    /**
     * @Store\Property(description="offerID (open string)")
     * @Assert\Type("string")
     */
    protected $offerId;

    /**
     * @Store\Property(description="Short offer description")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $shortOfferDescription;

    /**
     * @Store\Property(description="country where the purchase is done")
     * @Assert\Type("string")
     * @PBAssert\Country()
     * @Assert\NotBlank()
     */
    protected $country = '??';

    /**
     * @Store\Property(description="Amount to bill each period")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     */
    protected $recurringAmount;

    /**
     * @Store\Property(description="First amount to bill, use recurringAmount in not defined")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     */
    protected $setupAmount;

    /**
     * @Store\Property(description="invoice currency")
     * @Assert\Type("string")
     * @Assert\Currency()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="Periodicity Unit.")
     * @Assert\Type("string")
     * @Assert\Choice({"monthly","daily","yearly","quarterly", "manual"})
     * @Assert\NotBlank()
     */
    protected $recurringPeriodUnit;

    /**
     * @Store\Property(description="Periodicity.")
     * @Assert\Type("integer")
     * @Assert\NotBlank()
     */
    protected $recurringPeriod = 1;

    /**
     * @Store\Property(description="Should be defined if there is a trial period")
     * @PBAssert\Type(type="datetime")
     */
    protected $firstBillingDate;

    /**
     * @Store\Property(description="Number of cycles to bill")
     * @Assert\Type("integer")
     */
    protected $billingCycles;

    /**
     * @Store\Property(description="customer ip during the purchase")
     * @Assert\Type("string")
     * @Assert\Ip(version="all")
     */
    protected $ip;

    /**
     * @Store\Property(description="Payment Service Provider Account to use. if NULL, use the backoffice configuration")
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     */
    protected $PSPAccount;

    /**
     * @Store\Property(description="billing method to use to bill the invoice.")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal", "iban"})
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="Metadata copied to the first invoice")
     * @Assert\Type("array")
     */
    protected $metadata =  array();

    /**
     * @Store\Property(description="If defined, every transaction change will be notified to this callback")
     * @Assert\Type("string")
     */
    protected $notificationCallbackUrl;
}
