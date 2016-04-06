<?php

namespace PureBilling\Bundle\SDKBundle\Store\V3\Charge;

use PureBilling\Bundle\SDKBundle\Store\V3\Base\BaseStoreV3;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;
use PureBilling\Bundle\SDKBundle\Constraints as PBAssert;


class RedirectRequest extends BaseStoreV3
{
    /**
     * @Store\Property(description="URL you should redirect your user to")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $redirectUrl;

    /**
     * @Store\Property(description="template witdh")
     * @Assert\Type("integer")
     */
    protected $width;

    /**
     * @Store\Property(description="template height")
     * @Assert\Type("integer")
     */
    protected $height;

    /**
     * @Store\Property(description="template to use for redirection")
     * @Assert\Type("string")
     */
    protected $template;

    /**
     * @Store\Property(description="Boolean flag set to true if the redirect can be contained on a iframe")
     * @Assert\Type("boolean")
     * @Assert\NotNull()
     */
    protected $allowIFrame=true;

    /**
     * @Store\Property(description="POST data to sent with the URL")
     * @Assert\Type("array")
     */
    protected $postData;
}
