<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod;

use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class NewPaymentForm extends Element
{
    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @Assert\Type("string")
     */
    protected $callback;
}
