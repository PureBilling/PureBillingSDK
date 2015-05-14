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
     * @Assert\Choice({"monthly","daily"})
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
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotBlank()
     */
    protected $firstBillingDate;

    /**
     * @Store\Property(description="customer ip during the purchase")
     * @Assert\Type("string")
     * @Assert\Ip()
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
}
