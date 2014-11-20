<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class ChargeTokenAnswer extends Element
{
    /**
     * @Store\Property(description="billing transaction id")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $billingTransaction;

    /**
     * @Store\Property(description="billing transaction id")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="billing transaction type")
     * @Assert\Type("string")
     * @Assert\Choice({"capture", "authorize", "refund"})
     * @Assert\NotBlank()
     */
    protected $billingTransactionType;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("string")
     * @Assert\Choice({"running", "paid", "unpaid"})
     * @Assert\NotBlank()
     */
    protected $status;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("boolean")
     */
    protected $isTest;

    /**
     * @Store\Property(description="billing transaction status")
     * @Assert\Type("string")
     */
    protected $sha;

    /**
     * @Store\Property(description="callback we will call after creditcard from")
     * @PBAssert\Type(type="id", idPrefixes={"chargetoken"})
     * @Assert\NotBlank
     */
    protected $chargeToken;
}
