<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;

class StoreSearchResult extends Element
{
    /**
     * @Store\Property(description="search string")
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    protected $searchString;

    /**
     * @Store\Property(description="customer store with detailled information")
     * @Assert\Type("object")
     * @Assert\NotBlank()
     * @Store\StoreClass({"PureBilling\Bundle\SDKBundle\Store\V1\Customer\Customer",
     *                   "PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Invoice",
     *                   "PureBilling\Bundle\SDKBundle\Store\V1\BillingTransaction\BillingTransaction"})
     */
    protected $store;

    /**
     * @Store\Property(description="customer store with detailled information")
     * @Assert\Type("object")
     * @Assert\NotBlank()
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Customer\Customer")
     */
    protected $detailledCustomer;
}
