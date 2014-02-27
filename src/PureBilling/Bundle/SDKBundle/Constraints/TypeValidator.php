<?php
namespace PureBilling\Bundle\SDKBundle\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

class TypeValidator extends Assert\TypeValidator
{
    private $supportedTypes = array('objectOrId', 'id', 'datetime');

    public function validate($value, Constraint $constraint)
    {
        if (!in_array($constraint->type, $this->supportedTypes)) return parent::validate($value, $constraint);

        switch ($constraint->type) {
            case 'objectOrId':
                if (is_object($value)) return;
                return $this->checkId($value, $constraint->idPrefixes, $constraint->message);
                break;
            case 'id':
                if (is_object($value)) return;
                return $this->checkId($value, $constraint->idPrefixes, $constraint->message);
                break;
            case 'datetime':
                return $this->checkDateTime($value, $constraint->message);
                break;
            default:
                break;
        }

        return parent::validate($value, $constraint);
    }

    protected function checkDateTime($value, $type)
    {
        if (!is_numeric($value)) {
            $this->context->addViolation($type, array(
                '{{ value }}' => $value,
                '{{ type }}'  => 'integer',
            ));
        }
    }

    protected function checkId($id, $prefixes, $type)
    {
        if (!$id) return;

        if (!is_string($id)) {
            $this->context->addViolation($type, array(
                '{{ value }}' => $this->getValue($id),
                '{{ type }}'  => 'object or string',
            ));
        }

        foreach ($prefixes as $prefix) {
            if ($this->startsWith($id, $prefix ."_")) return;
        }

        $this->context->addViolation($type, array(
            '{{ value }}' => $this->getValue($id),
            '{{ type }}'  => 'object or string and start with '
                             . json_encode($prefixes),
        ));
    }

    private function getValue($value)
    {
        return is_object($value) ? get_class($value) : (is_array($value) ? 'Array' : (string) $value);
    }

    private static function contains($haystack, $needle, $case = true, $pos = 0)
    {
        if ($case) {
            $result = (strpos($haystack, $needle, 0) === $pos);
        } else {
            $result = (stripos($haystack, $needle, 0) === $pos);
        }

        return $result;
    }

    /**
     *
     * @param string  $haystack string to search in
     * @param string  $needle   string that has to be at starts.
     * @param boolean $case     if true, case sensitive.
     */
    public static function startsWith($haystack, $needle, $case = true)
    {
        return self::contains($haystack, $needle, $case, 0);
    }
}
