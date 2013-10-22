<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Creditcard;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Action\BillingAction;

class ChargeNewCard extends BillingAction
{
    /**
     * @Store\Property(description="creditcard number")
     * @Assert\Type("numeric")
     * @Assert\Length(min=13, max=16)
     * @Assert\Luhn
     * @Assert\NotBlank
     */
    protected $cardNumber;

    /**
     * @Store\Property(description="creditcard expiration month")
     * @Assert\Type("integer")
     * @Assert\range(min=0, max=12)
     * @Assert\NotBlank
     */
    protected $cardExpirationMonth;

    /**
     * @Store\Property(description="creditcard expiration year")
     * @Assert\Type("integer")
     * @Assert\range(min=2013, max=2099)
     * @Assert\NotBlank
     */
    protected $cardExpirationYear;

    /**
     * @Store\Property(description="creditcard verification code")
     * @Assert\Type("integer")
     * @Assert\GreaterThanOrEqual(3)
     * @Assert\LessThan(5)
     */
    protected $cardCvv;

    /**
     * @Store\Property(description="creditcard owner")
     * @Assert\Type("string")
     */
    protected $cardOwner;
}
