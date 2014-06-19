<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class Task extends BaseStore
{

    /**
     * @Store\Property(description="Task id")
     * @PBAssert\Type(type="id", idPrefixes={"task"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="invoice status")
     * @Assert\Type("string")
     * @Assert\Choice({"planned", "running", "success", "error", "cancelled"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="planned execution date time")
     * @PBAssert\Type(type="datetime")
     * @Assert\NotNull()
     */
    protected $plannedExecutionDateTime;

    /**
     * @Store\Property(description="last execution date time")
     * @PBAssert\Type(type="datetime")
     */
    protected $lastExecutionDateTime;

}
