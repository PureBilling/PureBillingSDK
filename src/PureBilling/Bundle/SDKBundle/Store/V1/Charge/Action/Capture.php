<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use Symfony\Component\Validator\Constraints as Assert;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;
use PureBilling\Bundle\SDKBundle\Store\Base\CaptureBase;

/**
 * Class Capture
 *
 * @method setCountry(string $country)
 * @method setIp(string $ip)
 * @method setOrigin(string $origin)
 * @method setCustomer(string $customer)
 * @method setMetadata(array $metadata)
 */
class Capture extends CaptureBase
{
    /**
     * @Store\Property(description="amount to bill. 5.00 for euro will bill 5.00 EUR.")
     * @Assert\Type("float")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     */
    protected $amount;

    /**
     * @Store\Property(description="Purchase country. If null, we try to find it using card registration information", recommended=true)
     * @Assert\Type("string")
     * @PBAssert\Country()
     */
    protected $country = '??';

    /**
     * @Store\Property(description="Transaction source IP (used for fraud detection)", recommended=true)
     * @Assert\Type("string")
     * @Assert\Ip(version="all")
     */
    protected $ip;

    /**
     * @Store\Property(description="transaction currency")
     * @Assert\Type("string")
     * @Assert\Currency()
     * @Assert\NotBlank()
     */
    protected $currency;

    /**
     * @Store\Property(description="Transaction origin. if null, owner default origin is used")
     * @PBAssert\Type(type="id", idPrefixes={"origin"})
     */
    protected $origin;

    /**
     * @Store\Property(description="customer associated to the transaction. If not, we create a new one, or we use the one associated with the paymentMethod", recommended=true)
     * @PBAssert\Type(type="id", idPrefixes={"customer"})
     */
    protected $customer;

    /**
     * @Store\Property(description="invoice to attach to the capture, if any")
     * @PBAssert\Type(type="id", idPrefixes={"invoice"})
     */
    protected $invoice;

    /**
     * @Store\Property(description="Metadata")
     * @Assert\Type("array")
     */
    protected $metadata =  array();

    /**
     * @param $amount float
     */
    public function setAmount($amount)
    {
        $this->amount = (float) $amount;
    }
}
