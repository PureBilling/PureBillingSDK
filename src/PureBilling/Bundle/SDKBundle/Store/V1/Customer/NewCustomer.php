<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;

class NewCustomer extends Element
{
    /**
     * @Store\Property(description="customer email")
     * @Assert\Type("string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     */
    protected $externalId;

    /**
     * @Store\Property(description="customer signup ip")
     * @Assert\Type("string")
     * @Assert\Ip()
     * @Assert\NotBlank()
     */
    protected $ip = '0.0.0.0';

    /**
     * @Store\Property(description="owner public key. If null, default owner will be used.")
     * @Assert\Type("string")
     * @Assert\Regex(pattern="/^owner_/", message="owner id should start with 'owner_' prefix")
     * @Store\Entity()
     */
    protected $owner;
}
