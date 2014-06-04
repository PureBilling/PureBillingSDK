<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;

class StoreSearchResultArray extends Element
{
    /**
     * @Store\Property(description="collection of item results")
     * @Assert\Type("array")
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Common\StoreSearchResult")
     */
    protected $results;
}
