<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

/**
 * Class NewCustomer
 * @package PureBilling\Bundle\SDKBundle\Store\V1\Customer
 *
 * @method setEmail(string $email);
 */
class NewCustomer extends BaseNewCustomer
{
    /**
     * @Store\Property(description="customer email")
     * @Assert\Type("string")
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    protected $email;
}
