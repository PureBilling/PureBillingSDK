<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class NewPaymentToken extends BaseStoreV3
{

    /**
     * @Store\Property(description="Charge token related")
     * @Assert\Type("string")
     * @PBAssert\Type(type="id", idPrefixes={"chargeToken"})
     * @Assert\NotBlank
     */
    protected $chargeToken;

    /**
     * @Store\Property(description="Payment method type related")
     * @Assert\Type("string")
     * @Assert\Choice({"creditcard", "internetplus", "paypal", "iban", "paysafecard", "ideal", "bcmc", "sofort"})
     * @Assert\NotBlank
     */
    protected $paymentMethodType;

}