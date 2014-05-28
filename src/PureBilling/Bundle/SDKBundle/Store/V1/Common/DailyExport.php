<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Common;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class DailyExport extends Element
{
    /**
     * @Store\Property(description="export id")
     * @PBAssert\Type(type="id", idPrefixes={"dailyexport"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="Exported day, format YYYY-MM-DD")
     * @Assert\Type("datetime")
     * @Store\EntityMapping("exportedDay")
     * @Assert\NotBlank()
     */
    protected $exportedDay;

    /**
     * @Store\Property(description="Newly created billing Transacions")
     * @Assert\Type("array")
     */
    protected $newBillingTransactions = array();

    /**
     * @Store\Property(description="Newly created customers")
     * @Assert\Type("array")
     */
    protected $newCustomers = array();
}
