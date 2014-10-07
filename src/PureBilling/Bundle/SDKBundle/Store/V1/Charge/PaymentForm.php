<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class PaymentForm extends Element
{
    /**
     * @Store\Property(description="Charge token (to send to pb.js). Null if merchant callback is defined.")
     * @PBAssert\Type(type="id", idPrefixes={"chargetoken"})
     */
    protected $chargeToken;

    /**
     * @Store\Property(description="Offsite payment form URL. Defined only if merchantCallback is set")
     * @Assert\Type("string")
     */
    protected $redirectUrl;
}