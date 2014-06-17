<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Origin extends Element
{
    /**
     * @Store\Property(description="id of the origin")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="origin name")
     * @Assert\Type("string")
     * @Store\EntityMapping("name")
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @Store\Property(description="origin url")
     * @Store\EntityMapping("url")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $url;

    /**
     * @Store\Property(description="id of the origin")
     * @PBAssert\Type(type="id", idPrefixes={"owner"})
     * @Store\EntityMapping("owner.publicKey")
     * @Assert\NotBlank()
     */
    protected $owner;
}
