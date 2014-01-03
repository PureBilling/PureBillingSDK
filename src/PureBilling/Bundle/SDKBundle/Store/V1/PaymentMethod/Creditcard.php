<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\PaymentMethod;

class Creditcard extends PaymentMethod
{
    /**
     * @Store\Property(description="creditcard id")
     * @Assert\Type("string")
     * @Store\Entity()
     * @Assert\Regex(pattern="/^creditcard_/", message="owner id should start with 'creditcard_' prefix")
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="creditcard last 4 digits")
     * @Assert\Type("numeric")
     * @Assert\Length(min=4, max=4)
     * @Store\EntityMapping("last4Digits")
     * @Assert\NotBlank
     */
    protected $last4Digits;

    /**
     * @Store\Property(description="creditcard expiration month")
     * @Assert\Type("integer")
     * @Assert\Range(min=0, max=12)
     * @Store\EntityMapping("expirationMonth")
     * @Assert\NotBlank
     */
    protected $expirationMonth;

    /**
     * @Store\Property(description="creditcard expiration year")
     * @Assert\Type("integer")
     * @Assert\Range(min=2000, max=2099)
     * @Store\EntityMapping("expirationYear")
     * @Assert\NotBlank
     */
    protected $expirationYear;

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
