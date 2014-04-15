<?php

namespace PureBilling\Bundle\SDKBundle\Store\V1\Charge;

use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Store\Base\Element;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;

class PSPTransactionInfo extends Element
{
    /**
     * @Store\Property(description="billing transaction id")
     * @Store\Entity()
     * @PBAssert\Type(type="id", idPrefixes={"billing"})
     * @Assert\NotBlank()
     */
    protected $id;

    /**
     * @Store\Property(description="billing transaction id")
     * @Store\Entity()
     * @PBAssert\Type(type="id", idPrefixes={"pspa"})
     * @Store\EntityMapping("PSPAccount.publicKey")
     * @Assert\NotBlank()
     */
     protected $PSPAccount;

    /**
     * @Store\Property(description="PSP Name")
     * @Assert\Type("string")
     * @Store\EntityMapping("PSPAccount.PSP.name")
     */
    protected $name;

    /**
     * @Store\Property(description="PSP Name")
     * @Assert\Type("string")
     * @Store\EntityMapping("PSPAccount.name")
     */
    protected $accountName;

    /**
     * @Store\Property(description="transactionId sent to the PSP")
     * @Assert\Type("string")
     * @Store\EntityMapping("sentTransactionId")
     */
    protected $sentTransactionId;

    /**
     * @Store\Property(description="transactionId sent by the PSP")
     * @Assert\Type("string")
     * @Store\EntityMapping("pspTransactionId")
     */
    protected $recievedTransactionId;

    /**
     * @Store\Property(description="transactionId sent by the PSP")
     * @Assert\Type("string")
     * @Store\EntityMapping("PSPAlias")
     */
    protected $PSPAlias;

    /**
     * @Store\Property(description="PSP answer after parsing")
     * @Assert\Type("array")
     * @Store\EntityMapping("PSPResponseParameters")
     */
    protected $ResponseParameters = array();
}
