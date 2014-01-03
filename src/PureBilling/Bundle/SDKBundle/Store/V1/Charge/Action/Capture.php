<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureBilling\Bundle\SDKBundle\Store\Base\CaptureBase;

class Capture extends CaptureBase
{
    /**
     * @Store\Property(description="country where the purchase is done")
     * @Assert\Type("string")
     * @Assert\Country()
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $country;

    /**
     * @Store\Property(description="Transaction source IP")
     * @Assert\Type("string")
     * @Assert\Ip()
     * @Assert\NotNull()
     */
    protected $ip = '0.0.0.0';

    /**
     * @Store\Property(description="invoice currency")
     * @Assert\Type("string")
     * @Assert\Currency()
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="origin of the invoice. if null, owner default one is used")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Store\Entity()
     */
    protected $origin;

    /**
     * @Store\Property(description="customer associated to the invoice")
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $customer;

    /**
     * @Store\Property(description="invoice to attached to the capture, if any")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Store\Entity()
     */
    protected $invoice;

}
