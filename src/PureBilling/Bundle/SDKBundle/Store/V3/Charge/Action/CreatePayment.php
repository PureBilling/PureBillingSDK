<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;


/**
 * Class CreatePayment
 * @package PureBilling\Bundle\SDKBundle\Store\V3\Charge\Action
 *
 * @method setFormToken(string $token)
 * @method setTemporaryPaymentMethodToken(string $temporaryPaymentMethodToken)
 * @method setDefaultMerchantCallbackn(string $defaultMerchantCallback)
 */
class CreatePayment extends BaseStoreV3
{
    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @PBAssert\Type(type="id", idPrefixes={"formtoken"})
     * @Assert\NotBlank
     */
    protected $formToken;

    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @PBAssert\Type(type="id", idPrefixes={"tempcreditcard", "tempiban", "paypalbraintreenonce"})
     */
    protected $temporaryPaymentMethodToken;

    /**
     * @Store\Property(description="default callback to use if there is no merchant callback previously defined (internal)")
     * @PBAssert\Type(type="string")
     */
    protected $defaultMerchantCallback;

    /**
     * @Store\Property(description="merchant public key")
     * @PBAssert\Type(type="string")
     * @Assert\Regex("/\w+:(testpublickey|publickey)_\w+/")
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

    /**
     * @Store\Property(description="Boolean flag set to true if the source is krypton-client")
     * @Assert\Type("boolean")
     * @Assert\NotNull()
     */
    protected $fromJsClient=false;

    /**
     * @Store\Property(description="calback to use if not already defined on the token creation")
     * @Assert\Type(type="string")
     */
    protected $merchantCallback;

}