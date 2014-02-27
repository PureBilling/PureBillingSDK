<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureBilling\Bundle\SDKBundle\Store\Base\PaymentMethod;

class Creditcard extends PaymentMethod
{
    //Special dates used for tests
    const CARD_EXPIRED = "2000-01-01";
    const INSUFFICIENT_FUNDS = "2089-01-01";
    const FORCE_VISA_DEBIT = "2097-11-01";

    /**
     * @Store\Property(description="creditcard id")
     * @PBAssert\Type(type="id", idPrefixes={"creditcard"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="creditcard bin")
     * @Assert\Type("numeric")
     * @Assert\Length(min=6, max=6)
     * @Store\EntityMapping("bin")
     * @Assert\NotBlank
     */
    protected $bin;

    /**
     * @Store\Property(description="creditcard last 4 digits")
     * @Assert\Type("numeric")
     * @Assert\Length(min=4, max=4)
     * @Store\EntityMapping("last4Digits")
     * @Assert\NotBlank
     */
    protected $last4Digits;

    /**
     * @Store\Property(description="creditcard holer name")
     * @Assert\Type("string")
     * @Store\EntityMapping("holderName")
     * @Assert\NotBlank
     */
    protected $holderName;

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
     * @Store\Property(description="creditcard validity status")
     * @Assert\Type("string")
     * @Store\EntityMapping("statusString")
     * @Assert\Choice({"valid", "invalid", "unknown"})
     * @Assert\NotBlank
     */
    protected $status;

    /**
     * return expiration date as string YYYY-MM-DD
     * where DD is always 01
     *
     * @return string
     */
    public function getExpirationDateString()
    {
        return $this->getExpirationYear() . "-"
               .sprintf("%02d", $this->getExpirationMonth())
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
