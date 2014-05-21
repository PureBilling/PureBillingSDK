<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Customer\Migration\Action;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;

class BulkCustomerCreation extends BaseStore
{

    /**
     * @Store\Property(description="Migration token reference")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $migrationToken;

    /**
     * @Store\Property(description="customers to create")
     * @Assert\Type("array")
     * @Assert\Count(min=1)
     * @Assert\NotNull()
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Customer\NewCustomer")
     */
    protected $customers;

}
