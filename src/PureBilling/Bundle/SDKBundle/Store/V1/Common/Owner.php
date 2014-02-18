<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Owner extends Element
{
    /**
     * @Store\Property(description="owner id")
     * @PBAssert\Type(type="id", idPrefixes={"owner"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="owner name")
     * @Assert\Type("string")
     * @Store\EntityMapping("name")
     * @Assert\NotBlank()
     */
    protected $name;
}
