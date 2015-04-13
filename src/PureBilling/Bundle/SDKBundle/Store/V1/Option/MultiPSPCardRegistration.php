<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Option;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class MultiPSPCardRegistration extends NewMultiPSPCardRegistration
{
    /**
     * @Store\Property(description="option id")
     * @PBAssert\Type(type="id", idPrefixes={"option"})
     * @Assert\NotBlank()
     */
    protected $id;
}
