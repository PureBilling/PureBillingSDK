<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;

class RedirectRequest extends Element
{
    /**
     * @Store\Property(description="billing transaction id")
     * @Store\Entity()
     * @PBAssert\Type(type="id", idPrefixes={"redirect", "billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="URL you should redirect your user to")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $redirectUrl;

    /**
     * @Store\Property(description="all billing actions (succesfull or not)")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Store\StoreClass("PureBilling\Bundle\SDKBundle\Store\V1\Charge\BillingTransaction")
     */
    protected $billingTransaction;

    public function setBillingTransaction($bt)
    {
        $this->billingTransaction = $bt;

        if (!$this->id) {
            return $this->id = $bt;
        }
    }
}
