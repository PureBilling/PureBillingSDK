<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Subscription\Action;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Create extends BaseStoreV3
{
    /**
     * @Store\Property(description="your subscription external Id")
     * @Assert\Type("string")
     */
    protected $merchantReference;

    /**
     * @Store\Property(description="Amount to bill each period")
     * @Assert\Type("numeric")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     */
    protected $subscriptionAmount;

    /**
     * @Store\Property(description="First amount to bill, use recurringAmount in not defined")
     * @Assert\Type("numeric")
     * @Assert\GreaterThan(0)
     */
    protected $initialAmount;

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
     * @Assert\Choice({"monthly"})
     * @Assert\NotBlank()
     */
    protected $billingCycle;

    /**
     * @Store\Property(description="Number of cycles to bill")
     * @Assert\Type("integer")
     * @Assert\GreaterThan(0)
     */
    protected $numberOfBillingCycles;

    /**
     * @Store\Property(description="billing method to use to bill the invoice.")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal", "iban"})
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="country where the purchase is done")
     * @Assert\Type("string")
     * @PBAssert\Country()
     */
    protected $country;

    /**
     * @Store\Property(description="customer ip during the purchase")
     * @Assert\Type("string")
     * @Assert\Ip(version="all")
     */
    protected $ip;

    /**
     * @Store\Property(description="Metadata copied to the first invoice")
     * @Assert\Type("array")
     */
    protected $metadata =  array();

    /**
     * @Store\Property(description="Short offer description")
     * @Assert\Type("string")
     */
    protected $shortOfferDescription;
}
