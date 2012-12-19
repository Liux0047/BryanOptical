<?php
require ("../../../includes/variables.php");
$PayPalMode         = 'sandbox'; // sandbox or live
$PayPalApiUsername  = 'tracy1_1355823689_biz_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword  = '1355823711'; //Paypal API password
$PayPalApiSignature     = 'AZU.9BBITln90bAEsKiEseZHjMKEAuK3LId25UFjbW032yEDSlrFXcfc'; //Paypal API Signature
$PayPalCurrencyCode     = 'SGD'; //Paypal Currency Code
$PayPalReturnURL    = $site_url.'/modules/payments/paypal/process.php'; //Point to process.php page
$PayPalCancelURL    = $site_url.'/glass-gallery.php'; //Cancel URL if user clicks cancel
?>