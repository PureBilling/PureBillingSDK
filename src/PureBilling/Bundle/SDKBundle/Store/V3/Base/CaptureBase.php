<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\Base;

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
 * @method setMerchantReference(string $merchantReference)
 * @method setNotificationCallbackUrl(string $notificationCallbackUrl)
 * @method setMerchantCallback(string $merchantCallback)
 * @method setStrongAuthenticationStatus(string $mode)
 * @method setFormToken(string $formToken)
 */
abstract class CaptureBase extends BaseStoreV3
{
    /**
     * @Store\Property(description="Payment method to use to bill the invoice. If null, generate a new PaymentForm")
     * @PBAssert\Type(type="id", idPrefixes={"tempcreditcard", "creditcard", "internetplus", "paypal", "tempiban",
     *                                       "iban", "ideal", "giropay", "sofort", "bcmc"})
     * @Store\StoreClass({
     *      "PureBilling\Bundle\SDKBundle\Store\V3\PaymentMethod\Creditcard",
     *      "PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\IBAN"

     * })
     */
    protected $paymentMethod;

    /**
     * @Store\Property(description="Payment method type to use, if null, bill with creditcard or the more accurate payment method regarding the paymentMethod")
     * @Assert\Type("string")
     * @Assert\Choice({"creditcard", "internetplus", "paypalBraintree", "iban", "paysafecard", "ideal", "giropay", "sofort", "bcmc"})
     */
    protected $paymentMethodType = "creditcard";

    /**
     * @Store\Property(description="Payment Service Provider Account to use. if NULL, use the backoffice configuration")
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     */
    protected $PSPAccount = null;

    /**
     * @Store\Property(description="merchant reference", recommended=true)
     * @Assert\Type("string")
     */
    protected $merchantReference;

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
    protected $formToken;

    /**
     * @Store\Property(description="callback when a redirection is needed (like for 3D-secure). Ignored if paymentMethod is a NewPaymentForm store")
     * @Assert\Type("string")
     */
    protected $merchantCallback;

    /**
     * @Store\Property(description="session token")
     * @Assert\Type(type="string")
     */
    protected $sessionToken;

    /**
     * @Store\Property(description="browser token")
     * @Assert\Type(type="string")
     */
    protected $browserToken;
}
