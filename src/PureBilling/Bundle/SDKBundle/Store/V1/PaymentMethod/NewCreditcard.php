<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\PaymentMethod;

class NewCreditcard extends PaymentMethod
{
    /**
     * @Store\Property(description="creditcard number")
     * @Assert\Type("numeric")
     * @Assert\Length(min=13, max=16)
     * @Assert\Luhn
     * @Assert\NotBlank
     */
    protected $number;

    /**
     * @Store\Property(description="creditcard expiration month")
     * @Assert\Type("integer")
     * @Assert\Range(min=0, max=12)
     * @Assert\NotBlank
     */
    protected $expirationMonth;

    /**
     * @Store\Property(description="creditcard expiration year")
     * @Assert\Type("integer")
     * @Assert\Range(min=2000, max=2099)
     * @Assert\NotBlank
     */
    protected $expirationYear;

    /**
     * @Store\Property(description="creditcard verification code")
     * @Assert\Type("integer")
     */
    protected $cvv;

    /**
     * @Store\Property(description="creditcard owner")
     * @Assert\Type("string")
     */
    protected $cardOwner;

    /**
     * return expiration date as string YYYY-MM-DD
     * where DD is always 01
     *
     * @return string
     */
    public function getExpirationDateString()
    {
        return $this->expirationYear . "-"
               .sprintf("%02d", $this->expirationMonth)
               ."-01";
    }

    /**
     * return Expiration date as DateTime Object
     * @return DateTime
     */
    public function getExpirationDateTime()
    {
        return new \DateTime($this->getExpirationDateString());
    }
}
