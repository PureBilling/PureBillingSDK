<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Invoice;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\InvoiceItemBase;

class NewInvoiceOfferItem extends InvoiceItemBase
{
    /**
     * @Store\Property(description="Offer Id.")
     * @Assert\Type("integer")
     * @Assert\Regex(pattern="/^offer_/", message="offer id should start with 'offer_' prefix")
     * @Store\Entity()
     * @Assert\NotNull()
     */
    protected $offer;
    /**
     * @Store\Property(description="quantity of product sold. only 1 is supported for now")
     * @Assert\Type("integer")
     * @Assert\Range(min=1, max=1)
     * @Assert\NotBlank()
     */
    protected $quantity = 1;
}
