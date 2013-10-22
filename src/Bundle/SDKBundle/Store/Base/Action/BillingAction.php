<?php

namespace PureBilling\Bundle\SDKBundle\Store\Base\Action;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Action;

class BillingAction extends Action
{
    /**
     * @Store\Property(description="amount to charge. Positive integer: 100 = 1.00 eur")
     * @Assert\Type("integer")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank
     */
    protected $amount;

    /**
     * @Store\Property(description="creditcard number")
     * @Assert\Type("string")
     * @Assert\Currency
     * @Assert\NotBlank
     */
    protected $currency;
}
