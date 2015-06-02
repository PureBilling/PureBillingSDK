PureBilling SDK
================

PureBilling SDK for PHP

## ChangeLog

### Master

- ...

### V2.0.3

- Adding laravel annotation loader
- Adding ip, country and metadata to refund action
- Adding sessionToken and sessionBrowser token to BillingTransaction
- Adding Email into iban payment method
- Adding cancelSubscriptionDate in Subscribe to allow to unsubscribe in the future

### V2.0.2

- Adding subscription namespace and moving subscription related store
- Adding childrenBillingTransactions and option in BillingTransaction store
- Adding activeOptions in PSPTransactionInfo store
- Adding option childrenBillingTransactions in propertiesToExpand in charge/Get webService
- Adding options store
- Adding PDFMandate and GetMandate store

### V2.0.1

- Adding Paypal stores (using Braintree)
- Adding cancelBillingTransaction store (to cancel running transaction)

### V2.0.0


- Initial release
