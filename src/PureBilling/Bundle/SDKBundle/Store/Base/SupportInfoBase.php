<?php

namespace PureBilling\Bundle\SDKBundle\Store\Base;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class SupportInfoBase extends Element
{
    /**
     * @Store\Property(description="id of the support info item")
     * @PBAssert\Type(type="id", idPrefixes={"support"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="owner public key. If null, default owner will be used.")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Store\EntityMapping("relatedStore")
     * @Assert\NotBlank()
     */
    protected $relatedStore;

}
