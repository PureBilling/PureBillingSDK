<?php
namespace PureBilling\Bundle\SDKBundle\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints as Assert;

class LanguageUppercaseValidator extends Assert\LanguageValidator
{
    public function validate($value, Constraint $constraint)
    {
	if (!preg_match('/^[A-Z]+$/', $value, $matches)) {
            // If you're using the new 2.5 validation API (you probably are!)
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }

	$value = strtolower($value);

        return parent::validate($value, $constraint);
    }
}
