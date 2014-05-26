<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Customer extends BaseNewCustomer
{
    /**
     * //Operation Id are string with two letter prefix xxx_key
     *
     * @Store\Property(description="customer Id.")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="customer email")
     * @Assert\Type("string")
     * @Assert\Email()
     * @Store\EntityMapping("email")
     */
    protected $email;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     * @Store\EntityMapping("externalId")
     */
    protected $externalId;

    /**
     * @Store\Property(description="signup ip. used for fraud detection")
     * @Assert\Type("string")
     * @Assert\Ip()
     * @Store\EntityMapping("originIp")
     */
    protected $ip;

    /**
     * @Store\Property(description="origin public key. If null, default owner origin be used.")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Store\EntityMapping("origin.publicKey")
     * @Store\Entity()
     */
    protected $origin;

    /**
     * @Store\Property(description="customer owner public key.")
     * @PBAssert\Type(type="id", idPrefixes={"owner"})
     * @Assert\NotBlank()
     * @Store\EntityMapping("owner.publicKey")
     */
    protected $owner;

    /**
     * @Store\Property(description="Creation date time of the billing")
     * @Store\EntityMapping("creationDateTime")
     * @PBAssert\Type(type="datetime")
     */
    protected $creationDateTime;

    /**
     * @Store\Property(description="Subscription info attached to the invoice. Returned on demand, see propertiesToExpand.")
     * @Assert\Type("array")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Invoice\SubscriptionInfo")
     */
    protected $subscriptionInfo;
}
