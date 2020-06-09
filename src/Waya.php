<?php
namespace Osen\Waya;

class Waya
{
public $errors = [
"Request Type not Set-- Your request is invalid.",
"Succesfull request",
"Transaction ID not set",
"Transaction key not set",
"Key id not set",
"Partner ID not set",
"Password field not set",
"Account credentials sent to the API are incorrect",
"Account is Inactive",
"Incorrect Account configuration",
"Request not supported",
"Recipient Country not set",
"Source currency not set",
"Recipient currency not found",
"Service unavailable",
"Recipient ID/Phone number format is not supported",
"Incorrect transaction string",
"Incorrect Transaction number",
"Card Declined with error code embedded in error_message key",
"Card processed successfully with message embedded in success_message key",
"Unsupported IP credentials for request source",
"The PAN/Cardnumber in the request is invalid, PAN/Cardnumber must be 16 Digits long",
"The CVV number in the request length is invalid, the CVV is a 3 Digit number at the back of a User’s Cardnumber",
"Card Expiry date number must be submitted in the format MMYY or MM/YY",
"The amount value must be included with the request",
"Transaction currency details must be set with the request",
"Cardholder names cannot be valid",
"Cardnumber Token value must be included with this request",
"Card user ID value must be included with the request",
400	=> "Bad Request -- Your request is invalid.401",
403	=>	"Forbidden -- The Service requested is hidden for administrators only.",
404	=>	"Not Found -- The specified Service could not be found.",
405	=>	"Method Not Allowed -- You tried to access a Service with an invalid method.",
406	=>	"Not Acceptable -- You requested a format that isn't json.",
410	=>	"Gone -- The Service requested has been removed from our servers.",
429	=>	"Too Many Requests -- You'resending too many requests! Slow down!",
500	=>	"Internal Server Error -- We had a problem with our server. Try again later.",
503	=>	"Service Unavailable -- We're temporarily offline for maintenance. Please try again later.",
];
function authorize(){
$url = 'https://sandbox.wayawaya.com/auth/v1/genww?access_type=secure_credentials';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
$credentials = base64_encode('TRANSACTION_KEY:KEY_ID');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: '.$credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$curl_response = curl_exec($curl);

echo json_decode($curl_response);
}

public function lookup()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => ' ',
'request_code' => ' ',
'country' => ' ',
'acc_type' => ' ',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;

$respons = '[
  {
    "id": 1,
    "name": "sendtomobile",
    "country": {
    "id": 254,
    "name": "kenya",
    "provider": "mpesa",
    "lower_limit": 5,
    "upper_limit": 700
    }
  },
  {
  "id": 2,
  "name": "sendtoaccount",
  "country": {
  "id": 254,
  "name": "kenya",
  "provider": "visadirect",
  "lower_limit": 5,
  "upper_limit": 1500
  }
  }
]';
}

public function forex()
{
$url = 'https://sandbox.wayawaya.com/checks/service_lookup/v1/fxlookup';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => ' ',
'request_code' => ' ',
'country' => ' ',
'source_currency' => ' ',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;

$response = '{
  "id": 1,
  "source_currency": "USD",
  "receive_currency": "KES",
  "exrate": 98.54
}';
}

public function fee()
{
$url = 'https://sandbox.wayawaya.com/checks/service_lookup/v1/feelookup';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => ' ',
'request_code' => ' ',
'service_type' => ' ',
'source_type' => ' ',
'source_id' => ' ',
'destination_id' => ' ',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
$response = '{
  "id": 1,
  "service" : "sendtomobile"
  "source_type" : "currency"
   "source_id" : "USD"
    "destination_id" : "KES"
}';
}

