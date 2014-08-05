<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Import\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\Action;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterRemotePaymentMethod extends Action
{

    /**
     * @Store\Property(description="optional callback data of the remote payment")
     * @Assert\Type("string")
     */
    protected $callback;

    /**
     * @Store\Property(description="customer associated to the remote payment method.")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Assert\NotBlank
     */
    protected $customer;

    /**
     * @Store\Property(description="Payment method type to use, if null")
     * @Assert\Type("string")
     * @Assert\Choice({"creditcard", "internetplus", "paypal", "iban"})
     */
    protected $paymentMethodType;

}
