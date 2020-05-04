<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
class PaymentController extends Controller
{
    //
 
    public function __construct()
    {
/** PayPal api context **/
 
    }

public function payWithpaypal(Request $request)
 {

        $paypal_conf = \Config::get('paypal');
        $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
             $paypal_conf['client_id'],
            $paypal_conf['secret']    // ClientSecret
        )
);

 $payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal('1.00');
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://ejobs.local/home")
    ->setCancelUrl("http://ejobs.local/profile");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);




// Create payment with valid API context
try {
  $payment->create($apiContext);

  // Get PayPal redirect URL and redirect the customer
  $approvalUrl = $payment->getApprovalLink();

  // Redirect the customer to $approvalUrl
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}

// Get payment object by passing paymentId
$paymentId = $_GET['paymentId'];
$payment = Payment::get($paymentId, $apiContext);
$payerId = $_GET['PayerID'];

// Execute payment with payer ID
$execution = new PaymentExecution();
$execution->setPayerId($payerId);

try {
  // Execute payment
  $result = $payment->execute($execution, $apiContext);
  var_dump($result);
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
} catch (Exception $ex) {
  die($ex);
}
return $payment;
}
}
