<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Option;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class CascadeNewCard extends OptionBase
{
    /**
     * @Store\Property(description="url to post")
     * @Assert\Type("array")
     * @Assert\NotBlank()
     */
    protected $PSPList = [];

    /**
     * @Store\Property(description="PSP Account public key to apply the rule")
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     * @Assert\NotBlank()
     */
    protected $PSPAccount;
}
