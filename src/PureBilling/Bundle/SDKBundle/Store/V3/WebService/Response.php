<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\WebService;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class Response extends BaseStoreV3
{
    protected $addType = false;

    /**
     * @Store\Property(description="webService name that has generated the answer")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $webService;

    /**
     * @Store\Property(description="webService version")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $version;

    /**
     * @Store\Property(description="webService response status")
     * @Assert\Type("string")
     * @Assert\NotBlank
     * @Assert\Choice({"error", "success"})
     */
    protected $status;

    /**
     * @Store\Property(description="webService answer")
     * @Store\StoreClass("PureMachine\Bundle\SDKBundle\Store\Base\BaseStore")
     * @Assert\Type("object")
     * @Assert\NotBlank
     */
    protected $answer;

    /**
     * @Store\Property(description="Support ticket")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $ticket;

    /**
     * @Store\Property(description="application version if defined")
     * @Assert\Type("string")
     * @Assert\Choice({"payzen", "pureBilling"})
     * @Assert\NotBlank
     */
    protected $applicationProvider;

    /**
     * @Store\Property(description="application version if defined")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $applicationVersion;

    /**
     * @Store\Property(description="application version if defined", keepIfNull=true)
     * @Assert\Type("object")
     */
    protected $metadata;

    /**
     * @Store\Property(description="application version if defined")
     * @Assert\Type("datetime")
     * @Assert\NotBlank
     */
    protected $serverDateTime;
}