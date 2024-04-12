<?php
header("Content-Type: application/json");

$stkCallbackResponse =file_get_contents('php://input');
$logFile="Mpesastkresponse.json";
$log=fopen($logFile,"a");
fwrite($log,$stkCallbackResponse);
fclose($log);


$data = json_decode($stkCallbackResponse);

$MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
$CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
$ResultCode = $data->Body->stkCallback->ResultCode;
$Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$TransactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$UserPhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;

//check if the transaction was succssful
if($ResultCode == 0){
    // store the transaction details in the database
}