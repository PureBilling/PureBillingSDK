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
class ClientToken extends Element
{
    /**
     * @Store\Property(description="Paypal Braintree client token")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $token;
}