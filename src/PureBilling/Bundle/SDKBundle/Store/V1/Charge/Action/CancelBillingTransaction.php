<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;

class CancelBillingTransaction extends CancelAuthorization
{

    /**
     * @Store\Property(description="cancellation code")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $code;

}
