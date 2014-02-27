<?php
namespace PureBilling\Bundle\SDKBundle\Exception;

use PureMachine\Bundle\SDKBundle\Exception\Exception;

class InvoiceException extends Exception
{
    const DEFAULT_ERROR_CODE = 'INVOICE_001';

    const INVOICE_001 = 'INVOICE_001';
    const INVOICE_001_MESSAGE = 'Unknown invoice workflow error';

    const INVOICE_002 = 'INVOICE_002';
    const INVOICE_002_MESSAGE = 'invoice creation error';

    const INVOICE_003 = 'INVOICE_003';
    const INVOICE_003_MESSAGE = 'ExternalID already used';

    const INVOICE_004 = 'INVOICE_004';
    const INVOICE_004_MESSAGE = 'invoice cancellation error';
}
