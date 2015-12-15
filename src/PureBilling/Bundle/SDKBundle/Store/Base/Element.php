<?php
namespace PureBilling\Bundle\SDKBundle\Store\Base;

use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

abstract class Element extends BaseStore
{
    const SDK_VERSION = "2.0.11";

    public function __construct($data=null)
    {
        $this->get_type();
        parent::__construct($data);
    }

    /**
     * @Store\Property(description="type of the current store")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $_type;

    /**
     * @Store\Property(description="Sdk Version")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $_sdkVersion = Element::SDK_VERSION;

    public function set_type($type) {}
    public function get_type()
    {
        //Set Short type of class
        // PureMachine\Bundle\SDKBundle\Store\Billing\CC become Billing\CC
        $this->_type = str_replace('PureBilling\Bundle\SDKBundle\Store\\', '',
                                    get_class($this));

        return $this->_type;
    }
}
