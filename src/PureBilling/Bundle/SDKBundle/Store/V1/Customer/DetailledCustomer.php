<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class DetailledCustomer extends Customer
{
    /**
     * @Store\Property(description="Customer signUp origin")
     * @Assert\Type(type="object")
     * @Assert\NotBlank()
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Common\Origin")
     */
    protected $origin;

    /**
     * @Store\Property(description="Customer owner")
     * @Assert\Type(type="object")
     * @Assert\NotBlank()
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Common\Owner")
     */
    protected $owner;

    /**
     * @Store\Property(description="Invoices")
     * @Assert\Type(type="array")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Invoice")
     */
    protected $invoices;
}
