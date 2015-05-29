<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;

class BillingTransactionAdditionalInfo extends Element
{

    /**
     * @Store\Property(description="session token")
     * @Assert\Type(type="string")
     */
    protected $sessionToken;

    /**
     * @Store\Property(description="browser token")
     * @Assert\Type(type="string")
     */
    protected $browserToken;

}
