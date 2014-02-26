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
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal"})
     * @Assert\NotNull()
     * @Store\Entity()
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\Creditcard",
     * 		"PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\CreditcardForm",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\Paypal",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\InternetPlus"
     * })
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="External id")
     * @Assert\Type("string")
     */
    protected $externalId;

    /**
     * @Store\Property(description="If defined, every transaction change will be notified to this callback")
     * @Assert\Type("string")
     */
    protected $notificationCallback;

    public function setAmount($amount)
    {
        $this->amount = (float) $amount;
    }
}
