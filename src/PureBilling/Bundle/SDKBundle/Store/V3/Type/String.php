<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\Type;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\SimpleType;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;


class String extends SimpleType
{
    /**
     * @Store\Property(description="String generic store")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $value;
}