/**
*
request_key	xxxxx123	Unique alphanumeric value shared to merchant/developer
merchant_trans_id	xxxx123	Unique Alphanumeric value identifying transacactions(length of between 8 - 16 characters).
request_type	KPLC_PRE	value identifying transaction type
account_no	1231233113	KPLC Pre-Paid Metre number
account_no	1231233113	KPLC Pre-Paid Metre number
amount	12122.00	The electricity token purchase amount
source_currency	XXX	Source Currency e.g KES
sender_firstname	XXXXXXX	sending user firstname
sender_lastname	XXXXXXX	Sending user lastname
sender_phonenumber	XXXXXXX	Sending user phone number
sender_email	XXXXXXX	Sending user E-Mail
sender_devicelocation	XXXXXXX	Sender real device location obtained from WayaWaya SDK or per set Guidelines
sender_simid	XXXXXXX	Sender SIM Card number obtained using WayaWaya SDK or per Set Guidelines
sender_simserial	XXXXXXX	Sender SIM Card serial obtained from WayaWaya SDK or per set Guidelines
sender_deviceid	XXXXXXX	Sender Device ID Captured using wayawaya SDK or obtained as per guidelines
sender_ipaddress	XXXXXXX	Sender IP address
sender_address	XXXXXXX	Sender physical address should match with card billing address
sender_postalcode	XXXXXXX	Sender postal code location
sender_city	XXXXXXX	Sender City location
receive_currency	XXXXXXX	Recipient currency eg KES
receive_wallet	XXXXXXX	Recipient wallet e.g MPESA & Airtel Money
receive_phonenumber	XXXXXXX	Recipient Phone Number in international number format without leading (+)
receive_firstname	XXXXXXX	Recipient First name
receive_lastname	XXXXXXX	Recipient last name
receive_country	XXXXXXX	Recipient receiving Country
receive_address	XXXXXXX	Recipient Address
receive_postalcode	XXXXXXX	Recipient Postal Code
receive_city	XXXXXXX	Recipient City
amount	XXXXXX	Transaction Amount
card_user_id	XXXXXX	Strored Card customer token Userid registered by WayaWaya
card_token	XXXXXX	Stored customer card token issued by WayaWaya
cust_phone_no	2547xxxxxxxx	Paying customer Phone number
QueueTimeOutURL	http://your_timeout_url	Time-out URL
ResultURL	http://your_result_url	Response URL*/
public function send_mobile()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => 'XXXX',
'merchant_trans_id' => 'XXXXX',
'request_type' => 'sendtomobile',
'account_no' => 'XXXXXX',
'source_currency' => 'XXXXXX',
'sender_firstname' => 'XXXXXX',
'sender_lastname' => 'XXXXXX',
'sender_phonenumber' => 'XXXXXX',
'sender_email' => 'XXXXXX',
'sender_deviceid' => 'XXXXXX',
'sender_ipaddress' => 'XXXXXX',
'sender_address' => 'XXXXXX',
'sender_postalcode' => 'XXXXXX',
'sender_city' => 'XXXXXX',
'sender_country' => 'XXXXXX',
'receive_currency' => 'XXXXXX',
'receive_wallet' => 'XXXXXX',
'receive_phonenumber' => 'XXXXXX',
'receive_firstname' => 'XXXXXX',
'receive_lastname' => 'XXXXXX',
'receive_country' => 'XXXXXX',
'receive_address' => 'XXXXXX',
'receive_postalcode' => 'XXXXXX',
'receive_city' => 'XXXXXX',
'amount' => '123.00',
'card_token' => 'xxxxxxxxxxxxx',
'card_user_id' => 'xxxxxxxxxxxxx',
'cust_phone_no' => 'XXXXXX',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
{
"header": {
"timestamp":"2019-07-05 15:45:23",
"response_code":"0",
"response_description":"OK"
},
"body": {
"merchant_trans_id":"9909013",
"ww_trans_id":"xxxxxxxxxxxxxx",
“wcBalance”:"0.00",
“transactionFee”:”50.40”,
"exchangeRate":"0.00",
“recipient_details”:”XXXXXXXX”
“recipient_validated”:”YES”
}
}
}

