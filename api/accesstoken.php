<?php
//YOUR MPESA API KEYS
$consumerKey = "rxSGevoR711y27NfTmCkjGWY4KQxtiCv1r5wMJ0dEGHCdoUV";
$consumerSecret = "xZ5veu7IgLkOOx33AmtmrpJ8xfmHiAxyDYfxjtwBI5ZIWPsIyQBaWneCiS9j9bUr";
//ACCESS TOKEN URL
$access_token_url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
$header = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey .':'. $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($result);
$access_token = $result->access_token;
curl_close($curl);


