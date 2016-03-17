<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;


class PaymentForm extends BaseStoreV3
{
    /**
     * @Store\Property(description="form token (to send to pb.js). Null if merchant callback is defined.")
     * @PBAssert\Type(type="id", idPrefixes={"formtoken"})
     */
    protected $formToken;

    /**
     * @Store\Property(description="Offsite payment form URL. Defined only if merchantCallback is set")
     * @Assert\Type("string")
     */
    protected $redirectUrl;
}
