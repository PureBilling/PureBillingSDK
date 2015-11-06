<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureBilling\Bundle\SDKBundle\Store\Base\PaymentMethod;

class IBAN extends PaymentMethod
{

    /**
     * @Store\Property(description="iban id")
     * @PBAssert\Type(type="id", idPrefixes={"iban", "temp-iban"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="iban hash")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     * @Store\EntityMapping("ownerIBANHash")
     */
    protected $ibanHash;

    /**
     * @Store\Property(description="IBAN bic")
     * @Assert\Type("string")
     * @Assert\Length(min=1)
     * @Store\EntityMapping("BIC")
     * @Assert\NotBlank
     */
    protected $bic;

    /**
     * @Store\Property(description="Firstname of the customer")
     * @Assert\Type("string")
     * @Store\EntityMapping("firstname")
     * @Assert\NotBlank
     */
    protected $firstname;

    /**
     * @Store\Property(description="Lastname of the customer")
     * @Assert\Type("string")
     * @Store\EntityMapping("lastname")
     * @Assert\NotBlank
     */
    protected $lastname;

    /**
     * @Store\Property(description="Email linked to the IBAN payment")
     * @Store\EntityMapping("email")
     * @Assert\Type("string")
     * @Assert\Email()
     * @Assert\NotBlank
     */
    protected $email;

    /**
     * @Store\Property(description="Partial IBAN")
     * @Assert\Type("string")
     * @Store\EntityMapping("partialIBAN")
     * @Assert\NotBlank
     */
    protected $partialIban;

    /**
     * @Store\Property(description="creditcard validity status")
     * @Assert\Type("string")
     * @Store\EntityMapping("statusString")
     * @Assert\Choice({"valid", "invalid", "unknown"})
     * @Assert\NotBlank
     */
    protected $status;

    /**
     * @Store\Property(description="customer associated to the paymentMethod")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\EntityMapping("customer.publicKey")
     * @Assert\NotBlank
     */
    protected $customer;

    /**
     * @Store\Property(description="Attached PSP Account")
     * @PBAssert\Type("array")
     * @Store\EntityMapping("PSPAccounts")
     */
    protected $PSPAccounts;

    /**
     * @Store\Property(description="Creditcard registration ip.")
     * @Assert\Type("string")
     * @Assert\Ip(version="all")
     * @Assert\NotBlank
     * @Store\EntityMapping("originIp")
     */
    protected $registrationIp;

    /**
     * @Store\Property(description="Stats token. If not defined, use cookies")
     * @Assert\Type("string")
     * @Assert\NotBlank
     * @Assert\Choice({"enabled", "disabled"})
     * @Store\EntityMapping("strongAuthenticationStatusString")
     */
    protected $strongAuthenticationStatus;
}