/**
request_key	xxxxx123	Unique alphanumeric value shared to merchant/developer
merchant_trans_id	xxxx123	Unique Alphanumeric value identifying transacactions(length of between 8 - 16 characters).
request_type	KPLC_PRE	value identifying transaction type
account_no	1231233113	KPLC Pre-Paid Metre number
account_no	1231233113	KPLC Pre-Paid Metre number
amount	12122.00	The electricity token purchase amount
source_currency	XXX	Source Currency e.g KES
sender_firstname	XXXXXXX	sending user firstname
sender_lastname	XXXXXXX	Sending user lastname
sender_phonenumber	XXXXXXX	Sending user phone number
sender_email	XXXXXXX	Sending user E-Mail
sender_devicelocation	XXXXXXX	Sender real device location obtained from WayaWaya SDK or per set Guidelines
sender_simid	XXXXXXX	Sender SIM Card number obtained using WayaWaya SDK or per Set Guidelines
sender_simserial	XXXXXXX	Sender SIM Card serial obtained from WayaWaya SDK or per set Guidelines
sender_deviceid	XXXXXXX	Sender Device ID Captured using wayawaya SDK or obtained as per guidelines
sender_ipaddress	XXXXXXX	Sender IP address
sender_address	XXXXXXX	Sender physical address should match with card billing address
sender_postalcode	XXXXXXX	Sender postal code location
sender_city	XXXXXXX	Sender City location
receive_currency	XXXXXXX	Recipient currency eg KES
receive_bank	XXXXXXX	Recipient Bank as described in Bank Lookup service
receive_bankcountry	XXXXXXX	Recipient Bank as described in Bank Lookup service
receive_accountno	XXXXXXX	Recipient Bank Account Number
receive_firstname	XXXXXXX	Recipient First name
receive_lastname	XXXXXXX	Recipient last name
receive_country	XXXXXXX	Recipient receiving Country
receive_address	XXXXXXX	Recipient Address
receive_postalcode	XXXXXXX	Recipient Postal Code
receive_city	XXXXXXX	Recipient City
amount	XXXXXX	Transaction Amount
card_user_id	XXXXXX	Strored Card customer token Userid registered by WayaWaya
card_token	XXXXXX	Stored customer card token issued by WayaWaya
cust_phone_no	2547xxxxxxxx	Paying customer Phone number
QueueTimeOutURL	http://your_timeout_url	Time-out URL
ResultURL	http://your_result_url	Response URL
*/
public function send_account()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => 'XXXX',
'merchant_trans_id' => 'XXXXX',
'request_type' => 'sendtoaccount',
'account_no' => 'XXXXXX',
'source_currency' => 'XXXXXX',
'sender_firstname' => 'XXXXXX',
'sender_lastname' => 'XXXXXX',
'sender_phonenumber' => 'XXXXXX',
'sender_email' => 'XXXXXX',
'sender_deviceid' => 'XXXXXX',
'sender_ipaddress' => 'XXXXXX',
'sender_address' => 'XXXXXX',
'sender_postalcode' => 'XXXXXX',
'sender_city' => 'XXXXXX',
'sender_country' => 'XXXXXX',
'receive_currency' => 'XXXXXX',
'receive_bank' => 'XXXXXX',
'receive_bankcountry' => 'XXXXXX',
'receive_accountno' => 'XXXXXX',
'receive_firstname' => 'XXXXXX',
'receive_lastname' => 'XXXXXX',
'receive_country' => 'XXXXXX',
'receive_address' => 'XXXXXX',
'receive_postalcode' => 'XXXXXX',
'receive_city' => 'XXXXXX',
'amount' => '123.00',
'card_token' => 'xxxxxxxxxxxxx',
'card_user_id' => 'xxxxxxxxxxxxx',
'cust_phone_no' => 'XXXXXX',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>
The above command returns JSON structured like this:

