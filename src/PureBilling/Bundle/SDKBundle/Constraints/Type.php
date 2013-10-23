<?php
namespace PureBilling\Bundle\SDKBundle\Constraints;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * Custom Type validation for PureBilling
 * @Annotation
 */
class Type extends Assert\Type
{
    public $message = 'This value "{{ value }}" should be of type {{ type }}.';
    public $type;
    public $idPrefixes = array();

    /**
     * {@inheritDoc}
     */
    public function getDefaultOption()
    {
        return 'type';
    }

    /**
     * {@inheritDoc}
     */
    public function getRequiredOptions()
    {
        return array('type');
    }
}
