<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge\Action;

use PureBilling\Bundle\SDKBundle\Store\Base\ExpandableAction;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

/**
 * Class Get
 *
 * @method setId(string $billing_transaction_id)
 * @method setPropertyToExpand(array $propertiesToExpand)
 */
class Get extends ExpandableAction
{
    /**
     * @Store\Property(description="Billing id to retrieve")
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="Some properties return a ID. If you want a full object, add the property path here")
     * @Assert\Type("array")
     * @Assert\Choice(multiple=true, choices={"customer", "PSPTransactionInfo", "option",
     *                                        "invoice", "invoice.subscriptionInfo", "invoice.supportInfo",
     *                                        "updateNotifications", "origin", "paymentMethod", "childrenBillingTransactions",
     *                                        "childrenBillingTransactions.PSPTransactionInfo", "childrenBillingTransactions.PSPTransactionInfo",
     *                                        "childrenBillingTransactions.customer", "childrenBillingTransactions.origin",
     *                                        "childrenBillingTransactions.option", "additionalInfo"})
     */
    protected $propertiesToExpand = array();
}
