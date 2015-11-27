PureBilling SDK
================

PureBilling SDK for PHP

## ChangeLog

### v2.0.10

- Removed BillingTransaction->option field
- Added BillingTransction->options fields
- Ne payment method added: paysafecard, ideal, giropay, bankcontact, sofort
- Subscribe->firstBillingDate is not mandatory anymore

### v2.0.9

- Add Ip V6 support
- Update to PureMachine/SDK v2.0.6 to increase default timeout to 65s
- Update dependencies to last versions

### v2.0.8

- Add Subscription/Get action store
- Add customer into SubscriptionInfo store

### v2.0.7

- Added width and height in RedirectRequest store
- Added iDeal paymentMethodType
- Added offerId in Subscribe action store
- Added allowedAction in expended properties in various stores
- New NotificationCallbackUpdate action store
- New UpdateSubscription action store

### v2.0.6

- Add yearly, manual and quaterly subscribe recurring period
- Add billingCycles and remove cancelSubscriptionDate
- Add new action store BillNextCycle


### v2.0.5

- Adding metadata to subscription
- Adding notificationCallbackUrl to subscribe store

### V2.0.4

- fix deps issue

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
