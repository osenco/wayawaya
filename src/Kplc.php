<?php

namespace Osen\Waya;

class Kplc extends Waya
{
	public static function kplc_tokens()
	{
		$url = 'https://sandbox.wayawaya.com/pp_services';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: ACCESS_TOKEN')); //setting custom header

		$curl_post_data = array(
			//Fill in the request parameters with valid values
			'request_key'       => 'XXXX',
			'merchant_trans_id' => 'XXXXX',
			'request_type'      => 'KPLC_PRE',
			'account_no'        => 'XXXXXX',
			'amount'            => '123.00',
			'cust_phone_no'     => 'XXXXXX',
			'QueueTimeOutURL'   => 'http://your_timeout_url',
			'ResultURL'         => 'http://your_result_url',
		);

		$data_string = json_encode($curl_post_data);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

		$curl_response = curl_exec($curl);
		print_r($curl_response);

		echo $curl_response;
		// {
		// "header": {
		// "timestamp":"2019-07-05 15:45:23",
		// "response_code":"0",
		// "response_description":"OK"
		// },
		// "body": {
		// "merchant_trans_id":"9909013",
		// "ww_trans_id":"101",
		// "wcBalance”:"100.55",
		// “commissionBalance”:”50.40”,
		// "ref1":"12345678901234",
		// “ref2”:”0.00”
		// }
		// }
	}

	public static function kplc_postpay()
	{
		$url = 'https://sandbox.wayawaya.com/pp_services';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: ACCESS_TOKEN')); //setting custom header

		$curl_post_data = array(
			//Fill in the request parameters with valid values
			'request_key'       => 'XXXX',
			'merchant_trans_id' => 'XXXXX',
			'request_type'      => 'KPLC_POST',
			'account_no'        => 'XXXXXX',
			'amount'            => '123.00',
			'cust_phone_no'     => 'XXXXXX',
			'QueueTimeOutURL'   => 'http://your_timeout_url',
			'ResultURL'         => 'http://your_result_url',
		);

		$data_string = json_encode($curl_post_data);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

		$curl_response = curl_exec($curl);
		print_r($curl_response);

		echo $curl_response;

		// {
		// "header": {
		// "timestamp":"2019-07-05 15:45:23",
		// "response_code":"0",
		// "response_description":"OK"
		// },
		// "body": {
		// "merchant_trans_id":"9909013",
		// "ww_trans_id":"101",
		// "wcBalance”:"100.55",
		// “commissionBalance”:”50.40”,
		// "ref1":"",
		// “ref2”:””
		// }
		// }
	}

	public static function kplc_prepaid_bill_validate()
	{
		$url = 'https://sandbox.wayawaya.com/pp_services';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: ACCESS_TOKEN')); //setting custom header

		$curl_post_data = array(
			//Fill in the request parameters with valid values
			'request_key'       => 'XXXX',
			'merchant_trans_id' => 'XXXXX',
			'request_type'      => 'KPLCPRE_BILL',
			'account_no'        => 'XXXXXX',
			'cust_phone_no'     => 'XXXXXX',
			'QueueTimeOutURL'   => 'http://your_timeout_url',
			'ResultURL'         => 'http://your_result_url',
		);

		$data_string = json_encode($curl_post_data);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

		$curl_response = curl_exec($curl);
		print_r($curl_response);

		echo $curl_response;
		// {
		// "header": {
		// "timestamp":"2019-07-05 15:45:23",
		// "response_code":"0",
		// "response_description":"OK"
		// },
		// "body": {
		// "merchant_trans_id":"9909013",
		// "ww_trans_id":"101",
		// "wcBalance”:"100.55",
		// “commissionBalance”:”50.40”,
		// "MetreName":"John Doe",
		// “ref2”:””
		// }
		// }
	}

	public static function kplc_postpay_bill_check()
	{
		$url = 'https://sandbox.wayawaya.com/pp_services';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: ACCESS_TOKEN')); //setting custom header

		$curl_post_data = array(
			//Fill in the request parameters with valid values
			'request_key'       => 'XXXX',
			'merchant_trans_id' => 'XXXXX',
			'request_type'      => 'KPLC_POST_BILL',
			'account_no'        => 'XXXXXX',
			'cust_phone_no'     => 'XXXXXX',
			'QueueTimeOutURL'   => 'http://your_timeout_url',
			'ResultURL'         => 'http://your_result_url',
		);

		$data_string = json_encode($curl_post_data);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

		$curl_response = curl_exec($curl);
		print_r($curl_response);

		echo $curl_response;
		// {
		// "header": {
		// "timestamp":"2019-07-05 15:45:23",
		// "response_code":"0",
		// "response_description":"OK"
		// },
		// "body": {
		// "merchant_trans_id":"9909013",
		// "ww_trans_id":"101",
		// "wcBalance”:"100.55",
		// “commissionBalance”:”50.40”,
		// "ref1":"",
		// “ref2”:””
		// }
		// }

	}
}
