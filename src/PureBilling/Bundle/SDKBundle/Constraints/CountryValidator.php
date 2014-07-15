<?php
namespace PureBilling\Bundle\SDKBundle\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

class CountryValidator extends Assert\CountryValidator
{
    public function validate($value, Constraint $constraint)
    {
        if ($value == '??') {
            return;
        }

        if ($value == 'EU') {
            return;
        }

        return parent::validate($value, $constraint);
    }
}
