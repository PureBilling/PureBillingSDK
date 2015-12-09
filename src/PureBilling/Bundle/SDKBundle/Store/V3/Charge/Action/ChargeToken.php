<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;


/**
 * Class ChargeToken
 * @package PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action
 *
 * @method setChargeToken(string $token)
 * @method setTemporaryPaymentMethodToken(string $temporaryPaymentMethodToken)
 * @method setDefaultMerchantCallbackn(string $defaultMerchantCallback)
 */
class ChargeToken extends BaseStoreV3
{
    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @PBAssert\Type(type="id", idPrefixes={"chargetoken"})
     * @Assert\NotBlank
     */
    protected $chargeToken;

    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @PBAssert\Type(type="id", idPrefixes={"temp-creditcard", "temp-iban", "paypal-braintree-nonce"})
     */
    protected $temporaryPaymentMethodToken;

    /**
     * @Store\Property(description="default callback to use if there is no merchant callback previously defined (internal)")
     * @PBAssert\Type(type="string")
     */
    protected $defaultMerchantCallback;

    /**
     * @Store\Property(description="merchant public key")
     * @PBAssert\Type(type="id", idPrefixes={"publickey", "testpublickey"})
     * @Assert\NotBlank
     */
    protected $publicKey;

    /**
     * @Store\Property(description="language")
     * @Assert\Type(type="string")
     * @Assert\Language()
     */
    protected $language;

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