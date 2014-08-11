<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Import\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;

class AliasedPaymentMethodAction extends Action
{

    /**
     * @Store\Property(description="customer associated to the creditcard.")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Assert\NotBlank
     */
    protected $customer;

    /**
     * @Store\Property(description="payment alias on PSP side (if not created by purebilling)")
     * @PBAssert\Type(type="string")
     * @Assert\NotBlank()
     */
    protected $PSPAlias;

    /**
     * @Store\Property(description="PSP where the creditcard is registred")
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     * @Assert\NotBlank()
     */
    protected $PSPAccount;

}
