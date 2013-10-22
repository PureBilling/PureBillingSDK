<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Creditcard;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Action\BillingAction;

class Charge extends BillingAction
{
    /**
     * @Store\Property(description="creditcard Id to use")
     * @Assert\Type("string")
     * @Assert\RegEx("^creditcard_")
     */
    protected $creditcardId;
}
