<?php
namespace PureBilling\Bundle\SDKBundle\Store\Base;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

abstract class CaptureBase extends Action
{
    /**
     * @Store\Property(description="amount to bill. 5.00 in USD will bill 5.00 USD.")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotNull()
     */
    protected $amount;

    /**
     * @Store\Property(description="billing method to use to bill the invoice. Should be a ID or a newCreditcard store.")
     * @PBAssert\Type(type="objectOrId", idPrefixes={"creditcard"})
     * @Assert\NotNull()
     * @Store\Entity()
     * @Store\StoreClass({"PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\NewCreditcard"})
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="External id")
     * @Assert\Type("string")
     */
    protected $externalId;
}
