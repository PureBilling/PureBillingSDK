<?php
namespace PureBilling\Bundle\SDKBundle\Store\Base;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

/**
 * Class CaptureBase
 * @package PureBilling\Bundle\SDKBundle\Store\Base
 *
 * @method setCurrency(string $currency)
 * @method setPaymentMethod(string $paymentMethod)
 * @method setPaymentMethodType(string $paymentMethodType)
 * @method setPSPAccount(string $PSPAccount)
 * @method setExternalId(string $ExternalId)
 * @method setNotificationCallbackUrl(string $notificationCallbackUrl)
 * @method setMerchantCallback(string $merchantCallback)
 * @method setStrongAuthenticationStatus(string $mode)
 * @method setChargeToken(string $chargeToken)
 */
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
     * @Store\Property(description="Payment method to use to bill the invoice. If null, generate a new PaymentForm")
     * @PBAssert\Type(type="id", idPrefixes={"temp-creditcard", "creditcard", "internetplus", "paypal", "temp-iban", "iban"})
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\Creditcard",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\IBAN",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\NewPaymentForm"

     * })
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="Payment method type to use, if null, bill with creditcard or the more accurate payment method regarding the paymentMethod")
     * @Assert\Type("string")
     * @Assert\Choice({"creditcard", "internetplus", "paypalBraintree", "iban"})
     */
    protected $paymentMethodType;

    /**
     * @Store\Property(description="Payment Service Provider Account to use. if NULL, use the backoffice configuration")
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
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

    /**
     * @Store\Property(description="Stats token. If not defined, use cookies")
     * @Assert\Type("string")
     */
    protected $statsToken;

    /**
     * @Store\Property(description="Stats token. If not defined, use cookies")
     * @Assert\Type("string")
     * @Assert\Choice({"auto", "enabled", "disabled"})
     * @Assert\NotBlank()
     */
    protected $strongAuthenticationStatus = 'auto';

    /**
     * @Store\Property(description="Key of the used payment form")
     * @Assert\Type("string")
     */
    protected $chargeToken;

    /**
     * @Store\Property(description="callback when a redirection is needed (like for 3D-secure). Ignored if paymentMethod is a NewPaymentForm store")
     * @Assert\Type("string")
     */
    protected $merchantCallback;

    /**
     * @param $amount float
     */
    public function setAmount($amount)
    {
        $this->amount = (float) $amount;
    }
}
