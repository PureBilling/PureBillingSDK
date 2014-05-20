<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;

class UpdateCustomer extends BaseStore
{
    /**
     * @Store\Property(description="customer Id. (read only)")
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="new customer email")
     * @Assert\Type("string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * @Store\Property(description="new metadata to associate")
     * @Assert\Type("array")
     */
    protected $metadata = array();

    public function setMetadata($meta)
    {
        $this->metadata = (array) $meta;
    }

}
