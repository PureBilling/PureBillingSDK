<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Subscription\Action;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Get extends BaseStoreV3
{
    /**
     * @Store\Property(description="id of the sale")
     * @PBAssert\Type(type="id", idPrefixes={"sub"})
     * @Assert\NotBlank()
     */
    protected $id;
}
