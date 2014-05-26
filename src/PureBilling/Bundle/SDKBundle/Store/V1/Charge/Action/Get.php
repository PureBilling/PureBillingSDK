<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\ExpandableAction;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Get extends ExpandableAction
{
    /**
     * @Store\Property(description="Billing id to retrieve")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="Some properties return a ID. If you want a full object, add the property path here")
     * @Assert\Type("array")
     * @Assert\Choice(multiple=true, choices={"customer",
     *                                        "invoice",
     *                                        "updateNotifications"})
     */
    protected $propertiesToExpand = array();
}
