<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\PaymentMethod\Details;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;


class CardDetails extends BaseStoreV3
{
    /**
     * @Store\Property(description="capture validation mode")
     * @Assert\Type("string")
     * @Assert\Choice(choices={"auto", "manual"})
     * @Assert\NotBlank()
     */
    protected $validationMode = "auto";
}
