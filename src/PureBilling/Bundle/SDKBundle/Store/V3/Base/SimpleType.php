<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\Base;

use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;

class SimpleType extends BaseStoreV3
{
    public function __construct($data=null)
    {
        if ($data && !($data instanceof \stdClass)) {
            $data = array("value" => $data);
        }
        parent::__construct($data);
    }
}
