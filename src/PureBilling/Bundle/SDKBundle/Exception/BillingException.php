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

    const BILLING_003 = 'BILLING_003';
    const BILLING_003_MESSAGE = 'ExternalId already used';

    const BILLING_004 = 'BILLING_004';
    const BILLING_004_MESSAGE = 'Form already billed';
}
