<?php
namespace PureBilling\Bundle\SDKBundle\Store\V3\Base;

use PureMachine\Bundle\SDKBundle\Store\Base\BaseStore;
use Symfony\Component\Validator\Constraints as Assert;
use PureMachine\Bundle\SDKBundle\Store\Annotation as Store;


class BaseStoreV3 extends BaseStore
{
    protected $addType = true;

    /**
     * @Store\Property(description="Special property that contains the store class name.")
     * @Assert\Type("string")
     * @Assert\NotBlank
     */
    protected $_type;

    public function __construct($data=null)
    {
        $this->_type = $this->_getStoreTypeV3();
        parent::__construct($data);
    }

    public function serialize($includePrivate=false, $includeInternal=true, $removeNullValues=true,
                              $dateAsISO8601=true)
    {

        $store = parent::serialize($includePrivate, $includeInternal, $removeNullValues, $dateAsISO8601);

        if (!$this->addType) {
            unset($store->_type);
        }
        unset($store->_className);


        return $store;
    }

    private function _getStoreTypeV3()
    {
        $parts = explode('V3', get_class($this));

        return str_replace('\\', '/', 'V3' . $parts[1]);
    }

    public function __toString()
    {
        try {
            return print_r($this->serialize(), true);
        } catch (\Exception $e) {
            return "Exception raised: " . $e->getMessage();
        }
    }
}