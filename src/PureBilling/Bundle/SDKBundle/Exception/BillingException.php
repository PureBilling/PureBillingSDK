<?php
namespace PureBilling\Bundle\SDKBundle\Exception;

use PureMachine\Bundle\SDKBundle\Exception\Exception;

class BillingException extends Exception
{
    const DEFAULT_ERROR_CODE = 'BILLING_001';

    const BILLING_001 = 'BILLING_001';
    const BILLING_001_MESSAGE = 'Unknown billing error';

    const BILLING_002 = 'BILLING_002';
    const BILLING_002_MESSAGE = 'billing not supported';
}
