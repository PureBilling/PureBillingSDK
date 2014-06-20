<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Exception extends Element
{
    /**
     * @Store\Property(description="Exception message")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $message;

    /**
     * @Store\Property(description="Exception error code")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $code;

    /**
     * @Store\Property(description="ticket number (for support)")
     * @Assert\Type("string")
     */
    protected $ticket;
}