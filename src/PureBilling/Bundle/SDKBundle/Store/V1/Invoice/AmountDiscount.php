<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\DiscountBase;

class AmountDiscount extends DiscountBase
{
    /**
     * @Store\Property(description="Amount to discount. 100.10 to discount 100.10 units of currency on the amount")
     * @Assert\Type("float")
     * @Assert\GreaterThan(value=0)
     * @Assert\NotBlank()
     */
    protected $amount = 0;
}
