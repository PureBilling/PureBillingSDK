<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class BaseNewCustomer extends Element
{
    /**
     * @Store\Property(description="customer email")
     * @Assert\Type("string")
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     * @Store\Property(description="your user internal Id. if null at creation, pureBilling id is used")
     * @Assert\Type("string")
     */
    protected $externalId;

    /**
     * @Store\Property(description="customer signup ip. if not defined, 0.0.0.0 is used. Define to improve fraud detection.")
     * @Assert\Type("string")
     * @Assert\Ip()
     */
    protected $ip;

    /**
     * @Store\Property(description="origin public key. If null, default owner origin be used.")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Store\Entity()
     */
    protected $origin;

    /**
     * @Store\Property(description="owner public key. If null, default owner will be used.")
     * @PBAssert\Type(type="id", idPrefixes={"owner"})
     * @Store\Entity()
     */
    protected $owner;

    /**
     * @Store\Property(description="metadata you want to associate to the customer")
     * @Assert\Type("array")
     */
    protected $metadata = array();

    /**
     * Convert int ExternalId to string
     * @param $externalId
     */
    public function setExternalId($externalId)
    {
        $this->externalId = (string) $externalId;
    }

    public function setMetadata($meta)
    {
        $this->metadata = (array) $meta;
    }

}
