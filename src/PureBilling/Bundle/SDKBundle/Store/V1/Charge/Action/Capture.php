<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureBilling\Bundle\SDKBundle\Store\Base\CaptureBase;

class Capture extends CaptureBase
{
    /**
     * @Store\Property(description="Purchase country. If null, we try to find it using card registration information", recommended=true)
     * @Assert\Type("string")
     * @PBAssert\Country()
     * @Store\Entity()
     */
    protected $country = '??';

    /**
     * @Store\Property(description="Transaction source IP (used for fraud detection)", recommended=true)
     * @Assert\Type("string")
     * @Assert\Ip()
     */
    protected $ip;

    /**
     * @Store\Property(description="transaction currency")
     * @Assert\Type("string")
     * @Assert\Currency()
     * @Store\Entity()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="Stats token. If not defined, use cookies")
     * @Assert\Type("string")
     */
    protected $statsToken;

    /**
     * @Store\Property(description="Key of the used payment form")
     * @Assert\Type("string")
     */
    protected $formToken;

    /**
     * @Store\Property(description="Transaction origin. if null, owner default origin is used")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     * @Store\Entity()
     */
    protected $origin;

    /**
     * @Store\Property(description="customer associated to the transaction. If not, we create a new one, or we use the one associated with the paymentMethod", recommended=true)
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     * @Store\Entity()
     */
    protected $customer;

    /**
     * @Store\Property(description="invoice to attach to the capture, if any")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     * @Store\Entity()
     */
    protected $invoice;

}
