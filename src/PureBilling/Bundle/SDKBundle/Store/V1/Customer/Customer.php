<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class Customer extends NewCustomer
{
    /**
     * //Operation Id are string with two letter prefix xxx_key
     *
     * @Store\Property(description="customer Id.")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^customer_/", message="customer id should start with 'customer_' prefix")
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="customer email")
     * @Assert\Type("string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $externalId;

    /**
     * @Store\Property(description="signup ip. used for fraud detection")
     * @Assert\Type("string")
     * @Assert\Ip()
     * @Assert\NotBlank()
     */
    protected $ip;

    /**
     * @Store\Property(description="customer owner public key.")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^owner_/", message="owner id should start with 'owner_' prefix")
     * @Assert\NotBlank()
     */
    protected $owner;
}
