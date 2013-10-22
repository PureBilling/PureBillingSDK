<?php
namespace PureMachine\Bundle\SDKBundle\Store\Base;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

abstract class Item extends Element
{
    /**
     * //Operation Id are string with two letter prefix xxx_key
     *
     * @Store\Property(description="operation ID")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $id;

    /**
     * @Store\Property(description="return true if it's a test transaction")
     * @Assert\Type("boolean")
     * @Assert\NotBlank
     */
    protected $isTest;
}
