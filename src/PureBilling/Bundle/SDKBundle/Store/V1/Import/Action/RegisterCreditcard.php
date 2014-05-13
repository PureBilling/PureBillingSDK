<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Import\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterCreditcard extends Action
{
    /**
     * @Store\Property(description="creditcard bin")
     * @Assert\Type("numeric")
     * @Assert\Length(min=6, max=6)
     * @Assert\NotBlank
     */
    protected $bin;

    /**
     * @Store\Property(description="creditcard last 4 digits")
     * @Assert\Type("numeric")
     * @Assert\Length(min=4, max=4)
     * @Assert\NotBlank
     */
    protected $last4Digits;

    /**
     * @Store\Property(description="creditcard holer name")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $holderName;

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
     * @Store\Property(description="customer associated to the creditcard.")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\Entity()
     * @Assert\NotBlank
     */
    protected $customer;

    /**
     * @Store\Property(description="Creditcard registration ip.")
     * @Assert\Type("string")
     * @Assert\Ip()
     * @Assert\NotBlank
     */
    protected $registrationIp;

    /**
     * @Store\Property(description="creditcard alias on PSP side (if not created by purebilling)")
     * @PBAssert\Type(type="string")
     * @Assert\NotBlank()
     */
    protected $PSPCreditcardAlias;

    /**
     * @Store\Property(description="PSP where the creditcard is registred")
     * @Store\Entity()
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     * @Assert\NotBlank()
     */
    protected $PSPAccount;

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
