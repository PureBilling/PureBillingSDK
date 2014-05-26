<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class GetSupportInfo extends Action
{
    /**
     * @Store\Property(description="invoice id to retrieve")
     * @PBAssert\Type(type="id", idPrefixes={"invoicesupport"})
     * @Assert\NotBlank()
     */
    protected $id;
}
