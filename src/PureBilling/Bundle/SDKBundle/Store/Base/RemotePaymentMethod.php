<?php

namespace PureBilling\Bundle\SDKBundle\Store\Base;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class RemotePaymentMethod extends PaymentMethod
{
    /**
     * @Store\Property(description="callback called after payment")
     * @Assert\Type("string")
     * @Store\EntityMapping("callback")
     * @Assert\NotBlank
     */
    protected $callback;
}
