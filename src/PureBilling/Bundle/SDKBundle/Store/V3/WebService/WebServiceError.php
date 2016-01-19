<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\WebService;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;


/**
 * Class ExceptionStore
 * @package PureMachine\Bundle\SDKBundle\Store
 *
 * @method getMessage()
 * @method getCode()
 * @method getTicket()
 * @method getDetailledMessage()
 */
class WebServiceError extends BaseStoreV3
{
    /**
     * @Store\Property(description="Exception generic message")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $message;

    /**
     * @Store\Property(description="Exception error code.")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $code;

    /**
     * @Store\Property(description="Support ticket ID", keepIfNull=true)
     * @Assert\Type("string")
     */
    protected $ticket;

    /**
     * @Store\Property(description="detailled message if any", keepIfNull=true)
     * @Assert\Type("string")
     */
    protected $detailedMessage = "";
}
