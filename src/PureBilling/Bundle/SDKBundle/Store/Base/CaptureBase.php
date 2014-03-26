<?php
namespace PureBilling\Bundle\SDKBundle\Store\Base;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

abstract class CaptureBase extends Action
{
    /**
     * @Store\Property(description="amount to bill. 5.00 for euro will bill 5.00 EUR.")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     */
    protected $amount;

    /**
     * @Store\Property(description="billing method to use to bill the invoice. Should be a ID or a newCreditcard store.")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard", "internetplus", "paypal"})
     * @Assert\NotBlank()
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
     * @Store\Property(description="Payment method type to use, if null, bill with creditcard or the more accurate payment method regarding the paymentMethod")
     * @Assert\Type("string")
     * @Assert\Choice({"creditcard", "internetplus", "paypal"})
     */
    protected $paymentMethodType;

    /**
     * @Store\Property(description="Payment Service Provider Account to use. if NULL, use the backoffice configuration")
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     * @Store\Entity()
     */
    protected $PSPAccount = null;

    /**
     * @Store\Property(description="External id", recommended=true)
     * @Assert\Type("string")
     */
    protected $externalId;

    /**
     * @Store\Property(description="If defined, every transaction change will be notified to this callback")
     * @Assert\Type("string")
     */
    protected $notificationCallbackUrl;

    /**
     * @Store\Property(description="Short description of billed item", recommended=true)
     * @Assert\Type("string")
     */
    protected $shortDescription;

    public function setAmount($amount)
    {
        $this->amount = (float) $amount;
    }
}
