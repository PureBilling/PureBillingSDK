<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureBilling\Bundle\SDKBundle\Store\Base\CaptureBase;

class Capture extends CaptureBase
{
    /**
     * @Store\Property(description="amount to bill. 5.00 for euro will bill 5.00 EUR.")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     */
    protected $amount;

    /**
     * @Store\Property(description="invoice to bill")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Assert\NotBlank()
     */
    protected $invoice;

    /**
     * @Store\Property(description="If true, try to recover transaction. Available depending payment method")
     * @Assert\Type("boolean")
     * @Assert\NotNull()
     */
    protected $automaticRecovery = false;

    /**
     * @param $amount float
     */
    public function setAmount($amount)
    {
        $this->amount = (float) $amount;
    }
}
