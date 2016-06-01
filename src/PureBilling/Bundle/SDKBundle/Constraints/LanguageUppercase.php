<?php
namespace PureBilling\Bundle\SDKBundle\Constraints;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * Custom Type validation for PureBilling
 * @Annotation
 */
class LanguageUppercase extends Assert\Language
{
//		public $message = "The string '%string%' doesn't match with a correct language.";
}
