<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Cancel extends Action
{
    /**
     * @Store\Property(description="invoice to cancel")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $invoice;
    
    /**
     * @Store\Property(description="cancellation message")
     * @Assert\Type("string")
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $message;
}
