<?php
namespace PureBilling\Bundle\SDKBundle\Store\Base;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;

abstract class ExpandableAction extends Action
{
    /**
     * @Store\Property(description="quantity of product sold. only 1 is supported for now")
     * @Assert\Type("array")
     */
    protected $propertiesToExpand = array();
}
