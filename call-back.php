<?php
// Include the Daraja API Library
require_once('path/to/Daraja.php');

// Initialize Daraja with your credentials
$daraja = new Daraja([
    'consumerKey' => 'your-consumer-key',
    'consumerSecret' => 'your-consumer-secret',
]);

// Get the callback data
$callbackData = file_get_contents('php://input');

// Verify the callback
$verified = $daraja->verifyCallback($callbackData);

if ($verified) {
    // The callback is valid; you can proceed to process the transaction.
} else {
    // The callback is not valid; ignore it or log the issue for investigation.
}

// Decode the callback data
$transaction = json_decode($callbackData);

// Extract information
$transactionType = $transaction->TransactionType;
$transactionAmount = $transaction->TransAmount;
$phoneNumber = $transaction->PhoneNumber;
// ...other relevant data

// Update your database or trigger actions accordingly
// Example: Update the order status if it's a payment confirmation
if ($transactionType === 'Completed') {
    // Update the order in your system
}

// Send a response
header('HTTP/1.1 200 OK');

?>