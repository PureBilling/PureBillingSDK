<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class PaymentToken extends BaseStoreV3
{

    /**
     * @Store\Property(description="Payment token")
     * @Assert\Type("string")
     * @PBAssert\Type(type="id", idPrefixes={"paymenttoken"})
     * @Assert\NotBlank
     */
    protected $paymentToken;

}