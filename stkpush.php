<?php 
//include the access token file
include 'accesstoken.php';
date_default_timezone_set('Africa/Nairobi');
$ProcessrequestUrl ='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'http://myticket.charlesdete.com/call-back.php';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
//Encrypting data to get password
$Password =base64_encode($BusinessShortCode . $Passkey . $Timestamp);
$Phone = '254794953436';
$Money = '1';
$PartyA = $Phone;
$PartyB = '254708374149';
$AccountReference = 'MyTICKET';
$TransactionDesc = 'stkpush test';
$Amount = $Money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
//initiate curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $ProcessrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
$curl_post_data = array(

    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'callbackurl' => $callbackurl,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc

);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
 
echo $curl_response;
