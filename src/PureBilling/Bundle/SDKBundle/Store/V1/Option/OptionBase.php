<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Option;

use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class OptionBase extends BaseStore
{

    /**
     * @Store\Property(description="option id")
     * @PBAssert\Type(type="id", idPrefixes={"option"})
     */
    protected $id;

    /**
     * @Store\Property(description="boolean flag")
     * @PBAssert\Type(type="bool")
     */
    protected $enabled=true;

}
