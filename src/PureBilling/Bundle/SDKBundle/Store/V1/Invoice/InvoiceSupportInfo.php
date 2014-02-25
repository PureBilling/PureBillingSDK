<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\SupportInfoBase;

class InvoiceSupportInfo extends SupportInfoBase
{
    /**
     * @Store\Property(description="delivery URL if any")
     * @Assert\Type("string")
     * @Store\EntityMapping("deliveryUrl")
     */
    protected $deliveryUrl;

}
