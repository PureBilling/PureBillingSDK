<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod;

use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class NewPaymentForm extends Element
{
    const TYPE_CREDITCARD = "Creditcard";
    const TYPE_IBAN = "IBAN";

    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $callback;

    /**
     * @Store\Property(description="Form type")
     * @Assert\Type("string")
     * @Assert\Choice({"Creditcard", "IBAN"})
     * @Assert\NotBlank()
     */
    protected $type='Creditcard';
}
