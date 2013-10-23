<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Store\Base\CaptureBase;

class Capture extends CaptureBase
{
    /**
     * @Store\Property(description="invoice to bill")
     * @Assert\Type("string")
     * @Store\Entity()
     * @Assert\Regex(pattern="/^invoice_/", message="owner id should start with 'invoice_' prefix")
     * @Assert\NotBlank()
     */
    protected $invoice;

    /**
     * @Store\Property(description="If true, try to recover transaction. Available depending payment method")
     * @Assert\Type("boolean")
     * @Assert\NotNull()
     */
    protected $automaticRecovery = false;

    public function validate($validator=null)
    {
        //Parent validation
        if (!parent::validate($validator)) return false;

        /**
         * Some paymentMethod can't use automatic recovery
         */
        if ($this->paymentMethod instanceof NewCreditcard
            && $this->automaticRecovery) {
            $this->addViolation('automaticRecovering',
                    "automatic recovering not possible with new CreditCard");

            return false;
        }

        return true;
    }
}
