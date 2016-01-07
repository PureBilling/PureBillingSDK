<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;

class BillingTransactionAdditionalInfo extends BaseStoreV3
{
    /**
     * @Store\Property(description="Allowed actions")
     * @Assert\Type("array")
     * @Assert\Choice(choices={"refund"}, multiple=true)
     */
    protected $allowedActions = array();
}
