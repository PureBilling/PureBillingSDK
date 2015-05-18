<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\PaymentMethod;

use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\PaymentMethod;

class RemotePaymentMethod extends PaymentMethod
{
    /**
     * @Store\Property(description="Remote payment method ID")
     * @PBAssert\Type(type="id", idPrefixes={"paypal", "internetplus"})
     * @Assert\NotBlank
     */
    protected $id;

    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @Assert\Type("string")
     * @Store\EntityMapping("callback")
     */
    protected $callback;

    /**
     * @Store\Property(description="Attached PSP Account")
     * @PBAssert\Type("array")
     * @Store\EntityMapping("PSPAccounts")
     */
    protected $PSPAccounts;
}
