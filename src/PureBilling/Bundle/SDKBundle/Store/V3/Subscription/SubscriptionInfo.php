<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Subscription;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class SubscriptionInfo extends BaseStoreV3
{
    /**
     * @Store\Property(description="id of the sale")
     * @PBAssert\Type(type="id", idPrefixes={"sub"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotBlank()
     * @Store\EntityMapping("creationDateTime")
     */
    protected $creationDateTime;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotBlank()
     * @Store\EntityMapping("nextBillingDate")
     */
    protected $cancellationDateTime;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @Assert\Type("numeric")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     */
    protected $subscriptionAmount;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @Assert\Type("numeric")
     * @Assert\GreaterThan(0)
     */
    protected $initialAmount;

    /**
     * @Store\Property(description="Subscription External Id")
     * @Assert\Type("string")
     * @Store\EntityMapping("externalId")
     */
    protected $merchantReference;

    /**
     * @Store\Property(description="when the next invoice will be created")
     * @PBAssert\Type(type="string")
     * @Assert\Currency()
     * @Assert\NotBlank()
     * @Store\EntityMapping("currency.iso2")
     */
    protected $currency;

    /**
     * @Store\Property(description="invoice status")
     * @Assert\Type("string")
     * @Store\EntityMapping("pureBillingStatusV3")
     * @Assert\Choice({"running", "pending", "stopped"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="Periodicity Unit.")
     * @Assert\Type("string")
     * @Assert\Choice({"monthly","daily","yearly","quarterly", "manual"})
     * * @Store\EntityMapping("billingCycleAsString")
     * @Assert\NotBlank()
     */
    protected $billingCycle;

    /**
     * @Store\Property(description="Number of cycles to bill, null if infinite")
     * @Assert\Type("integer")
     * @Assert\GreaterThan(0)
     * @Store\EntityMapping("billingCycles")
     */
    protected $NumberOfBillingCycles;

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
