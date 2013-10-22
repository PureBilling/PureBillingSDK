<?php
namespace PureMachine\Bundle\SDKBundle\Store\Base;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;

abstract class Element extends BaseStore
{
    public function __construct($data=null)
    {
        parent:__construct($data);
        //Set Short type of class
        // PureMachine\Bundle\SDKBundle\Store\Billing\CC become Billing\CC
        $this->type = str_replace('PureMachine\Bundle\SDKBundle\Store', '',
                                  get_class($this));
    }

    /**
     * @Store\Property(description="type of the current answer")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $type;
}
