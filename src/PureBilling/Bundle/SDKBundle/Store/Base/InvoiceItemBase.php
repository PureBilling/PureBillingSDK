<?php

namespace PureBilling\Bundle\SDKBundle\Store\Base;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class InvoiceItemBase extends Element
{
    /**
     * @Store\Property(description="VAT rate to apply. 19.00 is a taxe rate of 19%")
     * @Assert\Type("float")
     * @Assert\Range(min=0, max=100)
     * @Assert\NotBlank()
     */
    protected $vatRate = 0;
}
