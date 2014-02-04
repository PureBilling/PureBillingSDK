<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\DiscountBase;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class PercentDiscount extends DiscountBase
{
    /**
     * @Store\Property(description="Discount to apply. 15 for 15% off")
     * @Assert\Type("float")
     * @Assert\Range(min=0, max=100)
     * @Assert\NotBlank()
     */
    protected $percentOff = 0;
}
