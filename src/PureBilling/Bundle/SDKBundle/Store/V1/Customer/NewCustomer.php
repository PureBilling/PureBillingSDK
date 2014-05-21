<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class NewCustomer extends BaseNewCustomer
{

    /**
     * @Store\Property(description="Creation date time of the billing - can be forced")
     * @Assert\Type(type="string")
     */
    protected $creationDateTime;

}
