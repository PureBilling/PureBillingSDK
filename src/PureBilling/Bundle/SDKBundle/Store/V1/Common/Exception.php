<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;

/**
 * Class Exception
 * @package PureBilling\Bundle\SDKBundle\Store\V1\Common
 *
 * @method getMessage()
 * @method getCode()
 * @method getExceptionClass()
 * @method getTicket()
 * @method getDetailledMessage()
 */
class Exception extends Element
{
    /**
     * @Store\Property(description="Exception message")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $message;

    /**
     * @Store\Property(description="Exception detailled message")
     * @Assert\Type("string")
     */
    protected $detailledMessage;

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

    /**
     * @Store\Property(description="Exception class name")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $exceptionClass;
}
