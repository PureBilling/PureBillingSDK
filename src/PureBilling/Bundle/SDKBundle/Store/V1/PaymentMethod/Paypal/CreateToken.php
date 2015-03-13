<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\Paypal;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

/**
 * Class CreateToken
 * @package PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod\Paypal
 *
 * Used to create a braintree token
 */
class CreateToken extends Element
{
    /**
     * @Store\Property(description="owner id")
     * @PBAssert\Type(type="id", idPrefixes={"publickey"})
     * @Assert\NotBlank()
     */
    protected $publicKey;

    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @PBAssert\Type(type="id", idPrefixes={"chargetoken"})
     * @Assert\NotBlank
     */
    protected $chargeToken;
}