{
"header": {
"timestamp":"2019-07-05 15:45:23",
"response_code":"0",
"response_description":"OK"
},
"body": {
"merchant_trans_id":"9909013",
"ww_trans_id":"xxxxxxxxxxxxxx",
“wcBalance”:"0.00",
“transactionFee”:”50.40”,
"exchangeRate":"0.00",
“recipient_details”:”XXXXXXXX”
“recipient_validated”:”YES”
}
}
}
function kplc_tokens()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => 'XXXX',
'merchant_trans_id' => 'XXXXX',
'request_type' => 'KPLC_PRE',
'account_no' => 'XXXXXX',
'amount' => '123.00',
'cust_phone_no' => 'XXXXXX',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>
The above command returns JSON structured like this:

{
"header": {
"timestamp":"2019-07-05 15:45:23",
"response_code":"0",
"response_description":"OK"
},
"body": {
"merchant_trans_id":"9909013",
"ww_trans_id":"101",
"wcBalance”:"100.55",
“commissionBalance”:”50.40”,
"ref1":"12345678901234",
“ref2”:”0.00”
}
}
}

function kplc_postpay()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => 'XXXX',
'merchant_trans_id' => 'XXXXX',
'request_type' => 'KPLC_POST',
'account_no' => 'XXXXXX',
'amount' => '123.00',
'cust_phone_no' => 'XXXXXX',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>
The above command returns JSON structured like this:

{
"header": {
"timestamp":"2019-07-05 15:45:23",
"response_code":"0",
"response_description":"OK"
},
"body": {
"merchant_trans_id":"9909013",
"ww_trans_id":"101",
"wcBalance”:"100.55",
“commissionBalance”:”50.40”,
"ref1":"",
“ref2”:””
}
}
}

public function kplc_prepaid_bill_validate()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => 'XXXX',
'merchant_trans_id' => 'XXXXX',
'request_type' => 'KPLCPRE_BILL',
'account_no' => 'XXXXXX',
'cust_phone_no' => 'XXXXXX',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>
The above command returns JSON structured like this:

{
"header": {
"timestamp":"2019-07-05 15:45:23",
"response_code":"0",
"response_description":"OK"
},
"body": {
"merchant_trans_id":"9909013",
"ww_trans_id":"101",
"wcBalance”:"100.55",
“commissionBalance”:”50.40”,
"MetreName":"John Doe",
“ref2”:””
}
}
}

public fuction kplc_postpay_bill_check()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => 'XXXX',
'merchant_trans_id' => 'XXXXX',
'request_type' => 'KPLC_POST_BILL',
'account_no' => 'XXXXXX',
'cust_phone_no' => 'XXXXXX',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>
The above command returns JSON structured like this:

{
"header": {
"timestamp":"2019-07-05 15:45:23",
"response_code":"0",
"response_description":"OK"
},
"body": {
"merchant_trans_id":"9909013",
"ww_trans_id":"101",
"wcBalance”:"100.55",
“commissionBalance”:”50.40”,
"ref1":"",
“ref2”:””
}
}

}

public function airtime()
{
$url = 'https://sandbox.wayawaya.com/pp_services';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: ACCESS_TOKEN')); //setting custom header


$curl_post_data = array(
//Fill in the request parameters with valid values
'request_key' => 'XXXX',
'merchant_trans_id' => 'XXXXX',
'request_type' => 'AIRTIME_SAF',
'account_no' => 'XXXXXX',
'amount' => '123.00',
'cust_phone_no' => 'XXXXXX',
'QueueTimeOutURL' => 'http://your_timeout_url',
'ResultURL' => 'http://your_result_url'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>
The above command returns JSON structured like this:

{
"header": {
"timestamp":"2019-07-05 15:45:23",
"response_code":"0",
"response_description":"OK"
},
"body": {
"merchant_trans_id":"9909013",
"ww_trans_id":"101",
"wcBalance”:"100.55",
“commissionBalance”:”50.40”,
"ref1":"",
“ref2”:””
}
}
}
}
