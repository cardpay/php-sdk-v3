# PHP SDK for Cardpay API v3
The Cardpay API uses HTTP verbs and a RESTful endpoint structure. Request and response payloads are formatted as JSON.

- API version: 3.0
- PHP SDK version: 1.4.4.8

For more information, please visit [https://integration.cardpay.com/v3/](https://integration.cardpay.com/v3/)

## Requirements

- PHP 5.6 or later
- curl, json, openssl extensions

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/cardpay/php-sdk-v3.git"
    }
  ],
  "require": {
    "cardpay/php-sdk-v3": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files, run `composer install` and include `autoload.php`:

```php
require_once('./vendor/autoload.php');
```


## Getting Started

**Important:** please note that current implementation is using temporary files storage (see [FileTokensStorageApi](lib/api/FileTokensStorageApi.php)), to save, read and delete (if needed) the API tokens.
You may implement another tokens storage (session, database, Memcached, Redis, etc) by implementing [TokensStorageApi](lib/api/TokensStorageApi.php) interface.

In order to obtain the API tokens please use [AuthApiClient](lib/api/AuthApiClient.php). It requires API terminal code and password, provided by Cardpay.

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php

use Cardpay\api\AuthApiClient;
use Cardpay\api\FileTokensStorageApi;

$fileTokensStorageApi = new FileTokensStorageApi($terminalCode);
$authApiClient = new AuthApiClient($terminalCode, $password, $fileTokensStorageApi);

/** @var ApiTokens $apiTokens */
$apiTokens = $authApiClient->obtainApiTokens();

$accessToken = $apiTokens->getAccessToken();
$refreshToken = $apiTokens->getRefreshToken();
$tokenType = $apiTokens->getTokenType();
```


## Tests

Open ./test/Config.php and set terminal code, password and terminal currency.

To run the unit tests:

```
composer install
./vendor/bin/phpunit --configuration ./phpunit.xml
```


## Documentation for models

 - [ApiError](lib/model/ApiError.php)
 - [ApiTokens](lib/model/ApiTokens.php)
 - [AuthenticationError](lib/model/AuthenticationError.php)
 - [BadRequestError](lib/model/BadRequestError.php)
 - [BankCardPayoutData](lib/model/BankCardPayoutData.php)
 - [BillingAddress](lib/model/BillingAddress.php)
 - [ChangeSubscriptionStatusClaimResponse](lib/model/ChangeSubscriptionStatusClaimResponse.php)
 - [ChangedPlanData](lib/model/ChangedPlanData.php)
 - [ClaimResponseSubscriptionData](lib/model/ClaimResponseSubscriptionData.php)
 - [Confirm3dsRequest](lib/model/Confirm3dsRequest.php)
 - [FilingRecurringData](lib/model/FilingRecurringData.php)
 - [FilingRequest](lib/model/FilingRequest.php)
 - [FilingRequestMerchantOrder](lib/model/FilingRequestMerchantOrder.php)
 - [FilingRequestSubscriptionData](lib/model/FilingRequestSubscriptionData.php)
 - [FilterParameters](lib/model/FilterParameters.php)
 - [Flight](lib/model/Flight.php)
 - [Flights](lib/model/Flights.php)
 - [InstallmentData](lib/model/InstallmentData.php)
 - [Item](lib/model/Item.php)
 - [NextSubscriptionPayment](lib/model/NextSubscriptionPayment.php)
 - [NotFoundError](lib/model/NotFoundError.php)
 - [OAuthError](lib/model/OAuthError.php)
 - [OneclickData](lib/model/OneclickData.php)
 - [PaymentCallback](lib/model/PaymentCallback.php)
 - [PaymentCreationResponse](lib/model/PaymentCreationResponse.php)
 - [PaymentPatchRequest](lib/model/PaymentPatchRequest.php)
 - [PaymentRequest](lib/model/PaymentRequest.php)
 - [PaymentRequestCard](lib/model/PaymentRequestCard.php)
 - [PaymentRequestCardAccount](lib/model/PaymentRequestCardAccount.php)
 - [PaymentRequestCryptocurrencyAccount](lib/model/PaymentRequestCryptocurrencyAccount.php)
 - [PaymentRequestCustomer](lib/model/PaymentRequestCustomer.php)
 - [PaymentRequestEWalletAccount](lib/model/PaymentRequestEWalletAccount.php)
 - [PaymentRequestMerchantOrder](lib/model/PaymentRequestMerchantOrder.php)
 - [PaymentRequestPaymentData](lib/model/PaymentRequestPaymentData.php)
 - [PaymentResponse](lib/model/PaymentResponse.php)
 - [PaymentResponseCardAccount](lib/model/PaymentResponseCardAccount.php)
 - [PaymentResponseCryptocurrencyAccount](lib/model/PaymentResponseCryptocurrencyAccount.php)
 - [PaymentResponseCustomer](lib/model/PaymentResponseCustomer.php)
 - [PaymentResponsePaymentData](lib/model/PaymentResponsePaymentData.php)
 - [PaymentUpdateResponse](lib/model/PaymentUpdateResponse.php)
 - [PaymentUpdateTransactionData](lib/model/PaymentUpdateTransactionData.php)
 - [PaymentsList](lib/model/PaymentsList.php)
 - [PayoutCallback](lib/model/PayoutCallback.php)
 - [PayoutPaymentData](lib/model/PayoutPaymentData.php)
 - [PayoutRequest](lib/model/PayoutRequest.php)
 - [PayoutRequestCard](lib/model/PayoutRequestCard.php)
 - [PayoutRequestCardAccount](lib/model/PayoutRequestCardAccount.php)
 - [PayoutRequestCryptocurrencyAccount](lib/model/PayoutRequestCryptocurrencyAccount.php)
 - [PayoutRequestCustomer](lib/model/PayoutRequestCustomer.php)
 - [PayoutRequestEWalletAccount](lib/model/PayoutRequestEWalletAccount.php)
 - [PayoutRequestMerchantOrder](lib/model/PayoutRequestMerchantOrder.php)
 - [PayoutRequestPayoutData](lib/model/PayoutRequestPayoutData.php)
 - [PayoutResponse](lib/model/PayoutResponse.php)
 - [PayoutResponseCard](lib/model/PayoutResponseCard.php)
 - [PayoutResponseCardAccount](lib/model/PayoutResponseCardAccount.php)
 - [PayoutResponseCryptocurrencyAccount](lib/model/PayoutResponseCryptocurrencyAccount.php)
 - [PayoutResponseCustomer](lib/model/PayoutResponseCustomer.php)
 - [PayoutResponseEWalletAccount](lib/model/PayoutResponseEWalletAccount.php)
 - [PayoutResponsePayoutData](lib/model/PayoutResponsePayoutData.php)
 - [PayoutUpdateRequest](lib/model/PayoutUpdateRequest.php)
 - [PayoutUpdateResponse](lib/model/PayoutUpdateResponse.php)
 - [PayoutsList](lib/model/PayoutsList.php)
 - [Plan](lib/model/Plan.php)
 - [PlanDataList](lib/model/PlanDataList.php)
 - [PlanUpdateRequest](lib/model/PlanUpdateRequest.php)
 - [PlanUpdateRequestPlanData](lib/model/PlanUpdateRequestPlanData.php)
 - [PlanUpdateResponse](lib/model/PlanUpdateResponse.php)
 - [RecurringCallback](lib/model/RecurringCallback.php)
 - [RecurringCreationRequest](lib/model/RecurringCreationRequest.php)
 - [RecurringCreationResponse](lib/model/RecurringCreationResponse.php)
 - [RecurringCustomer](lib/model/RecurringCustomer.php)
 - [RecurringFilterParameters](lib/model/RecurringFilterParameters.php)
 - [RecurringPatchRequest](lib/model/RecurringPatchRequest.php)
 - [RecurringPlanRequest](lib/model/RecurringPlanRequest.php)
 - [RecurringPlanRequestPlanData](lib/model/RecurringPlanRequestPlanData.php)
 - [RecurringPlanResponse](lib/model/RecurringPlanResponse.php)
 - [RecurringRequestFiling](lib/model/RecurringRequestFiling.php)
 - [RecurringRequestRecurringData](lib/model/RecurringRequestRecurringData.php)
 - [RecurringResponse](lib/model/RecurringResponse.php)
 - [RecurringResponseFiling](lib/model/RecurringResponseFiling.php)
 - [RecurringResponseRecurringData](lib/model/RecurringResponseRecurringData.php)
 - [RecurringUpdateResponse](lib/model/RecurringUpdateResponse.php)
 - [RecurringsList](lib/model/RecurringsList.php)
 - [RedirectUrlResponse](lib/model/RedirectUrlResponse.php)
 - [RefundCallback](lib/model/RefundCallback.php)
 - [RefundRequest](lib/model/RefundRequest.php)
 - [RefundRequestMerchantOrder](lib/model/RefundRequestMerchantOrder.php)
 - [RefundRequestPaymentData](lib/model/RefundRequestPaymentData.php)
 - [RefundRequestRefundData](lib/model/RefundRequestRefundData.php)
 - [RefundResponse](lib/model/RefundResponse.php)
 - [RefundResponseCard](lib/model/RefundResponseCard.php)
 - [RefundResponseCardAccount](lib/model/RefundResponseCardAccount.php)
 - [RefundResponseCustomer](lib/model/RefundResponseCustomer.php)
 - [RefundResponseEWalletAccount](lib/model/RefundResponseEWalletAccount.php)
 - [RefundResponsePaymentData](lib/model/RefundResponsePaymentData.php)
 - [RefundResponseRefundData](lib/model/RefundResponseRefundData.php)
 - [RefundUpdateRequest](lib/model/RefundUpdateRequest.php)
 - [RefundUpdateResponse](lib/model/RefundUpdateResponse.php)
 - [RefundsList](lib/model/RefundsList.php)
 - [RenamedPlanData](lib/model/RenamedPlanData.php)
 - [Request](lib/model/Request.php)
 - [RequestUpdatedTransactionData](lib/model/RequestUpdatedTransactionData.php)
 - [ResponsePlanData](lib/model/ResponsePlanData.php)
 - [ResponseUpdatedTransactionData](lib/model/ResponseUpdatedTransactionData.php)
 - [ReturnUrls](lib/model/ReturnUrls.php)
 - [ScheduledData](lib/model/ScheduledData.php)
 - [ShippingAddress](lib/model/ShippingAddress.php)
 - [Subscription](lib/model/Subscription.php)
 - [SubscriptionFilterParameters](lib/model/SubscriptionFilterParameters.php)
 - [SubscriptionGetResponse](lib/model/SubscriptionGetResponse.php)
 - [SubscriptionList](lib/model/SubscriptionList.php)
 - [SubscriptionUpdateRequest](lib/model/SubscriptionUpdateRequest.php)
 - [SubscriptionUpdateRequestSubscriptionData](lib/model/SubscriptionUpdateRequestSubscriptionData.php)
 - [SubscriptionUpdateResponse](lib/model/SubscriptionUpdateResponse.php)
 - [TransactionRequest](lib/model/TransactionRequest.php)
 - [TransactionResponseEWalletAccount](lib/model/TransactionResponseEWalletAccount.php)
 - [TransactionResponseMerchantOrder](lib/model/TransactionResponseMerchantOrder.php)
 - [TransactionUpdateRequest](lib/model/TransactionUpdateRequest.php)
 - [UpdatedPlanData](lib/model/UpdatedPlanData.php)
 - [UpdatedSubscriptionData](lib/model/UpdatedSubscriptionData.php)
 - [UpdatedSubscriptionRecurringData](lib/model/UpdatedSubscriptionRecurringData.php)
 - [PaymentConfirm3dsRequest](lib/model/PaymentConfirm3dsRequest.php)
 - [PaymentUpdateRequest](lib/model/PaymentUpdateRequest.php)
 - [RecurringConfirm3dsRequest](lib/model/RecurringConfirm3dsRequest.php)
 - [RecurringUpdateRequest](lib/model/RecurringUpdateRequest.php)


## Author

support@cardpay.com